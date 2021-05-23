<?= $this->extend('./admin/layout/masterlayout') ?>
<?= $this->section('content') ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row m-3 mb-0">
        <div class="col-1"><a href="<?= ADMIN.$control.'/add' ?>" class="btn btn-primary">Thêm mới</a></div>
        <div class="col-1"><a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-info">Xóa tất cả</a></div>
    </div>
    <div class="col-12 p-3">
        <?php if(session()->getFlashdata('success')){?>
            <p class="alert alert-success"><?= session()->getFlashdata('success') ?></p>
        <?php } ?>
        <?php if(session()->getFlashdata('error')){?>
            <p class="alert alert-danger"><?= session()->getFlashdata('error') ?></p>
        <?php } ?>
    </div>
    
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><input type="checkbox" onClick="toggle(this)"></th>
                        <th>Tên nhóm quyền</th>
                        <th>Hiển thị</th>
                        <th>Sắp xếp</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($datas) && $datas !=null) {?>
                <?php foreach($datas as $key => $val){?>
                    <tr>
                        <td><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
                        <td><?= $val['name'] ?></td>
                        <td><input type="checkbox" onclick="changeglobal(<?=$val['id']?>,'publish')" <?= $val['publish'] == 1?'checked':'' ?> name="checkout" id="publish<?= $val['id'] ?>" data-control ="<?= $control ?>"></td>
                        <td class="text-center">
                            <input type="text" onkeyup="changeSort(this,<?= $val['id'] ?>)" value="<?= $val['sort'] ?>" class="text-center form-control publish"  id="sort<?= $val['id'] ?>" class="" data-control ="<?= $control ?>">
                        </td>
                        <td>
                            <a href="<?= ADMIN.$control.'/delete'.'/'.$val['id']; ?>" onclick="return confirm('bạn có muốn xóa')" class="btn btn-danger">Delete</a>
                            <a href="<?= ADMIN.$control.'/edit'.'/'.$val['id']; ?>" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                    <?php if(isset($val['child']) && $val['child'] != NULL){?>
                        <?php foreach($val['child'] as $key_child => $val_child){?>
                            <tr>
                                <td><input type="checkbox" name="foo" class="checkbox" value="<?= $val_child['id'] ?>"></td>
                                <td> ------------- <?= $val_child['name'] ?></td>
                                <td><input type="checkbox" onclick="changeglobal(<?=$val_child['id']?>,'publish')" <?= $val_child['publish'] == 1?'checked':'' ?> name="checkout" id="publish<?= $val_child['id'] ?>" data-control ="<?= $control ?>"></td>
                                <td class="text-center">
                                    <input type="text" onkeyup="changeSort(this,<?= $val['id'] ?>)" value="<?= $val['sort'] ?>" class="text-center form-control publish"  id="sort<?= $val['id'] ?>" class="" data-control ="<?= $control ?>">
                                </td>
                                <td>
                                <a href="<?= ADMIN.$control.'/delete'.'/'.$val_child['id']; ?>" onclick="return confirm('bạn có muốn xóa')" class="btn btn-danger">Delete</a>
                                <a href="<?= ADMIN.$control.'/edit'.'/'.$val_child['id']; ?>" class="btn btn-success">Edit</a></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<script>
    $(document).ready( function () {
         $('#dataTable').DataTable();
    });
</script>
<?= $this->endSection() ?>