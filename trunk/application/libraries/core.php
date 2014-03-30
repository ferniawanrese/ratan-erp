<?php
class core
{   
   
	function get_im($path, $width = null, $height = null) {
		// if empty, then put no image
		if (empty($path)) {
			return $this->CI->config->item('staticPath').'/images/no_image.jpg';
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
	

}	
?>