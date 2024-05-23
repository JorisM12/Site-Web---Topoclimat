<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/css/register.css">
    <title>Inscription</title>
</head>
<body>
    <?php if(!empty($_SESSION['error'])):?>
        <div id="bloc-notif">
                <p class="shadow-and-radius error"><img src="/style/images/pictos/buttons/warming.svg" alt=""><?=$_SESSION['error']?><img src="/style/images/pictos/buttons/xmark.svg" alt=""></p>
        </div>
    <?php endif; unset($_SESSION['error']) ;?>
    <?php if(!empty($_SESSION['message'])):?>
            <div id="bloc-notif">
                <p class="shadow-and-radius ok"><img src="/style/images/pictos/buttons/check-solid.svg" alt=""><?=$_SESSION['message']?><img src="/style/images/pictos/buttons/xmark.svg" alt=""></p>
            </div>
    <?php endif; unset($_SESSION['message']); ?>
    <?= $content ?>
</body>
<script src="/script/nav/notif.js"></script>