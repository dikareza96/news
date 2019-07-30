<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*---------------------------------------------------------------------
	Class privilege ,generate all request linked to the access controll
----------------------------------------------------------------------*/

class General {

	private $obj = NULL;
    function __construct(){
		
		$this->obj= & get_instance();
	}
	
	function privilege_check($page_id, $do = null){
	
		$sql = "SELECT * FROM user a, akses_user b 
				WHERE 
					a.jabatan_id = b.jabatan_id
					AND b.modul = '%s' 
					AND b.%s = '1' 
					AND a.jabatan_id = '%d'";
		$sqlf 	= sprintf($sql,	$page_id, $do,$this->obj->session->userdata('jabatan_id')); 		
		$q 		= $this->obj->db->query($sqlf);
		if ($q->num_rows() > 0)
			return true;
		else 
			return false; 
	}
	
	public function no_access(){
	    
	    redirect('no_access');
	}

	
	
	
}
