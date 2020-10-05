-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 04:28 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_25_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `film_id`, `comment`, `post_date`) VALUES
(17, 5, 5, 'Hello!!!', '2020-09-11 14:04:39'),
(20, 7, 6, 'Heey', '2020-09-12 11:00:08'),
(22, 8, 7, 'Hi', '2020-09-14 13:26:11'),
(23, 8, 6, 'Almat!!!', '2020-09-14 13:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `genre_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `year` int(4) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `name`, `description`, `genre_id`, `rating`, `year`, `likes`) VALUES
(2, 'Терминатор 2: Судный день', '<p class=\"styles_paragraph__2Otvx\" style=\"margin-bottom: 20px; color: #393939; font-family: \'Graphik Kinopoisk LC Web\', Arial, Tahoma, Verdana, sans-serif; font-size: 16px;\" data-tid=\"7044a75b\">Прошло более десяти лет с тех пор, как киборг из 2029 года пытался уничтожить Сару Коннор &mdash; женщину, чей будущий сын выиграет войну человечества против машин.</p>\r\n<p class=\"styles_paragraph__2Otvx\" style=\"margin-bottom: 20px; color: #393939; font-family: \'Graphik Kinopoisk LC Web\', Arial, Tahoma, Verdana, sans-serif; font-size: 16px;\" data-tid=\"7044a75b\">Теперь у Сары родился сын Джон и время, когда он поведёт за собой выживших людей на борьбу с машинами, неумолимо приближается. Именно в этот момент из постапокалиптического будущего прибывает новый терминатор &mdash; практически неуязвимая модель T-1000, способная принимать любое обличье. Цель нового терминатора уже не Сара, а уничтожение молодого Джона Коннора.</p>\r\n<p class=\"styles_paragraph__2Otvx\" style=\"color: #393939; font-family: \'Graphik Kinopoisk LC Web\', Arial, Tahoma, Verdana, sans-serif; font-size: 16px;\" data-tid=\"7044a75b\">Однако шансы Джона на спасение существенно повышаются, когда на помощь приходит перепрограммированный сопротивлением терминатор предыдущего поколения. Оба киборга вступают в смертельный бой, от исхода которого зависит судьба человечества.</p>\r\n<p class=\"styles_paragraph__2Otvx\" style=\"color: #393939; font-family: \'Graphik Kinopoisk LC Web\', Arial, Tahoma, Verdana, sans-serif; font-size: 16px;\" data-tid=\"7044a75b\"><iframe src=\"//www.youtube.com/embed/CRRlbK5w8AE\" width=\"500\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', 2, 8.3, 1991, 0),
(3, 'Укрощение строптивого', '<p style=\"text-align: right;\">Категорически не приемлющий женского общества грубоватый фермер&nbsp;<strong>вполне</strong>&nbsp;счастлив и доволен своей холостяцкой жизнью. Но неожиданно появившаяся в его жизни женщина пытается изменить его взгляды на жизнь и очаровать его.</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: right;\"><iframe style=\"color: #393939; font-family: \'Graphik Kinopoisk LC Web\', Arial, Tahoma, Verdana, sans-serif; font-size: 16px;\" src=\"http://www.youtube.com/embed/mhw8jnPJ-aQ\" width=\"560\" height=\"314\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p>&nbsp;</p>', 3, 8.4, 1980, 1),
(5, 'Бойцовский клуб', '<p>Сотрудник страховой компании страдает хронической бессонницей и отчаянно пытается вырваться из мучительно скучной жизни. Однажды в очередной командировке он встречает некоего Тайлера Дёрдена &mdash; харизматического торговца мылом с извращенной философией. Тайлер уверен, что самосовершенствование &mdash; удел слабых, а единственное, ради чего стоит жить &mdash; саморазрушение.</p>\r\n<p>Проходит немного времени, и вот уже новые друзья лупят друг друга почем зря на стоянке перед баром, и очищающий мордобой доставляет им высшее блаженство. Приобщая других мужчин к простым радостям физической жестокости, они основывают тайный Бойцовский клуб, который начинает пользоваться невероятной популярностью.</p>\r\n<p><img src=\"https://st.kp.yandex.net/im/kadr/3/1/1/kinopoisk.ru-Fight-Club-3115959.jpg\" /></p>', 6, 8.6, 1999, 1),
(6, 'Avatarbek', '<p><span style=\"color: #393939; font-family: \'Graphik Kinopoisk LC Web\', Arial, Tahoma, Verdana, sans-serif; font-size: 16px;\">Джейк Салли - бывший морской пехотинец, прикованный к инвалидному креслу. Несмотря на немощное тело, Джейк в душе по-прежнему остается воином. Он получает задание совершить путешествие в несколько световых лет к базе землян на планете Пандора, где корпорации добывают редкий минерал, имеющий огромное значение для выхода Земли из энергетического кризиса.</span></p>\r\n<p><img src=\"https://st.kp.yandex.net/im/kadr/3/5/2/kinopoisk.ru-Avatar-3522997.jpg\" /></p>', 7, 10, 2009, 2),
(7, 'Венеция-2020. Итоги: Без Голливуда, зато с двумя призами у наших', '<p><img src=\"https://avatars.mds.yandex.net/get-kinopoisk-post-img/1642096/d797d8a2fce07ffec3f4150f29cc3b32/960x540\" /></p>\r\n<p>Рассказываем, за что дали призы &laquo;Стране кочевников&raquo;, &laquo;Жене шпиона&raquo; Киёси Куросавы, мексиканцу Мишелю Франко, &laquo;Китобою&raquo; Филиппа Юрьева, &laquo;Дорогим товарищам&raquo; Кончаловского и другим победителям фестиваля.</p>', 1, 5.6, 2020, 1);

-- --------------------------------------------------------

--
-- Table structure for table `film_likes`
--

CREATE TABLE `film_likes` (
  `id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film_likes`
--

INSERT INTO `film_likes` (`id`, `film_id`, `user_id`) VALUES
(86, 6, 5),
(87, 3, 5),
(89, 7, 5),
(91, 6, 6),
(93, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'HORROR'),
(2, 'ACTION'),
(3, 'COMEDY'),
(4, 'CARTOON'),
(5, 'DRAMA'),
(6, 'THRILLER'),
(7, 'SCIENCE FICTION'),
(8, 'SERIALS');

-- --------------------------------------------------------

--
-- Table structure for table `password_histories`
--

CREATE TABLE `password_histories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `assigned_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password_histories`
--

INSERT INTO `password_histories` (`id`, `user_id`, `password`, `assigned_time`) VALUES
(1, 5, 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', '2020-09-09 14:08:35'),
(2, 5, 'd57b0c6ae42d587d9ed65c26bc326a7e27106194', '2020-09-09 14:13:02'),
(3, 5, '00ea1da4192a2030f9ae023de3b3143ed647bbab', '2020-09-09 14:13:35'),
(4, 6, 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', '2020-09-11 13:22:40'),
(5, 7, 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', '2020-09-12 10:57:40'),
(6, 7, '00ea1da4192a2030f9ae023de3b3143ed647bbab', '2020-09-12 11:00:34'),
(7, 8, 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', '2020-09-14 13:24:03'),
(8, 8, '99baee504a1fe91a07bc66b6900bd39874191889', '2020-09-14 13:24:41'),
(9, 6, '00ea1da4192a2030f9ae023de3b3143ed647bbab', '2020-09-20 12:05:48'),
(10, 9, 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', '2020-09-30 13:50:38'),
(11, 10, 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', '2020-09-30 13:57:18'),
(12, 11, 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', '2020-09-30 13:59:35'),
(13, 12, 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', '2020-09-30 14:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(40) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `imagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`, `avatar`, `imagename`) VALUES
(5, 'moshe@gmail.com', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'Moshe', 'avatars/ee34977afb2fb6c9f56b4634552ae0bb9974bac0.jpg', 'ba89aafcbef1e7660e4b8e0d769ef4bcd52d3b7b'),
(6, 'ilyas@gmail.com', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'Ilyas Zhuanyshevbek', 'avatars/0321a14b62a86deb6fe343a425af854347910e09.jpg', '151693355bca1e51677a7a4e6a9506897f4d2a7d'),
(7, 'almat@gmail.com', '00ea1da4192a2030f9ae023de3b3143ed647bbab', 'Almat', 'avatars/0491798ab3dbfcb805adde09438973b446b7cd21.jpg', ''),
(8, 'dastan@gmail.com', '99baee504a1fe91a07bc66b6900bd39874191889', 'Dastan Dastanov', 'avatars/0590a179e343bf6324f8485bb209e5280f31d9ae.jpg', ''),
(9, 'nurlan@gmail.com', 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', 'Nurlan Kamza', '', ''),
(10, 'test@gmail.com', 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', 'Testbek', '', ''),
(11, 'test2@gmail.com', 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', '&lt;input type = \'text\'&gt; &lt;button class = \'btn btn-success\'&gt;CLEAR&lt;/button&gt;', '', ''),
(12, 'ronnie@gmail.com', 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', '&quot;RONALDO&quot;', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film_likes`
--
ALTER TABLE `film_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_histories`
--
ALTER TABLE `password_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `film_likes`
--
ALTER TABLE `film_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_histories`
--
ALTER TABLE `password_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
