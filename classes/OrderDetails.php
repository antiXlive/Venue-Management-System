<?php

//Class to be triggered for manageorder controller to give required informations to that controller.
class OrderDetails extends ObjectModel
{
    public $customer_email;
    public $customer_name;
    public $venue_id;
    public $venue_name;
    public $checkin;
    public $checkout;
    public $order_reference;

    public static $definition = array(
        'table' => 'a_iiitm_venue_booking_details',
        'primary' => 'id',
        'fields' => array(
            'customer_email' => array('type'=> self::TYPE_STRING),
            'customer_email' => array('type'=> self::TYPE_STRING),
            'venue_id' => array('type'=> self::TYPE_INT),
            'venue_name' => array('type'=> self::TYPE_STRING),
            'checkin' => array('type'=> self::TYPE_INT),
            'checkout' => array('type'=> self::TYPE_HTML, 'validate' => 'isCleanHtml',),
            'order_reference' => array('type'=> self::TYPE_HTML, 'validate' => 'isCleanHtml',),
        	),
        );
}
