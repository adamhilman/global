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

    function get_karyawan(){
        $this->db->from('tbl_user');
        return $this->db->get();
    }
    function get_user_data($id){
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id);
        return $this->db->get();
    }
    function insert_user($data){
        $this->db->insert('tbl_user', $data);
    }
    function update_user($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    }
    function hapus_user($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    function detail_project($id){
        $this->db->from('tbl_project');
        $this->db->where('id_project', $id);
        return $this->db->get();
    }

    function detail_file_project($id){
        return $this->db->query("select tbl_project.id_project, tbl_file_project.token, tbl_file_project.id_file, tbl_file_project.nama_file FROM tbl_project LEFT JOIN tbl_file_project ON tbl_project.id_project = tbl_file_project.id_project WHERE tbl_project.id_project = $id");
    }
    function insert_project($data){
        $this->db->insert('tbl_project', $data);
    }

    function insert_aktivitas_project($data){
        $this->db->insert('tbl_aktivitas_project', $data);
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
    function get_cuti_user($id_user){
        return $this->db->query("select tbl_form_cuti.*,tbl_user.nama FROM tbl_form_cuti LEFT JOIN tbl_user ON tbl_form_cuti.id_user = tbl_user.id_user WHERE tbl_form_cuti.id_user = $id_user");
    }

    function insert_cuti($data){
        $this->db->insert('tbl_form_cuti', $data);
    }

    function detail_cuti($id){
        $this->db->from('tbl_form_cuti');
        $this->db->where('id_cuti', $id);
        return $this->db->get();
    }

    function update_cuti($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function hapus_cuti($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    
    function get_claim($id_user){
        return $this->db->query("SELECT tbl_form_reimburstment.*, tbl_project.nama_paket FROM tbl_form_reimburstment LEFT JOIN tbl_project on tbl_form_reimburstment.id_project = tbl_project.id_project WHERE id_user=$id_user");
    }

    function detail_claim($id_rembes){
        $this->db->from('tbl_form_reimburstment');
        $this->db->where('id_rembes', $id_rembes);
        return $this->db->get();
    }
    function update_claim($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function hapus_claim($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function get_surat_masuk(){
        $this->db->from('surat_masuk');
        $this->db->where('arsip', '0');
        $this->db->order_by('id_surat_masuk','DESC');
        return $this->db->get();
    }
}
?>