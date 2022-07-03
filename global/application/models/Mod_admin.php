<?php
Class Mod_admin extends CI_Model{

    function cek_cuti_terakhir($table,$where){		
		return $this->db->get_where($table,$where);
	}	
    
    function update_profile($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    }
    
    function get_project(){
        $this->db->from('tbl_project');
        return $this->db->get();
    }

    function get_cuti_all(){
        return $this->db->query("select tbl_form_cuti.*,tbl_user.nama FROM tbl_form_cuti LEFT JOIN tbl_user ON tbl_form_cuti.id_user = tbl_user.id_user");
    }
    function get_cuti_email($id_cuti){
        return $this->db->query("select tbl_form_cuti.*,tbl_user.nama, tbl_user.email FROM tbl_form_cuti LEFT JOIN tbl_user ON tbl_form_cuti.id_user = tbl_user.id_user where tbl_form_cuti.id_cuti = $id_cuti");
    }

    function get_cuti_all_teknisi(){
        return $this->db->query("select tbl_form_cuti.*, tbl_user.level_user FROM tbl_form_cuti LEFT JOIN tbl_user ON tbl_form_cuti.id_user = tbl_user.id_user where tbl_user.level_user = 6");
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
    function hapus_history($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    function detail_project($id){
        $this->db->from('tbl_project');
        $this->db->where('id_project', $id);
        return $this->db->get();
    }
    function history_project($id){
        return $this->db->query("SELECT tbl_aktivitas_project.*, tbl_user.nama FROM tbl_aktivitas_project LEFT JOIN tbl_user on tbl_aktivitas_project.id_user = tbl_user.id_user WHERE id_project = $id");
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

    function reset_cuti($data,$table){
		$this->db->update($table,$data);
	}

    function hapus_cuti($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    
    function get_claim($id_user){
        return $this->db->query("SELECT tbl_form_reimburstment.*, tbl_project.nama_paket FROM tbl_form_reimburstment LEFT JOIN tbl_project on tbl_form_reimburstment.id_project = tbl_project.id_project WHERE id_user=$id_user");
    }
    function get_claim_all(){
        return $this->db->query("SELECT tbl_form_reimburstment.*, tbl_project.nama_paket, tbl_user.nama FROM tbl_form_reimburstment LEFT JOIN tbl_project on tbl_form_reimburstment.id_project = tbl_project.id_project LEFT JOIN tbl_user on tbl_form_reimburstment.id_user = tbl_user.id_user order by status");
    }

    function get_rembes_email($id_rembes){
        return $this->db->query("SELECT tbl_form_reimburstment.*, tbl_user.email, tbl_user.nama FROM tbl_form_reimburstment LEFT JOIN tbl_user on tbl_form_reimburstment.id_user = tbl_user.id_user WHERE tbl_form_reimburstment.id_rembes = $id_rembes");
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

    function get_laporan_cuti($bulan,$tahun){
        return $this->db->query("SELECT CONCAT(tbl_user.level_user,tbl_user.bulan_tahun,tbl_user.id_user) as ID, tbl_form_cuti.*, tbl_user.nama, tbl_user.level_user FROM tbl_form_cuti LEFT JOIN tbl_user on tbl_form_cuti.id_user = tbl_user.id_user WHERE MONTH(tbl_form_cuti.tanggal_mulai) = $bulan and YEAR(tbl_form_cuti.tanggal_mulai) = $tahun AND tbl_form_cuti.approval_direksi = 1");
    }

    function get_laporan_reimburstment($bulan,$tahun){
        return $this->db->query("SELECT tbl_form_reimburstment.*, tbl_project.nama_paket, tbl_user.nama FROM tbl_form_reimburstment LEFT JOIN tbl_project on tbl_form_reimburstment.id_project = tbl_project.id_project LEFT JOIN tbl_user on tbl_form_reimburstment.id_user = tbl_user.id_user where MONTH(tbl_form_reimburstment.tanggal_pengajuan) = $bulan and YEAR(tbl_form_reimburstment.tanggal_pengajuan) = $tahun");
    }

    // function get_surat_masuk(){
    //     $this->db->from('surat_masuk');
    //     $this->db->where('arsip', '0');
    //     $this->db->order_by('id_surat_masuk','DESC');
    //     return $this->db->get();
    // }
}
?>