<?= $this->extend('./admin/layout/masterlayout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <form action="" method="post">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $datas?$datas['name']:'' ?>" name="data_post[name]" placeholder="Tên nhóm quyền">
                    </div>
                    <div class="form-group">
                        <label for="publish">Hiển thị</label>
                        <input type="checkbox" id="publish" class="" value="1" <?= $datas['publish']==1?'checked':''?> name="data_post[publish]" placeholder="Tên nhóm quyền">
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