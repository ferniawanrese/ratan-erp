<?php
class core
{   
	
	function get_im($path, $width = null, $height = null) {
		// if empty, then put no image
		if (empty($path)) {
			return $this->CI->config->item('staticPath').'/images/no_image.png';
		}
		
		// if local image, then directly load it
		if (is_file($path)) {
			
			$path_parts = explode('/', $path);
			
			if ($width != null && $height != null) {
			
				// build the resized image's url
				if (count($path_parts) > 1) {
					// build image's url in sub directory
					$result_path = $path_parts[0].'/'.$path_parts[1].'/'.$path_parts[2].'/'.$width.'x'.$height.'/'.$path_parts[3];
				} else {
					$result_path = $width.'x'.$height.'/'.$path_parts[0];
				}
			} else {
				// build original image's url
				$result_path = $path;
			}
			
				return $result_path;
		}	
	}
	
	
	/**
	 * Upload image 
	 * 
	 * @author wawan
	 * @param sizes
	 * @param itemId
	 * @return array
	 */
	function resize_im($directory) {
				
			if (empty($sizes)) {
				$sizes['0']['width'] = 100;
				$sizes['0']['height'] = 100;
				$sizes['1']['width'] = 220;
				$sizes['1']['height'] = 210;
				$sizes['2']['width'] = 450;
				$sizes['2']['height'] = 450;
				$sizes['3']['width'] = 300;
				$sizes['3']['height'] = 210;
			}
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = ".upload/employee_photo/fe2dbda1-c4ea-57ad-882c-5989936c2a7d/503539ca-f8c1-5354-b00f-d97490fdcd20.jpg";
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 75;
			$config['height'] = 50;

			//$this->load->library('image_lib', $config);
				$this->CI =& get_instance();
				$this->CI->load->library('image_lib',$config);
				$this->CI->image_lib->initialize($config);
				$this->CI->image_lib->resize();
		
	}
	
	function filterplus($table) {
		$this->CI =& get_instance();
		$this->CI->db->select('COLUMN_NAME,  COLUMN_COMMENT, EXTRA');
		$this->CI->db->where('table_name',$table);
		$this->CI->db->where('COLUMN_COMMENT != ""');
		$this->CI->db->where('COLUMN_COMMENT NOT LIKE "!%"');
		$query = $this->CI->db->get('INFORMATION_SCHEMA.COLUMNS');
	
		// get data
		if ($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}		
	
	}
	

}	
?>