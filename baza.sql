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

ALTER TABLE  `uzytkownicy` 
ADD  `imie` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
ADD  `nazwisko` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
ADD  `telefon` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL

INSERT INTO  `db684503`.`uzytkownicy` (
`id_uzytkownika` ,
`login` ,
`haslo` ,
`email` ,
`imie` ,
`nazwisko` ,
`telefon`
)
VALUES (
NULL ,  'muchomor1',  'muchomor1',  'muchomor@muchomor.pl',  'Michał',  'Muchomorowski',  '555789451'