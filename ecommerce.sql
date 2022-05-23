-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 09:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_date`) VALUES
(1, 'admin', 'smsmspy@gmail.com', 'admin', '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quntity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `product_quntity`, `order_id`, `user_id`, `total`) VALUES
(22, 9, 1, 106, 1, 9.06),
(23, 10, 1, 106, 1, 11.86),
(24, 11, 1, 106, 1, 9.06);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_img` text NOT NULL,
  `category_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_img`, `category_des`) VALUES
(8, 'Tools ', 'images/slt_stainless_tools_hp_card.jpg', 'All tools you need'),
(9, 'Cookware', 'images/slt_cast_iron_round_wide_7109937_hp_card.jpg', 'all you need Cookware'),
(10, 'Bakeware', 'images/slt_platinum_6pc_2753432_hp_card.jpg', 'all you need Bakeware');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `user_id`, `invoice`) VALUES
(106, '2022-05-23', 1, 29.98);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_img` text NOT NULL,
  `product_des` text NOT NULL,
  `sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img`, `product_des`, `sub_category_id`) VALUES
(9, 'Sur La Table Silicone Ultimate Fork', 9.06, 'images/3419090_01i_0717_s.jpg', 'As seen in The New York Times\r\n\r\nOur large silicone fork easily handles all kinds of kitchen tasks—from mixing and mashing to stirring and scrambling. Use it to lift poultry, flip burgers, separate pulled pork and much more. Made of durable, food-safe silicone, this does-it-all fork is heat resistant and dishwasher safe for easy cleanup.\r\n\r\nDesigned and engineered in Germany, these tools were created with full attention to details. Metal cores are engineered to support the silicone and ensure tools are strong and durable for long-lasting use. The silicone is heat-resistant up to 446° and won\'t scratch your nonstick pans or glass. All silicone tools are dishwasher safe.', 14),
(10, 'Sur La Table Silicone-Tipped Tongs, 12\"', 11.86, 'images/5784160_01i_1119_s.jpg', 'Ideal for serving small plates, appetizers, antipasti, cheese platters, cold cuts and more, these handy nylon mini tongs are perfect for everyday needs. Soft silicone tips are safe for use with all cookware and heat safe to 120°F. The hanging loop can be pulled to lock tongs together for convenient, compact storage.\r\n\r\nWe thoughtfully designed and developed our new Sur La Table stainless-steel tools with the home chef in mind. Each tool is carefully reviewed to ensure the best quality. Drawing on decades of experience in the kitchen and familiarity with the world’s top brands, we’ve made these kitchen essentials from the most durable stainless steel with weighted, ergonomic handles for optimum balance and comfort.', 14),
(11, 'Sur La Table Silicone-Tipped Tongs, 7\"', 9.06, 'images/5389838_01i_0719_s.jpg', 'Ideal for serving small plates, appetizers, antipasti, cheese platters, cold cuts and more, these handy nylon mini tongs are perfect for everyday needs and are great for entertaining. Soft silicone tips are safe for use with all cookware and are heat safe to 446°F. The hanging loop can be pulled to lock tongs together for convenient, compact storage.\r\n\r\nWe thoughtfully designed and developed our new Sur La Table stainless steel tools with the home chef in mind. Each tool is carefully reviewed by hand to ensure the best quality. Drawing on decades of experience in the kitchen and familiarity with the world’s top brands, we’ve selected only the best features: these essential tools are made of the most durable stainless steel and feature weighted, ergonomic handles for optimum balance and comfort.', 14),
(13, 'Sur La Table Silicone-Tipped Tongs, 12\"', 15.46, 'images/3420403_01i_1017_s.jpg', 'Our stainless steel spider skimmer is perfect for boiling potatoes, blanching veggies, deep-frying or any type of quick food retrieval. The strong mesh is designed to resist denting and holds food securely to reduce spills. Available in two sizes.\r\n\r\nWe thoughtfully designed and developed our new Sur La Table stainless steel tools with the home chef in mind. Each tool is carefully reviewed by hand to ensure the best quality. Drawing on decades of experience in the kitchen and familiarity with the world’s top brands, we’ve selected only the best features: these essential tools are made of the most durable stainless steel and feature weighted, ergonomic handles for optimum balance and comfort.', 14),
(14, 'Sur La Table Ratchet Mill', 17.46, 'images/3830296_05Y_1118_s1.jpg', 'Our high-performance ratchet mill features a ceramic stone grinder that won’t corrode and can be used with salt, pepper or other spices. Adjust the grind thickness to fine or coarse according to your preference and needs. A front-loading door makes refilling your favorite spices a cinch.', 15),
(15, 'Sur La Table Stainless Steel Mini Masher', 8.46, 'images/4139135_01i_0718_s.jpg', 'Made with sturdy, easy-to-clean stainless steel, this mini masher is ideal for mashing potatoes and other root vegetables, avocados for guacamole, or apples, squash or bananas for homemade baby food. It features a sturdy handle and is perfectly balanced so you can control the texture as you work.\r\n\r\nWe thoughtfully designed and developed our new Sur La Table stainless steel tools with the home chef in mind. Each tool is carefully reviewed by hand to ensure the best quality. Drawing on decades of experience in the kitchen and familiarity with the world’s top brands, we’ve selected only the best features: these essential tools are made of the most durable stainless steel and feature weighted, ergonomic handles for optimum balance and comfort.', 15),
(16, 'Rooster Salt And Pepper Shaker Set', 14.36, 'images/6736946_0721_s.jpg', 'Shake things up in the kitchen with these charming salt and pepper shakers shaped like harvest roosters. Made of durable earthenware for lasting use.', 15),
(17, 'Sur La Table Orange Juicer', 17.46, 'images/1158989_s.jpg', 'Our large juicer is a great way to make quick work of juicing oranges. Easy to use, it’s comfortable to hold and features a hinge that’s strong and sturdy. The powerful force you create allows for optimum juicing in no time and with little effort.\r\n', 15),
(18, 'Sur La Table Stainless Steel Measuring Cups, Set Of 6', 35.16, 'images/3332574_01i_0118_s.jpg', 'Every chef—whether professional or amateur—needs a quality set of tools. These measuring cups are made of sleek stainless steel and nest together on an easy-to-open ring for space-saving storage. Set includes six measuring cups.', 16),
(19, 'Spoons, Set Of 6', 15.96, 'images/3332632_01i_0118_s.jpg', 'Each stainless steel measuring spoon in this set is narrow enough to fit in just about any container—perfect for small spice jars. They can be removed and stored on the included easy-to-open ring. Set includes six measuring spoons.', 16),
(20, 'Nordic Ware Strawberry Bitelets Pan', 44, 'images/7063399_0222_vp.jpg', 'Create nineteen adorable strawberry-shaped bitelets with this beautifully embossed pan. Use favorite cake batter recipes in the pan and bake to feed a crowd. Dip pink strawberry bites in dark chocolate, drizzle vanilla bites with glaze or sandwich two halves with frosting to make a plump whole.\r\nCast aluminum transmits heat efficiently for even baking without hot spots\r\nCreator of the original Bundt pan, Nordic Ware has produced quality cookware in Minneapolis, Minnesota, with locally sourced materials since 1946\r\nNordic Ware is a family-owned American manufacturer with 70 years of experience making quality cookware and bakeware', 18),
(21, 'Sur La Table Watermelon Spatula', 11.16, 'images/7064397_0422_01i_s.jpg', 'Bring some summertime fun to your kitchen utensil roster with this spatula with a watercolor floral and watermelon illustration. It features a removable, dishwasher-safe silicone head and a comfortable wooden handle. Food-safe, heat-resistant silicone won\'t scratch cookware and is safe for use with nonstick surfaces.', 18),
(22, 'Non-Skid Stainless Steel Mixing Bowls, Set Of 3', 47.96, 'images/2566180_05p_0216_s.jpg', 'Our mixing bowls combine the durability and clean look of stainless steel with the stability of the nonstick rubber base. This versatile set includes three sizes to meet all of your baking needs, and they nest together for efficient storage.', 18),
(23, 'Le Creuset Enameled Cast Iron Bread Oven', 289.95, 'images/7204548_0222_01i_s.jpg', 'Take home baking to the next level with the Le Creuset Bread Oven. Crafted from their legendary cast iron for excellent heat distribution, this purpose-built shape features a domed lid that encapsulates and circulates, creating a crisp bread exterior and flavorful, soft interior. The knob on top of the signature three-ring lid, along with the ergonomic side handles, makes it easy to lift, even after being in the oven at high temperatures. Raised ridges on the base lift loaves off the base and eliminate the need for parchment paper. The matte black interior enamel is easy to clean, while the low-profile base promotes even browning and produces a golden, crispy crust marked with our hallmark three rings.', 18),
(24, 'With Handles', 23.96, 'images/535609_01.jpg', 'Our marble rolling pin is the baker’s choice for working with dough. The naturally cool marble helps keep your dough at an optimal temperature throughout preparation, and sturdy wooden handles reduce fatigue. Rolling pin comes with a handy marble cradle for storage. Marble pastry board sold separately.', 19),
(25, 'Sur La Table Soft-Grip Sifters', 12, 'images/5509831_01i_0719_s.jpg', 'Our spring-set sifters turn clumps of flour, powdered sugar and more to a light, uniform consistency. The fine mesh base has spokes set above that agitate the flour when you press the trigger in the comfortable, soft-grip handle. Our exclusive sifters are available in two sizes to accommodate your baking needs.', 19);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `subcategory_img` text NOT NULL,
  `subcategory_des` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `subcategory_img`, `subcategory_des`, `category_id`) VALUES
(14, 'Utensils', 'images/6745475_0821_01i_s.jpg', 'Utensils Tools ', 8),
(15, 'Gadgets', 'images/7062995_0422_01i_s.jpg', 'Gadgets product                        ', 8),
(16, 'Mix & Measure', 'images/5648894_01i_0919_s.jpg', 'Mix & Measure Tools', 8),
(18, 'Bakeware', 'images/6901847_0122_01.jpg', 'Bakeware product                        ', 10),
(19, 'Baking Tools', 'images/535591_0219_01.jpg', 'Baking Tools product', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `email`, `address`, `city`, `phone`, `username`) VALUES
(1, 'qweytruio123*', 'smsmspy@gmail.com', 'Kuforawan', 'jordan / irbid ', '0781959937', 'Abood khashahshenh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `sub_category_id` (`sub_category_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `subcategory` (`subcategory_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
