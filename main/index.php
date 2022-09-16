<?php
    require_once __DIR__ . '\Database.php';
    $Database = new Database;
    $qry = "SELECT * FROM `category`";
    $categorys = $Database->getAll($qry);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.min.css">
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
                            <li><a href="#about">О нас</a></li>
                            <li><a href="#news">Новости</a></li>
                            <li><a href="#sale">Акции</a></li>
                            <?php if(isset($_SESSION['user_id'])):?>
                            <li><a href="basket.php"><?=$_SESSION['user_name']?></a></li>
                            <?php else:?>
                            <li><a href="/main/regForm.php">Регистрация</a></li>
                            <li><a href="/main/loginForm.php">Вход</a></li> 
                            <?php endif;?>
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
    <section class="sale" id="sale">
        <div class="container">
            <h2>Акции и предложения</h2>
            <div class="sale_wrapper">
                <?php foreach($categorys as $category):?>
                <div class="sale_block">
                    <a href="/main/catalog.php?ID_Category=<?=$category['ID_Category']?>">
                        <p><?=$category['Name']?></p>
                        <img src="<?=$category['img']?>" alt="#">
                    </a>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <div class="container">
            <h1>Certia</h1>
            <p>Все лучшее специально для вас уже 20 лет!</p>
            <div class="about_wrapper">
                <div class="about_block">
                    <img src="/img/about/9.png" alt="#">
                    <h2>Контроль качества</h2>
                    <p>Контроль качества продуктов на каждом этапе</p>
                </div>
                <div class="about_block">
                    <img src="/img/about/10.png" alt="#">
                    <h2>Выгодные цены</h2>
                    <p>Лучшее соотношение цены и качества</p>
                </div>
                <div class="about_block">
                    <img src="/img/about/11.png" alt="#">
                    <h2>Уникальный ассортимент</h2>
                    <p>Более 5000 деликатесов и редких продуктов</p>
                </div>
                <div class="about_block">
                    <img src="/img/about/12.png" alt="#">
                    <h2>Лучший сервис</h2>
                    <p>Контроль качества продуктов на каждом этапе</p>
                </div>
                <div class="about_block">
                    <img src="/img/about/13.png" alt="#">
                    <h2>Многолетний опыт</h2>
                    <p>Доставка деликатесов и продуктов с 2005 года</p>
                </div>
            </div>
        </div>
    </section>
    <section class="about_text">
        <div class="container">
            <div class="about_text_inner">
                <h2>Онлайн магазин продуктов — комфорт и свежесть по доступным ценам</h2>
                <p>Устали стоять в очередях и носить тяжелые пакеты? Забудьте об этих неудобствах! В нашем интернет-магазине Вы можете купить онлайн все необходимые продукты с доставкой на дом. Удобный каталог и система поиска позволят Вам всё быстро найти и оформить заказ в любое удобное для Вас время. Просто выберите нужный день и интервал доставки, за 15 минут до вручения заказа наш курьер обязательно Вам позвонит. Первый заказ доставим бесплатно.
    
                    Наши цены оправданы и разумны. Хотите покупать выгоднее? Участвуйте в акциях, бонусных программах и тест-драйвах!</p>
            </div>
        </div>
    </section>
    <section class="news" id="news">
        <div class="container">
            <h2>Новсти</h2>
            <div class="news_block">
                <img src="/img/news/15.png" alt="#">
                <div class="news_block_inner">
                    <h3>Скидка на все фрукты и овощи </h3>
                    <p>В это и так не легкое время очень важно оставаться здаровым  и трудоспособным. Витамины это не отемлемая часть здарового тела.Поэтому на весь период осени все фрукты и овощи со скидкой 10%</p>
                </div>
            </div>
            <div class="news_block">
                <img src="/img/news/16.png" alt="#">
                <div class="news_block_inner">
                    <h3>Лучша доставка</р>
                    <p>В этом месяце наши курьеры доставили тысячи заказов по всей стране!Мы с гордостью можем сказать то что наши сотрудники лучшее во всей России!Но это все не просто так, за этим стоят годы опыта и большое колличетсов ошибок.</p>
                </div>
            </div>
            <div class="news_block">
                <img src="/img/news/17.png" alt="#">
                <div class="news_block_inner">
                    <h3>Цены на продукты были повышены на 2%</h3>
                    <p>На данный момент магазин переживает тяжелые времена.Эта мера вынужденая, в современных реалиях просто невозможно оставить старые цены.Но мы страемся сдерживатьцены и не завышать их!</p>
                </div>
            </div>
        </div>
    </section>
    <section class="map">
        <div class="container">
            <h2>Интерактивная карта магазинов</h2>
            <div class="map_inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2058.188357972393!2d37.61859217571267!3d55.76770381335375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54b17c68241bb%3A0x85995f90b0bd2bda!2sR%C3%A9bellion%20Clubhouse%20Moscow!5e0!3m2!1sru!2sru!4v1662829737505!5m2!1sru!2sru" width="1000" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
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
                    <p>@Certia  все права защищены</p>
                </div>
            </div>
        </section>
    </footer>
    
</body>
</html>