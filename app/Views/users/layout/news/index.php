<?= $this->extend('./users/layout/masterlayout')?>
<?= $this->section('content'); ?>
<div class="row pt-5 pb-5">
    <?php if(isset($datas) && $datas !=NULL){?>
        <?php foreach($datas as $key => $val){?>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="uploads/news/<?= $val['id'].'/'.$val['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $val['title'] ?></h5>
                        <p class="card-text">Ngày đăng: <?= date('d/m/Y',strtotime($val['created_at'])) ?></p>
                        <a href="home/detail/<?= $val['id'] ?>" class="btn btn-primary">Chi tiết bài viết</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>
<?= $this->endSection(); ?>