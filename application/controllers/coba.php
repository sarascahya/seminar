<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

	public function index()
	{
		
	}

	function convertTgl(){
		$this->load->library('dateconverter');

	}

	function convertRp(){
		$this->load->library('converter');
		$hasil = $this->converter->convert(intval(100000));
		echo $hasil;
	}

	function convertTimeStamp(){
		$this->load->library('dateconverter');
		$hasil = $this->dateconverter->dbTimeStampToView('2016-12-09 23:46:10');
		echo $hasil;
	}

}

/* End of file coba.php */
/* Location: ./application/controllers/coba.php */