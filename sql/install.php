<?php
$sqls = array();

$sqls[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'a_iiitm_venue_details`(
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `seats` int(10) NOT NULL,
    `price` int(10) NOT NULL,
    `short_description` text NOT NULL,
    `description` text NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8';

$sqls[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `venue_id` int(10) NOT NULL,
    `venue_name` VARCHAR(255) NOT NULL,
    `feature` varchar(255) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8';

$sqls[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'a_iiitm_user_details`(
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `firstname` varchar(255) NOT NULL,
    `lastname` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `mobile` BIGINT(10) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8';

$sqls[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'a_iiitm_venue_booking_details`(
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `customer_email` VARCHAR(255) NOT NULL,
    `customer_name` VARCHAR(255) NOT NULL,
    `venue_id` INT(10),
    `venue_name` VARCHAR(255) NOT NULL,
    `checkin` DATE NOT NULL,
    `checkout` DATE NOT NULL,
    `order_reference` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8';




$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_details`(
    `name`, `seats`, `price`, `short_description`, `description`
    ) VALUES ("Auditorium", 
            250, 
            3500,
            "A wonderful serenity.", 
            "The bedding was hardly able to cover it and seemed ready to slide off any moment."
            )';

$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_details`(
    `name`, `seats`, `price`, `short_description`, `description`
    ) VALUES ("Computer Lab", 
            100,
            2500, 
            "A wonderful serenity.", 
            "The bedding was hardly able to cover it and seemed ready to slide off any moment."
            )';

$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_details`(
    `name`, `seats`, `price`, `short_description`, `description`
    ) VALUES ("Guest House", 
            80,
            4000, 
            "A wonderful serenity.", 
            "The bedding was hardly able to cover it and seemed ready to slide off any moment."
            )';


$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (1,
            "Auditorium",
            "Audio-Visual Equipment"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (1,
            "Auditorium",
            "Conference Facilities"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (1,
            "Auditorium",
            "Power BackUp"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (1,
            "Auditorium",
            "Full HD Projector"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (1,
            "Auditorium",
            "Air Conditioned"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (2,
            "Computer Lab",
            "Internet Facility"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (2,
            "Computer Lab",
            "Laptop Facility"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (2,
            "Computer Lab",
            "Printer Facility"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (2,
            "Computer Lab",
            "Audio/Video systems"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (2,
            "Computer Lab",
            "Power BackUp"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (3,
            "Guest House",
            "Air Conditioned"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (3,
            "Guest House",
            "Parking System"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (3,
            "Guest House",
            "Water-Connected"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (3,
            "Guest House",
            "Separate Inhouse Lawn"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_features`(
    `venue_id`,`venue_name` ,`feature`
    ) VALUES (3,
            "Guest House",
            "Power BackUp"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_booking_details`(
    `customer_email`,`customer_name` ,`venue_id`,`venue_name`, `checkin`, `checkout`, `order_reference`
    ) VALUES ("piyush@piyush.com",
            "Piyush Kumar",
            1,
            "Auditorium",
            "2019-07-07",
            "2019-07-08",
            "H21ZRCPKWE31"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_booking_details`(
    `customer_email`,`customer_name` ,`venue_id`,`venue_name`, `checkin`, `checkout`, `order_reference`
    ) VALUES ("piyush@piyush.com",
            "Piyush Kumar",
            2,
            "Computer Lab",
            "2019-07-07",
            "2019-07-08",
            "H21ZRCPKWE32"
            )';
$sqls[] = 'INSERT INTO `'._DB_PREFIX_.'a_iiitm_venue_booking_details`(
    `customer_email`,`customer_name` ,`venue_id`,`venue_name`, `checkin`, `checkout`, `order_reference`
    ) VALUES ("piyush@piyush.com",
            "Piyush Kumar",
            3,
            "Guest House",
            "2019-07-07",
            "2019-07-08",
            "H21ZRCPKWE33"
            )';






foreach($sqls as $sql)
    if(!Db::getInstance()->execute($sql))
        return false;















