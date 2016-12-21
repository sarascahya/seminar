<?php
	class dateconverter {

	    protected $ci;

		public function __construct(){
	        $this->ci =& get_instance();
		}

	    function viewToDb($string){
			$replaced = str_replace(",", "", $string);
			$data = explode(" ", $replaced);

			$year = $data[2];
			switch ($data[1]) {
				case "January": $month = "01"; break;
				case "February": $month = "02"; break;
				case "March": $month = "03"; break;
				case "April": $month = "04"; break;
				case "May": $month = "05"; break;
				case "Juni": $month = "06"; break;
				case "July": $month = "07"; break;
				case "August": $month = "08"; break;
				case "September": $month = "09"; break;
				case "October": $month = "10"; break;
				case "November": $month = "11"; break;
				case "December": $month = "12"; break;
		    }
			$day = $data[0];
		    $output = $year."-".$month."-".$day;

		    return $output;
		}

	    function dbToView($string){
	    	//$completeData = explode(" ", $string);
			//$data = explode("-", $completeData[0]);

			$data = explode("-", $string);

			$day = $data[2];

			switch ($data[1]) {
				case "01" : $month = "Januari"; break;
				case "02": $month = "Pebruari"; break;
				case "03": $month = "Maret"; break;
				case "04": $month = "April"; break;
				case "05": $month = "Mei"; break;
				case "06": $month = "Juni"; break;
				case "07": $month = "Juli"; break;
				case "08": $month = "Agustus"; break;
				case "09": $month = "September"; break;
				case "10": $month = "Oktober"; break;
				case "11": $month = "November"; break;
				case "12": $month = "Desember"; break;
		    }

		    $year = $data[0];

		    $output = $day." ".$month." ".$year;

		    return $output;
		}

		function dbTimeStampToView($string){
	    	$completeData = explode(" ", $string);
			$data = explode("-", $completeData[0]);
			$day = $data[2];

			switch ($data[1]) {
				case "01" : $month = "Januari"; break;
				case "02": $month = "Pebruari"; break;
				case "03": $month = "Maret"; break;
				case "04": $month = "April"; break;
				case "05": $month = "Mei"; break;
				case "06": $month = "Juni"; break;
				case "07": $month = "Juli"; break;
				case "08": $month = "Agustus"; break;
				case "09": $month = "September"; break;
				case "10": $month = "Oktober"; break;
				case "11": $month = "November"; break;
				case "12": $month = "Desember"; break;
		    }

		    $year = $data[0];

		    $output = $day." ".$month." ".$year;

		    return $output;
		}
	}
?>