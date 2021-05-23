<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng ký tại khoản</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/testing/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/testing/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-warning text-uppercase 900 mb-4">Đăng ký tài khoản</h1>
                                    </div>
                                    <div class="text-center">
                                        <p class="text text-success"><?= session()->getFlashdata('success')?session()->getFlashdata('success'):''; ?></p>
                                    </div>
                                    <form class="needs-validation" onsubmit="return check_form()" action="" method="post" novalidate enctype="multipart/form-data">
                                       <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="" class="text-primary">Bạn là</label>
                                                    <select name="data_post[id_role]" id="" required class="form-control">
                                                        <option value="">Chọn chức danh</option>
                                                        <?php if(isset($role) && $role !=NULL){?>
                                                            <?php foreach($role as $key => $val){?>
                                                                <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                                            <?php }?>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                       Vui lòng chọn chức danh
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="exampleInputEmail" name="data_post[fullname]" required aria-describedby="emailHelp"
                                                        placeholder="Họ và tên">
                                                        <div class="invalid-feedback">
                                                            Vui lòng nhập đầy đủ
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="tel" class="form-control form-control-user"
                                                        id="exampleInputEmail" name="data_post[phone]" pattern=".{10}"  aria-describedby="emailHelp"
                                                        placeholder="Sô điện thoại">
                                                    <div class="invalid-feedback">
                                                       Số điện thoại không đúng định dạng
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="exampleInputEmail" name="data_post[address]"required aria-describedby="emailHelp"
                                                        placeholder="Địa chỉ">
                                                    <div class="invalid-feedback">
                                                        Vui lòng nhập đầy đủ
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-user"
                                                        id="exampleInputEmail" name="data_post[email]"  aria-describedby="emailHelp"
                                                        placeholder="Địa chỉ Email">
                                                    <div class="invalid-feedback">
                                                        Email không đúng định dạng
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user"
                                                         id="username" name="data_post[username]"required placeholder="Nhập tài khoản">
                                                    <div class="invalid-feedback">
                                                        Vui lòng nhập đầy đủ
                                                    </div>
                                                    <p class="text" id="mess_user"></p>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="exampleInputPassword" name="data_post[password]" required placeholder="Mật khẩu">
                                                    <div class="invalid-feedback">
                                                        Vui lòng nhập đầy đủ
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="text-primary">Chức vụ hiện tại</label>
                                                    <input type="text" name="data_post[posi]" class="form-control" placeholder="Có thể nhập hoặc không nếu không có" >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group text-center">
                                                    <label for="">Chọn ảnh đại diện</label>
                                                </div>
                                                <div class="avatarReader text-center">
                                                    <img src="image/avatar.png" id="readerImage"  height="150" width="150" alt="">
                                                    <p class="text-danger" id="mess_us"></p>
                                                </div>
                                                <div class="image">
                                                    <div class="form-group">
                                                        <input type="file" class="custom-file-input" name="avatar" id="avatar" required>
                                                        <label class="" for="avatar">Chọn ảnh đại diện</label>
                                                        <div class="invalid-feedback">Chưa chọn ảnh đại diện</div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Giới tính</label>
                                                    <input type="radio" name="data_post[gender]" checked value="Nam"> Nam
                                                    <input type="radio" name="data_post[gender]"  value="Nữ"> Nữ
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="text-primary">Tên cơ quan làm việc nếu có</label>
                                                    <input type="text" name="data_post[ori]" class="form-control" placeholder="Có thể nhập hoặc không nếu không có" >
                                                </div>
                                            </div>
                                       </div>
                                            <div class="col-12 text-center">
                                                <button class="btn btn-primary" type="submit">
                                                    Đăng ký
                                                </button>
                                                <button class="btn btn-info" type="reset">
                                                    Nhập lại
                                                </button>
                                            </div>
                                    </form>
                                    <hr>
                                   <div class="col-12 text-center"> <a href="/login.html" class="text text-primary">Đã có tài khoản</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/testing/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/testing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/testing/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/testing/js/sb-admin-2.min.js"></script>
<script>
    var check;
    $(document).ready(function(){  
        $("#username").keyup(function(){
            var username = $("#username").val();
            $.ajax({
                url:"login/check_user",
                method:"post",
                data:{username:username},
                success:function(data){
                    if(data == "1"){
                        $("#mess_user").html("Tài khoản đã tồn tại");
                        $("#mess_user").css("color","red");
                        check = false;
                    }
                    else{
                        $("#mess_user").html("Tài khoản hợp lệ");
                        $("#mess_user").css("color","green");
                        check = true;
                    }
                  
                }

            });
        });
    });
    function check_form(){
        if (check == false) {
            return false;
        }
        return true;
    }
</script>
<script>
    var avatar = document.querySelector("#avatar");
    var mess_us = document.querySelector("#mess_us");
    var imageReader = document.querySelector("#readerImage");
    avatar.addEventListener("change",(e)=>{
        var file = avatar.files[0];
        if (file) {
            mess_us.innerHTML = "";
            var reader = new FileReader();
                reader.onload = function(){
                imageReader.src = reader.result;
            }
            reader.readAsDataURL(file)
        }
        else{
            mess_us.innerHTML = "Chưa chọn ảnh đại diện";
            imageReader.src = "image/avatar.png";
        }
    
    });
</script>
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<style>
    .image {
        text-align:center;
    }
    .image input[type="file"]{
        display: none;
    }
    .image label{
        color:#ffffff;
        padding:10px 15px;
        background:rgba(100,230,60,1);
        border-radius:5px;
    }
</style>

</body>

</html>