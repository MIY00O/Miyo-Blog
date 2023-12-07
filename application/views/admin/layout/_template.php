<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?></title>
    <?php require_once('_css.php') ?>
</head>

<body>
    <div class="container-scroller">
        <?php require_once('_navbar.php') ?>
        <div class="container-fluid page-body-wrapper">
            <?php require_once('_sidebar.php') ?>

            <div class="main-panel">

                <div class="content-wrapper">
                    <div id="hilang" class="">
                        <?php echo $this->session->flashdata('alert', true) ?>
                    </div>
                    <?php echo $contents; ?>
                    <?php require_once('_footer.php') ?>
                </div>
            </div>
        </div>
</body>
<?php require_once('_js.php') ?>

</html>