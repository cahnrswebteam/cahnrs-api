<?php namespace cahnrs\api;
class global_page_test_control{
	public $sites = array(
		array('url' => 'http://m1.wpdev.cahnrs.wsu.edu' , 'id' => 'home' ,'title' => 'Home' ),
		array('url' => 'http://m1.wpdev.cahnrs.wsu.edu/academics' , 'id' => 'academics' ,'title' => 'Students' ),
		array('url' => 'http://m1.wpdev.cahnrs.wsu.edu/research' , 'id' => 'research' ,'title' => 'Research' ),
		array('url' => 'http://m1.wpdev.cahnrs.wsu.edu/extension' , 'id' => 'extension' ,'title' => 'Extension' ),
		array('url' => 'http://m1.wpdev.cahnrs.wsu.edu/alumni' , 'id' => 'alumni' ,'title' => 'Alumni & Friends' ),
		array('url' => 'http://m1.wpdev.cahnrs.wsu.edu/fs' , 'id' => 'fs' ,'title' => 'Faculty & Staff' ),
	);
	
	public function build_data(){
		$site_data = array();
		foreach( $this->sites as $site ){
			$temp = array();
			$json = file_get_contents( $site['url'].'?site-json=true');
			if( $json ) { 
				$temp['url'] = $site['url'];
				$temp['data'] =	json_decode( $json ); 
				$temp['id'] =	$site['id'];
				$temp['title'] = $site['title'];
				$site_data[] = $temp; 
			} 
		}
		if( $site_data ){
			$file = DIR.'/cache/globalpage/globalpage-test.js';
			$jsonfile = DIR.'/cache/globalpage/globalpage-test.json'; 
			$current = 'var api_globalheader = '.json_encode( $site_data );
			// Write the contents back to the file
			file_put_contents( $file, $current );
			file_put_contents( $jsonfile, json_encode( $site_data )  );
			echo 'File Updatded';
		}
		//include DIR.'/cache/globalnav/full_nav.json';
	}
}
;?>