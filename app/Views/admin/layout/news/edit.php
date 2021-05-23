<?= $this->extend('./admin/layout/masterlayout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <form action="" method="post" enctype='multipart/form-data'>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <select name="data_post[id_branch]" id="" class="form-control">
                            <option  value="0">Chọn danh mục</option>
                            <?php if(isset($branch) && $branch !=NULL){?>
                                <?php foreach($branch as $key => $val) {?>
                                    <option <?= $datas['id_branch'] == $val['id']?'selected':'' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                    <?php if ($val['child'] && $val['child'] !=NULL) {?>
                                        <?php foreach($val['child'] as $key_child => $val_child){?>
                                            <option value="<?= $val_child['id'] ?>" <?= $datas['id_branch'] == $val_child['id']?'selected':'' ?>> ----- <?= $val_child['name'] ?></option>
                                        <?php } ?>
                                  <?php  } ?>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $datas['title'] ?>" name="data_post[title]" placeholder="Nhập tiêu đề">
                    </div>
                    <div class="form-group">
                        <label for="publish">Hiển thị</label>
                        <input type="checkbox" id="publish" class="" value="1" <?= $datas['publish'] == 1?'checked':'' ?> name="data_post[publish]" placeholder="Tên nhóm quyền">
                    </div>
                </div>
                <div class="col-6 news-image">
                    <div class="avatarReader news-image text-center">
                        <img src="<?= $datas?$path_dir.$datas['id'].'/'.$datas['image']:'image/images.png' ?>" id="readerImage"  height="150" width="150" alt="">
                    </div>
                    <div class="form-group ">
                        <input type="file" class="custom-file-input" name="image" id="avatar">
                        <label class="" for="avatar">Chọn ảnh đại diện</label>
                        <p class="text-danger" id="mess_us"></p>
                        <div class="invalid-feedback">Chưa chọn ảnh đại diện</div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <label for="">Nhập nội dung</label>
                    <div class="form-group mt-5">
                       <textarea class="ckeditor" name="data_post[content]" id="editor1" cols="30" rows="10"><?= $datas['content'] ?></textarea>
                    </div>
                </div> 
            </div>
             <div class="form-group col-3">
                 <button type="submit" name="add" class="btn btn-success pr-4 pl-4">Lưu</button>
                 <button type="reset" name="add" class="btn btn-primary pr-4 pl-4">Làm lại</button>
                 <a class="btn btn-info" href="<?= ADMIN.$control ?>">Trở lại</a>
            </div>
    </form>
    </div>
</div>
<script src ="/testing/js/ckeditor/ckeditor.js"></script>

<script src ="/testing/js/ckfinder/ckfinder.js"></script>
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
                imageReader.src = "image/images.png";
                mess_us.innerHTML = "Chưa chọn ảnh đại diện";
            }
        
        });
    </script>
<style>
    .news-image{
        position: relative;
        text-align:center;
    }

    .news-image label{
        color:#ffffff;
        background:#4e73df;
        padding:10px;
    }
</style>
<?= $this->endSection() ?>