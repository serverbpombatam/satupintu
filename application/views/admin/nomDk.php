<?php
header("Content-type:application/vnd.ms-word");
$filename = $idKw.".doc";
header("Content-Disposition: attachment; Filename=nominatifDakota-".$filename)

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="">
	<!-- CSS buatan sendiri -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/style.css">
</head>


<body onload="window.print()">

	<div class="page2">
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
			$tahun = $year;
			return $tahun;
		}

		$nama_nom = array();
		$nip_nom = array();
		$surat ="";
		$tujuan = "";
		$tgl1 = "";
		$tgl2 = "";
		$lama = "";
		$mak  = "";
		
		foreach($nomDk->result() as $row){
			array_push($nama_nom,$row->nama);
			array_push($nip_nom,$row->nip);
			$surat = $row->noSuratTugas;
			$tujuan = $row->kota;
			$tgl1 =strtotime($row->tglMulai);
			$tgl2 = strtotime($row->tglSelesai);
			$lama = $row->lamaPerjalanan;
			$mak= $row->mak;

		}


		?>
		<p align="left">DAFTAR NOMINATIF PENGGUNAAN BIAYA PERJALANAN DINAS DALAM KOTA </p>
		<p align="left">PADA BALAI PENGAWAS OBAT DAN MAKANAN DI BATAM.</p>
		<br>
		<p><b>MAK : <?php echo $mak;?></b></p>
		


		<table style="width:100%">
			<tr>
				<th><p class="satu">Mengetahui/Menyetujui</p></th> 
				<th><p class="satu">Batam, </p></th> 
			</tr>
			<tr>
				<td><p>Pejabat Pembuat Komitmen</p></td> 
				<td><p>Bendahara Pengeluaran</p></td> 
			</tr>
			<tr>
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
			</tr>
			<tr>
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
			</tr>
			<tr>
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
			</tr>
			<tr>
				<td><p><u>Paniyati, S.Farm., Apt</u></p></td> 
				<td><p><u>Deasy Mandasari, A.Md</u></p></td> 
			</tr>

			<tr>
				<td><p>NIP. 19830820 200712 2 001</p></td> 
				<td><p>NIP. 19891203 201012 2 005</p></td> 
			</tr>

		</table>


		





	</body>
	</html>