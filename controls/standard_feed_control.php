<?php namespace cahnrs\api;
class standard_feed_control{
	
	public function get_feed( $id , $encode ){
		
		include DIR.'/cache/standard_feed/'.$id.'_'.$encode.'.php';
	}
}
;?>