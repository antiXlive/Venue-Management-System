<?php

//Front controllerto assist in the booking process of the venues
class AleniaCheckoutModuleFrontController extends ModuleFrontController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function init()
    {
        parent::init();
    }

    public function initContent()
    {
        parent::initContent();
        //print_r($_POST['room_check_in']);
        $link.= $_SERVER['REQUEST_URI'];
        // print_r($link);
        $params = explode('?',$link);
        // print_r($params);
        $string_id = $params[2];
        // print_r($string_id);
        
        $id = explode('=',$string_id);
        // print_r($id[2]);

        $venue_id = $id[1];
        $img = "modules/alenia/views/img/{$venue_id}.jpg";


        $venue = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'a_iiitm_venue_details where id = '.$venue_id);
        $features = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'a_iiitm_venue_features where venue_id = '.$venue_id);
        $feature=array();
        for($i=0;$i<5;$i++)
        {
            $feature[] = $features[$i]['name'];
        }
        // echo $venue_id;

        $this->context->smarty->assign(array(
            'venue' => $venue,
            'features' => $feature, 
            'id' => $venue_id,
            'img' => $img,
           
        ));

        // echo"Checking";
        $this->setTemplate('checkout.tpl');
    }
}
