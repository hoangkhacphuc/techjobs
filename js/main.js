const inputs = document.querySelectorAll(".input");

function addcl() {
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

function remcl() {
  let parent = this.parentNode.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", addcl);
  input.addEventListener("blur", remcl);
});

$("#click_advance").click(function () {
  $("i", this).toggleClass("fa fa-filter fa fa-times");
});
$("#clickc_advance").click(function () {
  $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$("#clickc2_advance").click(function () {
  $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$("#clickc3_advance").click(function () {
  $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$("#clickc4_advance").click(function () {
  $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$("#clickc1_advance1").click(function () {
  $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$("#clickc1_advance2").click(function () {
  $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$("#clickc1_advance3").click(function () {
  $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$("#clickc1_advance4").click(function () {
  $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});

let dropArea = document.getElementById("drop-area");
let filesDone = 0;
let filesToDo = 0;
let progressBar = document.getElementById("progress-bar");

["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
  $(dropArea).on(eventName,function (e) { 
    preventDefaults(e);
  });
  
  // dropArea.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
  e.preventDefault();
  e.stopPropagation();
}

["dragenter", "dragover"].forEach((eventName) => {
  $(dropArea).on(eventName,function (e) { 
    highlight(e);
  });
  // dropArea.addEventListener(eventName, highlight, false);
});
["dragleave", "drop"].forEach((eventName) => {
  $(dropArea).on(eventName,function (e) { 
    unhighlight(e);
  });
  // dropArea.addEventListener(eventName, unhighlight, false);
});

function highlight(e) {
  dropArea.classList.add("highlight");
}

function unhighlight(e) {
  dropArea.classList.remove("highlight");
}
// dropArea.addEventListener("drop", handleDrop, false);

$(dropArea).click(function (e) { 
  handleDrop(e);
});

function handleDrop(e) {
  let dt = e.dataTransfer;
  let files = dt.files;

  handleFiles(files);
}
// function handleFiles(files) {
//   [...files].forEach(uploadFile);
// }
function handleFiles(files) {
  files = [...files];
  initializeProgress(files.length); // <- Add this line
  files.forEach(uploadFile);
  files.forEach(previewFile);
}

function uploadFile(file) {
  let url = "YOUR URL HERE";
  let formData = new FormData();

  formData.append("file", file);

  fetch(url, {
    method: "POST",
    body: formData,
  })
    .then(progressDone) // <- Add `progressDone` call here
    .catch(() => {
      /* Error. Inform the user */
    });
}

function previewFile(file) {
  let reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onloadend = function () {
    let img = document.createElement("img");
    img.src = reader.result;
    document.getElementById("gallery").appendChild(img);
  };
}
function initializeProgress(numfiles) {
  progressBar.value = 0;
  filesDone = 0;
  filesToDo = numfiles;
}

function progressDone() {
  filesDone++;
  progressBar.value = (filesDone / filesToDo) * 100;
}

/////////////////////////////////////////

$(document).ready(function () {
  toastr.options.closeButton = true;

  // ĐĂNG NHẬP TÀI KHOẢN ỨNG CỬ VIÊN
  
  $(document).on("click", "#btn-login-employees", function () {
    let data = {
      user: $("#inp-user").val(),
      pass: $("#inp-pass").val(),
    };
    $.ajax({
        type: "POST",
        url: "./API.php?action=login_employees",
        data: data,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        processData: true,
        success: function (response) {
            let json = JSON.parse(response);
            if (json["status"])
            {
              toastr.success(json["message"], 'Thông báo');
            }
            else toastr.error(json["message"], 'Thông báo');
        },
        error: function () {
          toastr.error('Không thể gửi thông tin tới máy chủ', 'Thông báo');
        }
    });
  });

  // ĐĂNG KÝ TÀI KHOẢN ỨNG CỬ VIÊN

  $(document).on("click", "#btn-register-employees", function () {
    let data = {
      name: $("#inp-fullname").val(),
      email: $("#inp-email").val(),
      sdt: $("#inp-phone-number").val(),
      pass: $("#inp-pass").val(),
      repass: $("#inp-repass").val(),
    };
    $.ajax({
        type: "POST",
        url: "./API.php?action=register_employees",
        data: data,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        processData: true,
        success: function (response) {
          let json = JSON.parse(response);
          if (json["status"])
          {
            toastr.success(json["message"], 'Thông báo');
          }
          else toastr.error(json["message"], 'Thông báo');
        },
        error: function () {
          toastr.error('Không thể gửi thông tin tới máy chủ', 'Thông báo');
        }
    });
  });

  // ĐĂNG KÝ TÀI KHOẢN NHÀ TUYỂN DỤNG

  $(document).on("click", "#btn-register-employers", function () {
    let data = {
      name: $("#inp-name").val(),
      email: $("#inp-email").val(),
      sdt: $("#inp-phone-number").val(),
      pass: $("#inp-pass").val(),
      repass: $("#inp-repass").val(),
      cong_ty: $("#inp-company").val(),
      dia_chi: $("#inp-address").val(),
      thanh_pho: $("#inp-city").val(),
    };
    $.ajax({
        type: "POST",
        url: "./API.php?action=register_employers",
        data: data,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        processData: true,
        success: function (response) {
            let json = JSON.parse(response);
            if (json["status"])
            {
              toastr.success(json["message"], 'Thông báo');
            }
            else toastr.error(json["message"], 'Thông báo');
        },
        error: function () {
          toastr.error('Không thể gửi thông tin tới máy chủ', 'Thông báo');
        }
    });
  });

  // ĐĂNG NHẬP TÀI KHOẢN NHÀ TUYỂN DỤNG
  
  $(document).on("click", "#btn-login-employers", function () {
    let data = {
      user: $("#inp-email").val(),
      pass: $("#inp-pass").val(),
    };
    $.ajax({
        type: "POST",
        url: "./API.php?action=login_employers",
        data: data,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        processData: true,
        success: function (response) {
            let json = JSON.parse(response);
            if (json["status"])
            {
              toastr.success(json["message"], 'Thông báo');
            }
            else toastr.error(json["message"], 'Thông báo');
        },
        error: function () {
          toastr.error('Không thể gửi thông tin tới máy chủ', 'Thông báo');
        }
    });
  });


});
