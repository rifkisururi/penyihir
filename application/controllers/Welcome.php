<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('soal');
	}

	public function jumlahKematianTahunKe($tahunKe)
	{
		for ($i = 1; $i <= $tahunKe; $i++) {
			echo "tahunKe " . $i . "<br>";
			$jml_kematian = $this->jmlMeninggal($i);
			//echo "Jumlah Kematian = " . $jml_kematian;

		}
		return $jml_kematian;
	}

	public function jmlMeninggal($tahunKe)
	{
		$kematian1 = 0;
		$kematian2 = 0;
		$riwayat = 0;
		$pertambahan = 0;
		for ($i = 1; $i <= $tahunKe; $i++) {
			if ($kematian1 == 0 & $i == 1) {
				$kematian1 =  1;
				$riwayat = $kematian1;
			} else if ($kematian2 == 0 & $i == 2) {
				$kematian2 = $kematian1;
				$riwayat = $riwayat + $kematian2;
			} else {
				$pertambahan = $kematian1 + $kematian2;
				$kematian1 = $kematian2;
				$kematian2 = $pertambahan;

				$riwayat = $riwayat + $pertambahan;
			}
		}
		//echo $riwayat . "<br>";
		return $riwayat;
	}

	public function getComponenRataRata()
	{
		$usia = $_GET['usia'];
		$tahun_kematian = $_GET['tk'];

		if ($tahun_kematian - $usia <= 0) {
			echo -1;
		} else {
			$th = $tahun_kematian - $usia;
			//echo "usia = " . $th;
			echo $this->jmlMeninggal($th);
		}
	}
}
