<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_pj extends CI_Controller {
	// main page


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('SuratKw_model');
	}


	public function index()
	{
		$data = konfigurasi('Form Surat Pertanggung Jawaban Dakota',"ap");
		$data['kwitansi'] = $this->SuratKw_model->getKw();
		$data['jumlah_file'] = $this->SuratKw_model->getFile();
		$this->template->load('layouts/admin_template', 'admin/surat_pj', $data);

	}


	public function ubahPj(){
		$id = $this->input->post('idKw');
		$tglEdit = $this->input->post('tglEdit');
	
			$data_kw = array (
				'idKwitansi' => $id,
				'tglKwitansi' => $tglEdit,
				'fileKwitansi' => $file	
			);


			$this->SuratKw_model->updateKw($data_kw);
			redirect('admin/surat_pj');
		
	}

	public function printDk(){
		$id = $this->input->post('idKw');
		$data['idKw'] = $id;
		$data['kwDakota'] = $this->SuratKw_model->dataKw($id);
		$this->load->view('admin/pjDakota', $data, false);
		

	}

	public function printLk(){
		$id = $this->input->post('idKw');
		$data['idKw'] = $id;
		$data['kwLukota'] = $this->SuratKw_model->dataKw($id);
		$this->load->view('admin/pjLukota', $data, false);
	}


	public function list_nominatif(){

		$data = konfigurasi('List Nominatif per Surat Tugas',"ap");
		$data['tugas'] = $this->SuratKw_model->getTugas();
		$this->template->load('layouts/admin_template', 'admin/list_nominatif', $data);
	}

	public function nominatifDk(){
		$id = $this->input->post('idKw');
		$data['idKw'] = $id;
		$data['nomDk'] = $this->SuratKw_model->getNomDk($id);
		$this->load->view('admin/nomDk', $data, false);
	}
	public function nominatifLk(){
		$id = $this->input->post('idKw');
		$data['idKw'] = $id;
		// $data['kwLukota'] = $this->SuratKw_model->dataKw($id);
		$this->load->view('admin/nomLk', $data, false);
	}

}

/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */