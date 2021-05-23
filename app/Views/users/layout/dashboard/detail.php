<?= $this->extend('./users/layout/masterlayout')?>
<?= $this->section('content'); ?>
<div class="container pt-5 pb-5">
<?php if(isset($datas) && $datas !=NULL){ ?>
    <div class="row">
        <div class="col-9">
            <h3 class="text text-info"><?= $datas['title'] ?></h3>
            <h4>Ngày đăng: <?= date("d/m/Y",strtotime($datas['created_at'])) ?></h4>
            <div>
                <?= $datas['content'] ?>
            </div>
        </div>
        <?php if(isset($news) && $news!=NULL){?>
            <div class="col-3">
                <h3>Bài viết mới nhất</h3>
                <div class="row">
                    <?php foreach($news as $key => $val){?>
                        <div class="col-12">
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
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
<?= $this->endSection(); ?>