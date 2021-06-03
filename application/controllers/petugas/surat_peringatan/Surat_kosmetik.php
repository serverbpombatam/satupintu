	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Surat_kosmetik extends CI_Controller {
	// main page


		public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('SuratKosmetik_model');
         $this->load->model('SuratPeringatan_model');
            $this->load->model('SuratTl_model');
    }


		public function index()
		{
			$data = konfigurasi('Form Surat Peringatan Kosmetik',"");
			$data['surat_tugas'] = $this->SuratTl_model->getSuratTugas();
        	$this->template->load('layouts/petugas_template', 'petugas/surat_peringatan/surat_kosmetik/form', $data);
			
		}
		
		public function surat()
		{

				function convertMonths($month){
				$month = date('m',$month);
				return $month;
			}

			function convertYears($year){
				$year = date('y',$year);
				return $year;
			}

			
			$tanggal =  $this->input->post('tanggal');
			$noSurat =  $this->input->post('noSurat');
			$idSurat= $this->input->post('suratTugas');
			$penerimaSurat =  $this->input->post('penerimaSurat');
			$kotaSurat =  $this->input->post('kotaSurat');
			// detil sarana
			$namaSarana =  $this->input->post('namaSarana');
			$tglPeriksa = $this->input->post('tglPeriksa');
			$alamatSarana =  $this->input->post('alamatSarana');
			$tglMulaiperiksa = $this->input->post('tglMulaiperiksa');
			$tglSelesaiperiksa = $this->input->post('tglSelesaiperiksa');
			$namaPimpinan =  $this->input->post('namaPimpinan');

			$detailTemuan =  $this->input->post('detailTemuan');
			$pilihPasal = $this->input->post('pilihPasal');


			$tanggalolah  = strtotime($tanggal);

				echo $tanggal;

				$noSuratFix = "T-PW.03.02.9A2.".convertMonths($tanggalolah).".".convertYears($tanggalolah).".".$noSurat;
				echo $noSuratFix;


						$pasal_peringatan = array();
			foreach ($pilihPasal as $num) {
				$pasal['data'] = $this->SuratKosmetik_model->getPasal($num);
				array_push($pasal_peringatan,$pasal);
			}
			

			$data = array('title'=>'Cetak surat tugas',
				'tanggal' => $tanggal,
				'noSurat' => $noSuratFix,
				'penerimaSurat' => $penerimaSurat,
				'kotaSurat' => $kotaSurat,
				'namaSarana' => $namaSarana,
				'alamatSarana' => $alamatSarana,
				'tglMulaiperiksa' => $tglMulaiperiksa,
				'tglSelesaiperiksa' => $tglSelesaiperiksa,
				'namaPimpinan' => $namaPimpinan,

				'detailTemuan' => $detailTemuan,
				'pilihPasal' => $pasal_peringatan,

			);		

						$idTl = $this->SuratTl_model->getTl($idSurat);
				foreach ($idTl as $id) {
					$idTl = $id->idTl;
				}


		
			$data_db = array(

					'tglSuratPeringatan' => $tanggal,
					'noSuratPeringatan' => $noSuratFix,
					'jenisPeringatan' => "apotek",
					'isiPeringatan' => $detailTemuan,
					'filePeringatan' => '0',
					'idTl' => $idTl,
					'status' =>0
				);

				$checkvalidation = $this->SuratPeringatan_model->checkDuplicate($noSuratFix);
	            if($checkvalidation == true){
	                $this->db->insert('tbl_peringatan',$data_db);
	                $this->session->set_flashdata('success', 'Data Berhasil Dimasukkan');
	                $this->load->view('petugas/surat_peringatan/surat_kosmetik/isiSurat', $data, FALSE);
	            }else{
	            $this->session->set_flashdata('failed', 'Maaf, Data tidak diproses karena duplikat');
	            redirect('petugas/surat_peringatan/surat_kosmetik', 'refresh');
	            }	


			
		}

	}

	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */