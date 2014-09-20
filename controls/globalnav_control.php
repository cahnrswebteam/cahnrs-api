<?php namespace cahnrs\api;
class globalnav_control{
	
	public function get_nav(){
		include DIR.'/cache/globalnav/full_nav.json';
	}
}
;?>