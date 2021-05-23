<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="<?= base_url() ?>"><?= $logo['name'] ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if(isset($menu) && $menu !=NULL){ ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link active" href="<?= base_url() ?>">Trang chủ</a>
                        </li>
                        <?php foreach($menu as $key => $val){ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link <?= $val['child']!=NULL?'dropdown-toggle':'' ?>" href="<?= $val['child']!=NULL?'javascript:void(0)':'news/index/'.$val['id'].'' ?>" id="navbarDropdown" role="button" <?= $val['child'] !=NULL?'data-bs-toggle="dropdown"':'' ?> aria-expanded="false">
                                <?= $val['name'] ?>
                            </a>
                            <?php if(isset($val['child']) && $val['child'] !=NULL){?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php foreach($val['child'] as $key_child => $val_child){ ?>
                                    <li><a class="dropdown-item"  href="news/index/<?= $val_child['id'] ?>"><?= $val_child['name'] ?></a></li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                    </div>
                </div>
            </nav>
        <?php } ?>
        </div>
    </div>
</nav>