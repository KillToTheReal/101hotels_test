-- Adminer 4.8.1 MySQL 8.0.32 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `comments` (`id`, `post_id`, `name`, `text`, `date`) VALUES
(2,	3,	'zxczxc@mail.com',	'zxczxcczxczxc',	'2023-11-16 00:00:00'),
(4,	3,	'zxczxc@mail.com',	'zxczxcxzc',	'2023-11-09 00:00:00'),
(5,	3,	'zxczxc@mail.com',	'zxczxczxczxc',	'2023-01-05 00:00:00'),
(6,	2,	'zxczxc@mail.com',	'zxczxczxc',	'2023-10-30 00:00:00'),
(7,	3,	'zxczxc@mail.com',	'zxczxczxc',	'2023-11-14 00:00:00'),
(8,	3,	'zxczxc@mail.com',	'zxczxczxcz',	'2023-11-01 00:00:00'),
(9,	5,	'newcomment@mail.ru',	'New comment!',	'2023-10-30 00:00:00'),
(10,	5,	'zxczxc@mail.com',	'ячсячс',	'2023-11-16 00:00:00'),
(11,	3,	'zxczxc@mail.com',	'zxczxczxc',	'2023-11-07 00:00:00'),
(12,	3,	'zxczxc@mail.com',	'123123',	'2023-11-07 00:00:00');

CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2,	'2023-11-11-195636',	'App\\Database\\Migrations\\CreatePostsTable',	'default',	'App',	1699738886,	1),
(3,	'2023-11-12-062226',	'App\\Database\\Migrations\\CreateCommentsTable',	'default',	'App',	1699770650,	2);

CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `posts` (`id`, `title`, `category`, `image`, `body`, `created_at`, `updated_at`) VALUES
(2,	'Nature sights',	'Multiplication',	'1699842605_3675c5a0d46d7c7ca429.jpg',	'Donec sed mauris vel orci pellentesque euismod. Duis non justo mollis, porttitor nibh sit amet, molestie odio. Vestibulum blandit felis libero. In ac porta tellus. Cras consequat urna risus, nec rutrum justo blandit in. Aenean non mauris facilisis, maximus nibh ut, maximus lacus. Pellentesque accumsan, turpis at cursus mollis, magna sapien iaculis turpis, id eleifend lectus metus quis dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vel mattis neque, ut aliquam tellus. Etiam felis nulla, porttitor volutpat lectus ac, sollicitudin feugiat erat. Integer et neque ac turpis blandit pretium. Proin id sem imperdiet, lobortis lacus at, gravida enim.',	'2023-11-12 00:45:32',	NULL),
(3,	'Post 1',	'Category',	'1699842621_675e2a4fc48b0cac718a.jpg',	'Donec ex ex, hendrerit ut hendrerit sed, elementum sit amet mauris. Fusce et sapien a arcu mattis posuere quis nec enim. Nunc ac congue odio. Nunc tincidunt lorem tempor vestibulum laoreet. Aenean sollicitudin eros id dui posuere bibendum. Duis dolor tortor, rutrum et metus non, tempus suscipit lorem. Donec vitae quam felis. Nunc placerat porttitor lectus quis porttitor. Nullam in nisi sit amet dolor efficitur aliquam pellentesque vel dolor. Aliquam tristique venenatis ante at mollis.',	'2023-11-12 01:42:38',	NULL),
(4,	'Cat with cheburek',	'Thriller',	'1699742681_74f726e891071ae84c25.jpg',	'Maecenas at imperdiet ante, a sodales dui. Sed efficitur sem gravida odio rutrum tempor. Nulla blandit neque velit, vitae porta tellus lobortis id. Nulla facilisi. Vestibulum at odio sed eros malesuada ornare. Sed aliquet dui at dui facilisis, id dapibus libero porta. Pellentesque vehicula accumsan rutrum. Ut imperdiet tempor condimentum. Cras eget pellentesque nisl. Morbi a feugiat lacus. Donec eleifend ante quis lectus ornare placerat. Etiam consequat leo at molestie feugiat.',	'2023-11-12 01:44:41',	NULL),
(5,	'Post 7',	'Catecategory',	'1699742723_7f64bc48630b0153cab9.png',	'Pellentesque in mi pellentesque, consequat ipsum vel, ornare nisi. Nam ornare lectus non tincidunt varius. Mauris bibendum odio at consectetur mollis. Vestibulum luctus ex eu pellentesque egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam ipsum metus, bibendum et felis id, mollis vestibulum purus. Duis sollicitudin velit lorem, vitae placerat justo placerat vel. Integer tempus semper egestas. Vestibulum interdum ornare tellus sed finibus. Nunc arcu nulla, ultricies in nulla ac, bibendum ultrices lorem. Ut rutrum porta tincidunt. Donec faucibus non purus id accumsan. Vivamus nec tincidunt massa. Quisque consequat facilisis dictum. Mauris pharetra egestas ex eu suscipit. Vivamus ac ultrices neque.',	'2023-11-12 01:45:23',	NULL),
(7,	'New Title',	'Catecategory',	'1699842543_58cd829eab56a1c0a9f8.jpg',	'lorem lorem ipsum',	'2023-11-13 03:08:12',	NULL),
(8,	'New title',	'New category',	'1699842705_29edc3747cbc1aa3a9f4.jpg',	'Body of a page',	'2023-11-13 05:31:45',	NULL);

-- 2023-11-13 02:57:15
