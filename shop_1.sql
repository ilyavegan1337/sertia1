-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 16 2022 г., 14:36
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buy`
--

CREATE TABLE `buy` (
  `ID_Buy` int(11) NOT NULL,
  `ID_Products` int(11) NOT NULL,
  `ID_Customer` int(11) NOT NULL,
  `DataBuy` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `buy`
--

INSERT INTO `buy` (`ID_Buy`, `ID_Products`, `ID_Customer`, `DataBuy`) VALUES
(9, 6, 2, '2022-09-16 09:39:16');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `ID_Category` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`ID_Category`, `Name`, `img`) VALUES
(1, 'Готовая еда', '/img/sale/2.png'),
(2, 'Фрукты и овощи', '/img/sale/1.png'),
(3, 'Морской рацион', '/img/sale/3.png'),
(4, 'Подарки', '/img/sale/4.png'),
(5, 'Прямо с фермы', '/img/sale/5.png'),
(6, 'Возьми с собой', '/img/sale/6.png'),
(7, 'Здоровое питание', '/img/sale/7.png'),
(8, 'Все для шашлыка', '/img/sale/8.png');

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `ID_Customer` int(11) NOT NULL,
  `nameCustomer` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`ID_Customer`, `nameCustomer`, `Email`, `Phone`, `Password`) VALUES
(1, 'asdasd', 'asdas@asdad', '11111111', 'bbb8aae57c104cda40c93843ad5e6db8'),
(2, 'asdasd', 'asdasd@sadd', '11111111', '0f19aca3f6452521454ef3c02cab55ec'),
(3, 'asdasdasd', 'a@adasd', '87878', '0f19aca3f6452521454ef3c02cab55ec');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `ID_FeedBack` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`ID_FeedBack`, `Email`) VALUES
(1, 'asda@ada'),
(2, 'asdasdfa@faf');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID_Products` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ID_Category` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID_Products`, `Price`, `Description`, `Name`, `ID_Category`, `image`) VALUES
(1, 66, 'за 550 г', 'Виноград Киш-миш черный Узбекистан ~500г', 2, '/img/product/22.png'),
(2, 490, 'за 550 г', 'Малина красная свежая Россия ~550г', 2, '/img/product/23.png'),
(3, 96, 'цена за 1 уп', 'Кукуруза свежая в початках 2шт', 2, '/img/product/24.png'),
(4, 552, 'цена за 8 кг', 'Арбуз ~8кг', 2, '/img/product/25.png'),
(5, 490, 'за 550 г', 'Малина красная свежая Россия ~550г', 2, '/img/product/22.png'),
(6, 490, 'за 550 г', 'Малина красная свежая Россия ~550г', 1, '/img/product/23.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`ID_Buy`),
  ADD KEY `ID_Products` (`ID_Products`),
  ADD KEY `ID_Customer` (`ID_Customer`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_Category`);

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_Customer`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID_FeedBack`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID_Products`),
  ADD KEY `ID_Category` (`ID_Category`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `buy`
--
ALTER TABLE `buy`
  MODIFY `ID_Buy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `ID_Category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID_FeedBack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID_Products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_2` FOREIGN KEY (`ID_Products`) REFERENCES `products` (`ID_Products`),
  ADD CONSTRAINT `buy_ibfk_3` FOREIGN KEY (`ID_Customer`) REFERENCES `customer` (`ID_Customer`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`ID_Category`) REFERENCES `category` (`ID_Category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
