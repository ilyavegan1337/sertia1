<?php
require_once __DIR__ . '\Database.php';
if (!empty($_SESSION['user_name'])) {
    header('Location: index.php');
}

$errors = array();
if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
    if (!ctype_digit($_POST['phone'])) {
        $errors[] = 'Телефон не может содержать буквы';
    } elseif (strlen($_POST['password']) < 8) {
        $errors[] = 'Пароль должен быть больше 7 знаков';
    } else {
        $Database = new Database;
        $qry = "INSERT INTO `customer` (`nameCustomer`, `Email`, `Phone`, `Password`) VALUES (:name, :email, :phone, :password)";
        $parm = array(
            ':name' => trim($_POST['name']),
            ':email' => trim($_POST['email']),
            ':phone' => trim($_POST['phone']),
            ':password' => md5(trim($_POST['password'])),

        );
        $Database->insertData($qry, $parm);
        header('Location: ' .  'loginForm.php');
    }
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/regForm.min.css">
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
        <section class="regForm">
            <div class="container">
                <h1>Регистрация</h1>
                <?php if (!empty($errors)) : foreach ($errors as $item) : ?>
                        <div class="error">
                            <h2><?= $item ?></h2>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <form action="#" method="POST">
                    <input type="text" name="name" class="input" placeholder="Имя" required>
                    <input type="email" name="email" class="input" placeholder="Почта" required>
                    <input type="tel" name="phone" class="input" placeholder="Телефон" required>
                    <input type="password" name="password" class="input" placeholder="Пароль" required>
                    <button class="btn">Регистрация</button>
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