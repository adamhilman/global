<?php
Class Mod_admin extends CI_Model{

    function update_profile($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    }
    
    function get_project(){
        $this->db->from('tbl_project');
        return $this->db->get();
    }

    function detail_project($id){
        $this->db->from('tbl_project');
        $this->db->where('id_project', $id);
        return $this->db->get();
    }

    function detail_file_project($id){
        return $this->db->query("select tbl_project.id_project, tbl_file_project.id_file, tbl_file_project.nama_file FROM tbl_project LEFT JOIN tbl_file_project ON tbl_project.id_project = tbl_file_project.id_project WHERE tbl_project.id_project = $id");
    }
    function insert_project($data){
        $this->db->insert('tbl_project', $data);
    }

    function insert_file_project($data){
        $this->db->insert('tbl_file_project', $data);
    }

    function update_project($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    // function save_batch_claim($data){
    //     return $this->db->insert_batch('tbl_detail_claim', $data);
    // }
    
    function get_claim(){
        return $this->db->query("select tbl_project.id_project, tbl_file_project.id_file, tbl_file_project.nama_file FROM tbl_project LEFT JOIN tbl_file_project ON tbl_project.id_project = tbl_file_project.id_project WHERE tbl_project.id_project = $id");
    }
    
    function get_surat_masuk(){
        $this->db->from('surat_masuk');
        $this->db->where('arsip', '0');
        $this->db->order_by('id_surat_masuk','DESC');
        return $this->db->get();
    }
}
?>