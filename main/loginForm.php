<?php
require_once __DIR__ . '\Database.php';
if (!empty($_SESSION['user_name'])) {
    header('Location: index.php');
}
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $Database = new Database;
    $qry = "SELECT * FROM `customer` WHERE Email = :login AND BINARY Password = :password";
    $parm = array(
        'login' => $_POST['email'],
        'password' => md5($_POST['password']),
    );
    $user = $Database->getRow($qry, $parm);
    if (!empty($user)) {
        $_SESSION['user_name'] = $user['nameCustomer'];
        $_SESSION['user_id'] = $user['ID_Customer'];
        header('Location: ' .  'index.php');
    } else {
        $error = 'Не верный логин или пароль!';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/loginForm.min.css">
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
    <main>
        <section class="logForm">
            <div class="container">
                <h1>Вход</h1>
                <?php if (isset($error)) : ?>
                    <div class="error">
                        <h2><?= $error ?></h2>
                    </div>
                <?php endif; ?>
                <form action="#" method="post">
                    <input type="email" name="email" class="input" placeholder="Почта">
                    <input type="password" name="password" class="input" placeholder="Пароль">
                    <button class="btn">Вход</button>
                </form>
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