<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Converter
{
	protected $ci;

	public function __construct(){
        $this->ci =& get_instance();
	}

	public function convert($val){

		$value = (string)$val;
		//$harga="Rp. ".number_format($value,0,",",".").",-";
		$harga="Rp. ".number_format($value,0,",",".");
		return $harga;
	}

}

/* End of file convert.php */
/* Location: ./application/libraries/convert.php */
