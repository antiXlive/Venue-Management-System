<?php

//Class to be triggered for managvenue controller to give required informations to that controller.
class VenueInformation extends ObjectModel
{
    public $name;
    public $seats;
    public $price;
    public $short_description;
    public $description;

    public static $definition = array(
        'table' => 'a_iiitm_venue_details',
        'primary' => 'id',
        'fields' => array(
            'name' => array('type'=> self::TYPE_STRING),
            'seats' => array('type'=> self::TYPE_INT),
            'price' => array('type'=> self::TYPE_INT),
            'short_description' => array('type'=> self::TYPE_HTML, 'validate' => 'isCleanHtml',),
            'description' => array('type'=> self::TYPE_HTML, 'validate' => 'isCleanHtml',),
        ),
        );

   
}
