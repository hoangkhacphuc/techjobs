<?php

session_start();
if (!isset($_SESSION["permission"]) && !isset($_SESSION["user"]))
{
    $response = array(
        'status' => false,
        'message' => 'Vui lòng đăng nhập và thực hiện lại',
        'data' => ''
    );
    echo json_encode($response);
    header('Location: ./');
    exit;
    return;
}
session_unset();
session_destroy();
$response = array(
    'status' => true,
    'message' => 'Đã đăng xuất tài khoản',
    'data' => ''
);
echo json_encode($response);
header('Location: ./');
exit;