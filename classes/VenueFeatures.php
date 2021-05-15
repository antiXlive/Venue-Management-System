<?php

//Class to be triggered for managevenuefeatures controller to give required informations to that controller.
class VenueFeatures extends ObjectModel
{
    public $venue_name;
    public $feature;
   

    public static $definition = array(
        'table' => 'a_iiitm_venue_features',
        'primary' => 'id',
        'fields' => array(
            'venue_name' => array('type'=> self::TYPE_HTML, 'validate' => 'isCleanHtml',),
            'feature' => array('type'=> self::TYPE_HTML, 'validate' => 'isCleanHtml',),
           
        ),
        );

   
}
