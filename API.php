<?php

if (!isset($_GET['action']))
{
    $response = array(
        'status' => false,
        'message' => 'Không tìm thấy action',
        'data' => ''
    );
    echo json_encode($response);
    return;
}

include("config.php");
include("DB.php");

// *************************** CONTROLLER ***************************

session_start();
switch($_GET['action'])
{
    case 'login_employees':
        if (!isset($_POST['user']) || !isset($_POST['pass']))
        {
            $response = array(
                'status' => false,
                'message' => 'Không thể để trống tài khoản và mật khẩu',
                'data' => ''
            );
            echo json_encode($response);
            return;
        }
        login($_POST['user'], $_POST['pass']);
        return;
    case 'login_employers':
        if (!isset($_POST['user']) || !isset($_POST['pass']))
        {
            $response = array(
                'status' => false,
                'message' => 'Không thể để trống tài khoản và mật khẩu',
                'data' => ''
            );
            echo json_encode($response);
            return;
        }
        login($_POST['user'], $_POST['pass']);
        return;
    case 'register_employees':
        if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['sdt']) || !isset($_POST['pass']) || !isset($_POST['repass']))
        {
            $response = array(
                'status' => false,
                'message' => 'Không thể để trống tài khoản và mật khẩu',
                'data' => ''
            );
            echo json_encode($response);
            return;
        }
        if (strlen($_POST['pass']) < 8)
        {
            $response = array(
                'status' => false,
                'message' => 'Mật khẩu tối thiểu 8 kí tự',
                'data' => ''
            );
            echo json_encode($response);
            return;
        }
        if ($_POST['pass'] != $_POST['repass'])
        {
            $response = array(
                'status' => false,
                'message' => 'Mật khẩu nhập lại không trùng khớp',
                'data' => ''
            );
            echo json_encode($response);
            return;
        }
        register_employees($_POST['name'], $_POST['email'], $_POST['sdt'], $_POST['pass']);
        return;
    case 'register_employers':
        if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['sdt']) || !isset($_POST['pass']) || !isset($_POST['repass']) || !isset($_POST['sdt']) || !isset($_POST['cong_ty']) || !isset($_POST['dia_chi']) || !isset($_POST['thanh_pho']))
        {
            $response = array(
                'status' => false,
                'message' => 'Vui lòng nhập đầy đủ thông tin',
                'data' => ''
            );
            echo json_encode($response);
            return;
        }
        if (strlen($_POST['pass']) < 8)
        {
            $response = array(
                'status' => false,
                'message' => 'Mật khẩu tối thiểu 8 kí tự',
                'data' => ''
            );
            echo json_encode($response);
            return;
        }
        if ($_POST['pass'] != $_POST['repass'])
        {
            $response = array(
                'status' => false,
                'message' => 'Mật khẩu nhập lại không trùng khớp',
                'data' => ''
            );
            echo json_encode($response);
            return;
        }
        register_employers($_POST['email'], $_POST['pass'], $_POST['name'], $_POST['sdt'], $_POST['cong_ty'], $_POST['dia_chi'], $_POST['thanh_pho']);
        return;
    case '';
        return;
    default:
        $response = array(
            'status' => false,
            'message' => 'Không tìm thấy action',
            'data' => ''
        );
        echo json_encode($response);
        return;
}

// *************************** FUNCTION MODEL ***************************

// ĐĂNG NHẬP

function login($user, $pass)
{
    if (isset($_SESSION["permission"]) || isset($_SESSION["user"]))
    {
        $response = array(
            'status' => false,
            'message' => 'Đã đăng nhập tài khoản khác. Vui lòng đăng xuất và thực hiện lại',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }
    if ($user == "" || $pass == "")
    {
        $response = array(
            'status' => false,
            'message' => 'Không thể để trống tài khoản và mật khẩu',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }
    $result = db_select('members', "email = '$user' AND pass = '".md5($pass)."'");
    if (count($result) == 0)
    {
        $response = array(
            'status' => false,
            'message' => 'Email hoặc mật khẩu không chính xác',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }
    $response = array(
        'status' => true,
        'message' => 'Đăng nhập thành công',
        'data' => ''
    );

    session_unset();
    $_SESSION["user"] = $user;
    $_SESSION["permission"] = $result[0]['chuc_vu'];
    echo json_encode($response);
    return;
}

// ĐĂNG KÝ TÀI KHOẢN ỨNG CỬ VIÊN

function register_employees($name, $email, $sdt, $pass)
{
    if (isset($_SESSION["permission"]))
    {
        $response = array(
            'status' => false,
            'message' => 'Vui lòng đăng xuẩt và thực hiện lại',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }
    if ($name == "" || $pass == "" || $email == "" || $sdt == "")
    {
        $response = array(
            'status' => false,
            'message' => 'Vui lòng nhập đầy đủ thông tin',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }

    if (!isEmail($email)) {
        $response = array(
            'status' => false,
            'message' => 'Email không đúng định dạng',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }

    if (!isPhoneNumber($sdt)) {
        $response = array(
            'status' => false,
            'message' => 'Số điện thoại không đúng định dạng',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }

    $result = db_select('members', "`email` = '$email'");
    if (count($result) > 0)
    {
        $response = array(
            'status' => false,
            'message' => 'Email đã tồn tại',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }
    $result = db_insert('ung_cu_vien', array(
                                            'sdt' => $sdt,
                                            'name' => $name
                                        ));
    $ung_cu_vien_id = mysqli_insert_id($GLOBALS['conn']);

    $data = array(
        'chuc_vu' => '1',
        'email' => $email,
        'ung_cu_vien_id' => $ung_cu_vien_id,
        'pass' => md5($pass)
    );

    $result = db_insert('members', $data);
    
    if (!$result)
    {
        $response = array(
            'status' => false,
            'message' => 'Đăng ký thất bại',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }
    
    $response = array(
        'status' => true,
        'message' => 'Đăng ký thành công',
        'data' => ''
    );
    echo json_encode($response);
}

// ĐĂNG KÝ TÀI KHOẢN NHÀ TUYỂN DỤNG

function register_employers($email, $pass, $name, $sdt, $cong_ty, $dia_chi, $thanh_pho)
{
    if (isset($_SESSION["permission"]))
    {
        $response = array(
            'status' => false,
            'message' => 'Vui lòng đăng xuẩt và thực hiện lại',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }
    if ($name == "" || $pass == "" || $email == "" || $sdt == "" || $cong_ty == "" || $dia_chi == "" || $thanh_pho == "")
    {
        $response = array(
            'status' => false,
            'message' => 'Vui lòng nhập đầy đủ thông tin',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }

    if (!isEmail($email)) {
        $response = array(
            'status' => false,
            'message' => 'Email không đúng định dạng',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }

    if (!isPhoneNumber($sdt)) {
        $response = array(
            'status' => false,
            'message' => 'Số điện thoại không đúng định dạng',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }

    $data = array(
        'name' => $name,
        'sdt' => $sdt,
        'cong_ty' => $cong_ty,
        'dia_chi' => $dia_chi,
        'thanh_pho' => $thanh_pho
    );
    $result = db_select('members', "`email` = '$email'");
    if (count($result) > 0)
    {
        $response = array(
            'status' => false,
            'message' => 'Email đã tồn tại',
            'data' => ''
        );
        echo json_encode($response);
        return;
    }


    $result = db_insert('nha_tuyen_dung', array(
        'sdt' => $sdt,
        'name' => $name
    ));
    $nha_tuyen_dung_id = mysqli_insert_id($GLOBALS['conn']);

    $data = array(
    'chuc_vu' => '2',
    'email' => $email,
    'nha_tuyen_dung_id' => $nha_tuyen_dung_id,
    'pass' => md5($pass)
    );

    $result = db_insert('members', $data);

    $response = array(
        'status' => true,
        'message' => 'Đăng ký thành công',
        'data' => ''
    );
    echo json_encode($response);
}

// *************************** FUNCTION HANDLE ***************************

// KIỂM TRA ĐỊNH DẠNG EMAIL

function isEmail($email) {
    $email = trim($email);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        return false;
    if (explode('@', $email)[1] != "gmail.com")
        return false;
    return true;
}

// KIỂM TRA ĐỊNH DẠNG SỐ ĐIỆN THOẠI

function isPhoneNumber(string $s, int $minDigits = 9, int $maxDigits = 14): bool {
    // if (strlen($s) > 9 && )
    $result = preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
    // echo substr($s, 0, 3) == "+84" ? '1' : "0";
    if ($result && ($s[0] == 0 || substr($s, 0, 3) == "+84"))
        return true;
    return false;
}