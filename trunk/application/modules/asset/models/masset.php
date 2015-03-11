<?php
class Masset extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	 
	 
	
	function employee_cat($data,$page,$limit){
	
		$a = ($page-1) * $limit;
		$limitnya = ",".$a.",".$limit;
		
		$this->db->where('deleted', '0');
		
		$this->db->like('employee_catName', $data['search']);
		 
		$query = $this->db->get('employee_cat',$limit,$a);

			if ($query->num_rows())
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}		
	}
	
	 
}
	
?>