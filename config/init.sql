DROP TABLE if exists `users` CASCADE ;
DROP TABLE IF EXISTS `products` CASCADE;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(512) NOT NULL,
  `access_level` varchar(16) NOT NULL,
  `access_code` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending,1=confirmed',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='admin and customer users';

CREATE TABLE products
(
    product_id    SERIAL         NOT NULL PRIMARY KEY,
    product_name  TEXT           NOT NULL,
    brand         TEXT           NOT NULL,
    specification TEXT           NOT NULL,
    description   TEXT           NOT NULL,
    price         INT (11)       NOT NULL,
    quantity      INTEGER        NOT NULL,
    image         TEXT,
    category      TEXT           NOT NULL
);

INSERT INTO `users` (`firstname`, `lastname`, `email`, `contact_number`, `address`, `password`, `access_level`, `access_code`, `status`, `created`, `modified`) VALUES
('Mike', 'Dalisay', 'mike@example.com', '0999999999', 'Blk. 24 A, Lot 6, Ph. 3, Peace Village', '$2y$10$AUBptrm9sQF696zr8Hv31On3x4wqnTihdCLocZmGLbiDvyLpyokL.', 'Admin', '', 1, '0000-00-00 00:00:00', '2016-06-13 18:17:47'),
('Lauro', 'Abogne', 'lauro@eacomm.com', '08888888', 'Pasig City', '$2y$10$it4i11kRKrB19FfpPRWsRO5qtgrgajL7NnxOq180MsIhCKhAmSdDa', 'Customer', '', 1, '0000-00-00 00:00:00', '2015-03-24 07:00:21'),
('Darwin', 'Dalisay', 'darwin@example.com', '9331868359', 'Blk 24 A Lot 6 Ph 3\r\nPeace Village, San Luis', '$2y$10$tLq9lTKDUt7EyTFhxL0QHuen/BgO9YQzFYTUyH50kJXLJ.ISO3HAO', 'Customer', 'ILXFBdMAbHVrJswNDnm231cziO8FZomn', 1, '2014-10-29 17:31:09', '2016-06-13 18:18:25'),
('Marisol Jane', 'Dalisay', 'mariz@gmail.com', '09998765432', 'Blk. 24 A, Lot 6, Ph. 3, Peace Village', 'mariz', 'Customer', '', 1, '2015-02-25 09:35:52', '2015-03-24 07:00:21'),
('Marykris', 'De Leon', 'marykrisdarell.deleon@gmail.com', '09194444444', 'Project 4, QC', '$2y$10$uUy7D5qmvaRYttLCx9wnU.WOD3/8URgOX7OBXHPpWyTDjU4ZteSEm', 'Customer', '', 1, '2015-02-27 14:28:46', '2015-03-24 06:51:03'),
('Merlin', 'Duckerberg', 'merlin@gmail.com', '09991112333', 'Project 2, Quezon City', '$2y$10$VHY58eALB1QyYsP71RHD1ewmVxZZp.wLuhejyQrufvdy041arx1Kq', 'Admin', '', 1, '2015-03-18 06:45:28', '2015-03-24 07:00:21'),
('Charlon', 'Ignacio', 'charlon@gmail.com', '09876543345', 'Tandang Sora, QC', '$2y$10$Fj6O1tPYI6UZRzJ9BNfFJuhURN9DnK5fQGHEsfol5LXRu.tCYYggu', 'Customer', '', 1, '2015-03-24 08:06:57', '2015-03-24 07:48:00'),
('Kobe Bro', 'Bryant', 'kobe@gmail.com', '09898787674', 'Los Angeles, California', '$2y$10$fmanyjJxNfJ8O3p9jjUixu6EOHkGZrThtcd..TeNz2g.XZyCIuVpm', 'Customer', '', 1, '2015-03-26 11:28:01', '2015-03-26 03:39:52'),
('Tim', 'Duncan', 'tim@example.com', '9999999', 'San Antonio, Texas, USA', '$2y$10$9OSKHLhiDdBkJTmd3VLnQeNPCtyH1IvZmcHrz4khBMHdxc8PLX5G6', 'Customer', '0X4JwsRmdif8UyyIHSOUjhZz9tva3Czj', 1, '2016-05-26 01:25:59', '2016-05-25 17:25:59'),
('Tony', 'Parker', 'tony@example.com', '8888888', 'Blk 24 A Lot 6 Ph 3\r\nPeace Village, San Luis', '$2y$10$lBJfvLyl/X5PieaztTYADOxOQeZJCqETayF.O9ld17z3hcKSJwZae', 'Customer', 'THM3xkZzXeza5ISoTyPKl6oLpVa88tYl', 1, '2016-05-26 01:29:01', '2016-06-13 17:46:33');

INSERT INTO products (product_name, brand, specification, description, quantity, price, image, category)
VALUES ('Canon EF 50mm F1.8 STM lens', 'Canon',
        'Mount: Canon EF | Elements/groups: 6/5 | Diaphragm blades: 7 | Autofocus: Stepping motor | Stabilizer: None | Minimum focus distance: 0.35m | Maximum magnification: 0.21x | Filter thread: 49mm | Dimensions (WxL): 69x39mm | Weight: 160g',
        'A great low-cost portrait lens for APS-C Canon DSLRs',
        10, 114, 'photos/Canon_EF_50mm_F1.8_STM_lens.jpg', 'Lens'),
       ('Canon EF-S 17-55mm f2.8 IS USM', 'Canon',
        'Mount: Canon EF-S | Effective zoom range: 27-88mm | Lens construction: 19 elements in 12 groups | No. of diaphragm blades: 7 blades | Minimum focus distance: 0.35m | Filter size: 77mm | Dimensions: 84x111mm | Weight: 645g',
        'A veteran APS-C format lens, with high-quality build',
        11, 765, 'photos/Canon_EF-S_17-55mm_f2.8_IS_USM.jpg', 'Lens'),
       ('Canon EF 24-70mm f2.8L II USM', 'Canon',
        'Mount: Canon EF | Effective zoom range: 24-70mm | Lens construction: 18 elements in 13 groups | No. of diaphragm blades: 9 blades | Minimum focus distance: 0.38m | Filter size: 82mm | Dimensions: 89x113mm | Weight: 805g',
        'This Mk II edition is the reinvention of a classic',
        20, 1789, 'photos/Canon_EF_24-70mm_f2.8L_II_USM.jpg', 'Lens'),
       ('Canon EF 24-105mm f4L IS II USM', 'Canon',
        'Mount: Canon EF | Effective zoom range: 24-105mm | Lens construction: 17 elements in 12 groups | No. of diaphragm blades: 10 blades | Minimum focus distance: 0.45m | Filter size: 77m | Dimensions: 84x118mm | Weight: 795g',
        'Another Canon standard zoom gets upgraded',
        5, 1299, 'photos/Canon_EF_24-105mm_f4L_IS_II_USM.jpg', 'Lens'),
       ('Canon Ef front lens cap', 'Canon', '55mm Front Lens Cap', 'Snap-clips',
        10, 8, 'photos/Canon_lens_cap.jpg', 'accessorie'),
       ('Canon Ef front lens cap', 'Canon', '58mm Front Lens Cap', 'Snap-clips',
        20, 9, 'photos/Canon_lens_cap.jpg', 'accessorie'),
       ('Canon Ef front lens cap', 'Canon', '67mm Front Lens Cap', 'Snap-clips',
        13, 10, 'photos/Canon_lens_cap.jpg', 'accessorie'),
       ('Canon Ef front lens cap', 'Canon', '72mm Front Lens Cap', 'Snap-clips',
        11, 10, 'photos/Canon_lens_cap.jpg', 'accessorie');