CREATE TABLE `Kategori`( `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` varchar(25) DEFAULT NULL );

CREATE TABLE `Hobi`
( `id` int
(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` varchar
(25) DEFAULT NULL, `id_category` int
(11), FOREIGN KEY
(`id_category`) REFERENCES `Kategori`
(`id`));

CREATE TABLE `Nama`
( `id` int
(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` varchar
(25) DEFAULT NULL, `id_hobby` int
(11), `id_category` int(11),
FOREIGN KEY
(`id_hobby`) REFERENCES `Hobi`
(`id`),
FOREIGN KEY
(`id_category`) REFERENCES `Kategori`
(`id`));

INSERT INTO `Kategori` (`
id`,
`name
`) VALUES
(NULL, 'Game');


SELECT `N`.`name`,`H`.`name`AS `hobby`,`K`.`name` AS `category` FROM `Nama` AS `N` JOIN `Hobi` AS `H` ON `N`.`id_hobby`=`H`.`id` JOIN `Kategori` AS `K` ON `N`.`id_category`=`K`.`id`
