<?php
header("Content-type:application/vnd.ms-word");
$filename = $idSurat.".doc";
header("Content-Disposition: attachment; Filename=SPD-".$filename)

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="">
	<!-- CSS buatan sendiri -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/print.css">
</head>


<body onload="window.print()">

	<div class="page2">
</div>


	<?php

		function convertDay($day){
			$day = date('d',$day);
			return $day;
		}
		function convertMonthA($month){
			$month = date('m',$month);
			return $month;
		}

		function convertMonthB($month){
			if($month=="01"){
				$month = "Januari";
			}elseif($month=="02"){
				$month ="Februari";
			}elseif($month=="03"){
				$month = "Maret";
			}elseif($month=="04"){
				$month ="April";
			}elseif($month=="05"){
				$month  = "Mei";
			}elseif($month=="06"){
				$month = "Juni";
			}elseif($month=="07"){
				$month = "Juli";
			}elseif($month=="08"){
				$month = "Agustus";
			}elseif($month=="09"){
				$month = "September";
			}elseif($month=="10"){
				$month="Oktober";
			}elseif($month=="11"){
				$month="November";
			}else{
				$month="Desember";
			}
			return $month;
		}

		function convertYear($year){
			$year = date('y',$year);
			$tahun = "20".$year;
			return $tahun;
		}

		$no_surat = "";
		$nama_peg = array();
		$nip_peg = array();
		$pangkat_peg = array();
		$golongan_peg = array();
		$jabatan_peg = array();
		$maksud = "";
		$tujuan = "";
		$kendaraan = "";
		$tgl_surat = "";
		$tgl_mulai = "";
		$tgl_selesai = "";
		$tgl_mulai2;
		$tgl_selesai2;
		$mak = "";
		$nama_penandatangan = "";
		$jabatan_penandatangan = "";

		foreach($printS->result() as $row){
			array_push($nama_peg,$row->nama);
			array_push($nip_peg,$row->nip);
			array_push($pangkat_peg,$row->pangkat);
			array_push($golongan_peg,$row->golongan);
			array_push($jabatan_peg,$row->jabatan);
			$no_surat = $row->noSuratTugas;
			$maksud = $row->maksud;
			$tujuan = $row->kota;
			$kendaraan = $row->kendaraan;
			$tgl_surat =strtotime($row->tglSurat);
			$tgl_mulai =strtotime($row->tglMulai);
			$tgl_mulai2 = $row->tglMulai;
			$tgl_selesai2 = $row->tglSelesai;
			$tgl_selesai = strtotime($row->tglSelesai);
			$mak = $row->mak;
			$nama_penandatangan = $row->namaPenandatangan;
			$jabatan_penandatangan = $row->jabatanPenandatangan;
		}
	
	
	?>

    <table style="width:100%">
    
    <tr>
    <td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td>
    <td>
    <p style="font-family:bookman old style;">PERATURAN DIREKTUR JENDERAL PERBENDAHARAAN</p>
    <p style="font-family:bookman old style;">NOMOR-22/PB/2013 TENTANG KETENTUAN LEBIH LANJUT</p>
    <p style="font-family:bookman old style;">PELAKSANAAN PERJALANAN DINAS DALAM NEGERI BAGI PEJABAT</p>
    <p style="font-family:bookman old style;">NEGARA, PEGAWAI NEGERI DAN PEGAWAI TIDAK TETAP</p>
    </td>
    </tr>
    </table>

    <table style="width:100%">
    <tr>
    <td><p style="font-family:bookman old style;" align="center">Kementerian Negara/Lembaga</p>
    <p style="font-family:bookman old style;" align="center"><b>BALAI PENGAWAS OBAT DAN MAKANAN DI</b></p>
    <p style="font-family:bookman old style;" align="center"><b>BATAM</b></p>
    <p style="font-family:bookman old style;" align="center"><b>Jalan Hang Jebat Batu Besar Nongsa</b></p>
    <p style="font-family:bookman old style;" align="center"><b>BATAM</b></p>
    </td>
        <td><p style="font-family:bookman old style;" align="left">Lembar Ke<p>Kode No<p>Nomor</p></p></p></td>
        <td><p style="font-family:bookman old style;" align="left">:<p>:<p>:</p></p></p></td>
        <td><p style="font-family:bookman old style;" align="left"><p><p><?php echo $no_surat; ?></p>
    </tr>   
    </table>

	<p style="font-family:bookman old style;" align="center"><b>SURAT PERJALANAN DINAS (SPD)</u></p>

	<table style="width:100%" border="1">
	<tr>
	<td><p style="font-family:bookman old style;">1. Pejabat Pembuat Komitmen</p></td>
	<td><p style="font-family:bookman old style;">Paniyati, S.Farm., Apt</p></td>
	</tr>

	<tr>
	<td><p style="font-family:bookman old style;">2. Nama / NIP Pegawai yang melaksanakan perjalanan dinas</p></td>
	<td><p style="font-family:bookman old style;"><?php echo $nama_peg; ?>    / <?php echo $nip_peg; ?></p></td>
	</tr>
	

	<tr>
	<td>
		<p style="font-family:bookman old style;">3. a. Pangkat dan Golongan</p>
		<p style="font-family:bookman old style;">&nbsp;&nbsp;&nbsp;&nbsp;b. Jabatan/Instansi</p>
		<p style="font-family:bookman old style;">&nbsp;&nbsp;&nbsp;&nbsp;c. Tingkat Biaya Perjalanan Dinas</p>
	</td>
	<td>
	<p style="font-family:bookman old style;">a. <?php echo $pangkat_peg; ?>    / <?php echo $golongan_peg; ?></p>
	<p style="font-family:bookman old style;">b. <?php echo $jabatan_peg; ?></p>
	<p style="font-family:bookman old style;">c.</p>
	</td>
	<tr>

	<tr>
	<td><p style="font-family:bookman old style;">4. Maksud Perjalanan Dinas</p></td>
	<td><p style="font-family:bookman old style;"><?php echo $maksud; ?></p></td>
	</tr>

	<tr>
	<td><p style="font-family:bookman old style;">5. Alat angkut yang dipergunakan</p></td>
	<td><p style="font-family:bookman old style;"><?php echo $kendaraan; ?></p></td>
	</tr>

	<tr>
	<td>
	<p style="font-family:bookman old style;">6. a. Tempat Berangkat</p>
	<p style="font-family:bookman old style;">&nbsp;&nbsp;&nbsp;&nbsp;b. Tempat Tujuan</p>
	</td>
	<td>
	<p style="font-family:bookman old style;">a. Kota Batam</p>
	<p style="font-family:bookman old style;">b. <?php echo $tujuan; ?></p>
	</td>
	</tr>

	<tr>
	<td>
	<p style="font-family:bookman old style;">7. a. Lama perjalanan Dinas</p>
	<p style="font-family:bookman old style;">&nbsp;&nbsp;&nbsp;&nbsp;b. Tanggal berangkat</p>
	<p style="font-family:bookman old style;">&nbsp;&nbsp;&nbsp;&nbsp;c. Tanggal harus kembali/tiba di tempat *)</p>
	</td>
	<td>
	<p style="font-family:bookman old style;">a. </p>
	<p style="font-family:bookman old style;">b. <?php echo $tgl_mulai; ?></p>
	<p style="font-family:bookman old style;">b. <?php echo $tgl_selesai; ?></p>
	</td>
	</tr>

	</table>

	<table style="width:100%" border="1">
	<tr>
	<td>
	<p style="font-family:bookman old style;">8. Pengikut : Nama</p>
	<p style="font-family:bookman old style;">&nbsp;&nbsp;&nbsp;&nbsp;1.</p>
	<p style="font-family:bookman old style;">&nbsp;&nbsp;&nbsp;&nbsp;2.</p>
	<p style="font-family:bookman old style;">&nbsp;&nbsp;&nbsp;&nbsp;3.</p>
	</td>
	<td><p style="font-family:bookman old style;">Tanggal Lahir</p></td>
	<td><p style="font-family:bookman old style;">Keterangan</p></td>
	</tr>

	
	</table>



</div>
	</body>
	</html>