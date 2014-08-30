<?php
class Core
{   
	
	
	function get_im($path, $width = null, $height = null) {
		// if empty, then put no image
		if (empty($path)) {
			return $this->CI->config->item('staticPath').'/images/no_image.png';
		}
		
		// if local image, then directly load it
		if ($path){
			
			$path_parts = explode('/', $path);
			
			if ($width != null && $height != null) {
			
				// build the resized image's url
				if (count($path_parts) > 1) {
					// build image's url in sub directory
					$result_path = $path_parts[1].'/'.$path_parts[2].'/'.$path_parts[3].'/'.$width.'x'.$height.'/'.$path_parts[4];
				} else {
					$result_path = $width.'x'.$height.'/'.$path_parts[1];
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
	function resize_im($config) {
	
			if (empty($sizes)) {
				$sizes['0']['width'] = 100;
				$sizes['0']['height'] = 100;
				$sizes['1']['width'] = 220;
				$sizes['1']['height'] = 220;
				$sizes['2']['width'] = 450;
				$sizes['2']['height'] = 450;
				$sizes['3']['width'] = 650;
				$sizes['3']['height'] = 650;
			}
			
			foreach ($sizes as $size) {
				$size_dir = $size['width'].'x'.$size['height'];
				@mkdir($config['upload_path'].'/'.$size_dir, 0777);
				
				$setup['image_library'] = 'gd2';
				$setup['source_image'] = $config['upload_path'].$config['file_name'];
				$setup['new_image'] = $config['upload_path'].$size_dir.'/'.$config['file_name'];
				$setup['create_thumb'] = FALSE;
				$setup['maintain_ratio'] = TRUE;
				$setup['width'] = $size['width'];
				$setup['height'] = $size['height'];
				$setup['master_dim'] = 'height';
				
				$this->CI =& get_instance();
				
				$this->CI->image_lib->initialize($setup); 
    
				$this->CI->image_lib->resize();
				
			}
				
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
	
	function print_rr($val){
        echo '<pre>';
        print_r($val);
        echo  '</pre>';
}
	

}	
?>