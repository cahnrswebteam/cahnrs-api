<?php namespace cahnrs\api;
class api{
	
	public function __construct(){
		$this->init_autoload(); // ACTIVATE CUSTOM AUTOLOADER FOR CLASSES
		$this->define_constants(); // YEP, THAT'S WHAT IT DOES
		if( isset( $_GET[ 'service'] ) ){
			switch ( $_GET[ 'service'] ){
				case 'globalnav':
					$globalnav = new globalnav_control();
					$globalnav->get_nav();
					//echo 'global nav';
					break;
				case 'globalpage':
					if(isset( $_GET['test'] ) ){
						$init_global_page = new global_page_test_control();
						$init_global_page->build_data();
					} else {
						$init_global_page = new global_page_control();
						$init_global_page->build_data();
					}
					break;
				case 'standard-feed':
					$encode = ( isset( $_GET[ 'encode'] ) )? $_GET[ 'encode'] : 'json';
					$id = ( isset( $_GET[ 'id'] ) )? $_GET[ 'id'] : 'featured';
					$standard_feed = new standard_feed_control();
					$standard_feed->get_feed( $id ,$encode );
					break;
				case 'globalheader':
					$globalheader = new global_header_control();
					$globalheader->build_data();
					break;
			}
		}
	}
	private function init_autoload(){
		require_once 'controls/autoload_control.php'; //REQUIRE AUTOLOADER CONTROL - MAKES IT MORE PORTABLE
		$autoload = new autoload_contol(); // INIT AUTOLOADER SO WE DON'T HAVE TO USE REQUIRE ANY MORE
	}
	
	private function define_constants(){
		//define( __NAMESPACE__.'\URL' , plugins_url( 'cahnrs-pagebuilder' ) ); // PLUGIN BASE URL
		define( __NAMESPACE__.'\DIR' , dirname(__FILE__)  ); // DIRECTORY PATH
	}
}

$cahnrs_api = new api();
;?>