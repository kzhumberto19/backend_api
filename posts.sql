-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla geniat.permissions: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `per_description`) VALUES
	(1, 'create'),
	(2, 'read'),
	(3, 'update'),
	(4, 'delete'),
	(5, 'login'),
	(6, 'total');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Volcando datos para la tabla geniat.permission_role: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`) VALUES
	(1, 1, 5),
	(3, 2, 2),
	(4, 3, 5),
	(5, 3, 1),
	(6, 4, 5),
	(7, 4, 2),
	(8, 4, 1),
	(9, 4, 3),
	(10, 5, 1),
	(11, 2, 5),
	(12, 5, 2),
	(13, 5, 3),
	(14, 5, 4),
	(15, 5, 5);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Volcando datos para la tabla geniat.post: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `title`, `description`, `create_at`, `id_user`) VALUES
	(1, 'El principito', 'Es un adulto que intenta razonar y actuar como un niÃ±o, para recuperar al niÃ±o que todos hemos sido y que llevamos dentro. Es nuestra propia imagen, nuestro reflejo en la historia; el personaje que nos identifica y nos hace ver cÃ³mo deberÃ­amos ver las cosas y cÃ³mo las vemos en realidad', '2022-01-21 21:31:37', 1),
	(2, 'titulo', 'hjdahsdahdhdha', '2022-01-22 03:31:17', 1),
	(3, 'titulo', 'hjdahsdahdhdha', '2022-01-22 03:33:27', 1),
	(4, 'test', 'test', '2022-01-22 03:59:12', 1),
	(5, 'test', 'test', '2022-01-22 04:04:23', 1),
	(6, 'test', 'test', '2022-01-22 04:04:45', 1),
	(7, 'test', 'test', '2022-01-22 04:35:23', 1),
	(8, 'test', 'test', '2022-01-22 04:36:53', 1),
	(9, 'test', 'test', '2022-01-22 04:37:09', 1),
	(11, 'test', 'test', '2022-01-22 04:38:07', 1),
	(12, 'test', 'test', '2022-01-22 04:38:40', 1),
	(13, 'test', 'test', '2022-01-22 06:07:42', 1),
	(14, 'test', 'test', '2022-01-22 06:11:33', 1),
	(16, 'El principito', 'Es un adulto que intenta razonar y actuar como un niÃ±o, para recuperar al niÃ±o que todos hemos sido y que llevamos dentro. Es nuestra propia imagen, nuestro reflejo en la historia; el personaje que nos identifica y nos hace ver cÃ³mo deberÃ­amos ver las cosas y cÃ³mo las vemos en realidad', '2022-01-22 06:12:33', 1),
	(17, 'Principal', 'test', '2022-01-22 07:40:17', 4);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Volcando datos para la tabla geniat.roles: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `rol_description`) VALUES
	(1, 'Rol básico'),
	(2, 'Rol medio'),
	(3, 'Rol medio alto'),
	(4, 'Rol alto medio'),
	(5, 'Rol alto');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando datos para la tabla geniat.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `pr_id`) VALUES
	(1, 'Humberto', 'Hernandez', 'kh17728@gmail.com', '$2y$10$TQjoSF/bjUztNW133Xpyy.GHn3ZK49Hj7XJA18jg5p74Tl3UQ.Ja6', 5),
	(2, 'Felipe', 'Fernandez', 'felipe01@gmail.com', '$2y$10$TQjoSF/bjUztNW133Xpyy.GHn3ZK49Hj7XJA18jg5p74Tl3UQ.Ja6', 1),
	(3, 'Lourdes', 'Garcia', 'lourdes@gmail.com', '$2y$10$TQjoSF/bjUztNW133Xpyy.GHn3ZK49Hj7XJA18jg5p74Tl3UQ.Ja6', 2),
	(4, 'Alexandeer', 'Guillen', 'guillen@gmail.com', '$2y$10$TQjoSF/bjUztNW133Xpyy.GHn3ZK49Hj7XJA18jg5p74Tl3UQ.Ja6', 3),
	(5, 'Cristian', 'Jimenez', 'jimenez@gmail.com', '$2y$10$TQjoSF/bjUztNW133Xpyy.GHn3ZK49Hj7XJA18jg5p74Tl3UQ.Ja6', 4);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
