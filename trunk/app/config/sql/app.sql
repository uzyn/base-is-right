CREATE TABLE  `products` (
`id` BIGINT NOT NULL ,
`name` VARCHAR( 2048 ) NOT NULL ,
`description` TEXT NOT NULL ,
`price` FLOAT NOT NULL ,
`created` DATETIME NOT NULL
) ENGINE = MYISAM;