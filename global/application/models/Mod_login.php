<?php 
 
class Mod_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	function detail_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}