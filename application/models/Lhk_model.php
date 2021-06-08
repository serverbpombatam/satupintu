<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lhk_model extends CI_Model
{


  function __construct()
  {
    parent::__construct();
  }
  
  
  public function getLhk()
  { 

    $this->db->select('tbl_surattugas.noSuratTugas, tbl_lhk.tglLhk, tbl_lhk.file_lhk, tbl_lhk.jenisLhk');
    $this->db->from('tbl_lhk');
    $this->db->join('tbl_surattugas', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');

    $query = $this->db->get('');
    return $query;
  }

  public function getSuratTugas(){
     $this->db->select('tbl_surattugas.idSurat, tbl_surattugas.noSuratTugas');
     $this->db->from('tbl_surattugas');
    $query = $this->db->get();
    return $query->result();
  }

  public function getAtributSampling($noSurat){
    $this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.tglSurat, tbl_surattugas.maksud, tbl_surattugas.tglMulai, tbl_surattugas.kota, tbl_pegawai.nama, tbl_pegawai.nip, tbl_pegawai.pangkat, tbl_pegawai.golongan, tbl_pegawai.jabatan');
    $this->db->from('tbl_surattugas');
     $this->db->join('tbl_tugas', 'tbl_surattugas.noSuratTugas = tbl_tugas.noSuratTugas');
     $this->db->join('tbl_pegawai','tbl_tugas.idPetugas = tbl_pegawai.idPegawai');
      $this->db->where('tbl_surattugas.noSuratTugas', $noSurat);
      $query = $this->db->get();
    return $query->result();

  }

  public function getSarana(){
     $this->db->select('*');
     $this->db->from('tbl_sarana');
    $query = $this->db->get();
    return $query->result();

  }

  public function getSarana2(){
     $this->db->select('*');
     $this->db->from('tbl_sarana');
    $query = $this->db->get();
    $output = '<option value="">Pilih Sarana</option>';
    foreach($query->result() as $row)
    {
     $output .= '<option value="'.$row->idSarana.'">'.$row->namaSarana.'</option>';
 }
 return $output;

  }

  public function updateSuratPeringatan($data){
    $this->db->set('tglSuratPeringatan', $data['tglSuratPeringatan']); 
    $this->db->set('noSuratPeringatan', $data['noSuratPeringatan']); 
    $this->db->set('filePeringatan', $data['filePeringatan']);
    $this->db->where('idPeringatan', $data['id']);
    $query = $this->db->update('tbl_peringatan');

  }

  public function getFile(){
    $this->db->select('filePeringatan');
    $this->db->where('filePeringatan = ', "0");
    $query = $this->db->get('tbl_peringatan');
    return $query->num_rows();
  }

  public function hapusSuratPeringatan($id){
   $this->db->delete("tbl_peringatan",array("idPeringatan"=>$id));
 }
}
