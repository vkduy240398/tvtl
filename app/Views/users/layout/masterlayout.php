<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <base href="<?= base_url() ?>">
        <title><?= $logo['title'] ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="uploads/logo/<?= $logo['image'] ?>" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="testing/layout/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
       <?= $this->include('users/layout/sidebar/menu') ?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            
            <?= $this->renderSection('content') ?>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="testing/layout/js/scripts.js"></script>
        <script src="https://kit.fontawesome.com/03bca92048.js" crossorigin="anonymous"></script>
    </body>
</html>
