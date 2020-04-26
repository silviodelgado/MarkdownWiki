<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo MD_NAME ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
    header > div {
        padding: 10px 0;
        margin-bottom: 10px;
        border-bottom: 1px solid #cecece;
    }
    footer > div {
        padding: 10px 0;
        margin-top: 10px;
        border-top: 1px solid #cecece;
    }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <img src="/assets/img/logo-wiki.png" alt="Markdown Wiki">
        </div>
    </header>
    <main>
        <div class="container">
            <?php
            echo $htmlContents;
            ?>
        </div>
        </main>
    <footer>
        <div class="container">
            <div class="text-muted">
                &copy;2020 <a href="https://www.interart.com" target="_blank">Interart Tecnologia</a> - All righs reserved
            </div>
        </div>
    </footer>
</body>
</html>