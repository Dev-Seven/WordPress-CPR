<?php
/******************************************************************************************
 * Copyright (C) Smackcoders. - All Rights Reserved under Smackcoders Proprietary License
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * You can contact Smackcoders at email address info@smackcoders.com.
 *******************************************************************************************/

namespace Smackcoders\CFCSV;

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class ImportConfiguration {
	private static $import_config_instance = null;

	private function __construct(){
		add_action('wp_ajax_updatefields',array($this,'get_update_fields'));
		add_action('wp_ajax_rollback_now',array($this,'rollback_now'));
		add_action('wp_ajax_clear_rollback',array($this,'clear_rollback'));
	}

	public static function getInstance() {       
		if (ImportConfiguration::$import_config_instance == null) {
			ImportConfiguration::$import_config_instance = new ImportConfiguration;
			return ImportConfiguration::$import_config_instance;
		}
		return ImportConfiguration::$import_config_instance;
	}

	public function get_update_fields(){
		global $wpdb;
		$import_type = $_POST['Types'];	
		$mode = $_POST['Mode'];
		$response = [];
		$taxonomies = get_taxonomies(); 
		if($mode == 'Update') {
			$fields = array( 'post_title', 'ID', 'post_name');
			
			if($import_type == 'Images'){
				// $fields =array('Filename','Featured_image','ID');
				
				//changed
				$fields =array('Filename','image_url','ID');
			}

			if($import_type == 'Users'){
				$fields = array('user_email','ID','user_login');
			}
			if (in_array($import_type, $taxonomies)) {
				$fields = array('slug','termid');
			}
			if($import_type == 'ngg_pictures'){
				$fields = array('ID','Filename');
			}
		}
		else {
			if (in_array($import_type, $taxonomies)) {
				$fields = array('slug');
			}
			if($import_type == 'Users'){
				$fields = array('user_email');
			}
			else{
				$fields = array('ID', 'post_title', 'post_name');
			}
		}		  
		$response['update_fields'] = $fields;
		echo wp_json_encode($response);
		wp_die();

	}

	public function get_rollback_tables($type){
		if($type == 'Users'){
			$tables = array('users','usermeta');
		}
		elseif($type == 'Comments'){
			$tables = array('comments','commentmeta');
		}elseif($type == 'Customer Reviews'){
			$tables = array('posts','postmeta');
			if(is_plugin_active('wp-customer-reviews/wp-customer-reviews-3.php')){
			}
		}else{
			$tables = array('posts','postmeta','termmeta','terms','term_relationships','term_taxonomy','options','usermeta','comments','commentmeta');
			if(is_plugin_active('custom-field-suite/cfs.php')){
				array_push($tables,'cfs_values');
			}
		}
		$sqltables = array_map(function($tables) {
			global $wpdb;
			return $wpdb->prefix . $tables;
		}, $tables);
		return $sqltables;
	}

	public function set_backup_restore($eventkey, $type, $tables = null){
		$dbname = DB_NAME;
		$dbuser = DB_USER;
		$dbpass = DB_PASSWORD;
		$upload_dir = wp_upload_dir();
		$upload_dir = $upload_dir['basedir'];
		$upload_dir = $upload_dir . '/smack_uci_uploads/';
		$uploadpath = $upload_dir ."rollback_files/". $eventkey;
		$filename = 'Backup_'.$eventkey.'.sql';
		if (!is_dir($uploadpath)) {
			wp_mkdir_p($uploadpath);
		}
		chmod($uploadpath , 0777);
		$filepath = $uploadpath.'/'.$filename;
		if($type == 'backup'){
			$backtabs = implode(' ',$tables);
			$command = "mysqldump -u{$dbuser}  -p{$dbpass} {$dbname} {$backtabs} > {$filepath}";
			exec($command,$output,$return);
			if(!$return){
				return 'Backup Completed';
			}else{
				return 'Not Completed';
			}
		}
		if($type == 'restore'){
			if(file_exists($filepath)) {
				$command = "mysql -u{$dbuser}  -p{$dbpass} {$dbname} < {$filepath}";
				exec($command,$output,$return);
				if(!$return){
					return 'Rollback Completed';
				}else{
					return 'Not Completed';
				}
			}
		}
		if($type == 'delete'){
			if (!unlink($filepath)){
				return 'Error Deleting'.$filename;
			}else{
				rmdir($uploadpath); 
				return 'Deleted'.$filename;
			}
		}
	}

	public function rollback_now(){
		$response = [];
		$eventKey = $_POST['HashKey'];
		$tables = '';	
		$result = $this->set_backup_restore($eventKey,'restore', $tables);
		$response['message'] = $result;
		echo wp_json_encode($response);
		wp_die();
	}

	public function clear_rollback(){
		$response = [];
		$eventKey = $_POST['HashKey'];
		$tables = '';
		$result = $this->set_backup_restore($eventKey,'delete',$tables);
		$response['message'] = $result;
		echo wp_json_encode($response);
		wp_die();
	}

}

