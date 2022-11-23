<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>MVC - PHP</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/css_reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/main_style.css">
    <?php if ($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">'; ?>
</head>

<body>
    <header>
        <div id="user"><em><?= $_SESSION['userlastname'] . " " . $_SESSION['userfirstname'] ?></em></div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                Web-programozás II - MVC alkalmazás
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <!-- <ul class="navbar-nav mr-auto"> -->
                <?php echo Menu::getMenu($viewData['selectedItems']); ?>

            </div>
        </nav>
    </header>
    <!-- <?php echo Menu::getMenu($viewData['selectedItems']); ?> -->
    <section>
        <?php if ($viewData['render']) include($viewData['render']); ?>
    </section>
    <footer>&copy; NJE - GAMF - Informatika Tanszék <?= date("Y") ?></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>