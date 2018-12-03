<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('order');
	}

	public function submit(){
		$pml = $this->input->post('pml');
		echo '<pre>';
		print_r($this->input->post('pml'));
		echo '<pre>';

		echo '<br>';
		if($this->validate_pml($pml) == "false"){
			$this->session->set_flashdata('validation', 'PML is not valid!');
			redirect('/');
		}else{
			$str = $this->input->post('pml');
			if (preg_match('/before-(.*?)-after/', $str, $match) == 1) {
			    echo $match[1];
			}
		}

		if(count($this->getInbetweenStrings('{pizza number="','"}',$pml)) === 1){
			//$this->getPMLinfo($pml);
			$value = $pml;
			$value = strstr($value, "{type}"); //gets all text from needle on
			$value = strstr($value, "{\type}", true); //gets all text before needle
			$value = str_replace("{type}","",$value);
			echo $value;
		}

	}

	function getBetween($content,$start,$end){
	    $r = explode($start, $content);
	    if (isset($r[1])){
	        $r = explode($end, $r[1]);
	        return $r[0];
	    }
	    return '';
	  }		

	private function getPMLinfo($str)
	{
		$orderNum = $this->getInbetweenStrings('{order number="','"}',$str);
		$pizzaNum = $this->getInbetweenStrings('{pizza number="','"}',$str);
		$size = $this->getBetween($str, '{size}',"{\size}");
		$crust = $this->getInbetweenStrings('','{',$str);
		echo "Order Number ".$orderNum[0]."<br>";
		echo "Pizza Number ".$pizzaNum[0].$size[0].', ';
		print_r($crust);
	}

	private function validate_pml($str){
		if (strpos($str, '{order') !== false && strpos($str, '{\order}') !== false) {
		    if (strpos($str, '{pizza') !== false && strpos($str, '{\pizza}') !== false) {
			    if (strpos($str, '{size}') === false && strpos($str, '{\size}') === false) {
			    	return 'false';
			    	exit;
				}
			    if (strpos($str, '{crust}') === false && strpos($str, '{\crust}') === false) {
			    	return 'false';
			    	exit;
				}
			    if (strpos($str, '{type}') === false && strpos($str, '{\type}') === false) {
			    	return 'false';
			    	exit;
				}
				return 'true';

			} else {
				return 'false';
			}
		} else {
			return 'false';
		}
	}

	private function getInbetweenStrings($start, $end, $str){
	    $matches = array();
	    $regex = "/$start([a-zA-Z0-9_]*)$end/";
	    preg_match_all($regex, $str, $matches);
	    return $matches[1];
	}
}
