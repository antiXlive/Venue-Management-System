<?php
require_once _PS_ROOT_DIR_.'/modules/alenia/classes/OrderDetails.php';


//Controller to manage admin orders in the back office
class AdminManageOrdersController extends ModuleAdminController
{
    public function __construct()
    {
        
        $this->bootstrap = true;
        $this->table = 'a_iiitm_venue_booking_details';
        $this->className = 'OrderDetails';
        $this->identifier = 'id';
        $this->context = Context::getContext();
        parent::__construct();


        $this->fields_list = array();
        $this->fields_list['id'] = array(
            'title' => $this->l('ID'),
            'align' => 'center',
            'type' => 'int'
        );
        $this->fields_list['order_reference'] = array(
            'title' => $this->l('Order Reference'),
            'align' => 'center',
        );
        $this->fields_list['venue_name'] = array(
            'title' => $this->l('Venue Name'),
            'align' => 'center',
        ); 
        $this->fields_list['customer_name'] = array(
            'title' => $this->l('Customer Name'),
            'align' => 'center',
        ); 
        $this->fields_list['customer_email'] = array(
            'title' => $this->l('Customer Email'),
            'align' => 'center',
        ); 
        $this->fields_list['checkin'] = array(
            'title' => $this->l('Checkin'),
            'align' => 'center',
        ); 
        $this->fields_list['checkout'] = array(
            'title' => $this->l('Checkout'),
            'align' => 'center',
        ); 
        $this->addRowAction('view');

    } 
}
