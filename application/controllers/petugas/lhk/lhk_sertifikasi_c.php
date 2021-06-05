<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lhk_sertifikasi_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
         $this->load->model('Lhk_model');
    }

    public function index()
    {
         $data['surat_tugas']= $this->Lhk_model->getSuratTugas();
         $data['sarana'] = $this->Lhk_model->getSarana();
        $this->template->load('layouts/petugas_template', 'petugas/lhk/lhk_sertifikasi_v',$data);
    }
}