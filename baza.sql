CREATE TABLE  `db684503`.`uzytkownicy` (
`id_uzytkownika` INT( 5 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`login` VARCHAR( 20 ) NOT NULL ,
`haslo` VARCHAR( 32 ) NOT NULL ,
`email` VARCHAR( 254 ) NOT NULL ,
UNIQUE (
`login` ,
`email`
)
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT =  'zawiera dane do logowania';


INSERT INTO  `db684503`.`uzytkownicy` (
`id_uzytkownika` ,
`login` ,
`haslo` ,
`email`
)
VALUES (
NULL ,  'admin', MD5(  'admin' ) ,  'admin@kinososnowiec.ugu.pl'
);