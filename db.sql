CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `college` varchar(100) NOT NULL,
 `phone` varchar(100) NOT NULL,
 `link` varchar(255) NOT NULL,

 PRIMARY KEY (`id`)
)