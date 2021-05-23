<?= $this->extend('./admin/layout/masterlayout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
    <form action="" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input type="text" class="form-control" name="name"value="<?= $datas['name'] ?>" >
                </div>
            </div>
            <div class="col-4">
                <div class="avatarReader info text-center">
                    <img src="<?= $datas['image']?'uploads/slide/'.$datas['id'].'/'.$datas['image'].'':'image/avatar.png' ?>" id="readerImage"  height="150" width="150" alt="">
                </div>
                <div class="image">
                    <div class="form-group mt-3">
                        <input type="file" class="custom-file-input" name="avatar" id="avatar">
                        <label class="" for="avatar">Chọn ảnh Slide</label>
                        <p class="text-danger" id="mess_us"></p>
                        <div class="invalid-feedback">Slide</div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-left">
                <button type="submit" class="btn btn-info">Cập nhật thông tin</button>
            </div>
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
        //    const lines = reader.result.split('\n').map(function(line){
        //         return line.split(',');
        //    })
           readerImage.src = reader.result;
       }
       reader.readAsDataURL(file);
    },false)
   
</script>
<?= $this->endSection() ?>