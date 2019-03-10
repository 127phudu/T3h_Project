/*
 Navicat Premium Data Transfer

 Source Server         : connetion1
 Source Server Type    : MySQL
 Source Server Version : 100134
 Source Host           : localhost:3306
 Source Schema         : t3h_project

 Target Server Type    : MySQL
 Target Server Version : 100134
 File Encoding         : 65001

 Date: 10/03/2019 13:43:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admins_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'admin', 'admin@gmail.com', NULL, '$2y$10$HyTA9Tu5cd1GZ8tkY8OeNuVKnFXuo7F0.RakO6b4h2tMq69RREnRi', 'hSc9TgXid4wnMfcEnv8H8qZ6xWYN1ag72cjW93Z9nyOWP0Tr91D68rpHM04G', '2019-03-05 14:55:37', '2019-03-05 14:55:37');

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(11) NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES (1, 'banner slide 1', 1, '/files/1/2.jpg', '<p>1</p>', '<h3>Make your</h3>\r\n<h3>food</h3>\r\n<h3>with Spicy.</h3>', '2019-03-08 15:13:29', '2019-03-08 16:24:22', 'https://google.com');
INSERT INTO `banners` VALUES (2, 'banner slide 2', 1, '/files/1/1.jpg', '<p>1</p>', '<h3>Make your</h3>\r\n<h3>food</h3>\r\n<h3>with Spicy.</h3>', '2019-03-08 15:14:14', '2019-03-08 16:24:41', 'https://google.com');
INSERT INTO `banners` VALUES (3, 'banner slide 3', 1, '/files/1/3.jpg', '<p>1</p>', '<h3>Make your</h3>\r\n<h3>food</h3>\r\n<h3>with Spicy.</h3>', '2019-03-08 15:14:49', '2019-03-08 16:24:51', 'https://google.com');
INSERT INTO `banners` VALUES (4, 'Banner Bottom 1', 2, '/files/1/4.jpg', '<p>1</p>', '<div class=\"wthree_banner_bottom_left_grid_pos\">\r\n<h4>Discount Offer 25%</h4>\r\n</div>', '2019-03-08 16:29:54', '2019-03-08 16:41:42', 'https://zing.vn');
INSERT INTO `banners` VALUES (5, 'Banner Bottom 2', 3, '/files/1/5.jpg', '<p>1</p>', '<div class=\"wthree_banner_btm_pos\">\r\n<h3>introducing best store for <em>groceries</em></h3>\r\n</div>', '2019-03-08 16:31:04', '2019-03-08 16:42:46', 'https://zing.vn');
INSERT INTO `banners` VALUES (6, 'Banner Bottom 3', 4, '/files/1/6.jpg', '<p>1</p>', '<div class=\"wthree_banner_btm_pos1\">\r\n<h3>Save Upto $10</h3>\r\n</div>', '2019-03-08 16:32:04', '2019-03-08 16:43:56', 'https://zing.vn');

-- ----------------------------
-- Table structure for bid_history
-- ----------------------------
DROP TABLE IF EXISTS `bid_history`;
CREATE TABLE `bid_history`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bidder_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `cat_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bid_history
-- ----------------------------
INSERT INTO `bid_history` VALUES (11, 1, 8, '2019-03-10 03:39:01', '2019-03-10 03:39:01', 2);

-- ----------------------------
-- Table structure for content_category
-- ----------------------------
DROP TABLE IF EXISTS `content_category`;
CREATE TABLE `content_category`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of content_category
-- ----------------------------
INSERT INTO `content_category` VALUES (1, 'Điện tử', 'dien-tu', '/files/1/1a.jpg', '<p>giới thiệu điện tử</p>', '<p>m&ocirc; tả điện tử</p>', '2019-03-05 15:48:49', '2019-03-05 15:48:49');
INSERT INTO `content_category` VALUES (2, 'công nghệ', 'cong-nghe', '/files/1/1a.jpg', '<p>giới thiệu c&ocirc;ng nghệ&nbsp;</p>', '<p>m&ocirc; tả c&ocirc;ng nghệ</p>', '2019-03-05 15:49:21', '2019-03-05 15:49:21');

-- ----------------------------
-- Table structure for content_pages
-- ----------------------------
DROP TABLE IF EXISTS `content_pages`;
CREATE TABLE `content_pages`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for content_posts
-- ----------------------------
DROP TABLE IF EXISTS `content_posts`;
CREATE TABLE `content_posts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for content_tags
-- ----------------------------
DROP TABLE IF EXISTS `content_tags`;
CREATE TABLE `content_tags`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for global_settings
-- ----------------------------
DROP TABLE IF EXISTS `global_settings`;
CREATE TABLE `global_settings`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `global_settings_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of global_settings
-- ----------------------------
INSERT INTO `global_settings` VALUES (1, 'web_name', 'Online Aution', '', '2019-03-05 16:00:31', '2019-03-05 16:00:31');
INSERT INTO `global_settings` VALUES (2, 'header_logo', '/files/1/1a.jpg', '', '2019-03-05 16:00:31', '2019-03-05 16:00:31');
INSERT INTO `global_settings` VALUES (3, 'footer_logo', '', '', '2019-03-05 16:00:31', '2019-03-05 16:00:31');
INSERT INTO `global_settings` VALUES (4, 'intro', '<p>Giới thiệu</p>', '', '2019-03-05 16:00:32', '2019-03-05 16:00:32');
INSERT INTO `global_settings` VALUES (5, 'desc', '<p>M&ocirc; tả</p>', '', '2019-03-05 16:00:32', '2019-03-05 16:00:32');

-- ----------------------------
-- Table structure for menu_items
-- ----------------------------
DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL DEFAULT 0,
  `params` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu_items
-- ----------------------------
INSERT INTO `menu_items` VALUES (2, 'Danh mục', '1', 1, '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\",\"7\":\"\"}', '/shop/category/0', 'fa', '<p>1</p>', 0, '2019-03-05 15:52:49', '2019-03-08 14:58:17', 1, 0);
INSERT INTO `menu_items` VALUES (3, 'Content Category', '3', 1, '{\"1\":\"\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\",\"7\":\"\"}', '/content/category/1', 'fa', '<p>1</p>', 0, '2019-03-05 15:53:25', '2019-03-05 15:53:25', 2, 0);
INSERT INTO `menu_items` VALUES (4, 'Content Post', '4', 1, '{\"1\":\"\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\",\"7\":\"\"}', '/content/post/1', '1', '<p>1</p>', 0, '2019-03-05 15:54:08', '2019-03-05 15:54:08', 4, 0);
INSERT INTO `menu_items` VALUES (5, 'Content Page', '5', 1, '{\"1\":\"\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\",\"7\":\"\"}', '/page/1', 'fa', '<p>1</p>', 0, '2019-03-05 15:54:45', '2019-03-05 15:54:45', 5, 0);
INSERT INTO `menu_items` VALUES (6, 'Content tag', '6', 1, '{\"1\":\"\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\",\"7\":\"\"}', '/content/tag/1', 'fa', '<p>1</p>', 0, '2019-03-05 15:55:07', '2019-03-05 15:55:07', 6, 0);
INSERT INTO `menu_items` VALUES (7, 'Custom link', '7', 1, '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\",\"7\":\"http:\\/\\/localhost\\/T3h_Project\\/laravel\\/public\\/\"}', 'http://localhost/T3h_Project/laravel/public/', 'fa', '<p>1</p>', 0, '2019-03-05 15:55:54', '2019-03-08 07:23:19', 7, 0);
INSERT INTO `menu_items` VALUES (8, 'Vừa thắng', '7', 2, '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\",\"7\":\"http:\\/\\/localhost\\/T3h_Project\\/laravel\\/public\\/buyer\\/newPrize\"}', 'http://localhost/T3h_Project/laravel/public/buyer/newPrize', 'fa', '<p>trang sản phẩm vừa thắng v&agrave; chưa ho&agrave;n tất đơn h&agrave;ng</p>', 0, '2019-03-07 16:03:32', '2019-03-07 17:06:18', 1, 0);
INSERT INTO `menu_items` VALUES (9, 'Điện tử công nghệ', '1', 1, '{\"1\":\"1\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\",\"7\":\"\"}', '/shop/category/1', 'fa', '<p>Link tới c&aacute;c sản phẩm thuộc Điện tử c&ocirc;ng nghệ</p>', 2, '2019-03-08 06:58:27', '2019-03-08 14:58:30', 1, 0);
INSERT INTO `menu_items` VALUES (10, 'Đang tham gia', '7', 2, '{\"1\":\"0\",\"2\":\"0\",\"3\":\"0\",\"4\":\"0\",\"5\":\"0\",\"6\":\"0\",\"7\":\"http:\\/\\/localhost\\/T3h_Project\\/laravel\\/public\\/buyer\\/bidding\"}', 'http://localhost/T3h_Project/laravel/public/buyer/bidding', 'fa', '<p>Link tới c&aacute;c sản phẩm người d&ugrave;ng đang tham gia đấu gi&aacute;</p>', 0, '2019-03-08 07:11:02', '2019-03-09 13:56:00', 1, 0);
INSERT INTO `menu_items` VALUES (14, 'Nội thất', '1', 1, '{\"1\":\"2\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\",\"7\":\"\"}', '/shop/category/2', 'fa', '<p>nội thất</p>', 2, '2019-03-09 16:27:33', '2019-03-09 16:27:33', 3, 0);
INSERT INTO `menu_items` VALUES (15, 'Đồ cổ', '1', 1, '{\"1\":\"3\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\",\"7\":\"\"}', '/shop/category/3', 'fa', '<p>12</p>', 2, '2019-03-10 03:42:33', '2019-03-10 03:42:33', 3, 0);
INSERT INTO `menu_items` VALUES (16, 'Đồ lưu niệm', '1', 1, '{\"1\":\"4\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\",\"7\":\"\"}', '/shop/category/4', 'fa', '<p>1</p>', 2, '2019-03-10 03:44:05', '2019-03-10 03:44:05', 4, 0);
INSERT INTO `menu_items` VALUES (17, 'Đơn hàng', '7', 2, '{\"1\":\"\",\"2\":\"\",\"3\":\"\",\"4\":\"\",\"5\":\"\",\"6\":\"\",\"7\":\"http:\\/\\/localhost\\/T3h_Project\\/laravel\\/public\\/buyer\\/ordered\"}', 'http://localhost/T3h_Project/laravel/public/buyer/ordered', 'fa', '<p>c&aacute;c sản phẩm đ&atilde; đặt h&agrave;ng th&agrave;nh c&ocirc;ng</p>', 0, '2019-03-10 03:53:27', '2019-03-10 03:53:27', 3, 0);

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'menu banner left', 'menu-banner-left', '<p>kh&ocirc;ng</p>', 1, '2019-03-05 15:50:21', '2019-03-05 15:50:21');
INSERT INTO `menus` VALUES (2, 'Header menu', 'header-menu', '<p>Kh&ocirc;ng</p>', 2, '2019-03-07 15:58:59', '2019-03-07 15:58:59');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (14, '2019_02_21_011613_add_menu_id_to_menu_items', 10);
INSERT INTO `migrations` VALUES (51, '2014_10_12_000000_create_users_table', 11);
INSERT INTO `migrations` VALUES (52, '2014_10_12_100000_create_password_resets_table', 11);
INSERT INTO `migrations` VALUES (53, '2019_01_18_085323_create_admins_table', 11);
INSERT INTO `migrations` VALUES (54, '2019_02_12_075009_create_sellers_table', 11);
INSERT INTO `migrations` VALUES (55, '2019_02_12_084924_create_shippers_table', 11);
INSERT INTO `migrations` VALUES (56, '2019_02_19_073202_create_shop_category_table', 11);
INSERT INTO `migrations` VALUES (57, '2019_02_19_132342_create_shop_product_table', 11);
INSERT INTO `migrations` VALUES (58, '2019_02_19_152108_create_content_category_table', 11);
INSERT INTO `migrations` VALUES (59, '2019_02_19_152214_create_content_posts_table', 11);
INSERT INTO `migrations` VALUES (60, '2019_02_19_152404_create_content_pages_table', 11);
INSERT INTO `migrations` VALUES (61, '2019_02_20_081925_create_content_tags_table', 11);
INSERT INTO `migrations` VALUES (62, '2019_02_20_112710_create_menus_table', 11);
INSERT INTO `migrations` VALUES (63, '2019_02_20_112930_create_menu_items_table', 11);
INSERT INTO `migrations` VALUES (64, '2019_02_21_023310_create_global_settings_table', 11);
INSERT INTO `migrations` VALUES (65, '2019_02_24_034946_create_shop_brands_table', 11);
INSERT INTO `migrations` VALUES (66, '2019_03_01_061946_add_sort_and_total_menu_items', 11);
INSERT INTO `migrations` VALUES (67, '2019_03_02_151354_create_banners_table', 11);
INSERT INTO `migrations` VALUES (68, '2019_03_02_153608_add_link_to_banners', 11);
INSERT INTO `migrations` VALUES (69, '2019_03_02_154019_create_newsletters_table', 11);
INSERT INTO `migrations` VALUES (70, '2019_03_06_134317_create_orders_table', 12);
INSERT INTO `migrations` VALUES (71, '2019_03_09_134013_create_bid_history_table', 13);
INSERT INTO `migrations` VALUES (72, '2019_03_10_045537_add_recommend_to_shop_product', 14);

-- ----------------------------
-- Table structure for newsletters
-- ----------------------------
DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 1, 1, 'viet 1', '123', 'user1@gmail.com', '123', '123', '123', '123', '1', '2', '2019-03-07 01:52:26', '2019-03-08 06:42:35');
INSERT INTO `orders` VALUES (3, 1, 3, '', '', '', '', '', '', '', '1', '1', '2019-03-08 14:43:33', '2019-03-08 14:43:33');
INSERT INTO `orders` VALUES (5, 2, 5, 'viet', '123', '123', '123', '123', '123', '123', '600000', '2', '2019-03-09 13:29:12', '2019-03-09 06:30:57');
INSERT INTO `orders` VALUES (6, 1, 6, '', '', '', '', '', '', '', '300000', '1', '2019-03-09 15:49:12', '2019-03-09 15:49:12');
INSERT INTO `orders` VALUES (8, 2, 2, '', '', '', '', '', '', '', '100000', '1', '2019-03-09 23:21:12', '2019-03-09 23:21:12');
INSERT INTO `orders` VALUES (9, 1, 4, 'viet', 'viet', '123234', '123234', '123234', '123234', '123234', '200000', '2', '2019-03-10 10:29:12', '2019-03-10 04:24:48');
INSERT INTO `orders` VALUES (10, 1, 9, 'viet', 'viet', '123', '123', '123', '123', '123', '300000', '2', '2019-03-10 10:46:12', '2019-03-10 04:22:32');
INSERT INTO `orders` VALUES (11, 1, 10, 'viet', '123', '123', '123', '123', '123', '123', '200000', '2', '2019-03-10 12:08:12', '2019-03-10 05:08:39');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sellers
-- ----------------------------
DROP TABLE IF EXISTS `sellers`;
CREATE TABLE `sellers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `sellers_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for shippers
-- ----------------------------
DROP TABLE IF EXISTS `shippers`;
CREATE TABLE `shippers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `shippers_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for shop_brands
-- ----------------------------
DROP TABLE IF EXISTS `shop_brands`;
CREATE TABLE `shop_brands`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for shop_category
-- ----------------------------
DROP TABLE IF EXISTS `shop_category`;
CREATE TABLE `shop_category`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of shop_category
-- ----------------------------
INSERT INTO `shop_category` VALUES (1, 'Điện tử công nghệ', 'dien-tu-cong-nghe', '/files/1/1a.jpg', '<p>Giới thiệu điện tử c&ocirc;ng nghệ</p>', '<p>M&ocirc; tả điện tử c&ocirc;ng nghệ</p>', '2019-03-05 15:04:29', '2019-03-05 15:04:29');
INSERT INTO `shop_category` VALUES (2, 'Nội thất', 'noi-that', '/files/1/13.jpg', '<p>giới thiệu nội thất</p>', '<p>m&ocirc; tả nội thất</p>', '2019-03-05 15:05:53', '2019-03-05 15:05:53');
INSERT INTO `shop_category` VALUES (3, 'Đồ cổ', 'do-co', '/files/1/24.png', '<p>đồ cổ</p>', '<p>đồ cổ</p>', '2019-03-08 14:54:19', '2019-03-08 14:54:19');
INSERT INTO `shop_category` VALUES (4, 'Đồ lưu niệm', 'do-luu-niem', '/files/1/23.png', '<p>123</p>', '<p>123</p>', '2019-03-08 14:55:20', '2019-03-08 14:55:20');

-- ----------------------------
-- Table structure for shop_product
-- ----------------------------
DROP TABLE IF EXISTS `shop_product`;
CREATE TABLE `shop_product`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `priceFirst` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `finish` datetime(0) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `recommend` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of shop_product
-- ----------------------------
INSERT INTO `shop_product` VALUES (1, 'Laptop xịn 1', 'laptop-xin-1', '[\"\\/files\\/1\\/1b.png\",\"\\/files\\/1\\/1c.jpg\",\"\\/files\\/1\\/18.jpg\"]', '<p>giới thiệu Laptop xịn 1</p>', '<p>m&ocirc; tả Laptop xịn 1</p>', 100000, 100000, 1, 1, '2019-03-06 15:33:00', '2019-03-05 15:20:48', '2019-03-10 06:28:36', 1);
INSERT INTO `shop_product` VALUES (2, 'Laptop xịn 1', 'laptop-xin-1', '[\"\\/files\\/1\\/1b.png\",\"\\/files\\/1\\/1c.jpg\",\"\\/files\\/1\\/18.jpg\"]', '<p>giới thiệu Laptop xịn 1</p>', '<p>m&ocirc; tả Laptop xịn 1</p>', 100000, 100000, 2, 1, '2019-03-07 18:00:00', '2019-03-05 15:20:48', '2019-03-07 10:56:43', 0);
INSERT INTO `shop_product` VALUES (3, 'Laptop xịn 1', 'laptop-xin-1', '[\"\\/files\\/1\\/1b.png\",\"\\/files\\/1\\/1c.jpg\",\"\\/files\\/1\\/18.jpg\"]', '<p>giới thiệu Laptop xịn 1</p>', '<p>m&ocirc; tả Laptop xịn 1</p>', 100000, 200000, 1, 1, '2019-03-07 15:33:00', '2019-03-05 15:20:48', '2019-03-07 10:46:54', 0);
INSERT INTO `shop_product` VALUES (4, 'Laptop xịn 1', 'laptop-xin-1', '[\"\\/files\\/1\\/1b.png\",\"\\/files\\/1\\/1c.jpg\",\"\\/files\\/1\\/18.jpg\"]', '<p>giới thiệu Laptop xịn 1</p>', '<p>m&ocirc; tả Laptop xịn 1</p>', 100000, 200000, 1, 1, '2019-03-10 10:29:00', '2019-03-05 15:20:48', '2019-03-10 03:24:44', 0);
INSERT INTO `shop_product` VALUES (5, 'Laptop hịn', 'laptop-hin', '[\"\\/files\\/1\\/1c.jpg\",\"\\/files\\/1\\/1b.png\",\"\\/files\\/1\\/1c.jpg\"]', '<p>Laptop hịn giới thiệu</p>', '<p>Laptop hịn m&ocirc; tả</p>', 100000, 600000, 2, 1, '2019-03-09 13:26:00', '2019-03-09 06:24:15', '2019-03-09 06:26:02', 0);
INSERT INTO `shop_product` VALUES (6, 'laptop việt', 'laptop-viet', '[\"\\/files\\/1\\/1c.jpg\",\"\\/files\\/1\\/1b.png\",\"\\/files\\/1\\/1c.jpg\"]', '<p>laptop việt</p>', '<p>laptop việt m&ocirc; tả</p>', 100000, 300000, 1, 1, '2019-03-09 15:49:00', '2019-03-09 08:46:36', '2019-03-09 08:48:25', 0);
INSERT INTO `shop_product` VALUES (8, 'test', 'test', '[\"\\/files\\/1\\/13.jpg\"]', '<p>giới thiệu</p>', '<p>m&ocirc; tả</p>', 100000, 200000, 1, 2, '2019-03-31 00:00:00', '2019-03-10 03:38:44', '2019-03-10 03:39:00', 1);
INSERT INTO `shop_product` VALUES (9, 'count', 'count', '[\"\\/files\\/1\\/15.png\",\"\\/files\\/1\\/1.png\"]', '<p>giới thiệu</p>', '<p>m&ocirc; tả</p>', 100000, 100000, 1, 3, '2019-03-10 10:46:00', '2019-03-10 03:41:31', '2019-03-10 04:30:53', 1);
INSERT INTO `shop_product` VALUES (10, 'test 1', 'test-1', '[\"\\/files\\/1\\/10.png\"]', '<p>12</p>', '<p>12</p>', 100000, 200000, 1, 1, '2019-03-10 12:08:00', '2019-03-10 05:07:17', '2019-03-10 05:07:49', 0);
INSERT INTO `shop_product` VALUES (11, 'đề nghị', 'de-nghi', '[\"\\/files\\/1\\/22.png\"]', '<p>1</p>', '<p>1</p>', 100000, 100000, 0, 1, '2019-03-31 12:00:00', '2019-03-10 06:32:55', '2019-03-10 06:34:02', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'user1', 'user1@gmail.com', NULL, '$2y$10$WX7g2I8yA9mVqxVxJTKZe.Xu8kJtvt0gpF4L9IdWLQsdniC0YKTR6', 'gBFh0NEaMuBZStdsPpz7O6hxYOaXeZ9O5WJHl9GE77G9bXNxGN0wkEG27exZ', '2019-03-05 16:43:59', '2019-03-05 16:43:59');
INSERT INTO `users` VALUES (2, 'user2', 'user2@gmail.com', NULL, '$2y$10$l0joHQWwqZ.m4ZrwnTAtvO5Y9rscG.WBW7IMQv2akciQ.44Sb.4Mu', 'MYPscBWk7MsoVHOx48uMxUxFFP8InZAtetUS9e0AxOGbiP0ZoEVE9MtRiQzk', '2019-03-05 16:46:47', '2019-03-05 16:46:47');

SET FOREIGN_KEY_CHECKS = 1;
