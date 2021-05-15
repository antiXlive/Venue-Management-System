<?php

//Front controller to display the venue on the venue details page.
class AleniaDisplayModuleFrontController extends ModuleFrontController
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
        $link.= $_SERVER['REQUEST_URI'];
        $params = explode('?',$link);
        $string_id = $params[2];
        $id = explode('=',$string_id);
        $venue_id = $id[1];
       

        $venue = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'a_iiitm_venue_details where id = '.$venue_id);
        // $features = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'a_iiitm_venue_features where venue_id = '.$venue_id);
        $x = $venue[0]['name'];
        $features = Db::getInstance()->executeS('SELECT feature FROM '._DB_PREFIX_."a_iiitm_venue_features where venue_name = '$x' ");
        foreach($features as $feature)
        {
            $ftr[] = $feature['feature'];
        }
        // print_r($ftr);

        $BD = Db::getInstance()->executeS('SELECT checkin,checkout FROM '._DB_PREFIX_.'a_iiitm_venue_booking_details where venue_id = '.$venue_id);
	    foreach($BD as $detail)
	    {
		    $checkin[] = $detail['checkin'];
		    $checkout[] = $detail['checkout'];
        }

        if($venue_id<4)
        {
            $img = "modules/alenia/views/img/{$venue_id}.jpg";
        }
        else
        {
            $img = "upload/{$venue[0]['name']}";
        }
        
	//print_r($checkin);
	
        $feature=array();
        for($i=0;$i<5;$i++)
        {
            $feature[] = $features[$i]['name'];
        }
        $this->context->smarty->assign(array(
            'venue' => $venue,
            'features' => $ftr, 
            'id' => $venue_id,
            'img' => $img,
            'checkin' => $checkin,
            'checkout' => $checkout,   
        ));
        $this->setTemplate('display.tpl');
    }
    
}
