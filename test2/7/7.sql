-- bikin database
CREATE DATABASE `arkademy`;
-- tabel kategori
CREATE TABLE `Kategori` ( `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` varchar(25) DEFAULT NULL );
-- tabel hobi
CREATE TABLE `Hobi`
( `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` varchar(25) DEFAULT NULL, `id_category` int(11), FOREIGN KEY(`id_category`) REFERENCES `Kategori`(`id`))
-- tabel Nama
CREATE TABLE `Nama`
( `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` varchar(25) DEFAULT NULL, `id_hobby` int(11), `id_category` int(11),FOREIGN KEY(`id_hobby`) REFERENCES `Hobi`(`id`),FOREIGN KEY(`id_category`) REFERENCES `Kategori`(`id`));
--input data
INSERT INTO `Kategori` (`id`,`name`) VALUES(1, 'Shopping'),(2, 'Media Sosial');
INSERT INTO `Hobi` (`id`,`name`, `id_category`) VALUES(1, 'Koleksi Tas', 1),(2, 'InstaStory', 2);
INSERT INTO `Nama` (`id`,`name`, `id_hobby`, `id_category`) VALUES(1, 'Novi', 1, 1),(2, 'Vita', 2, 2);
-- query menghasilkan table poin 7.a

SELECT `N`.`name`,`H`.`name`AS `hobby`,`K`.`name` AS `category` FROM `Nama` AS `N` JOIN `Hobi` AS `H` ON `N`.`id_hobby`=`H`.`id` JOIN `Kategori` AS `K` ON `N`.`id_category`=`K`.`id` ORDER BY `N`.`id`
