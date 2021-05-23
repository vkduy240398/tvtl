<?= $this->extend('./users/layout/masterlayout')?>
<?= $this->section('content'); ?>
<!-- Content Row-->
<div class="row gx-4 gx-lg-5 align-items-center my-5">
    <div class="col-lg-12">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="uploads/slide/" class="d-block w-100" alt="...">
            </div>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<!-- Call to Action-->

<?php if(isset($datas) && $datas !=NULL){?>
<div class="row gx-4 gx-lg-5">
    <?php foreach($datas as $key => $val){?>
    <div class="col-md-4 mb-5">
        <div class="card h-100">
            <div class="card-body">
                <a href="home/detail/<?= $val['id'] ?>"><img src="uploads/news/<?= $val['id'].'/'.$val['image'] ?>" alt=""></a>
            </div>
            <div class="des text-center">
                <p><?= $val['title'] ?></p>
            </div>
            <div class="card-footer"><a class="btn btn-primary btn-sm" href="home/detail/<?= $val['id'] ?>">Xem chi tiết</a></div>
        </div>
    </div>
    <?php } ?>
    
</div>
<style>
    .card img{
        width: 100%;
    }
</style>
<?php } ?>
<?= $this->endSection(); ?>