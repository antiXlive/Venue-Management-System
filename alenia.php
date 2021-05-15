<?php

/**
 * 
 * IIIT MANIPUR
 * 
 * @author Piyush Kumar
 * 
 * @email piyush107@iiitmanipur.ac.in
 * 
 */
include(dirname(__FILE__).'/config/config.inc.php');
include(dirname(__FILE__).'/init.php');

if(!defined('_PS_VERSION_'))
{
	exit;
}

class Alenia extends Module
{
// ******************************INFORMATION******************************
	public function __construct()
	{
		$this->name = 'alenia';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'Piyush Kumar';
		$this->need_instance = 0;
		$this->ps_versions_compliancy = [
			'min' => '1.4.0',
			'max' => _PS_VERSION_
		];
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->l('A IIITM Venue Management System');
		$this->description = $this->l('Build a brand venue management website with just a click.');
	}
// ******************************INFORMATION******************************

	
// ******************************INITIALIZATION******************************
	public function install()
	{
		include_once($this->local_path.'sql/install.php');
		// if(!parent::install()
		// ||!$this->registerModuleHooks()
		// )
		// {
		// 	return false;
		// }
		// return true;
		// $objVenueBlock = new VenueDisplay();
		return parent::install()
		&& $this->registerHook('header')
		&& $this->registerHook('displayHome')
		&& $this->callInstallTab()
		&& $this->initializeproducts();
	}
	public function registerModuleHooks()
    {
        return $this->registerHook(
            array (
				'displayHeader',
				'displayTop',
				'displayHome',
                'displayAfterHookTop',
                'displayBackOfficeHeader',
                'footer',
            )
        );
    }

	public function uninstall()
	{
		include_once($this->local_path.'sql/uninstall.php');
		return parent::uninstall()
		&& $this->uninstallTab();
	}
	
// ******************************INITIALIZATION******************************

	
	




	public function hookHeader()
	{
		$this->context->controller->addCSS(array(
			$this->_path.'views/css/alenia.css', 'all'
		));
		// $this->context->controller->addJS(array(
		// 	$this->_path.'views/js/alenia.js'
		// ));
	}
	
	public function hookDisplayHome()
	{
		$allvenue = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'a_iiitm_venue_details');
		//print_r($allvenue);
		$this->context->smarty->assign([
    			'module_url' => $this->context->link->getModuleLink('alenia','display'),
    			'allvenue' => $allvenue
 		]);
  		return $this->display(__FILE__, 'home.tpl');

	}
	
	public function callInstallTab()
	{
		$this->installTab('AdminIIITMVenueManagement', 'IIITM VENUE MANAGEMENT');
		$this->installTab('AdminManageVenue', 'Manage Venue', 'AdminIIITMVenueManagement');
		$this->installTab('AdminManageOrders', 'Manage Orders', 'AdminIIITMVenueManagement');
		$this->installTab('AdminManageVenueFeatures', 'Manage Venue Features', 'AdminIIITMVenueManagement');

	}

	
	public function installTab($class_name, $tab_name, $tab_parent_name = false, $need_tab = true)
	{
        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = $class_name;
        $tab->name = array();

        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $tab_name;
        }

        if ($tab_parent_name) {
            $tab->id_parent = (int) Tab::getIdFromClassName($tab_parent_name);
        } elseif (!$need_tab) {
            $tab->id_parent = -1;
        } else {
            $tab->id_parent = 0;
        }

        $tab->module = $this->name;
        $res = $tab->add();
        return $res;
	}
	public function uninstallTab()
    	{
        	$moduleTabs = Tab::getCollectionFromModule($this->name);
        	if (!empty($moduleTabs))
        	{
            		foreach ($moduleTabs as $moduleTab)
            		{
	                	$moduleTab->delete();
            		}
        	}
	        return true;
	}
	
}
