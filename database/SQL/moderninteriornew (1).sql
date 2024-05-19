-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 03:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moderninteriornew`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `tag` varchar(15) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `userId`, `productId`, `qty`, `created_at`, `updated_at`) VALUES
(39, 4, 1, 1, '2023-02-28 23:30:24', '2023-02-28 23:31:33'),
(40, 4, 3, 1, '2023-02-28 23:31:16', '2023-02-28 23:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `metaKeywords` longtext DEFAULT NULL,
  `metaTitle` varchar(255) DEFAULT NULL,
  `metaDescription` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `slug`, `description`, `metaKeywords`, `metaTitle`, `metaDescription`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sofas', 'sofas', 'Transform your home with our stylish and durable sofa.Shop now and elevate your living space with our high-quality sofa set.', 'Modern sectional sofa\nComfortable sofa\nStylish sofa\nContemporary sofa\nSectional sofa with chaise\nVersatile sofa\nSofa with storage\nHigh-quality sofa\nLiving room furniture\nModern furniture', 'Buy Our Modern Sectional Sofa for the Ultimate Comfort and Style | Shop Now', 'Transform your home with our stylish and durable sofa. Relax in comfort with our plush cushions and enjoy the eye-catching design. Shop now and elevate your living space with our high-quality sofa set.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(2, NULL, 'Cupboard', 'cupboard', 'Looking for a versatile piece of furniture that can fit into any room in your home? Look no further than our cupboards! With its sleek and modern design, the cupboard can blend seamlessly with any home decor style. ', 'cupboard\nstorage\norganization\nspace-saving\nclutter-free\nsolid wood\nhigh-quality\ndurability\nversatile\nmulti-functional\nhome decor\nmodern design', 'Transform Your Home with Our Durable Cupboards - Get 10% Off Today', 'Looking for a versatile piece of furniture that can fit into any room in your home? Look no further than our cupboards! With its sleek and modern design, the cupboard can blend seamlessly with any home decor style. It\'s not just a storage solution, it\'s a multi-functional piece of furniture that can be used as a bookshelf, shoe rack, or even a display case for your favorite decor items. The possibilities are endless with our versatile cupboards.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(3, NULL, 'Table ', 'table', 'No one wants to spend hours assembling furniture, and this table makes it easy to set up and start using in no time. With its simple design and clear instructions, you can have it up and ready to use in minutes.', 'table\ndining table\nwork desk\nadjustable table\nergonomic table\neasy to assemble table\neasy to maintain table\nsturdy table\nhigh-quality table\nmodern table', 'Upgrade Your Space with Modern Interior\'s Stylish and Functional Table - Buy Now', 'Invest in our high-quality table that boasts a versatile and ergonomic design, easy to assemble and maintain, and upgrade your space today. Order now and enjoy free shipping!', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(4, NULL, 'Dinning Sets', 'dinning-sets', 'Looking for a comfortable and inviting dining set to enjoy mealtime with your family and friends? Our dining set is designed to provide both comfort and functionality, making it the perfect choice for your home.', 'Dining set\nDining room furniture\nTable and chairs\nHome decor\nFurniture\nInterior design\nFamily meals\nEntertainment\nComfortable seating\nQuality time', 'Buy Our Comfortable and Stylish Dining Set - 20% Off Today!', 'Upgrade your dining room with our versatile and durable dining set. Perfect for hosting gatherings, enjoying quality time with family, and adding style to your home. Buy now and save 20%!', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(5, NULL, 'Shoe storage ', 'shoe-storage', 'Say goodbye to cluttered closets and piles of shoes with our Shoe Rack. Keep your shoes organized and tidy with our stylish and durable shoe rack that saves space in your home. Get yours today!', 'Shoe racks\nHanging shoe organizers\nClear shoe storage containers\nHigh-quality shoe storage solutions\nOver-the-door shoe organizers\nUnder-bed shoe storage\nStackable shoe storage\nShoe collection organization\nSpace-saving shoe storage', 'Shop the Best Shoe Storage Solutions - Save Space and Stay Organized | Modern Interior', 'Our shoe storage solutions are designed to help you maximize your space and make the most of your available storage. Whether you have a small apartment or a large home, our shoe storage solutions will help you make the most of your space.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(6, NULL, 'Tv unit ', 'tv-unit', 'Upgrade your living space with the sleek and contemporary Modern TV Unit with Storage. With ample space for all your multimedia devices, this unit is made from high-quality materials and is easy to assemble. Order now and get 10% off your purchase!', 'TV unit\nEntertainment center\nLiving room furniture\nMedia console\nModern TV stand\nMinimalistic design\nGlossy finish\nAmple storage\nEasy assembly', 'Buy Modern TV Unit for Your Home | Stylish & Functional TV Stand', 'The TV unit is designed with elegance and style in mind. It is perfect for modern homes that require a sleek and minimalistic aesthetic. The unit\'s smooth and clean lines are accentuated by the glossy finish, giving it a high-end look.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(7, NULL, 'Wardrobe', 'wardrobe', 'Get Your Dream Closet with Our Wardrobe', 'Wardrobe\nCloset organizer\nClothes storage\nBedroom furniture\nCloset system', 'Upgrade Your Closet Organization with Our Wardrobe - 25% Off Today', 'Transform your closet organization with our durable and stylish wardrobe. Plenty of storage space for clothes, shoes, and accessories. Easy to assemble and 25% off today.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(8, NULL, 'Mandir', 'mandir', 'We understand that every home is unique and that\'s why we offer a wide range of Mandirs in different sizes and styles to suit your needs. Whether you\'re looking for a compact Mandir for your apartment or a grand one for your bungalow, we have it all.', 'Buy Mandir Online India\nWooden Mandir for Home\nIndian Temple for Home\nPooja Mandir Designs\nMandir for Home with Price', 'Buy Wooden Mandir Online - Get Upto 50% Off | Modern Interior', 'Shop for beautifully handcrafted wooden Mandirs online at Modern Interior. Get upto 50% off on Pooja Mandir designs. Bring home the divine aura with our Mandirs. Order now!', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(9, NULL, 'Recliner ', 'recliner', 'Our Recliners are designed with your comfort in mind. The plush cushioning and ergonomic support ensure that you\'ll never want to leave your seat.', 'Recliners for home\nComfortable recliner chairs\nStylish recliners\nSupportive recliners\nVersatile recliners', 'Find Your Perfect Recliner: Comfortable and Stylish Options Available | Modern Interior ', 'Upgrade your home relaxation with our Recliners. Discover our comfortable and stylish options and find the perfect solution for your comfort needs.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(10, NULL, 'Kitchen unit ', 'kitchen-unit', 'Get organized and upgrade your kitchen with our stylish and functional kitchen units. Enjoy ample storage, easy assembly, and durable design. Shop now and save 20%!', 'kitchen unit\nkitchen storage\nkitchen island\nextra workspace\nmodern kitchen decor\ndurable construction\neasy assembly\nversatile kitchen furniture\npots and pans storage\nutensil storage', 'Maximize Your Kitchen Space with our Stylish Kitchen Unit - Save 20% | Modern Interior', 'Transform your kitchen with our stylish and functional kitchen unit. Maximize your storage space and add a versatile workspace to your kitchen. Easy to assemble and built to last. Save 20% on your order today.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(11, NULL, 'Bed', 'bed', 'Sleep in style and comfort with our high-quality bed. Order now and experience the ultimate in rest and relaxation.', 'Premium bed\nComfortable bed\nHigh-quality bed\nChic bed\nModern bed\nSleek bed frame\nNeutral bed frame\nConvenient bed\nAffordable bed\nDurable bed', 'Sleep in Comfort with Our Premium Bed - Buy Now and Save [Number]%!', 'Enjoy the ultimate sleeping experience with our premium bed. Our high-quality and stylish bed frame is designed to provide you with luxurious comfort at an affordable price. Order now and save [Number]% on your purchase.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(12, NULL, 'Corporates ', 'corporates', 'For all your corporate needs rather be it Office chair, office table or any thing Modern Interior is one stop destination to all your coporate requirments. Enquire Now.', '', '', '', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:10'),
(13, NULL, 'Bar Furniture  ', 'bar-furniture', 'Sleek Design for Any Bar Setting. Adjustable Height and Swivel Functionality. Easy to Assemble and Clean', 'Modern bar stool\nAdjustable height bar stool\nSwivel bar stool\nSleek bar furniture\nEasy to clean bar stool', 'Modern Bar Stool - Sleek Design, Adjustable Height, and Easy to Clean', 'Elevate your bar\'s ambiance with our modern bar stool. Enjoy ultimate flexibility with adjustable height and swivel functionality. Effortlessly assemble and clean this sleek bar furniture. Buy now and add comfort and style to your bar.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:11'),
(14, NULL, 'Outdoor', 'outdoor', 'Create Your Dream Outdoor Space with Our Versatile Furniture', 'Outdoor furniture\nComfortable seating\nDurable materials\nVersatile design\nPatio furniture\nRust-resistant\nAll-weather wicker\nEasy to clean\nPowder-coated aluminum\nStylish and elegant', 'Outdoor Set for Your Comfortable Outdoor Living | Modern Interior', 'Unwind in style with our versatile and durable outdoor set that provides ample seating for your family. Made with high-quality materials, our set is designed to withstand harsh weather conditions and enhance the beauty of your outdoor space. Order now and enjoy your outdoor living experience like never before.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:11'),
(15, NULL, 'Book shelves', 'book-shelves', 'With our customizable book shelves, you have the power to organize your life exactly the way you want it. You can create a truly unique and personalized book shelf that is tailored to your lifestyle.', 'book shelves\nbook storage\ndisplay shelves\nwall shelves\nhome organization\ncustomizable shelves\nwood shelves\nmetal shelves\ndurable shelves\nspace-saving shelves', 'Transform Your Space with Book Shelves: Stylish, Durable, and Customizable', 'Revamp your home with our high-quality book shelves. Choose from a variety of stylish designs and finishes to maximize your space and organize your life. Find durable shelves that last and customize your own for a unique touch. Order now and transform your space!', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:11'),
(16, NULL, 'Book cases', 'book-cases', 'Customizable Book Cases to Showcase Your Style', 'Book cases\nBook shelves\nCustomizable book cases\nErgonomic book cases\nStylish book cases\nHome organization\nStorage solutions\nHome décor\nReading nook\nHome library', 'Get Organized with Stylish Book Cases | 10% Off Today', 'Find the perfect book case to match your home décor and organize your space. Our high-quality, customizable, and ergonomic book cases make reading comfortable and enjoyable. Get 10% off your order today.', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:11'),
(17, NULL, 'linen Trunks ', 'linen-trunks', 'Create a Clutter-Free Home with Our Linen Trunks', 'Linen storage trunks\nDecorative storage solutions\nLinen fabric furniture\nHome organization\nDurable storage options\nEnvironmentally-friendly home decor', 'Buy Now and Get 20% off on Our Stylish Linen Trunks | Modern Interior ', 'Discover the ultimate storage solution for your home decor with our high-quality linen trunks. Stylish, durable, and environmentally-friendly, our trunks are the perfect combination of functionality and style. Order now and get 20% off your purchase!', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:11'),
(18, NULL, 'Chest of Drawers', 'chest-of-drawers', 'Keep Your Home Clutter-Free with Our Chest of Drawers', 'Chest of Drawers\nStorage Solution\nBedroom Storage\nLiving Room Storage\nDurable Design\nSpacious Drawers\nEasy to Use\nCompact Design\nNeutral Color\nStylish Furniture', 'Upgrade Your Storage Game with Our Chest of Drawers - Modern Interior ', 'Looking for a durable and stylish storage solution for your home? Look no further than our 5 drawer chest of drawers. With its spacious and easy-to-use design, this furniture piece is perfect for any room in your home. Shop now and upgrade your storage game!', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:11'),
(19, NULL, 'Stools & Pouffes ', 'stools-pouffes', '', '', '', '', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:11'),
(20, NULL, 'Chairs ', 'chairs', 'best chairs for all your sitting positions', '', '', '', 1, 0, '2023-03-23 06:47:11', '2023-03-23 06:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `logo`, `name`, `slug`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Modern Interior', NULL, 1, 0, NULL, NULL),
(2, NULL, 'Test', 'test', 1, 0, '2023-03-23 00:23:55', '2023-03-23 00:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `compares`
--

CREATE TABLE `compares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forgetpasswords`
--

CREATE TABLE `forgetpasswords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gsts`
--

CREATE TABLE `gsts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `function` varchar(255) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_04_07_104846_create_roles_table', 1),
(3, '2022_06_27_065932_create_users_table', 1),
(4, '2022_09_12_100710_create_logs_table', 1),
(5, '2023_02_15_184912_create_forgetpasswords_table', 1),
(6, '2023_02_15_184924_create_addresses_table', 1),
(7, '2023_02_15_184936_create_categories_table', 1),
(8, '2023_02_15_184947_create_products_table', 1),
(9, '2023_02_15_184959_create_gsts_table', 1),
(10, '2023_02_15_185020_create_colors_table', 1),
(11, '2023_02_15_185032_create_carts_table', 1),
(12, '2023_02_15_185040_create_wishlists_table', 1),
(13, '2023_02_15_185055_create_productcolors_table', 1),
(14, '2023_02_15_185124_create_transactions_table', 1),
(15, '2023_02_15_185144_create_orders_table', 1),
(16, '2023_02_19_140722_create_productimages_table', 2),
(17, '2023_02_20_123603_create_companies_table', 3),
(18, '2023_02_24_190708_create_compares_table', 4),
(19, '2023_02_27_183636_create_subcategories_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trxId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `discountedPrice` decimal(8,2) DEFAULT NULL,
  `gst` int(11) DEFAULT NULL,
  `deliveryCharge` int(11) DEFAULT NULL,
  `colorId` int(11) DEFAULT NULL,
  `colorName` varchar(255) DEFAULT NULL,
  `colorQuality` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcolors`
--

CREATE TABLE `productcolors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `colorId` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `subCategoryId` int(11) DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `mrp` decimal(8,2) DEFAULT NULL,
  `discountedPrice` decimal(8,2) DEFAULT NULL,
  `gst` int(11) DEFAULT NULL,
  `deliveryCharge` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `sizes` varchar(255) DEFAULT NULL,
  `warranty` int(11) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `metaKeywords` longtext DEFAULT NULL,
  `metaTitle` varchar(255) DEFAULT NULL,
  `metaDescription` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2023-02-16 19:49:39', '2023-02-16 19:49:39'),
(2, 'Manager', 'manager', '2023-02-16 19:49:39', '2023-02-16 19:49:39'),
(3, 'Customer', 'customer', '2023-02-16 19:50:06', '2023-02-16 19:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `metaKeywords` longtext DEFAULT NULL,
  `metaTitle` varchar(255) DEFAULT NULL,
  `metaDescription` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `image`, `categoryId`, `name`, `slug`, `description`, `metaKeywords`, `metaTitle`, `metaDescription`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Sectional Sofa ', 'sectional-sofa', 'Transform your living space with our modern sectional sofa. Sink into plush cushions and experience the perfect blend of style and comfort. Shop now and get 30% off.', 'Sectional Sofa, Modern Sectional Sofa, Plush Sectional Sofa, Comfortable Sectional Sofa, Versatile Sectional Sofa', 'Experience the Perfect Blend of Style and Comfort with Our Sectional Sofa | Modern Interior\'s', 'Whether you need a comfortable spot to entertain guests or a cozy place to snuggle up with your loved ones, our sectional sofa has got you covered.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(2, NULL, 1, 'Sofa cum bed ', 'sofa-cum-bed', 'Looking for a comfortable sofa and practical bed all in one? Our Sofa Cum Bed is the perfect solution! With its stylish design and easy-to-use mechanism, you can transform your living space in no time. Order now and enjoy the best of both worlds!', 'Sofa bed, Convertible sofa, Guest bed, Space-saving furniture, Dual-purpose sofa', 'Buy a Comfortable and Versatile Sofa cum bed | 10% Discount | Modern Interior\'s', 'Get a durable and convenient sofa cum bed that\'s perfect for hosting guests. Switch easily between a comfortable sofa and cozy bed. Buy now and get a 10% discount!', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(3, NULL, 1, 'Sofa set ', 'sofa-set', 'Experience the perfect combination of comfort and style with our high-quality and affordable sofa set. Designed to fit any home decor, this sofa set will provide you with hours of comfortable seating. Buy now and upgrade your living room!', 'Sofa set, Living room furniture, Comfortable sofa, Stylish furniture, Modern sofa, Plush cushions, Durable frame, Eye-catching design', 'Upgrade Your Living Space with Our Luxurious Sofa Set | Get Comfortable with Our Plush Cushions and Modern Design | Modern Interior\'s', 'Transform your home with our stylish and durable sofa set. Relax in comfort with our plush cushions and enjoy the eye-catching design. Shop now and elevate your living space with our high-quality sofa set.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(4, NULL, 4, '4 Seater ', '4-seater', 'We believe that quality is key when it comes to furniture, and that\'s why our 4 Seater Dining Set is crafted with only the finest materials. From the sturdy wooden frame to the soft, cushioned seats, every aspect of this dining set is designed to last. Whether you\'re using it for daily meals or special occasions, you can rest assured that this dining set will stand the test of time.', '4 seater dining set, dining set for small spaces, wooden dining set, easy to clean dining set, comfortable dining chairs, affordable dining furniture, stylish dining room decor', 'Upgrade Your Dining Space with Our 4 Seater Dining Set - Quality and Style Guaranteed', 'Enhance your home decor and enjoy comfortable meals with our 4 Seater Dining Set. Crafted with high-quality materials and designed for easy assembly and cleaning, this dining set is the perfect choice for families and small gatherings.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(5, NULL, 4, '6 Seater ', '6-seater', '', '', '', '', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(6, NULL, 4, '8 Seater ', '8-seater', '', '', '', '', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(7, NULL, 4, '2 Seater ', '2-seater', '', '', '', '', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(8, NULL, 5, 'Open Shoe Racks', 'open-shoe-racks', 'Our Open Shoe Racks are designed with your convenience in mind. The racks are easy to assemble and come with all the necessary hardware and tools you need to set them up. ', 'Shoe organization, Shoe storage, Shoe rack, Closet organization, Home organization, Space-saving solutions, Small apartment storage, Entryway storage, Stylish shoe rack, Durable shoe rack', 'Get Organized with Our Shoe Rack - Save Space and Keep Your Home Tidy', 'Say goodbye to cluttered closets and piles of shoes with our Shoe Rack. Keep your shoes organized and tidy with our stylish and durable shoe rack that saves space in your home. Get yours today!', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(9, NULL, 5, 'Shoe Rack & Seat', 'shoe-rack-seat', 'Organize your shoes in one place with our Shoe Rack & Seat. Made with high-quality materials, this shoe rack doubles as a comfortable seat, saving you time and space. Order now and upgrade your closet!', 'Shoe rack with seat, Shoe storage bench, Shoe organizer, Shoe holder, Shoe display rack,Shoe rack for small space, Shoe rack for closet, Shoe storage furniture', '', 'The Shoe Rack & Seat is not only functional, but it\'s also stylish. Its sleek and modern design complements any home decor, and its compact size makes it perfect for small spaces. This shoe rack is made from high-quality materials that are easy to clean and maintain, ensuring that it will look great for years to come.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(10, NULL, 5, 'Tilt Out Racks', 'tilt-out-racks', 'No more digging through piles of clutter to find what you need. Tilt Out Racks provide easy access to your items, saving you time and effort. With a simple tilt, you can see everything that\'s stored, making it easier to find what you need quickly. Plus, the racks are easy to install, so you can start organizing your space right away.', 'Tilt Out Racks, Storage solution, Organization, Easy access, Clutter-free, Versatile design, Durable, High-quality materials, Bedroom organization, Laundry room organization', 'Tilt Out Racks: Easy Access to Your Items', 'No more digging through piles of clutter to find what you need. Tilt Out Racks provide easy access to your items, saving you time and effort. With a simple tilt, you can see everything that\'s stored, making it easier to find what you need quickly. Plus, the racks are easy to install, so you can start organizing your space right away.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(11, NULL, 5, 'Shoe Cabinets', 'shoe-cabinets', 'Keep your shoes neat and organized with our stylish and functional shoe cabinets. Choose from a variety of colors and finishes, and enjoy long-lasting durability with our high-quality craftsmanship. Order now and save 20% on your purchase!', 'Shoe cabinets for home, Shoe storage solutions, Organize your shoe collection,Shoe rack for closet,Shoe cabinet furniture', 'Get Organized with Our Shoe Cabinets - Save 20% Today!', 'Keep your shoes neat and organized with our stylish and functional shoe cabinets. Choose from a variety of colors and finishes, and enjoy long-lasting durability with our high-quality craftsmanship. Order now and save 20% on your purchase!', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(12, NULL, 9, '1 Seater ', '1-seater', '', '', '', '', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(13, NULL, 9, '2 Seater ', '2-seater', '', '', '', '', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(14, NULL, 9, '3 Seater ', '3-seater', '', '', '', '', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(15, NULL, 9, 'Recliner Sets', 'recliner-sets', 'At our company, we\'re committed to providing our customers with the highest-quality products. That\'s why our recliner sets are made with only the finest materials, ensuring that they\'ll last for years to come. From sturdy frames to durable upholstery, our sets are built to withstand the rigors of daily use. And with a range of options to choose from, including power reclining and massage features, you can customize your set to fit your needs perfectly.', 'Recliner sets, Comfortable seating, Stylish recliners, Adjustable recliners, Lumbar support recliners, USB port recliners,Cup holder recliners,Health benefits of recliners,Affordable recliners, High-quality recliners', 'Experience Ultimate Relaxation with Our Amazing Recliner Sets', 'Upgrade your living space with our high-quality recliner sets. From plush cushioning to stylish design, our sets offer the ultimate in comfort and relaxation. Shop now and save up to 20%!', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(16, NULL, 11, 'Queen Size Beds', 'queen-size-beds', 'Experience the ultimate in comfort and style with our luxurious Queen Size Beds. Shop now and enjoy a 20% discount on your purchase. Invest in long-lasting quality and elevate your bedroom décor with our expertly crafted beds.', 'Metal bed frame, Modern bed design, Sturdy metal construction, Comfortable bed frame, Easy assembly bed, Simple maintenance bed,\n', 'Buy Our Modern Metal Bed - Get a Good Night\'s Sleep', 'Sleep in style and comfort with our high-quality metal bed. Sturdy, easy to assemble, and built to last, Order now and experience the ultimate in rest and relaxation.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(17, NULL, 11, 'King Size Beds', 'king-size-beds', 'Elevate your sleep experience with our collection of King Size Beds. Enjoy unbeatable comfort, durability, and style. Get 10% off and free shipping on all orders.', 'Metal bed frame, Modern bed design, Sturdy metal construction,Comfortable bed frame, Easy assembly bed, Simple maintenance bed\n', 'Buy Our Modern Metal Bed - Get a Good Night\'s Sleep', 'Sleep in style and comfort with our high-quality metal bed. Sturdy, easy to assemble, and built to last, Order now and experience the ultimate in rest and relaxation.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(18, NULL, 11, 'Single Beds', 'single-beds', 'Discover the benefits of single beds for a comfortable and space-saving sleeping solution. Shop our collection of high-quality, affordable single beds today and upgrade your bedroom with ease.', 'Metal bed frame, Modern bed design, Sturdy metal construction, Comfortable bed frame, Easy assembly bed, Simple maintenance bed\n', 'Buy Our Modern Metal Bed - Get a Good Night\'s Sleep', 'Sleep in style and comfort with our high-quality metal bed. Sturdy, easy to assemble, and built to last, Order now and experience the ultimate in rest and relaxation.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(19, NULL, 11, 'Poster Beds', 'poster-beds', 'Add timeless elegance, comfort, and unique style to your bedroom with our selection of poster beds. Choose from a variety of finishes and styles to find the perfect fit for your home. Shop now and transform your space today', 'Metal bed frame, Modern bed design, Sturdy metal construction, Comfortable bed frame, Easy assembly bed, Simple maintenance bed\n', 'Buy Our Modern Metal Bed - Get a Good Night\'s Sleep', 'Sleep in style and comfort with our high-quality metal bed. Sturdy, easy to assemble, and built to last, Order now and experience the ultimate in rest and relaxation.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(20, NULL, 11, 'Folding Beds', 'folding-beds', 'Our folding bed is designed with convenience in mind. It\'s easy to set up and take down, and you don\'t need any tools or special skills to do it. The bed is also lightweight, making it easy to move around and store.', 'Metal bed frame, Modern bed design, Sturdy metal construction, Comfortable bed frame, Easy assembly bed, Simple maintenance bed\n', 'Buy Our Modern Metal Bed - Get a Good Night\'s Sleep', 'Sleep in style and comfort with our high-quality metal bed. Sturdy, easy to assemble, and built to last, Order now and experience the ultimate in rest and relaxation.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(21, NULL, 14, 'Swings', 'swings', 'Create Your Dream Outdoor Space with Our Versatile Furniture', 'Outdoor Swings, Wooden Swings, Modern Swings, Durable Swings, Quality Swings, Safe Swings, Family Swings, Fun Swings, Affordable Swings, High-Quality Swings', 'Experience the Thrill of Flight with Our Selection of Swings | Buy Now!', 'Soar to new heights with our selection of high-quality swings! Crafted with care and built to last, our swings provide a safe and exhilarating outdoor activity for all ages. Invest in a swing today and create memories that will last a lifetime. Buy now and experience the thrill of flight!', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(22, NULL, 14, 'Hammocks', 'hammocks', 'Our Hammocks are not just for relaxation - they also make a great addition to your outdoor gear and equipment. Use them as a cozy bed for camping or hiking trips, a comfortable place to read a book, or even as a swing for your children.', 'Hammocks, Outdoor relaxation, Camping gear, Portable lounging, Durable design, Comfortable sleeping, Breathable fabric, Lightweight and compact, Versatile functionality', 'Find Relaxation and Comfort in Nature with Our Hammocks - Buy Now and Save 15%', 'Experience the ultimate in outdoor relaxation with our Hammocks. Made with durable materials and a comfortable design, our Hammocks are perfect for camping, hiking, or lounging in your backyard. Shop now and enjoy 15% off your purchase.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(23, NULL, 14, 'Tables', 'tables', 'Our side tables and console tables are sure to impress. From bedrooms to kitchens to outdoor spaces, our tables can enhance the functionality and aesthetic appeal of any room.', 'Dining tables, Coffee tables, Console tables, Side tables, Writing tables, Outdoor tables, Farmhouse tables,Glass-top tables, Rustic tables, Modern tables', 'Versatile Tables for Every Room', 'Find the perfect table for your home with our exquisite selection of dining tables, coffee tables, console tables, and more. Crafted from the finest materials, our tables are not only stylish but also highly functional. Shop now and elevate your home decor today.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(24, NULL, 14, 'Tables & Chair Sets', 'tables-chair-sets', '', '', '', '', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(25, NULL, 14, 'Seating', 'seating', '', '', '', '', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(26, NULL, 14, 'Plastic chair', 'plastic-chair', 'Our plastic chairs are not only stylish and durable, but also versatile. They can be used for a variety of purposes, including indoor and outdoor use. Whether you need extra seating for a party, a comfortable chair for your office, or a place to sit while you enjoy your morning coffee, our plastic chairs are the perfect choice.', 'Plastic Chair, Comfortable seating, Modern design, Eco-friendly, Recycled plastic, Affordable Sturdy and durable, Versatile, Lightweight and stackable, Indoor and outdoor use', 'Buy the Best Plastic Chair for Your Home or Office | Comfortable and Stylish', 'Upgrade your seating with our high-quality plastic chairs. With a modern design, comfortable seating, and durable construction, our chairs are perfect for any space. Shop now for affordable and stylish furniture', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(27, NULL, 12, 'Book shelves', 'book-shelves', ' No need to worry about complicated tools or confusing instructions – our book shelves can be set up in minutes, leaving you more time to enjoy your books and your newly organized space.', 'Book shelves for home, Modern book storage, Stylish book organization, Durable book shelves, Easy assembly shelves, Elegant book display, Sleek book storage, Practical home organization', 'Durable Storage for Your Book Collection', ' No need to worry about complicated tools or confusing instructions – our book shelves can be set up in minutes, leaving you more time to enjoy your books and your newly organized space.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(28, NULL, 12, 'Book cases', 'book-cases', 'Our bookcase is built to last. Made from high-quality materials and constructed with precision, this bookcase is sturdy and durable. The shelves are designed to withstand the weight of your heaviest books, and the entire structure is engineered to maintain its shape and stability over time. With our bookcase, you won\'t have to worry about sagging shelves or wobbly legs.', 'Bookcase, Shelving, Storage solution, Home organization, Room deco, Furniture, High-quality, Durable, Versatile, Customizable, Adjustable shelves, Finish options', 'Customizable Bookcases to Fit Any Space and Style', 'Our bookcase is built to last. Made from high-quality materials and constructed with precision, this bookcase is sturdy and durable. The shelves are designed to withstand the weight of your heaviest books, and the entire structure is engineered to maintain its shape and stability over time. With our bookcase, you won\'t have to worry about sagging shelves or wobbly legs.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(29, NULL, 12, 'Office Chair ', 'office-chair', 'Experience ultimate comfort and improve your posture with our Ergonomic Office Chair. Choose from a variety of colors and enjoy the sleek and modern design. Invest in your health today and enjoy our 5 star rated chair.', 'stylish design, modern office chair, black mesh backrest, color options, complement office décor, professional environment, upgrade workspace', 'Ergonomic Office Chair - Improve Posture and Comfort | 5 Star Rating', 'Experience ultimate comfort and improve your posture with our Ergonomic Office Chair. Choose from a variety of colors and enjoy the sleek and modern design. Invest in your health today and enjoy our 5 star rated chair.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(30, NULL, 12, 'Office Tables', 'office-tables', 'Our office tables are versatile and can be used for a variety of purposes. Whether you need a workspace for your home office, a conference table for your meeting room, or a table for your reception area, our tables are designed to meet all your needs. With a simple and modern design, our tables can match any décor, and can be used for both formal and casual settings', 'Office tables\nWorkspace tables\nModern office furniture\nHome office tables\nMeeting room tables\nReception area tables\nPremium quality tables\nSturdy tables\nEasy-to-assemble tables\nVersatile tables', 'Get Inspired with Our Office Tables', 'Create a comfortable and productive workspace with our high-quality office tables. Versatile design, premium materials, and sturdy construction - 10% off for a limited time. Order now!', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(31, NULL, 12, 'Office Cabinets ', 'office-cabinets', 'Our office cabinets are built to last. Made from sturdy materials, our cabinets are designed to withstand the wear and tear of daily use. They\'re also equipped with locking mechanisms to ensure the security of your valuable documents and equipment. You can rest easy knowing that your office items are safe and secure in our high-quality cabinets.', 'Office cabinets, Storage solutions, Workspace organization, Office supplies, File storage, Equipment storage, Locking cabinets, Durable cabinets, Stylish cabinets, Compact cabinets', 'Say Goodbye to Cluttered Desks with Our High-Quality Office Cabinets', 'Keep your office organized with our high-quality cabinets. Maximize space, security, and style with a range of designs to choose from. Buy now from Modern Interior.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(32, NULL, 12, 'Arm Chairs', 'arm-chairs', 'Investing in an arm chair is an investment in your comfort and well-being. That\'s why we use only the highest quality materials to construct our chairs. From the frame to the fabric, every element of our chairs is carefully selected and crafted for durability and longevity. You can trust that your chair will look and feel great for years to come, no matter how often you use it.', 'Experience Ultimate Comfort with our Arm Chairs, Invest in Quality and Durability with our Arm Chairs, Discover Versatility and Functionality with our Arm Chairs, Elevate Your Space with Our Arm Chairs, Find Your Perfect Fit with Our Arm Chairs', 'Invest in Quality and Durability with our Arm Chairs', 'Experience the ultimate in comfort and style with our selection of arm chairs. Our high-quality, durable designs are customizable and versatile, making them the perfect fit for any space. Invest in your comfort and elevate your space with our arm chairs today.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(33, NULL, 12, 'Rocking Chairs', 'rocking-chairs', 'Our rocking chairs come in a variety of stylish and functional designs that can fit any home decor. Whether you are looking for a traditional wooden rocking chair, a sleek and modern one, or even an outdoor rocking chair, we have it all. Our chairs are crafted with the finest materials to ensure maximum durability and longevity, making them a wise investment for any home.', 'Rocking chairs for sale, Comfortable rocking chairs, Wooden rocking chairs, Outdoor rocking chairs, Modern rocking chairs, Stylish rocking chairs, Bonding rocking chairs,', 'Your Perfect Relaxation Companion', 'Indulge in ultimate relaxation and bonding moments with our stylish and comfortable rocking chairs. Shop our collection of wooden, outdoor, and modern rocking chairs for sale.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(34, NULL, 12, 'Folding Chairs', 'folding-chairs', 'Looking for the ultimate folding chair? Our comfortable, durable, and portable folding chairs are perfect for any occasion. Shop now and save 20% on your purchase!', 'Folding Chairs - Comfortable Seating Anywhere, Sturdy and Durable, Folding Chairs, Easy to Store and Transport Folding Chair, Portable and Comfortable Folding Chairs, Reliable Folding Chairs for Any Occasion', 'Folding Chairs - Comfortable Seating Anywhere', 'Looking for the ultimate folding chair? Our comfortable, durable, and portable folding chairs are perfect for any occasion. Shop now and save 20% on your purchase!', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(35, NULL, 12, 'Iconic Chairs', 'iconic-chairs', 'Elevate your home decor with Iconic Chairs. Choose from a wide range of stylish and comfortable chairs, designed to provide maximum durability and functionality. Shop now and discover the perfect combination of style and comfort.', 'Iconic chairs, Mid-century modern chairs, , Comfortable chairs, Stylish chairs, Home office chairs, Living room chairs, Bedroom chairs, Durable chairs, Versatile chairs, Contemporary chairs', '3 Reasons to Choose Iconic Chairs - Style, Comfort, and Versatility', 'Elevate your home decor with Iconic Chairs. Choose from a wide range of stylish and comfortable chairs, designed to provide maximum durability and functionality. Shop now and discover the perfect combination of style and comfort.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(36, NULL, 12, 'Cafe Chairs', 'cafe-chairs', 'We understand that price and convenience are also important factors when making a purchase. That\'s why we offer these Cafe Chairs at a very reasonable price point without compromising on quality. Additionally, they are lightweight and easy to assemble, making them perfect for those who are always on-the-go. You can now add a touch of sophistication to your space without breaking the bank or dealing with complicated assembly instructions.', 'Cafe Chairs, Comfortable Seating, Stylish Furniture, Versatile Design, Affordable Dining Chairs, Durable Metal Frame, Lightweight and Portable, Ergonomic Design, Sophisticated Decor, Easy Assembly', 'Buy the Best Cafe Chairs Online | Get Comfortable, Stylish and Affordable Cafe Chairs', 'Looking for comfortable, durable, and stylish Cafe Chairs? Look no further than our online store! Shop now for the best deals on high-quality chairs that will elevate your space.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(37, NULL, 10, 'Kitchen unit ', 'kitchen-unit', ' Maximize storage space in your kitchen with our stylish and functional Kitchen Unit. Easy to assemble and maintain, our durable kitchen furniture will elevate your kitchen\'s look. Order now and get organized!', 'Kitchen unit,\nKitchen storage,\nKitchen organization,\nKitchen furniture,\nKitchen decor,', 'Upgrade Your Kitchen Storage with Our Stylish Kitchen Units - Save 20% Today', 'Get organized and upgrade your kitchen with our stylish and functional kitchen units. Enjoy ample storage, easy assembly, and durable design. Shop now and save 20%!', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(38, NULL, 7, '1 Door', '1-door', '', 'Wardrobe,\nStorage solution,\nClothing organization,\nDurable design,\nStylish addition,\nEasy assembly,\nStress-free experience,\nHome decor,\nSpacious storage,\nLong-lasting storage,', '3-in-1 Wardrobe: Organize, Elevate, and Simplify Your Life', 'Maximize your storage space, elevate your home decor, and enjoy hassle-free assembly with our wardrobe. Get organized with a spacious, durable, and stylish storage solution.', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(39, NULL, 7, '2 Door', '2-door', '', '', '', '', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(40, NULL, 7, '3 Door', '3-door', '', '', '', '', 1, 0, '2023-03-23 06:50:35', '2023-03-23 08:03:29'),
(41, NULL, 7, '4 Door', '4-door', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:29'),
(42, NULL, 7, '4+ Doors', '4-doors', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:29'),
(43, NULL, 7, 'Sliding Door', 'sliding-door', ' Unlike traditional hinged doors that swing open and take up valuable floor space, a sliding door glides along a track, leaving more room for furniture and other items. Plus, with its smooth operation and noise reduction, it\'s ideal for bedrooms, bathrooms, and other areas where privacy is important. Choose a frosted glass option for added privacy without sacrificing natural light.', 'Sliding doors for home interior,\nSpace-saving sliding doors\nModern sliding door designs\nGlass sliding doors\nConvenient sliding doors', 'Elevate Your Home with a Modern Sliding Door | Choose from a Variety of Finishes and Sizes', 'Say Goodbye to Hassle with a Sleek and Stylish Sliding Door | Shop Now and Maximize Space and Functionality | Available in Frosted Glass and More.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:29'),
(44, NULL, 3, 'Centre Tables', 'centre-tables', 'Our modern centre table is the perfect addition. With its sleek design and contemporary style, it will instantly transform your space. The table features a spacious top that provides ample room for drinks, snacks, and decorative items. It\'s also crafted from high-quality materials, ensuring it will last for years to come. The modern design of the table will complement any living room decor, making it a great investment for any home.', 'Centre tables\nLiving room furniture\nCoffee tables\nContemporary tables\nModern tables\nStylish furniture\nFunctional furniture\nHome decor\nLiving room decor\nFurniture investment', 'Upgrade Your Living Room with Our Stylish Centre Tables | Buy Now and Save 10%', 'Enhance your living space with our stylish and functional centre tables. Crafted from high-quality materials, our modern tables will complement any decor. Buy now and save 10% on your purchase.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(45, NULL, 3, 'Coffee Tables', 'coffee-tables', 'Elevate your living room decor with our modern coffee tables. Choose from our versatile and functional designs, made of high-quality materials that are durable and long-lasting. Shop now and invest in your home\'s future.', 'Coffee Tables\nLiving Room Decor\nStylish Furniture\nHome Decor\nVersatile Tables\nStorage Options\nDurable Materials\nLong-lasting Investment\nModern Designs\nFunctional Furniture', 'Functionality Meets Style with Our Coffee Tables', 'Elevate your living room decor with our modern coffee tables. Choose from our versatile and functional designs, made of high-quality materials that are durable and long-lasting. Shop now and invest in your home\'s future.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(46, NULL, 3, 'Coffee Table Set', 'coffee-table-set', 'Our Coffee Table Set is easy to assemble, and the process can be completed in just a few simple steps. Additionally, the set is designed to be low maintenance and requires minimal effort to keep clean. Simply wipe it down with a damp cloth, and it will look as good as new.', 'Coffee table set\nLiving room furniture\nMulti-functional tables\nSleek design\nSturdy construction\nEasy assembly\nLow maintenance\nVersatile furniture', 'Elevate Your Living Space with Our 3-Piece Coffee Table Set | Sturdy and Versatile', 'Upgrade your living room with our 3-piece Coffee Table Set. Stylish, durable, and versatile, our set is designed to enhance your space with easy assembly and low maintenance. Shop now and elevate your living space today.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(47, NULL, 3, ' Nesting Tables', 'nesting-tables', 'Our Nesting Tables come in a variety of styles and finishes to match your personal taste and home decor. From classic and traditional to modern and contemporary, you\'re sure to find a set that suits your style. Some of our popular styles include rustic, industrial, mid-century, and Scandinavian. The finishes range from natural wood, black, white, gold, and more. With our Nesting Tables, you\'ll not only add functionality to your space, but also enhance its aesthetic appeal.', 'nesting tables\nspace-saving furniture\nversatile tables\nfunctional decor\nmodern side tables\nstylish coffee tables\ndurable furniture\nquality materials\nhome decor\nliving room furniture', 'Transform Your Space with Nesting Tables - Shop Now', 'Maximize your space and elevate your home decor with our versatile and stylish Nesting Tables. Crafted with high-quality materials and designed to save space, these durable tables come in a variety of styles and finishes. Shop now and transform your space!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(48, NULL, 19, 'Foot Stools', 'foot-stools', 'Our Foot Stools come in a variety of colors and styles, allowing you to choose the perfect one to match your home décor. Whether you\'re looking for a traditional or modern look, our Foot Stools have you covered. Additionally, our Foot Stools are versatile enough to be used as an extra seat or even a small table. Add a Foot Stool to your living room or bedroom for an instant style upgrade.', 'Foot Stools\nComfortable Foot Rest\nStylish Furniture\nVersatile Home Décor\nFunctional Space-Saving Furniture\nSmall Foot Stools with Storage', 'Buy Foot Stools Online - Elevate Your Comfort and Style | Modern Interior', 'Upgrade your living space with our comfortable and stylish Foot Stools. Find the perfect one to match your home décor and enjoy the functional and space-saving design. Buy now and elevate your comfort and style with Modern Interiors.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(49, NULL, 19, 'Seating Stools', 'seating-stools', 'There are many benefits to using Seating Stools. Not only are they comfortable and stylish, but they are also versatile and can be used in a variety of settings. Our Seating Stools are also easy to move around, making them perfect for impromptu seating arrangements. In addition, our stools are easy to clean and maintain, making them a practical choice for busy households and offices.', 'Seating Stools\nComfortable Seating\nVersatile Seating\nModern Seating\nStylish Seating\nSleek Seating\nHome Seating\nOffice Seating\nContemporary Seating\nFunctional Seating\nPractical Seating', '5 Reasons to Choose Our Comfortable and Stylish Seating Stools', 'Upgrade your home or office seating with our versatile and modern Seating Stools. Discover the benefits of our comfortable and stylish stools and find the perfect match for your decor.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(50, NULL, 19, 'Pouffes', 'pouffes', 'There\'s nothing quite like sinking into a soft and cozy pouffe at the end of a long day. With their plush and comfortable texture, pouffes provide the ultimate relaxation experience. Whether you\'re curling up with a book, watching TV, or simply taking a nap, pouffes offer the perfect spot to unwind and get comfortable.', 'Pouffes\nFootrests\nDecorative Accents\nStylish Seating\nMultifunctional Furniture\nCozy Home Decor\nComfortable Seating\nSoft Seating Options\nLiving Room Furniture\nBedroom Accessories', '\"Get Cozy and Stylish with Pouffes - The Ultimate Multifunctional Furniture | Modern interiors\"', 'Discover the versatility and style of pouffes - the perfect addition to any room in your home. With a range of colors and fabrics to choose from, these multifunctional pieces of furniture provide the ultimate comfort and style. Shop now at Modern Interiors.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(51, NULL, 20, 'Gaming Chairs ', 'gaming-chairs', 'Our gaming chairs are made with the highest quality materials to ensure durability and longevity. The sturdy metal frame and heavy-duty base can support up to 300 lbs, making our chairs suitable for all body types. The premium PU leather is wear-resistant and easy to clean, ensuring your chair looks as good as new even after years of use. Our gaming chairs are rigorously tested to meet the highest standards of quality and safety, so you can be confident in your investment.', 'Gaming Chairs\nErgonomic Gaming Chairs\nComfortable Gaming Chairs\nPremium Gaming Chairs\nRacing Style Gaming Chairs', 'Buy the Best Gaming Chairs - Ultimate Comfort and Style | Modern Interior', 'Upgrade your gaming setup with our premium gaming chairs. Our gaming chairs provide unbeatable comfort and style, perfect for extended gaming sessions. Buy now and get free shipping.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(52, NULL, 3, 'Dressing table', 'dressing-table', 'If you\'re looking for stylish and modern seating options, our Seating Stools are the perfect choice. With a sleek and minimalist design, our stools are perfect for any contemporary home or office. Available in a variety of colors and finishes, you can easily find the perfect match for your decor. Our Seating Stools are not only stylish, but also functional, making them the perfect addition to any space.', 'dressing table,\nvanity table,\nmakeup storage,\nbeauty essentials organizer,\nbedroom decor,\nself-care routine,\nHollywood vanity,\nmakeup station,\nbeauty supplies storage,\nhair and makeup station,', 'Shop now and organize your beauty essentials with our Dressing Table – 30% off', 'Transform your beauty routine and add a touch of luxury to your space with our elegant Dressing Table. Get 30% off today and keep your beauty essentials organized and easily accessible.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(53, NULL, 3, 'Dressers', 'dressers', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(54, NULL, 3, 'Dressing Cabinets', 'dressing-cabinets', 'Investing in a dressing cabinet is investing in yourself. Our dressing cabinets are made with high-quality materials and designed to withstand the test of time. With ample storage space, you\'ll have plenty of room to store your clothing, shoes, and accessories. Plus, the added benefit of a mirror will save you time and make your morning routine more efficient. By choosing a dressing cabinet, you\'re investing in your wardrobe and creating a space that reflects your style and personality.', 'Dressing cabinets\nWardrobe organization\nClothing storage\nBedroom storage\nHigh-quality cabinets\nStyle and functionality\nEfficient morning routine\nSleek design', 'Transform Your Wardrobe Organization with Dressing Cabinets | Shop Now', 'Upgrade your bedroom with our high-quality dressing cabinets. Organize your wardrobe and create effortless style with ample storage space and sleek design. Shop now and invest in your wardrobe organization.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(55, NULL, 3, 'Dressing Units', 'dressing-units', 'If you\'re tired of having clothes and shoes scattered all over your bedroom, a dressing unit is the perfect solution. With its multiple compartments and storage options, you can easily keep your wardrobe organized and accessible. Say goodbye to cluttered floors and overflowing closets and hello to a clean and stylish bedroom.', 'Dressing Units\nWardrobe Storage\nBedroom Organization\nStylish Furniture\nClutter-free Living', 'Discover the Power of Organization with Our Stylish Dressing Units - Get Yours Now!', 'Say goodbye to clutter and hello to style with our sleek and practical dressing units. From ample storage space to modern design, discover why our units are the ultimate solution for your bedroom organization needs. Order now and transform your home!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(56, NULL, 1, 'Sofa Chairs', 'sofa-chairs', 'Our Sofa Chairs are made with high-quality materials that are built to last. From the sturdy frame to the durable upholstery, these chairs are designed to withstand the wear and tear of daily use. With proper care, our Sofa Chairs will look and feel great for years to come.', 'Sofa chairs\nComfortable seating\nStylish furniture\nHome decor\nRelaxation furniture\nDurable upholstery', '\"Discover the Ultimate Comfort of Sofa Chairs - Perfect for Your Home', 'Upgrade your seating with our Sofa Chairs - comfortable, stylish, and built to last. Choose from a variety of colors and materials to match your decor. Experience ultimate relaxation with our Sofa Chairs - order yours today!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(57, NULL, 1, 'Wing Chairs', 'wing-chairs', 'Our Wing Chairs are not only comfortable but also stylish. They come in a range of colors and patterns that can complement any home decor style. Whether you want a classic or modern look, our Wing Chairs have got you covered. With their sleek and elegant design, they can add a touch of sophistication to any living room or bedroom.', 'Wing Chairs for sale\nComfortable Wing Chairs\nWing Chairs with armrests\nStylish Wing Chairs\nHigh-quality Wing Chairs', 'Find Your Perfect Wing Chair: Comfort and Style Combined | Wing Chairs', 'Our Wing Chairs are not only comfortable but also stylish. They come in a range of colors and patterns that can complement any home decor style. Whether you want a classic or modern look, our Wing Chairs have got you covered. With their sleek and elegant design, they can add a touch of sophistication to any living room or bedroom.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(58, NULL, 1, 'Lounge Chairs', 'lounge-chairs', 'With more and more people working from home, having a comfortable and ergonomic workspace is essential. Our lounge chairs provide the perfect solution for those looking to create a comfortable and stylish workspace. Our chairs are designed to support proper posture and reduce strain on your back, neck, and shoulders. With a variety of styles to choose from, including adjustable heights, swivel bases, and even built-in laptop stands, our lounge chairs are the perfect addition to any home office or workspace.', 'Lounge chairs\nComfortable seating\nErgonomic design\nStylish furniture\nHome office chairs\nRelaxation\nComfortable living room furniture\nErgonomic workspace\nReclining chairs\nSwivel chairs', 'Relax in Style with Our Comfortable Lounge Chairs | Modern Interior', 'Unwind in the ultimate comfort with our stylish lounge chairs for any occasion. Discover our collection of high-quality lounge chairs, designed for relaxation, workspaces, and more. Shop now and elevate your space with Modern Interiors lounge chairs.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(59, NULL, 1, 'Slipper Chairs', 'slipper-chairs', 'In addition to being comfortable and stylish, slipper chairs are also a functional addition to any room. They can be used as a versatile seating option, whether you need an extra chair for guests or a spot to read a book. Their smaller size also makes them a great option for a desk chair or even as a vanity seat. With their versatile design and functionality, slipper chairs are a smart investment for any home.', 'Slipper chairs\nComfortable seating\nStylish furniture\nLiving room decor\nSmall space furniture\nAccent chairs\nVersatile seating\nPop of color\nStatement piece\nFunctional furniture', '3 Reasons to Buy Slipper Chairs for Your Living Room - Comfortable, Stylish, and Versatile', 'Upgrade your living room decor with slipper chairs - comfortable, stylish, and versatile. Choose from a wide range of colors, patterns, and fabrics to add a functional and eye-catching accent piece to your home.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(60, NULL, 1, 'Barrel Chairs', 'barrel-chairs', ' Our barrel chairs offer ultimate relaxation and style. Choose from a variety of colors and patterns to match your home decor. Get 10% off your purchase today.', 'Barrel Chairs\nComfy chairs\nLiving room furniture\nHome decor\nReading chairs\nVersatile chairs\nStylish furniture', 'Find Comfort and Style with Our Barrel Chairs - Save 10% Today', 'Our barrel chairs are not just limited to your living room. They can be used in a variety of settings, including your bedroom, home office, or even a cozy reading nook. The compact size of the chair makes it easy to move from room to room, and the sturdy construction ensures it will last for years to come.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(61, NULL, 20, 'Relax chair ', 'relax-chair', 'Discover the ultimate in comfort and relaxation with our premium relax chair. With ergonomic design, adjustable settings, and stylish features, our chair is the perfect addition to your home decor. Shop now and experience the ultimate in relaxation.', 'Relax Chair,\nComfortable Chair,\nRecliner Chair,\nErgonomic Chair,\nHealth Benefits of Sitting,\nHome Decor Furniture,\nStylish Recliner,\nBack Pain Relief,\nStress Reduction,\nCirculation Improvement,', 'Relax in Style with Our Premium Relax Chair | Find Relief from Back Pain and Stress', 'Indulge in the ultimate relaxation experience with our Relax Chair. Enjoy ergonomic support, customizable settings, and health benefits including relief from back pain and stress. Elevate your home decor with our stylish chair today !!!.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(62, NULL, 3, 'Side Tables', 'side-tables', 'Upgrade your home décor with our modern and stylish side tables. These versatile and durable tables are perfect for any room, making them a smart investment for any homeowner. Shop our collection today and elevate your space!', 'Modern Side Tables\nSleek and Stylish Side Tables\nFunctional Side Tables for Any Room\nDurable and Long-Lasting Tables\nVersatile Side Tables for Every Need', 'Add Long-Lasting Style to Your Home', 'Upgrade your home décor with our modern and stylish side tables. These versatile and durable tables are perfect for any room, making them a smart investment for any homeowner. Shop our collection today and elevate your space!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(63, NULL, 3, 'End Tables ', 'end-tables', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(64, NULL, 3, 'C Shaped Tables', 'c-shaped-tables', 'Discover the versatility, style, and convenience of the C Shaped Table. Perfect for small living spaces, this table is a space-saving solution that offers height-adjustable design, sturdy metal frame, and easy-to-clean surface. Get creative with your home decor and buy the C Shaped Table today!', 'C Shaped Table\nSpace-Saving Table\nSide Table\nSofa Table\nLaptop Desk\nSnack Tray\nSmall Living Room Table\nHeight-Adjustable Table\nMetal Frame Table\nModern Table', '3 Reasons Why the C Shaped Table is Perfect for Small Spaces - Buy Now!', 'Discover the versatility, style, and convenience of the C Shaped Table. Perfect for small living spaces, this table is a space-saving solution that offers height-adjustable design, sturdy metal frame, and easy-to-clean surface. Get creative with your home decor and buy the C Shaped Table today!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(65, NULL, 3, 'Console Tables ', 'console-tables', 'A console table is more than just a piece of furniture; it can help create a warm and inviting atmosphere in your home. our console tables are the perfect choice. With their timeless designs and high-quality materials, they are sure to impress your guests and make your home feel more inviting.', 'Console Tables for Living Room\nHigh-Quality Console Tables\nStylish Console Tables\nSmall Console Tables\nEntryway Console Tables', 'Shop the Best Console Tables for Your Home | Up to 50% Off Today!', 'Elevate your space with our stylish and practical console tables. Choose from a variety of high-quality finishes and styles. Perfect for storing everyday essentials and creating a warm and inviting atmosphere. Shop now and save up to 50% off today!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(66, NULL, 3, 'Nest of Tables', 'nest-of-tables', 'Our Nest of Tables is the perfect solution. Designed with a chic and contemporary style, these tables will instantly elevate the look of any room. Use them to create a stunning focal point in your living room or bedroom, or simply use them as an extra surface area for your everyday needs.', 'Stylish Nest of Tables Set\nSpace-Saving Nest of Tables\nVersatile and Chic Table Set\nThree Tables in One\nModern Nesting Tables', '3-in-1 Nest of Tables Set - Space-Saving, Stylish, and Versatile', 'Maximize your space with our Nest of Tables set - 3 stylish and durable tables that fit together perfectly, perfect for any room in your home. Shop now for a space-saving solution.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(67, NULL, 13, 'Bar Cabinets', 'bar-cabinets', 'One of the key benefits of our bar cabinets is their ability to keep your spirits organized and accessible. With multiple shelves and compartments, you can easily store your favorite liquors, wines, and mixers, making it easy to mix up a drink whenever you please.', 'Bar storage cabinets\nWine cabinets for home\nHome bar furniture\nLiquor cabinet furniture\nGlass bar cabinet', 'Find Your Perfect Bar Cabinet Here', 'Our bar cabinets are expertly crafted with both style and functionality in mind, featuring ample storage space, convenient features, and a range of materials and styles to suit your space. Find your perfect design here and elevate your home decor today.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(68, NULL, 13, 'Bar Trolleys', 'bar-trolleys', 'Shop our elegant bar trolleys for your home today. Perfect for entertaining, our versatile and durable designs are a stylish addition to any room. Buy now and impress your guests.', 'Bar cart\nServing cart\nDrinks trolley\nRolling bar\nPortable bar', 'Buy Bar Trolleys Online - Serve Drinks in Style | Modern Interior', 'Shop our elegant bar trolleys for your home today. Perfect for entertaining, our versatile and durable designs are a stylish addition to any room. Buy now and impress your guests.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(69, NULL, 13, 'Bar Stools', 'bar-stools', 'Our bar stools are not just for home bars – they can be used in a variety of settings! Use them in your kitchen or dining room for extra seating, or place them in your office for a stylish touch. Our bar stools are versatile enough to fit in any setting, making them an excellent addition to any home or office.', 'Bar Stools\nHome Bar\nKitchen Seating\nDining Room Seating\nOffice Seating\nStylish Seating\nComfortable Seating\nUpholstered Bar Stools\nMetal Bar Stools\nWooden Bar Stools', 'Comfortable and Stylish Bar Stools', 'Elevate your home bar with our collection of stylish and comfortable bar stools. Choose from a range of high-quality materials and versatile designs. Shop now for the perfect addition to your home bar.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(70, NULL, 13, 'Bar Table Sets', 'bar-table-sets', 'Upgrade your home bar or entertainment area with our stylish and functional bar table sets. Choose from a range of designs to suit any style and enjoy the perfect space for entertaining guests and everyday use. Shop now for the best selection.', 'Bar table sets\nHome bar furniture\nCounter height table and chairs\nPub table sets\nSmall bar table and stools', 'Create a Perfect Entertaining Space with Our Bar Table Sets', 'Upgrade your home bar or entertainment area with our stylish and functional bar table sets. Choose from a range of designs to suit any style and enjoy the perfect space for entertaining guests and everyday use. Shop now for the best selection.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(71, NULL, 3, 'Writing table', 'writing-table', 'Transform your workspace with the Writing table. Get an elegant & functional desk for your home office or study space. Buy now and enjoy free shipping.', 'Study table,\nErgonomic design,\nComfortable workspace,\nDurable construction,\nModern aesthetic,\nVersatile use,\nSpacious surface,\nHeight adjustment,\nPersonal style,', 'Buy Our Study Table and Get 20% Off - Limited Time Offer', 'Upgrade your study room with our comfortable and stylish study table. Get your work done in style with an ergonomic design, durable construction, and spacious surface. Buy now and get 20% off - Limited time offer!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30');
INSERT INTO `subcategories` (`id`, `image`, `categoryId`, `name`, `slug`, `description`, `metaKeywords`, `metaTitle`, `metaDescription`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(72, NULL, 3, 'Computer Tables', 'computer-tables', 'Find the perfect computer table for your home office and maximize your productivity with our ergonomically designed and affordable workstations. Choose from modern, rustic, and vintage-inspired designs. Shop now and experience comfort and style.', 'computer tables\nhome office furniture\nergonomic desks\nadjustable height tables\naffordable workstations\nmodern desk designs\nrustic office furniture\nvintage-inspired computer tables\ncomfortable workspaces', 'Upgrade Your Home Office with Sturdy and Stylish Computer Tables | Shop Now', 'Find the perfect computer table for your home office and maximize your productivity with our ergonomically designed and affordable workstations. Choose from modern, rustic, and vintage-inspired designs. Shop now and experience comfort and style.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(73, NULL, 3, 'Hutch Desk', 'hutch-desk', 'Experience comfort and style with our high-quality hutch desks. Stay productive with ergonomic design and ample storage. Shop our durable and elegant desks now.', 'Hutch desk\nHome office desk\nErgonomic desk\nWorkspace organization\nHeight adjustable desk\nModern desk design\nSturdy desk construction\nOffice furniture\nPremium wood desk\nDurable desk materials', 'Boost Your Productivity with Our Modern Hutch Desks - Shop Now!', 'Experience comfort and style with our high-quality hutch desks. Stay productive with ergonomic design and ample storage. Shop our durable and elegant desks now.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(74, NULL, 3, 'Foldable Tables ', 'foldable-tables', 'Looking for a sturdy and stylish table that won\'t take up too much space? Our foldable tables are the perfect solution! With their compact design and versatile functionality, you\'ll be able to create a workspace or dining area anywhere you need it. Shop now and upgrade your home with our space-saving tables.', 'Foldable tables\nSpace-saving tables\nCompact tables\nPortable tables\nDurable tables\nStylish tables\nVersatile tables\nConvenient tables\nIndoor/outdoor tables\nFolding tables', 'Foldable Tables - Save Space and Maximize Convenience | Modern Interiors', 'Looking for a sturdy and stylish table that won\'t take up too much space? Our foldable tables are the perfect solution! With their compact design and versatile functionality, you\'ll be able to create a workspace or dining area anywhere you need it. Shop now and upgrade your home with our space-saving tables.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(75, NULL, 3, 'Wall mounted', 'wall-mounted', 'Whether you\'re looking to organize your garage, kitchen, or office, a wall mounted product can help you achieve a clutter-free and functional space. Our wall mounted product is durable and easy to install, making it the perfect solution for any room.', 'Wall mounted product\nClutter-free\nSpace-saving\nFunctional\nDurable\nEasy to install\nStylish\nModern\nVersatile\nChic\nSafe\nOrganized\nProductive\nWorkspace\nSupplies\nEfficient', 'Maximize Your Space with Our Wall Mounted Product | Buy Now and Save 20%', 'Get organized and create a clutter-free workspace with our wall mounted product. With a sleek and modern design, this versatile product will complement any décor style. Order now and save 20%!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(76, NULL, 3, 'Portable Tables', 'portable-tables', 'Take the comfort of home with you wherever you go with our portable tables. Versatile, practical, and built to last, these tables are the perfect investment for outdoor enthusiasts. Buy now and enjoy the great outdoors!', 'Portable Tables\nOutdoor Tables\nCamping Tables\nFolding Tables\nLightweight Tables', 'Portable Tables for On-The-Go Comfort | Buy Now and Enjoy the Outdoors', 'Take the comfort of home with you wherever you go with our portable tables. Versatile, practical, and built to last, these tables are the perfect investment for outdoor enthusiasts. Buy now and enjoy the great outdoors!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(77, NULL, 20, 'Dining chair', 'dining-chair', 'Enhance your home dining experience with our comfortable and stylish Dinning Chair. Made with premium materials and easy to clean upholstery, our modern and versatile chair will impress your guests and elevate your dining room decor. Order now for a more enjoyable mealtime experience.', 'Dining chair,\nComfortable chair,\nStylish seating,\nModern design,\nUpholstered chair,\nDurable furniture,\nVersatile seating,\nErgonomic chair,\nWooden frame,\nPlush cushioning,', 'Buy Our Comfortable and Stylish Dining Chair - Get 10% Off Today', 'Upgrade your dining space with our luxurious and durable dining chair. Our chair is both comfortable and stylish, and can fit any space and style. Order today and get 10% off your purchase.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(78, NULL, 3, 'Tea table ', 'tea-table', 'Our tea table is more than just a piece of furniture. It\'s a gateway to a world of tea culture and traditions, allowing you to experience the joy of tea time like never before.', 'Tea table,\nLiving room furniture,\nCoffee table,\nSide table,\nModern design,\nWood furniture,\nHome decor,\nTea time accessories,\nMulti-functional furniture,\nVersatile furniture,', 'Upgrade Your Home Decor with Our Stylish Tea Table - Shop Now', 'Experience the perfect tea time with our exquisite tea table. Made with high-quality wood, our versatile tea table is the perfect addition to any modern home. Shop now and transform your living room with our multi-functional furniture.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(79, NULL, 3, 'Dining Tables', 'dining-tables', '\"Experience unmatched quality and value with our selection of dining tables. From traditional to modern, our tables are perfect for any home. Shop now and save up to 20% off your purchase!', 'Dining tables for sale\nBuy dining tables online\nElegant dining tables\nAffordable dining tables\nHigh-quality dining tables\nModern dining tables\nRustic dining tables\nGlam dining tables\nDining tables with various finishes\nDining tables in different sizes', 'Shop Our Elegant Dining Tables - Save Up to 20% Off Today!', 'Experience unmatched quality and value with our selection of dining tables. From traditional to modern, our tables are perfect for any home. Shop now and save up to 20% off your purchase!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(80, NULL, 3, 'Bedside Tables', 'bedside-tables', 'Upgrade your bedroom with our collection of chic and functional bedside tables. Our tables come in various sizes, colors, and designs to fit any bedroom style. Save up to 30% on your purchase today.', 'Bedroom furniture\nNightstands\nSmall space solutions\nBedroom storage\nBedroom decor\nBedside essentials\nBedroom organization\nQuality furniture\nChic designs', 'Shop Our High-Quality Bedside Tables | Up to 30% Off', 'Upgrade your bedroom with our collection of chic and functional bedside tables. Our tables come in various sizes, colors, and designs to fit any bedroom style. Save up to 30% on your purchase today.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(81, NULL, 13, 'Cabinet & sideboards ', 'cabinet-sideboards', 'Get ample storage space with our affordable and durable cabinets and sideboards. Upgrade your home décor with our sleek and modern designs. Buy now and enjoy a 10% discount on your first purchase.', 'Cabinet\nSideboard\nHome Décor\nStorage\nCrockery\nCutlery\nSpacious\nAffordable\nQuality\nDurability', 'Upgrade Your Home Décor with Stylish and Functional Cabinets and Sideboards | Buy Now', 'Get ample storage space with our affordable and durable cabinets and sideboards. Upgrade your home décor with our sleek and modern designs. Buy now and enjoy a 10% discount on your first purchase.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(82, NULL, 13, 'linen Trunks ', 'linen-trunks', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(83, NULL, 13, 'Chest of Drawers', 'chest-of-drawers', 'Upgrade your bedroom with our elegant 5-drawer chest of drawers. Ample storage space and high-quality materials make this piece of furniture a perfect fit for any modern or contemporary home.', 'Chest of drawers\nBedroom storage\nClothes organizer\nModern chest of drawers\nHigh-quality furniture', 'Get Organized with a Stylish Chest of Drawers - Save 10% Today', 'Looking for a versatile and elegant storage solution? Our Chest of Drawers is perfect for any room in your home. Enjoy 10% off and free shipping today.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(84, NULL, 14, 'Settees', 'settees', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(85, NULL, 14, 'Benches', 'benches', 'Discover our collection of high-quality and affordable benches. Transform your living space with versatile seating and storage solutions that add elegance to any room. Shop now and choose from 100+ stylish options!', 'Stylish benches\nTrendy seating options\nComfortable furniture\nVersatile home decor\nUpholstered benches\nCushioned seating\nWooden benches\nLeather benches\nEntryway benches\nBedroom benches\n', 'Upgrade Your Home with Our Stylish Benches | 15% off your first order', 'Discover our collection of high-quality and affordable benches. Transform your living space with versatile seating and storage solutions that add elegance to any room. Shop now and choose from 100+ stylish options!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(86, NULL, 14, 'Recamiers', 'recamiers', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(87, NULL, 1, 'Chaise Lounger', 'chaise-lounger', ' Looking for a comfortable and stylish addition to your outdoor space? Our chaise loungers offer ultimate comfort and relaxation. Made from high-quality materials and available in a variety of stylish designs. Get 20% off your purchase today.', 'Chaise Lounger\nComfortable Lounger\nModern Chaise Lounge\nRelaxation Chair\nDurable Lounger', 'Discover the Ultimate Comfort with Our Chaise Lounger - Buy Now!', ' Looking for a comfortable and stylish addition to your outdoor space? Our chaise loungers offer ultimate comfort and relaxation. Made from high-quality materials and available in a variety of stylish designs. Get 20% off your purchase today.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(88, NULL, 13, 'Ottomans', 'ottomans', 'Relax in ultimate comfort with our cozy ottoman collection. Shop now and discover the versatility of our ottoman sets. Modern Interior offers durable construction and premium materials to last for years to come.', 'Ottomans\nFootrests\nMulti-functional furniture\nStorage ottomans\nHome décor\nFurniture\nSmall space solutions\nExtra seating\nStylish comfort', '10 Reasons to Love Our Ottoman Collection - Shop Now', 'Relax in ultimate comfort with our cozy ottoman collection. Shop now and discover the versatility of our ottoman sets. Modern Interior offers durable construction and premium materials to last for years to come.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(89, NULL, 10, 'Crockery Units ', 'crockery-units', 'Organize and protect your precious crockery with our sleek and versatile storage solutions. Choose from a variety of sizes and finishes to find the perfect fit for your space. Shop now and transform your kitchen today', 'Crockery Units\nDishware Storage\nDining Room Furniture\nKitchen Storage\nGlassware Display', 'Stylish Crockery Units for Your Home', 'Organize and protect your precious crockery with our sleek and versatile storage solutions. Choose from a variety of sizes and finishes to find the perfect fit for your space. Shop now and transform your kitchen today', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(90, NULL, 8, 'Mandir', 'mandir', 'Bring blessings home with our exquisite mandirs. Find peace and tranquility with our customizable mandirs. Shop now and discover the perfect mandir for your home.', 'Mandir for home\nWooden Mandir\nHindu temple at home\nPuja Mandir\nSpiritual space in home', 'Find Inner Peace with Mandir', 'Bring blessings home with our exquisite mandirs. Find peace and tranquility with our customizable mandirs. Shop now and discover the perfect mandir for your home.', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(91, NULL, 6, 'Tv unit ', 'tv-unit', 'Get organized and upgrade your living room with our sleek and functional TV unit. Made from premium quality materials, this unit is built to last. Easy assembly and ample storage make it a must-have for any media room. Buy now and save 20% off your purchase!', 'TV unit,\nModern design,\nStorage solution,\nMultimedia devices,\nCompact size,\nContemporary style,\nDurable materials,\nEasy assembly,\nMinimalist aesthetic,', '10% off! Get the Modern TV Unit with Storage for Your Living Space', 'Upgrade your living space with the sleek and contemporary Modern TV Unit with Storage. With ample space for all your multimedia devices, this unit is made from high-quality materials and is easy to assemble. Order now and get 10% off your purchase!', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(92, NULL, 1, 'Sofa corner cum bed ', 'sofa-corner-cum-bed', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(93, NULL, 20, 'Wing Chairs', 'wing-chairs', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(94, NULL, 20, 'Lounge Chairs', 'lounge-chairs', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30'),
(95, NULL, 20, 'Slipper Chairs', 'slipper-chairs', '', '', '', '', 1, 0, '2023-03-23 06:50:36', '2023-03-23 08:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `stateId` int(11) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `gst` varchar(255) DEFAULT NULL,
  `deliveryCharge` varchar(255) DEFAULT NULL,
  `grandTotal` varchar(255) DEFAULT NULL,
  `orderStatus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profileImage` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profileImage`, `name`, `phone`, `email`, `password`, `role`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sayed Zaid', '8433885667', 'admin@gmail.com', '$2y$10$IB0AIOLmcKbZo85fM2i.numA2TCn0vbougiZ1KaJvb9fC7fCxSbs2', 'admin', 1, 0, '2023-02-16 19:48:14', '2023-02-17 15:14:20'),
(2, NULL, 'Manager', '8484848484', 'szaid@gmail.com', '$2y$10$1HQ7Yi1Y5wMfA8P6d14yXOejCIE5edFOgiaEKVxe./VDlumK05YeK', 'manager', 0, 0, '2023-02-17 14:24:31', '2023-02-17 15:17:45'),
(3, NULL, 'Manager', '8484848483', 'szaid6@gmail.com', '$2y$10$1HQ7Yi1Y5wMfA8P6d14yXOejCIE5edFOgiaEKVxe./VDlumK05YeK', 'customer', 1, 0, '2023-02-17 14:24:31', '2023-02-17 15:17:45'),
(4, NULL, 'szaid', '8484838384', 'customer@gmail.com', '$2y$10$l8U9u6Z2iXiJ4byXSZz6NuW79E/srYlSGAviMIt9Tgxo7Og3q87f2', 'customer', 1, 0, '2023-02-26 23:37:32', '2023-02-26 23:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `userId`, `productId`, `created_at`, `updated_at`) VALUES
(16, 4, 1, '2023-02-26 23:38:35', '2023-02-26 23:38:35'),
(17, 4, 3, '2023-02-26 23:38:36', '2023-02-26 23:38:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgetpasswords`
--
ALTER TABLE `forgetpasswords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gsts`
--
ALTER TABLE `gsts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productcolors`
--
ALTER TABLE `productcolors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forgetpasswords`
--
ALTER TABLE `forgetpasswords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gsts`
--
ALTER TABLE `gsts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcolors`
--
ALTER TABLE `productcolors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
