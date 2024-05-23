<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Prévions météo à 6 jours sur la région Grand Est! Actualités et photographies d'orages"> 
    <link rel="stylesheet" href="/style/css/<?=$nameCSS?>.css">
    <link rel="icon" type="image/png" href="/style/images/favicon.png">
    <title><?=$titlePage?></title>
</head>
<body>
    <header>
        <img src="/style/images/logo_topoclimat.png" alt="logo TopoClimat" title="TopoClimat, météo du Grand Est">
        <div>
            <h1><?=$title?></h1>
        </div>
    </header>
    <main>
        <?= $content ?>
    </main>
</body>
</html>