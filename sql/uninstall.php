<?php
$sqls = array();
$sqls[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'a_iiitm_venue_details`';
$sqls[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'a_iiitm_venue_features`';
$sqls[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'a_iiitm_user_details`';
$sqls[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'a_iiitm_venue_booking_details`';
foreach($sqls as $sql)
    if(!Db::getInstance()->execute($sql))
        return false;