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

class CoreFieldsImport {
	private static $core_instance = null,$media_instance,$nextgen_instance;
	public $detailed_log;

	public static function getInstance() {
		if (CoreFieldsImport::$core_instance == null) {
			CoreFieldsImport::$core_instance = new CoreFieldsImport;
			CoreFieldsImport::$media_instance = new MediaHandling;
			CoreFieldsImport::$nextgen_instance = new NextGenGalleryImport;
			return CoreFieldsImport::$core_instance;
		}
		return CoreFieldsImport::$core_instance;
	}

	function set_core_values($header_array ,$value_array , $map , $type , $mode , $line_number , $unmatched_row, $check , $hash_key, $acf,$pods, $toolset, $update_based_on, $gmode){
	
		global $wpdb;
		$helpers_instance = ImportHelpers::getInstance();
		CoreFieldsImport::$media_instance->header_array = $header_array;
		CoreFieldsImport::$media_instance->value_array = $value_array;
		$log_table_name = $wpdb->prefix ."cfimport_detail_log";
		$taxonomies = get_taxonomies();
		if (in_array($type, $taxonomies)) {
			$import_type = $type;
			if($import_type == 'category' || $import_type == 'product_category' || $import_type == 'product_cat' || $import_type == 'wpsc_product_category' ):
				$type = 'Categories';
			elseif($import_type == 'product_tag' || $import_type == 'event-tags' || $import_type == 'post_tag'):
				$type = 'Tags';

			else:
			$type = 'Taxonomies';
			endif;
		}

		if(($type == 'Categories') || ($type == 'Tags') || ($type == 'Taxonomies') || ($type == 'Comments') || ($type == 'Users') || ($type == 'nav_menu_item') || ($type == 'widgets')){
			$taxonomies_instance = TaxonomiesImport::getInstance();
			$comments_instance = CommentsImport::getInstance();
			$users_instance = UsersImport::getInstance();
			$post_values = [];
			$post_values = $helpers_instance->get_header_values($map , $header_array , $value_array);

			if(($type == 'Categories') || ($type == 'Tags') || ($type == 'Taxonomies') ){
				$result = $taxonomies_instance->taxonomies_import_function($post_values , $mode , $import_type , $unmatched_row, $check , $hash_key ,$line_number ,$header_array ,$value_array);
			}
			if($type == 'Users'){
				$result = $users_instance->users_import_function($post_values , $mode ,$hash_key , $line_number);
			}
			if($type == 'Comments'){
				$result = $comments_instance->comments_import_function($post_values , $mode ,$hash_key , $line_number);
			}

			if($type == 'nav_menu_item'){
				$comments_instance->menu_import_function($post_values, $mode, $hash_key, $line_number);
			}
			if($type == 'widgets'){
				$comments_instance->widget_import_function($post_values, $mode, $hash_key, $line_number);
			}


			$post_id = isset($result['ID']) ? $result['ID'] :'';
			$helpers_instance->get_post_ids($post_id ,$hash_key);

			if(isset($post_values['featured_image'])) {
				if(!empty($post_id)){
					if (strpos($post_values['featured_image'], '|') !== false) {
						$featured_img = explode('|', $post_values['featured_image']);
						$post_values['featured_image']=$featured_img[0];					
					}
					else if (strpos($post_values['featured_image'], ',') !== false) {
						$feature_img = explode(',', $post_values['featured_image']);
						$post_values['featured_image']=$feature_img[0];
					}
					else{
						$post_values['featured_image']=$post_values['featured_image'];
					}
					if ( preg_match_all( '/\b[-A-Z0-9+&@#\/%=~_|$?!:,.]*[A-Z0-9+&@#\/%=~_|$]/i', $post_values['featured_image'], $matchedlist, PREG_PATTERN_ORDER ) ) {	
						$image_type = 'Featured';		
						$attach_id = CoreFieldsImport::$media_instance->media_handling( $post_values['featured_image'] , $post_id ,$post_values,$type,$image_type,$hash_key ,$header_array,$value_array);	
					}
				}
			}
			
			if(preg_match("(Can't|Skipped|Duplicate)", $this->detailed_log[$line_number]['Message']) === 0) {  	
				if( $type == 'Users'){
					$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . get_edit_user_link( $post_id , true ) . "' target='_blank' title='" . esc_attr( 'Edit this item' ) . "'> User Profile </a>";
				}
				else{
					$post_values['post_title'] = isset($post_values['post_title']) ? $post_values['post_title'] :'';
					$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . get_edit_term_link( $post_id,$import_type ) . "'target='_blank' title='" . esc_attr( 'Edit this item' ) . "'>Admin View</a>";
					
				}
				if(isset($post_values['post_status'])){
					$this->detailed_log[$line_number]['  Status'] = $post_values['post_status'];
				}	
			}
			return $post_id;
		}
		elseif($type == 'Images' || $type == 'ngg_pictures'){
			$post_values = [];
			foreach($map as $key => $value){
				$csv_value= trim($map[$key]);
				if(!empty($csv_value)){
					$get_key= array_search($csv_value , $header_array);
					if(isset($value_array[$get_key])){
						$csv_element = $value_array[$get_key];	
						$wp_element= trim($key);
						if(!empty($csv_element) && !empty($wp_element)){
							$post_values[$wp_element] = $csv_element;
						}
					}
				}
			}

			if($type == 'Images'){
					//changed
					if(array_key_exists( 'image_url', $post_values)) {
						$keys = array_keys($post_values);
						$keys[array_search('image_url', $keys)] = 'featured_image';
						$post_values = array_combine($keys, $post_values);	
					}
					if(!empty($post_values['featured_image'])){
						if (strpos($post_values['featured_image'], '|') !== false) {
							$featured_img = explode('|', $post_values['featured_image']);
							$post_values['featured_image']=$featured_img[0];					
						}
						else if (strpos($post_values['featured_image'], ',') !== false) {
							$feature_img = explode(',', $post_values['featured_image']);
							$post_values['featured_image']=$feature_img[0];
						}
						else{
							$post_values['featured_image']=$post_values['featured_image'];
						}
					}
				$result = CoreFieldsImport::$media_instance->image_import($post_values,$check,$mode,$line_number);
			}
			if($type == 'ngg_pictures'){
				$result = CoreFieldsImport::$nextgen_instance->nextgenGallery($post_values,$check,$mode);
			}
		}
		else{

			$post_values = [];
			$post_id = isset($post_id) ? $post_id :'';
			$get_result = null;
			foreach($map as $key => $value){
				$csv_value= trim($map[$key]);
				$extension_object = new ExtensionHandler;
				$import_type = $extension_object->import_type_as($type);
				$import_as = $extension_object->import_post_types($import_type );

				if(!empty($csv_value)){
					$pattern = "/({([a-z A-Z 0-9 | , _ -]+)(.*?)(}))/";
					if(preg_match_all($pattern, $csv_value, $matches, PREG_PATTERN_ORDER)){	
						$csv_element = $csv_value;
						foreach($matches[2] as $value){
							$get_key = array_search($value , $header_array);
							if(isset($value_array[$get_key])){
								$csv_value_element = $value_array[$get_key];	
								$value = '{'.$value.'}';
								$csv_element = str_replace($value, $csv_value_element, $csv_element);
							}
						}

						
						$math = 'MATH';
						if (strpos($csv_element, $math) !== false) {		
							$equation = str_replace('MATH', '', $csv_element);
							$csv_element = $helpers_instance->evalmath($equation);
						}
						$wp_element= trim($key);

						if(!empty($csv_element) && !empty($wp_element)){
							$post_values[$wp_element] = $csv_element;
							$post_values['post_type'] = $import_as;
							$post_values = $this->import_core_fields($post_values,$mode);

						}
					}
					elseif(!in_array($csv_value , $header_array)){
						$wp_element= trim($key);
						$post_values[$wp_element] = $csv_value;
						$post_values['post_type'] = $import_as;
						$post_values = $this->import_core_fields($post_values,$mode);
					}
					else{
						$get_key= array_search($csv_value , $header_array);
						if(isset($value_array[$get_key])){
							$csv_element = $value_array[$get_key];	
							$wp_element= trim($key);
							$extension_object = new ExtensionHandler;
							$import_type = $extension_object->import_type_as($type);
							$import_as = $extension_object->import_post_types($import_type );

							if($mode == 'Insert'){
								if(!empty($csv_element) && !empty($wp_element)){
									$post_values[$wp_element] = $csv_element;
									$post_values['post_type'] = $import_as;
								//	$post_values1 = $post_values;
									$post_values = $this->import_core_fields($post_values,$mode);
								}
							}
							else{
								if(!empty($csv_element) || !empty($wp_element)){
									$post_values[$wp_element] = $csv_element;
									$post_values['post_type'] = $import_as;
									$post_values = $this->import_core_fields($post_values,$mode);
								}
							}

								if($import_as == 'page'){
									if(isset($post_values['post_parent'])){
										if(!is_numeric($post_values['post_parent'])){
											$post_parent_title = $post_values['post_parent'];
											$post_parent_id = $wpdb->get_var("SELECT ID FROM {$wpdb->prefix}posts WHERE post_title = '$post_parent_title' AND post_type = 'page'");
											$post_values['post_parent'] = $post_parent_id;
										}
									}
								}
						}
					}
				}
			}
			if($check == 'ID'){	
				$ID = $post_values['ID'];	
				$get_result =  $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE ID = '$ID' AND post_type = '$import_as' AND post_status != 'trash' order by ID DESC ");			
			}
			if($check == 'post_title'){
				$title = $post_values['post_title'];
				$title = $wpdb->_real_escape($title);
				$get_result =  $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_title = '$title' AND post_type = '$import_as' AND post_status != 'trash' order by ID DESC ");		
			}
			if($check == 'post_name'){
				$name = $post_values['post_name'];
				$get_result =  $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_name = '$name' AND post_type = '$import_as' AND post_status != 'trash' order by ID DESC ");	
			}
			if($check == 'post_content'){
				$content = $post_values['post_content'];
				$get_result =  $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_content = '$content' AND post_type = '$import_as' AND post_status != 'trash' order by ID DESC ");	
			}
			$update = array('ID','post_title','post_name','post_content');
		
			if(!in_array($check, $update)){
				if($update_based_on == 'acf'){
					if(is_plugin_active('advanced-custom-fields-pro/acf.php')||is_plugin_active('advanced-custom-fields/acf.php')){
						if(is_array($acf)){
							foreach($acf as $acf_key => $acf_value){
								if($acf_key == $check){
									$get_key= array_search($acf_value , $header_array);
								}
								if(isset($value_array[$get_key])){
									$csv_element = $value_array[$get_key];	
								}
								$get_result = $wpdb->get_results("SELECT post_id FROM {$wpdb->prefix}postmeta as a join {$wpdb->prefix}posts as b on a.post_id = b.ID WHERE a.meta_key = '$check' AND a.meta_value = '$csv_element' AND b.post_status != 'trash' order by a.post_id DESC ");
							}	
						}		
					}
				}
				elseif($update_based_on == 'toolset'){
					if(is_plugin_active('types/wpcf.php')){
						if(is_array($toolset)){
							
							foreach($toolset as $tool_key => $tool_value){
								if($tool_key == $check){
									$get_key= array_search($tool_value , $header_array);
								}
								if(isset($value_array[$get_key])){
									$csv_element = $value_array[$get_key];	
								}
								$meta_key = 'wpcf-'.$check;
								$get_result = $wpdb->get_results("SELECT post_id FROM {$wpdb->prefix}postmeta as a join {$wpdb->prefix}posts as b on a.post_id = b.ID WHERE a.meta_key = '$meta_key' AND a.meta_value = '$csv_element' AND b.post_status != 'trash' order by a.post_id DESC ");
							}	
						}		
					}
				}
				if($update_based_on == 'pods'){
					if(is_plugin_active('pods/init.php')){
						if(is_array($pods)){
							foreach($pods as $pods_key => $pods_value){
								if($pods_key == $check){
									$get_key= array_search($pods_value , $header_array);
								}
								if(isset($value_array[$get_key])){
									$csv_element = $value_array[$get_key];	
								}
								$get_result = $wpdb->get_results("SELECT post_id FROM {$wpdb->prefix}postmeta as a join {$wpdb->prefix}posts as b on a.post_id = b.ID WHERE a.meta_key = '$check' AND a.meta_value = '$csv_element' AND b.post_status != 'trash' order by a.post_id DESC ");
							}	
						}		
					}
				}
			}

			$updated_row_counts = $helpers_instance->update_count($hash_key);
			$created_count = $updated_row_counts['created'];
			$updated_count = $updated_row_counts['updated'];
			$skipped_count = $updated_row_counts['skipped'];

			if($mode == 'Insert'){

				if (is_array($get_result) && !empty($get_result)) {
					$wpdb->get_results("UPDATE $log_table_name SET skipped = $skipped_count WHERE hash_key = '$hash_key'");
					$this->detailed_log[$line_number]['Message'] =  "Skipped, Due to duplicate found!.";
				}else{
					$media_handle = get_option('smack_image_options');
					if($media_handle['media_settings']['media_handle_option'] == 'true' && $media_handle['media_settings']['enable_postcontent_image'] == 'true'){
					
						if(preg_match("/<img/", $post_values['post_content'])) {

							$content = "<p>".$post_values['post_content']."</p>";
							$doc = new \DOMDocument();
							#$doc->preserveWhiteSpace = false;
							if(function_exists('mb_convert_encoding')) {
								@$doc->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
							}else{
								@$doc->loadHTML( $content);
							}
							$searchNode = $doc->getElementsByTagName( "img" );
							if ( ! empty( $searchNode ) ) {
								foreach ( $searchNode as $searchNode ) {
									$orig_img_src[] = $searchNode->getAttribute( 'src' ); 			
									$media_dir = wp_get_upload_dir();
									$names = $media_dir['url'];

									$shortcode_img[] = $orig_img_src;

									$temp_img = plugins_url("../assets/images/loading-image.jpg", __FILE__);
									$searchNode->setAttribute( 'src', $temp_img);
									//	$searchNode->setAttribute( 'alt', $shortcode_img );

									$orig_img_alt = $searchNode->getAttribute( 'alt' );
									if(!empty($orig_img_alt)){
										$media_handle['postcontent_image_alt'] = $orig_img_alt;
										update_option('smack_image_options', $media_handle);
									}
								}
								$post_content              = $doc->saveHTML();
								$post_values['post_content'] = $post_content;
								$update_content['ID']           = $post_id;
								$update_content['post_content'] = $post_content;
								wp_update_post( $update_content );
							}
						}
					}
					if(isset($post_values['post_parent'])){
						if(!is_numeric($post_values['post_parent'])&&!empty($post_values['post_parent'])){
							$p_type=$post_values['post_type'];
							$parent_title=$post_values['post_parent'];
							$parent_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title = '$parent_title' and post_status !='trash' and post_type='$p_type'" );
							$post_values['post_parent']=$parent_id;
						}
					}
					$post_id = wp_insert_post($post_values);
					if(!empty($post_values['wp_page_template'])){
						update_post_meta($post_id, '_wp_page_template', $post_values['wp_page_template']);
					}

					if($post_values['post_status'] == 'delete'){
						$post_title = $post_values['post_title'];
						$post_id = $wpdb->get_results("select ID from {$wpdb->prefix}posts where post_title = '$post_title'");
						foreach($post_id as $value){
							$posts = $value->ID;
							wp_delete_post($posts,true); 
						}
					}

					if($unmatched_row == 'true'){
						global $wpdb;
						$post_entries_table = $wpdb->prefix ."post_entries_table";
						$file_table_name = $wpdb->prefix."smackcf_file_events";
						$get_id  = $wpdb->get_results( "SELECT file_name  FROM $file_table_name WHERE `hash_key` = '$hash_key'");	
						$file_name = $get_id[0]->file_name;
						$wpdb->get_results("INSERT INTO $post_entries_table (`ID`,`type`, `file_name`,`status`) VALUES ( '{$post_id}','{$type}', '{$file_name}','Inserted')");
					}

					if(isset($post_values['post_format'])){
						if($post_values['post_format'] == 'post-format-video' ){
							$format = 'video';
						}
						else{
							$format=trim($post_values['post_format'],"post-format-");
						}	
						set_post_format($post_id , $format);
					}
					$wpdb->get_results("UPDATE $log_table_name SET created = $created_count WHERE hash_key = '$hash_key'");

					if(preg_match("/<img/", $post_values['post_content'])) {
						$shortcode_table = $wpdb->prefix . "ultimate_cf_importer_shortcode_manager";
						foreach ($orig_img_src as $img => $img_val){
							//$shortcode  = $shortcode_img[$img][$img];
							$shortcode  = 'inline';
							$wpdb->get_results("INSERT INTO $shortcode_table (image_shortcode , original_image , post_id,hash_key) VALUES ( '{$shortcode}', '{$img_val}', $post_id  ,'{$hash_key}')");
						}
						$doc = new \DOMDocument();
						$searchNode = $doc->getElementsByTagName( "img" );
						if ( ! empty( $searchNode ) ) {
							foreach ( $searchNode as $searchNode ) {
								$orig_img_src = $searchNode->getAttribute( 'src' ); 
							}
						}			
						$media_dir = wp_get_upload_dir();
						$names = $media_dir['url'];
					}
					if(is_wp_error($post_id) || $post_id == '') {
						if(is_wp_error($post_id)) {
							$this->detailed_log[$line_number]['Message'] = "Can't insert this " . $post_values['post_type'] . ". " . $post_id->get_error_message();
						}
						else {
							$this->detailed_log[$line_number]['Message'] =  "Can't insert this " . $post_values['post_type'];
						}
						$wpdb->get_results("UPDATE $log_table_name SET skipped = $skipped_count WHERE hash_key = '$hash_key'");
					}	
					else{
						$this->detailed_log[$line_number]['Message'] = 'Inserted ' . $post_values['post_type'] . ' ID: ' . $post_id . ', ' . $post_values['specific_author'];	
					}
				}
			}

		
			if($mode == 'Update'){
				if (is_array($get_result) && !empty($get_result)) {
					if(!in_array($check, $update)){
						$post_id = $get_result[0]->post_id;		
						$post_values['ID'] = $post_id;
					}else{
						$post_id = $get_result[0]->ID;	
						$post_values['ID'] = $post_id;
					}
					if($post_values['post_status']== 'delete'){
						wp_delete_post($post_values['ID'],true);
					}else{
						wp_update_post($post_values);
					}


					if($unmatched_row == 'true'){
						global $wpdb;
						$post_entries_table = $wpdb->prefix ."post_entries_table";
						$file_table_name = $wpdb->prefix."smackcf_file_events";
						$get_id  = $wpdb->get_results( "SELECT file_name  FROM $file_table_name WHERE `hash_key` = '$hash_key'");	
						$file_name = $get_id[0]->file_name;
						$wpdb->get_results("INSERT INTO $post_entries_table (`ID`,`type`, `file_name`,`status`) VALUES ( '{$post_id}','{$type}', '{$file_name}','Updated')");
					}

					if(isset($post_values['post_format'])){
						if($post_values['post_format'] == 'post-format-video' ){
							$format = 'video';
						}
						else{
							$format=trim($post_values['post_format'],"post-format-");
						}	
						set_post_format($post_id , $format);
					}	
					$wpdb->get_results("UPDATE $log_table_name SET updated = $updated_count WHERE hash_key = '$hash_key'");
					$this->detailed_log[$line_number]['Message'] = 'Updated' . $post_values['post_type'] . ' ID: ' . $post_id . ', ' . $post_values['specific_author'];
				}
				else{
					$mode_of_affect = 'Skipped';
				    $this->detailed_log[$line_number]['Message'] = "Skipped";
					$wpdb->get_results("UPDATE $log_table_name SET skipped = $skipped_count WHERE hash_key = '$hash_key'");
					//return $mode_of_affect;
				}

			}
			if(preg_match("(Can't|Skipped|Duplicate)", $this->detailed_log[$line_number]['Message']) === 0) {  
				if ( $type == 'Posts' || $type == 'CustomPosts' || $type == 'Pages') {
					if ( ! isset( $post_values['post_title'] ) ) {
						$post_values['post_title'] = '';
					}
					if ($gmode == 'Normal'){
						$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . get_permalink( $post_id ) . "' target='_blank' title='" . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $post_values['post_title'] ) ) . "'rel='permalink'>Web View</a> | <a href='" . get_edit_post_link( $post_id, true ) . "'target='_blank' title='" . esc_attr( 'Edit this item' ) . "'>Admin View</a>";	
					}
					else{
						global $wpdb;
						if(empty($post_id)){
							$this->detailed_log[$line_number][' Message'] = 'Skipped';
						}
						else{
							$get_guid =$wpdb->get_results("select guid from {$wpdb->prefix}posts where ID= '$post_id'" ,ARRAY_A);
							$link =$get_guid[0]['guid'];
							$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . $link . "' target='_blank' title='" . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $post_values['post_title'] ) ) . "'rel='permalink'>Web View</a> | <a href='" . get_edit_post_link( $post_id, true ) . "'target='_blank' title='" . esc_attr( 'Edit this item' ) . "'>Admin View</a>";	
						}
					}
					//$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . get_permalink( $post_id ) . "' target='_blank' title='" . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $post_values['post_title'] ) ) . "'rel='permalink'>Web View</a> | <a href='" . get_edit_post_link( $post_id, true ) . "'target='_blank' title='" . esc_attr( 'Edit this item' ) . "'>Admin View</a>";
				}
				else{
					$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . get_permalink( $post_id ) . "' target='_blank' title='" . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $post_values['post_title'] ) ) . "'rel='permalink'>Web View</a> | <a href='" . get_edit_post_link( $post_id, true ) . "'target='_blank' title='" . esc_attr( 'Edit this item' ) . "'>Admin View</a>";
				}
				$this->detailed_log[$line_number][' Status'] = $post_values['post_status'];
			}

			if(isset($post_values['featured_image'])) {
				if(!empty($post_id)){
					if (strpos($post_values['featured_image'], '|') !== false) {
						$featured_img = explode('|', $post_values['featured_image']);
						$post_values['featured_image']=$featured_img[0];					
					}
					else if (strpos($post_values['featured_image'], ',') !== false) {
						$feature_img = explode(',', $post_values['featured_image']);
						$post_values['featured_image']=$feature_img[0];
					}
					else{
						$post_values['featured_image']=$post_values['featured_image'];
					}
					if ( preg_match_all( '/\b[-A-Z0-9+&@#\/%=~_|$?!:,.]*[A-Z0-9+&@#\/%=~_|$]/i', $post_values['featured_image'], $matchedlist, PREG_PATTERN_ORDER ) ) {	
						$image_type = 'Featured';		
						$attach_id = CoreFieldsImport::$media_instance->media_handling( $post_values['featured_image'] , $post_id ,$post_values,$type,$image_type,$hash_key,$header_array,$value_array);	
					}
				}
				
			}
			return $post_id;
		}
	}

	function image_handling($id){

		global $wpdb;
		$post_values = [];
		$get_result =  $wpdb->get_results("SELECT post_content FROM {$wpdb->prefix}posts where ID = $id",ARRAY_A);   
		$post_values['post_content']=htmlspecialchars_decode($get_result[0]['post_content']);
		$get_result =  $wpdb->get_results("SELECT original_image FROM {$wpdb->prefix}ultimate_cf_importer_shortcode_manager where post_id = $id",ARRAY_A);   
		foreach($get_result as $result){
			$orig_img_src[] = $result['original_image'];
		}
		$get_results =  $wpdb->get_results("SELECT image_shortcode FROM {$wpdb->prefix}ultimate_cf_importer_shortcode_manager where post_id = $id",ARRAY_A);   
		foreach ($get_results as $results){
			$origs_img_src[] = $results['image_shortcode'];
		}
		$image_type = 'Inline' ;		
		foreach($orig_img_src as $src){
			$attach_id[] = CoreFieldsImport::$media_instance->media_handling( $src , $id ,$post_values,'',$image_type,'');
		}

		if(is_array($attach_id)){
			foreach($attach_id as $att_key => $att_val){
				$get_guid[] = $wpdb->get_results("SELECT `guid` FROM {$wpdb->prefix}posts WHERE post_type = 'attachment' and ID =  $att_val ",ARRAY_A);
				foreach($origs_img_src as $img_src){
					$result  = str_replace($img_src , ' ' , $post_values['post_content']);
				}
			}
		}
		$image_name = $result;
		$doc = new \DOMDocument();
		if(function_exists('mb_convert_encoding')) {
			@$doc->loadHTML( mb_convert_encoding( $image_name, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
		}else{
			@$doc->loadHTML( $image_name);
		}
		$img_tags = $doc->getElementsByTagName('img');
		$i=0;
		foreach ($img_tags as $t )
		{
			$savepath = $get_guid[$i][0]['guid'];	
			$t->setAttribute('src',$savepath);
			$i++;
		}
		$result = $doc->saveHTML();
		$update_content['ID']           = $id;
		$update_content['post_content'] = $result;
		wp_update_post( $update_content );
		return $id;
	}


	function import_core_fields($data_array,$mode = null){

		$helpers_instance = ImportHelpers::getInstance();

		// if(!isset( $data_array['post_date'] )) {
		// 	$data_array['post_date'] = current_time('Y-m-d H:i:s');
		// } else {
		// 	if(strtotime( $data_array['post_date'] )) {
		// 		$data_array['post_date'] = date( 'Y-m-d H:i:s', strtotime( $data_array['post_date'] ) );
		// 	} else {
		// 		$data_array['post_date'] = current_time('Y-m-d H:i:s');
		// 	}
		// }

		if(!isset($data_array['post_author']) && $mode != 'Update') {

			$data_array['post_author'] = 1;
		} else {
			if(isset( $data_array['post_author'] )) {
				$user_records = $helpers_instance->get_from_user_details( $data_array['post_author'] );
				$data_array['post_author'] = $user_records['user_id'];
				$data_array['specific_author'] = $user_records['message'];
			}
		}
		if ( !empty($data_array['post_status']) ) {
			$data_array = $helpers_instance->assign_post_status( $data_array );
		}else{
			$data_array['post_status'] = 'publish';
		}
		return $data_array;
	}
}
