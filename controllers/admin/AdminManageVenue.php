<?php
require_once _PS_ROOT_DIR_.'/modules/alenia/classes/VenueInformation.php';
// modules/alenia/classes/VenueInformation.php


//Controller to manage venue in the back office
class AdminManageVenueController extends ModuleAdminController
{
    public function __construct()
    {
        
        $this->bootstrap = true;
        $this->table = 'a_iiitm_venue_details';
        $this->className = 'VenueInformation';
        $this->identifier = 'id';
        $this->context = Context::getContext();
        parent::__construct();

       

        $this->fields_list = array();
        $this->fields_list['id'] = array(
            'title' => $this->l('ID'),
            'align' => 'center',
            'type' => 'int'
        );
        $this->fields_list['name'] = array(
            'title' => $this->l('Venue Name'),
            'align' => 'center',
        );
        $this->fields_list['seats'] = array(
            'title' => $this->l('Seats'),
            'align' => 'center',
        ); 
        $this->fields_list['price'] = array(
            'title' => $this->l('Price'),
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
              ['name'=>'name','type'=>'text','label'=>'Name','required'=>true,],
              ['name'=>'seats','type'=>'text','label'=>'Seats','required'=>true],
              ['name'=>'price','type'=>'text','label'=>'Price','required'=>true],
              ['name'=>'short_description','type'=>'text','label'=>'Short Description','required'=>true],
              ['name'=>'description','type'=>'text','label'=>'Description','required'=>true],
              //['name'=>'venue_image','type'=>'file','label'=>'Image','required'=>true],
              ['type' => 'file', 'label' => 'Venue Image', 'name' => 'venue_image', 'display_image' => true]
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
            'desc' => $this->l('Add new Venue'),
        );
    }
    


//Function to process venue images so as to save it on the server
    
    
    public function postProcess()
    {
        if(Tools::isSubmit('piyush'))
        {
            if (isset($_FILES['venue_image'])) 
            {
                //print_r("OK");
                
                $x = Tools::getValue('name');
                $_FILES['venue_image']["name"] = $x;
                $target_dir = _PS_UPLOAD_DIR_;
				$target_file = $target_dir . basename($_FILES['venue_image']["name"]);	
				$uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                if (move_uploaded_file($_FILES['venue_image']["tmp_name"], $target_file)) 
				{
					echo "The file ". basename($_FILES['venue_image']["name"]). " has been uploaded.";
					$file_location = basename($_FILES['venue_image']["name"]);
                } 

                $bookingData = array(
                    'customer_email' => "piyush@piyush",
                    'customer_name' => "Piyush Kumar",
                    'venue_name' => $x,
                    'checkin' => "2019-07-07",
                    'checkout' => "2019-07-08", 
                    'order_reference' => "H21ZRCPKWE34"
                );
                $checkpoint2 = Db::getInstance()->insert('a_iiitm_venue_booking_details', $bookingData);

            }
            else
            {
               // print_r("NO");
            }


            parent::postProcess();
        }
    }
}
