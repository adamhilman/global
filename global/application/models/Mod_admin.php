<?php
Class Mod_admin extends CI_Model{

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
    function get_surat_masuk(){
        $this->db->from('surat_masuk');
        $this->db->where('arsip', '0');
        $this->db->order_by('id_surat_masuk','DESC');
        return $this->db->get();
    }
    function edit_surat_masuk($id){
        $this->db->from('surat_masuk');
        $this->db->where('id_surat_masuk', $id);
        return $this->db->get();
    }
    function update_surat_masuk($id, $data){
        $this->db->where('id_surat_masuk', $id);
        $this->db->update('surat_masuk', $data);
    }
    function insert_surat_masuk($data){
        $this->db->insert('surat_masuk', $data);
    }
    function delete_surat_masuk($id){
        $this->db->where('id_surat_masuk', $id);
        $this->db->delete('surat_masuk');
    }
    function arsip_surat_masuk($id, $data){
        $this->db->where('id_surat_masuk', $id);
        $this->db->update('surat_masuk', $data);
    }
    function get_surat_keluar(){
        $this->db->from('surat_keluar');
        $this->db->where('arsip', '0');
        $this->db->order_by('id_surat_keluar','DESC');
        return $this->db->get();
    }
    function edit_surat_keluar($id){
        $this->db->from('surat_keluar');
        $this->db->where('id_surat_keluar', $id);
        return $this->db->get();
    }
    function update_surat_keluar($id, $data){
        $this->db->where('id_surat_keluar', $id);
        $this->db->update('surat_keluar', $data);
    }
    function insert_surat_keluar($data){
        $this->db->insert('surat_keluar', $data);
    }
    function delete_surat_keluar($id){
        $this->db->where('id_surat_keluar', $id);
        $this->db->delete('surat_keluar');
    }
    function arsip_surat_keluar($id, $data){
        $this->db->where('id_surat_keluar', $id);
        $this->db->update('surat_keluar', $data);
    }
    function get_arsip_surat(){
        $this->db->from('surat_masuk');
        $this->db->where('arsip', '0');
        $this->db->order_by('id_surat_masuk','DESC');
        return $this->db->get();
    }
    function disposisi_surat_masuk($id){
        $this->db->from('surat_masuk');
        $this->db->where('id_surat_masuk', $id);
        return $this->db->get();
    }
    function get_disposisi(){
        $this->db->from('disposisi');
        return $this->db->get();
    }
    function insert_disposisi($data){
        $this->db->insert('disposisi', $data);
    }
}
?>