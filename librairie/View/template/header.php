<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title>Fraxel -- <?=$page?></title>
</head>
<body>
    <header>
        <nav>
            <div>
                <a href="/"><img src="/picture/logo.png" alt="Logo"></a>
                <ul>
                    <li><a href="/" class="<?= $home ?>">Accueil</a></li>
                    <li><a href="/product" class="<?= $products ?>">Nos produits</a></li>
                    <li><a href="/contact" class="<?= $contact ?>">Contact</a></li>
                </ul>
            </div>
            
            <ul>
                <?php if (isset($_SESSION['id'])): ?>
                    <li><a href="/myaccount" class="<?= $account ?>">Mon compte</a></li>
                <?php else: ?>
                    <li><a href="/login" class="<?= $login ?>">Connexion/Inscription</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </header>
    <section>
    