-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Okt 25. 15:21
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `php_login_system`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_items` text NOT NULL,
  `status` text DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `cart_items`, `status`, `created_at`) VALUES
(33, 26, '{\"2\":{\"quantity\":\"5\"}}', 'processed', '2019-10-20 11:46:00'),
(35, 25, '{\"2\":{\"quantity\":1}}', 'processed', '2019-10-22 08:43:05'),
(36, 25, '{\"5\":{\"quantity\":1},\"6\":{\"quantity\":1}}', 'processed', '2019-10-22 08:43:16'),
(37, 26, '{\"3\":{\"quantity\":1},\"2\":{\"quantity\":\"4\"}}', 'processed', '2019-10-22 09:13:11'),
(38, 4, '{\"2\":{\"quantity\":1}}', 'processed', '2019-10-22 09:18:17'),
(39, 27, '{\"34\":{\"quantity\":1}}', 'processed', '2019-10-22 11:07:06'),
(40, 27, '{\"2\":{\"quantity\":1}}', 'processed', '2019-10-23 10:44:05'),
(41, 26, '{\"2\":{\"quantity\":\"2\"}}', 'pending', '2019-10-24 06:44:06'),
(42, 26, '{\"2\":{\"quantity\":1}}', 'pending', '2019-10-24 09:27:14'),
(43, 26, '{\"5\":{\"quantity\":1}}', 'pending', '2019-10-24 09:31:36');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL,
  `product_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `brand` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `specification` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` int(25) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `category` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `brand`, `specification`, `description`, `price`, `quantity`, `image`, `category`) VALUES
(1, 'Canon EF 50mm F1.8 STM lens', 'Canon', 'Compact and lightweight-an outstanding walk-around lens-Canon\'s EF 50mm f/1.8 STM is a great entry into the world of EOS prime lenses. With an 80mm effective focal-length on APS-C cameras, 50mm on full-frame cameras, it\'s an excellent prime lens for portraits, action, even nighttime photography. Its bright maximum aperture of f/1.8 helps it not only to excel in low light, but also to capture gorgeous, sharp images and movies with beautiful background blur thanks to its circular 7-blade design. An updated lens arrangement with new lens coatings helps render images with excellent color balance, plus minimized ghosting and flare. Performance is brilliant, with a stepping motor (gear-type STM) to deliver near silent, continuous Movie Servo AF for movies plus speedy, smooth AF for stills. A redesigned exterior with improved focus ring placement makes manual focus adjustments a breeze. Canon\'s most compact 50mm lens, the EF 50mm f/1.8 STM has a rugged metal mount, plus an improved minimum focusing distance of 1.15 ft. (0.35m) and a maximum magnification of 0.21x. Offering sharp performance for the best in movies and stills, it\'s a fixed focal length gem-the perfect lens for photographers and moviemakers to expand the creative possibilities with their EOS cameras.', 'Compact, lightweight fixed focal length lens ideal for everyday photos, and with a large f/1.8 aperture, a perfect lens for low-light photography and creative background blur.', 111, 10, 'uploads/157097886212191478085da33c2ee7f85-Canon_EF_50mm_f1.8_STM.jpg', 'Lens'),
(2, 'Canon EF-S 17-55mm f2.8 IS USM', 'Canon', 'To meet user demands for a fast EF-S zoom lens, Canon has specially designed a new lens with a large aperture of f/2.8 for select Canon Digital SLR cameras.* The large circular aperture produces a shallow depth-of-field, creating background blur that draws attention to the photographic subject. The lens construction includes UD and aspherical elements, which deliver impressive image quality throughout the entire zoom range. Image Stabilizer lens groups shift to compensate for camera movement so that the image appears steady on the image plane, ensuring clear, crisp images, even in dim light. With a Ring-type USM, inner focusing and new AF algorithms, this lens achieves autofocus quickly and quietly, and with full-time mechanical manual focusing, manually adjusting the focus is possible even in AF mode.', 'The Canon EF-S 17-55mm f/2.8 IS gives APS-C shooters a taste of the premium lifestyle.\r\n', 765, 11, 'uploads/15702917064965771715d98bffaab768-Canon_EF-S_17-55mm_f2.8_IS_USM.jpg', 'Lens'),
(3, 'Canon EF 24-70mm f2.8L II USM', 'Canon', 'Meeting the ever-increasing demands on image quality that digital photography brings, the redesigned EF 24-70mm f/2.8L II USM is the latest update to the acclaimed L-Series of EF optics, re-establishing a new standard for superb optics, high-end durable construction and performance in professional zoom lenses. A standard focal length zoom lens, it features a large aperture throughout its focal length. Featuring the latest advances in optical lens design, it utilizes 1 Super UD lens element and 2 UD lens elements that help minimize chromatic aberration in the periphery at wide-angle as well as reduced color blurring around the edges of the subject. In addition, 2 types of aspherical lenses are combined to help reduce spherical aberration over the entire image area as well as through the full zoom range. Optimized lens coatings also help ensure exceptional color balance while minimizing ghosting. The lens is also equipped with a circular 9-blade diaphragm for beautiful, soft backgrounds. A ring-type USM and high-speed CPU with optimized AF algorithms enable silent and fast autofocusing. Built for the rigors of professional use as well as to meet the increased number of shots available with digital photography, it\'s constructed with improved dust sealing and water resistance while fluorine coatings on the front and rear lens surfaces help reduce soiling, smears and fingerprints. A zoom lock lever locks the zoom position at the wide end for safe transporting while attached to an EOS DSLR camera over the shoulder.', 'This Mk II edition is the reinvention of a classic', 1789, 20, 'uploads/157029182716996614015d98c073b13ab-Canon_EF_24-70mm_f2.8L_II_USM.jpg', 'Lens'),
(4, 'Canon EF 24-105mm f4L IS II USM', 'Canon', 'For incredible versatility, the EF 24-105mm f/4L IS II USM has been redesigned to deliver superb L-series optical performance that pairs smoothly with the high-resolution, full-frame sensors of SLR cameras. Featuring a zoom range of 24-105mm and a constant f/4 aperture, the EF 24-105mm f/4L IS II USM is ideal for landscapes, portraits, sports and more, offering effective all-day performance for advanced photography and videography. It helps reduce ghosting and flare, and has improved peripheral brightness as well as a 10-blade circular aperture that helps deliver sharp, evenly illuminated images with gorgeous background blur. It even has an improved IS system for better handheld performance, especially in challenging light. From wide-angle to mid-telephoto and everywhere in-between, the EF 24-105mm f/4L IS II USM is a durable, compact performer you can count on for excellent performance and gorgeous results in more places, more often.', 'Another Canon standard zoom gets upgraded', 1299, 12, 'uploads/157035804419969338955d99c31c8a031-Canon_EF_24-105mm_f4L_IS_II_USM.jpg', 'Lens'),
(5, 'Canon Ef front lens cap 55mm', 'Canon', '55mm Front Lens Cap', 'Snap-clips', 8, 10, 'uploads/15703581271228304065d99c36f1cbed-Canon_Ef_front_lens_cap.jpg', 'Accessories'),
(6, 'Canon Ef front lens cap 58mm', 'Canon', '58mm Front Lens Cap', 'Snap-clips', 9, 20, 'uploads/15703581445585597995d99c38037fe9-Canon_Ef_front_lens_cap.jpg', 'Accessories'),
(7, 'Canon Ef front lens cap 67mm', 'Canon', '67mm Front Lens Cap', 'Snap-clips', 10, 13, 'uploads/157035815715598283035d99c38d8d769-Canon_Ef_front_lens_cap.jpg', 'Accessories'),
(14, 'Canon 5D Mark IV', 'Canon', 'The EOS 5D Mark IV camera builds on the powerful legacy of the 5D series, offering amazing refinements in image quality, performance and versatility. Canon\'s commitment to imaging excellence is the soul of the EOS 5D Mark IV. Wedding and portrait photographers, nature and landscape shooters, as well as creative videographers will appreciate the brilliance and power that the EOS 5D Mark IV delivers. Superb image quality is achieved with Canon\'s all-new 30.4 Megapixel full-frame sensor, and highly-detailed 4K video is captured with ease. Focus accuracy has been improved with a refined 61-point AF system and Canon\'s revolutionary Dual Pixel CMOS AF for quick, smooth AF for both video and Live View shooting. Fast operation is enhanced with Canon\'s DIGIC 6+ Image Processor, which provides continuous shooting at up to 7.0 fps*. Built-in Wi-Fi**, GPS*** and an easy-to-navigate touch-panel LCD allow the camera to become an extension of you. When quality matters, the EOS 5D Mark IV helps deliver results to inspire even the most discerning imagemaker.', 'No matter what you are shooting, be assured of uncompromising image quality and a thoroughly professional performance.', 2799, 10, 'uploads/f644bb29461e9c446d58caac8bdb6235f8bea3a0-canon_5d_mark_VI.jpg', 'Camera Bodies'),
(34, ' Imperial I-class Star Destroyer', 'Star Destroyer', 'The Imperial I-class Star Destroyer, also referred to as an Imperial-class Star Destroyer or Star Destroyer, was a model of Imperial-class Star Destroyer in the service of the Imperial Navy. A wedge-shaped capital ship, it bristled with weapons emplacements, assault troops, boarding craft, and TIE line starfighters. In the era of the Galactic Empire, its command bridge was staffed by the finest crewmen in the navy.', 'This is a very reliable 150 years old spacecraft! MOT until 01/12/2020.', 2147483647, 5, 'uploads/157044024716117310215d9b043715768-Star-Destroyer.jpg', 'Spacecraft'),
(37, 'Po', 'Nature', 'This peaceful creature with a distinctive black and white coat is adored by the world and considered a national treasure in China. The panda also has a special significance for WWF because it has been WWF\'s logo since our founding in 1961.  Pandas live mainly in bamboo forests high in the mountains of western China, where they subsist almost entirely on bamboo. They must eat from 26 to 84 pounds of it every day, a formidable task for which they use their enlarged wrist bones that function as opposable thumbs.  A newborn panda is about the size of a stick of butter about 1/900th the size of its mother but can grow to up to 330 pounds as an adult. These bears are excellent tree climbers despite their bulk. ', 'Rolling \r\nFriendly Giant Panda', 99999, 1, 'uploads/15705221985623142285d9c445642a9f-panda.gif', 'Exotic Animals'),
(42, '190 Carbon Fibre 3-Section camera tripod', 'Manfrotto', 'The ultimate camera tripod for dynamic shooting. Never miss an opportunity with the super-smart 190 Carbon Fibre 3-Section Tripod, with Horizontal Column. Itâ€™s made in Italy, to world-leading quality standards, so you know itâ€™s built to last. And itâ€™s packed with innovative features, not least being the 90Â°centre column mechanism. This clever invention gives you the flexibility to catch new perspectives, horizontally or vertically, making it the perfect stand for a variety of applications.  This sturdy 3-section camera tripod has carbon fibre leg tubes for maximum rigidity and stability. Plus, theyâ€™re easy to extend thanks to a quick power lock mechanism. This function also allows you to move each leg individually, for even greater control and flexibility. All you need to do is lock and unlock an easy-to-reach handle to change position. When theyâ€™re in place, theyâ€™re completely secure. And an inbuilt bubble gives you all the information you need at a glance to set-up completely accurately.  Using, setting up, and dismantling this clever camera stand is a breeze. The levelling bubble wonâ€™t obscure your view of the mounted head or camera. The horizontal column tucks neatly into the tripodâ€™s top casting for ultimate portability, and you can extend or tweak your angle without taking your equipment off the stand. That makes switching orientation incredibly easy too. And this smart photo stand is fantastically versatile. An easy link connector means you can pair with your accessories in a flash, making this tripod more of a mobile studio than a simple camera stand.', 'Capture every shot with 901 column system Set up and work securely.', 475, 20, 'uploads/157061157614534963095d9da1785596e-mt190cxpro3-v2.jpg', 'Tripods'),
(43, 'Novo Explora T5', 'Novo', 'The Explora T5 isn\'t the tallest tripod in this group â€“ and it doesnâ€™t fold down the smallest â€“ but it offers a good compromise in a particularly light yet nicely engineered package. The pull-off rubber foot pads that reveal metal spikes are a nice touch, and everything about the design works simply and efficiently. The look and feel of carbon fibre also adds a touch of luxury at the price. Build quality and performance are impressive for a relatively inexpensive carbon tripod kit, making the Novo Explora T5 one of the best tripods around.', 'A carbon tripod for the price of aluminium', 179, 5, 'uploads/15706118098141330715d9da2618af1e-Novo-Explora-T10-Carbon-Fibre-Tripod-Kit.jpg', 'Tripods'),
(44, 'Nikon D850', 'Nikon', 'The D850 is the successor to the D810, which has been highly praised by its users for offering extremely sharp and clear rendering, with rich tone characteristics. This powerful new FX-format digital SLR camera is engineered with a range of new technologies, features and performance enhancements that are a direct result of feedback from users, who demand the very best from their camera equipment. The D850 will exceed the expectations of the vast range of photographers that seek the high resolution and high-speed capabilities that only a Nikon of this caliber complemented by NIKKOR lenses can offer.', 'The D850 puts staggering image quality and impressive performance within reach of working photographers everywhere.', 2399, 4, 'uploads/157061218212985241545d9da3d64ee16-inkd850r.jpg', 'Camera Bodies'),
(45, 'AF-S NIKKOR 70-200mm f/2.8E FL ED VR', 'Nikon', 'For years, Nikon\'s 70-200 f/2.8 lens has been the benchmark for fast telephoto zoom lenses, unrivaled for low-light, sports, wildlife, concerts, weddings, portraits and everyday shooting. This new version takes that legendary performance to the next level with the same jaw-dropping image quality that has made it a prized lens of pros and serious hobbyists alike. Whether you\'re shooting a DX DSLR like the D500 or an FX powerhouse like the D5, the AF-S NIKKOR 70-200mm f/2.8E FL ED VR will take you to thrilling new heights.', 'The AF-S NIKKOR 70-200mm f/2.8E FL ED VR from Nikon is a portrait to telephoto zoom.', 2799, 4, 'uploads/15706124087673848055d9da4b816ccd-20063-AF-S-NIKKOR-70-200mm-FL-ED-VR.png', 'Lens'),
(46, 'Sony Alpha a99 II DSLR Camera', 'Sony', 'Positioned as the flagship A-mount camera from Sony, the Alpha a99 II DSLR Camera combines the power of a full-frame 42.4MP Exmor R back-illuminated CMOS sensor and a BIONZ X image processor with front-end LSI to create outstanding images at expanded sensitivities up to ISO 102400 and record UHD 4K video. The a99 II is designed for speed, with an ergonomic body design and redeveloped shutter able to hit 12 fps, with full AF and AE capabilities. It also uses a Hybrid Phase Detection AF System that combines a 79-point dedicated AF sensor with a 399-point on-chip focus system for fast, accurate focusing in all conditions. And, for video, a new S&Q Motion setting permits the capture of Full HD video at a variety of frame rates ranging from 1-120 fps.', 'Sony a99 II Full Frame Translucent Mirror DSLR Camera, Ultra-Fast 4D FOCUS, 79 Hybrid Cross AF Points, 12 fps Continuous Shooting.', 3198, 4, 'uploads/15706128818137561845d9da69149c81-sony_alpha_a99_ii_dslr_1474278331_1282852.jpg', 'Camera Bodies');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(512) NOT NULL,
  `access_level` varchar(16) DEFAULT NULL,
  `access_code` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=pending,1=confirmed',
  `created` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='admin and customer users';

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `contact_number`, `address`, `password`, `access_level`, `access_code`, `status`, `created`, `modified`) VALUES
(1, 'Mike', 'Dalisay', 'mike@example.com', '0999999999', 'Blk. 24 A, Lot 6, Ph. 3, Peace Village', '$2y$10$AUBptrm9sQF696zr8Hv31On3x4wqnTihdCLocZmGLbiDvyLpyokL.', 'Admin', '', 1, '0000-00-00', '2016-06-13 16:17:47'),
(2, 'Joli', 'Moli', 'email@csige.hu', '123455', 'Teve utca 3', '$2y$10$it4i11kRKrB19FfpPRWsRO5qtgrgajL7NnxOq180MsIhCKhAmSdDa', 'Customer', '', 1, '0000-00-00', '2015-03-24 06:00:21'),
(4, 'Darwin', 'Dalisay', 'darwin@example.com', '9331868359', 'Blk 24 A Lot 6 Ph 3\r\nPeace Village, San Luis', '$2y$10$tLq9lTKDUt7EyTFhxL0QHuen/BgO9YQzFYTUyH50kJXLJ.ISO3HAO', 'Customer', 'ILXFBdMAbHVrJswNDnm231cziO8FZomn', 1, '2014-10-29', '2016-06-13 16:18:25'),
(7, 'Marisol Jane', 'Dalisay', 'mariz@gmail.com', '09998765432', 'Blk. 24 A, Lot 6, Ph. 3, Peace Village', 'joli', 'Customer', '', 1, '2015-02-25', '2015-03-24 06:00:21'),
(9, 'Marykris', 'De Leon', 'marykrisdarell.deleon@gmail.com', '09194444444', 'Project 4, QC', '$2y$10$uUy7D5qmvaRYttLCx9wnU.WOD3/8URgOX7OBXHPpWyTDjU4ZteSEm', 'Customer', '', 1, '2015-02-27', '2015-03-24 05:51:03'),
(10, 'Merlin', 'Duckerberg', 'merlin@gmail.com', '09991112333', 'Project 2, Quezon City', '$2y$10$VHY58eALB1QyYsP71RHD1ewmVxZZp.wLuhejyQrufvdy041arx1Kq', 'Admin', '', 1, '2015-03-18', '2015-03-24 06:00:21'),
(14, 'Charlon', 'Ignacio', 'charlon@gmail.com', '09876543345', 'Tandang Sora, QC', '$2y$10$Fj6O1tPYI6UZRzJ9BNfFJuhURN9DnK5fQGHEsfol5LXRu.tCYYggu', 'Customer', '', 1, '2015-03-24', '2015-03-24 06:48:00'),
(15, 'Kobe Bro', 'Bryant', 'kobe@gmail.com', '09898787674', 'Los Angeles, California', '$2y$10$fmanyjJxNfJ8O3p9jjUixu6EOHkGZrThtcd..TeNz2g.XZyCIuVpm', 'Customer', '', 1, '2015-03-26', '2015-03-26 02:39:52'),
(20, 'Tim', 'Duncan', 'tim@example.com', '9999999', 'San Antonio, Texas, USA', '$2y$10$9OSKHLhiDdBkJTmd3VLnQeNPCtyH1IvZmcHrz4khBMHdxc8PLX5G6', 'Customer', '0X4JwsRmdif8UyyIHSOUjhZz9tva3Czj', 1, '2016-05-26', '2016-05-25 15:25:59'),
(21, 'Tony', 'Parker', 'tony@example.com', '8888888', 'Blk 24 A Lot 6 Ph 3\r\nPeace Village, San Luis', '$2y$10$lBJfvLyl/X5PieaztTYADOxOQeZJCqETayF.O9ld17z3hcKSJwZae', 'Customer', 'THM3xkZzXeza5ISoTyPKl6oLpVa88tYl', 1, '2016-05-26', '2016-06-13 15:46:33'),
(22, 'GÃ¡bor', 'TÃ³th', 'admin@admin', '123456778', '3530 CsicsÃ³kÃ¡s', '$2y$10$ZrLCNH643T8HFOnSN7tLH.6qwP7krFoAIw/rZG7i9hWTAIjRFgs1m', 'Admin', '', 1, '2019-09-15', '2019-09-15 09:58:25'),
(24, 'OttÃ³', 'Csiga', '1@1', '1234', 'BulivÃ¡r', '$2y$10$HKor5Yds28.K6r2t53y45uIHBFGNTTkA1K7TZOvlqTCvMbR9DI1vi', 'Customer', '', 1, '2019-09-19', '2019-09-19 14:20:29'),
(25, 'Krisztina', 'OrbÃ¡n', 'upcgabor@gmail.com', '12345', 'asd', '$2y$10$S2ihuBDxdRsubrynHaO7BesxFUxel2PukvnY/dGbR5WUgsyBC30cy', 'Customer', '', 1, '2019-09-26', '2019-09-26 15:33:24'),
(26, 'Martinka', 'Toth', 'user@user', '1234567', '3535 Miskolc', '$2y$10$jzyese6y5/ohFEW8s7ApiOdGAsCsA2prU3azDFjy8dRms74NhCkdK', 'Customer', '', 1, '2019-09-29', '2019-09-29 07:35:15'),
(27, 'Csaba', 'TÃ³th', 'user@user11', '123476859', 'Debrecen Kossuth u. 11', '$2y$10$H36JZnxEAEjh5y5vWJfAH.WWrVwTHU3CGIMQsqNJVU16RHv2CKFK6', 'Customer', NULL, 1, '2019-09-29', '2019-09-29 14:26:47');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
