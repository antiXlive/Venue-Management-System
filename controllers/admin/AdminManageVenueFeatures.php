<?php
require_once _PS_ROOT_DIR_.'/modules/alenia/classes/VenueFeatures.php';
// modules/alenia/classes/VenueInformation.php


//Controller to manage venue features in the back office
class AdminManageVenueFeaturesController extends ModuleAdminController
{
    public function __construct()
    {
        
        $this->bootstrap = true;
        $this->table = 'a_iiitm_venue_features';
        $this->className = 'VenueFeatures';
        $this->identifier = 'id';
        $this->context = Context::getContext();
        parent::__construct();

       
        $this->fields_list = array();
        $this->fields_list['venue_name'] = array(
            'title' => $this->l('Venue Name'),
            'align' => 'center',
            'type' => 'text'
        );
        $this->fields_list['feature'] = array(
            'title' => $this->l('Feature'),
            'align' => 'center',
        );
       

        $this->addRowAction('edit');
        $this->addRowAction('delete');

       

        $this->fields_form = [
            'legend' => [
              'title' => 'IIITM Venue',
              'icon' => 'icon-list-ul'
            ],
            'input' => [
              ['name'=>'venue_name','type'=>'text','label'=>'Venue Name','required'=>true,],
              ['name'=>'feature','type'=>'text','label'=>'Feature','required'=>true],
                       ],
            'submit' => [
            	 'name' => 'piyush',
                'title' => $this->l('Save'),
            ],
            // 'submit' => [
            //   'title' => $this->trans('Save', [], 'Admin.Actions'),
            // ]
          ];


    } 
    public function initToolbar()
    {
        parent::initToolbar();
        $this->page_header_toolbar_btn['new'] = array(
            'href' => self::$currentIndex.'&add'.$this->table.'&token='.$this->token,
            'desc' => $this->l('Add new Feature'),
        );
    }
    

}