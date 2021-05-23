<?= $this->extend('./admin/layout/masterlayout') ?>
<?= $this->section('content');?>
<form action="admins/logo/index" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Tên logo</label>
                <input type="text" class="form-control" name="name" value="<?= $datas['name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" class="form-control" name="title" value="<?= $datas['title'] ?>">
            </div>
        </div>
        <div class="col-4">
            <div class="avatarReader info text-center">
                <img src="<?= $datas['image']?'uploads/logo/'.$datas['image'].'':'' ?>" id="readerImage"  height="150" width="150" alt="">
            </div>
            <div class="image">
                <div class="form-group mt-3">
                    <input type="file" class="custom-file-input" name="avatar" id="avatar">
                    <label class="" for="avatar">Chọn ảnh Favicon</label>
                    <p class="text-danger" id="mess_us"></p>
                    <div class="invalid-feedback">Favicon</div>
                </div>
            </div>
        </div>
        <div class="col-12 text-left">
            <button type="submit" class="btn btn-info">Cập nhật thông tin</button>
        </div>
    </div>
</form>
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
                mess_us.innerHTML = "Chưa chọn ảnh Favicon";
                imageReader.src = "image/avatar.png";
            }
        
        });
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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    <?php if (session()->getFlashdata('success')) {?>
        toastr.success('<?= session()->getFlashdata('success') ?>', 'Chúc mừng') 
    <?php  } ?>
</script>
<?= $this->endSection() ?>