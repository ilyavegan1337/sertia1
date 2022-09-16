<?php
require_once __DIR__ . '\Database.php';
$Database = new Database;
$qry = "SELECT * FROM `products` WHERE ID_Category = :id";
$parm = array(
    "id" => $_GET["ID_Category"],
);
$products = $Database->getAll($qry, $parm);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/catalog.min.css">
    <link rel="stylesheet" href="/css/mainStyles.min.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="shortcut icon" href="/img/minLogo.png" type="image/x-icon">
    <title>Certia</title>
</head>

<body>
    <header>
        <section class="header">
            <div class="container">
                <div class="header_navigation">
                    <nav>
                        <a href="/main/index.php">
                            <img src="/img/logo.png" alt="#">
                        </a>
                        <ul>
                            <li><a href="index.php#about">О нас</a></li>
                            <li><a href="index.php#news">Новости</a></li>
                            <li><a href="index.php#sale">Акции</a></li>
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <li><a href="basket.php"><?= $_SESSION['user_name'] ?></a></li>
                            <?php else : ?>
                                <li><a href="/main/regForm.php">Регистрация</a></li>
                                <li><a href="/main/loginForm.php">Вход</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </header>
    <section class="search">
        <div class="container">
            <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="Поиск" class="input">
            </form>
        </div>
    </section>
    <main>
        <section class="product">
            <div class="container">
                <h1>Товары</h1>
                <div class="product_wrapper">
                    <?php foreach ($products as $product) : ?>
                        <div class="product_container">
                            <div class="product_img">
                                <img src="<?= $product['image'] ?>" alt="#">
                            </div>
                            <h2><?= $product['Name'] ?></h2>
                            <p><?= $product['Description'] ?></p>
                            <div class="product_down">
                                <div class="product_price">
                                    <h2><?= $product['Price'] ?></h2>
                                    <img src="/img/product/31.svg" alt="#">
                                </div>
                                <?php if(isset($_SESSION['user_id'])):?>
                                <a href="/main/getProduct.php?ID_Products=<?= $product['ID_Products'] ?>">
                                    <img src="/img/product/26.svg" alt="#">
                                </a>
                                <?php else:?>
                                <a href="/main/loginForm.php">
                                    <img src="/img/product/26.svg" alt="#">
                                </a>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <section class="footer">
            <div class="container">
                <div class="footer_wrapper">
                    <div class="footer_container footer_container1">
                        <h2>Контакты</h2>
                        <p>140053, Котельники г, Московская обл.,
                            Силикат мкр, строение № 4, Пом/Ком 2/6
                            ООО «Д-Снаб»</p>
                        <p>+7 495 640 9 640</p>
                        <?php if(isset($_SESSION['user_name'])):?>
                            <button onclick='location.href="/main/logout.php"'>Выйти из аккаунта</button>
                        <?php endif?>
                    </div>
                    <div class="footer_container footer_container2">
                        <h2>Для юридических лиц</h2>
                        <p>ОГРН: 9233431236712</p>
                        <p>ИНН: 1234312367</p>
                        <form action="feedback.php" method="POST">
                            <label for="input">Обратная связь</label>
                            <input type="email" name="email" class="input" placeholder="Почта" required>
                            <button>Отправить</button>
                        </form>
                    </div>
                    <div class="footer_container footer_container3">
                        <a href="#"><img src="/img/social/18.png" alt="#"></a>
                        <a href="#"><img src="/img/social/19.png" alt="#"></a>
                        <a href="#"><img src="/img/social/20.png" alt="#"></a>
                        <a href="#"><img src="/img/social/21.png" alt="#"></a>
                    </div>
                </div>
                <div class="footer_bottom_text">
                    <p>@Certia все права защищены</p>
                </div>
            </div>
        </section>
    </footer>

</body>

</html>