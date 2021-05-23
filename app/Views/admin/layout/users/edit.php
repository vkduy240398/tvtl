<?= $this->extend('./admin/layout/masterlayout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
    <form action="" method="post" enctype='multipart/form-data'>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <input type="text" class="form-control" value="<?=$datas?$datas['fullname']:'' ?>" name="fullname" placeholder="Nhập họ tên">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?=$datas?$datas['username']:'' ?>" name="username" placeholder="Nhập tài khoản">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?=$datas?$datas['email']:'' ?>" name="email" placeholder="Nhập địa chỉ Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?=$datas?$datas['address']:'' ?>" name="address" placeholder="Nhập địa chỉ">
                </div>
            </div>
            <div class="col-3">
                <div class="avatarReader">
                    <img src="<?= base_url('uploads').'/'.$datas['id'].'/'.$datas['avatar']?>" id="readerImage" width="300" alt="">
                </div>
                <div class="form-group">
                    <div class="avatar">
                        <input type="file" class="form-control" id="avatar" name="image" placeholder="Nhập họ tên">
                        <label for="avatar">Chọn ảnh đại diện</label>
                    </div>
                </div>
            </div>
        </div>
             <div class="form-group col-3">
                 <button type="submit" name="add" class="btn btn-success">Lưu</button>
                 <button type="reset" name="add" class="btn btn-primary pr-4 pl-4">Làm lại</button>
                 <a class="btn btn-info" href="<?= ADMIN.$control ?>">Trở lại</a>
            </div>
    </form>
    </div>
</div>
<script>
    var files = document.querySelector('#avatar');
    var readerImage = document.querySelector('#readerImage');
    files.addEventListener("change",(e)=>{
        var file = files.files[0];
       const reader = new FileReader();
       reader.onload = function(){
           readerImage.src = reader.result;
       }
       reader.readAsDataURL(file);
    },false)
   
</script>
<?= $this->endSection() ?>