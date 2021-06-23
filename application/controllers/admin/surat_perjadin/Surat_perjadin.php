<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Surat_perjadin extends CI_Controller {
	// main page


		public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("SuratPerjadin_model");
    }


		public function index()
		{
			$data = konfigurasi('Form Surat Perjalanan Dinas',"ap");
			$data['tugas'] = $this->SuratPerjadin_model->getsurattugas();		
        	$this->template->load('layouts/admin_template', 'admin/surat_perjadin/surat_perjadin', $data);
			
		}

		function getPetugas()
		{
			if($this->input->post('idPer'))
			{
				echo $this->SuratPerjadin_model->getPetugas($this->input->post('idPer'));
			}
		}

		  // Print SPD
		public function print()
		{
			$id = $this->input->post('noSurat');
			$idPetugas = $this->input->post('idPetugas');
			$data2['idSurat'] = $id;
			$data2['printS'] = $this->SuratPerjadin_model->print_spd($id,$idPetugas,$id_ppk);
			$this->load->view('admin/surat_perjadin/print_spd', $data2, false);
		}



		
		
	}

	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */