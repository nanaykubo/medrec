<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller{

	function __construct()
	{
		parent :: __construct();
		$this -> load -> model('getinfo','m');
	}

	function index()
	{
		$this -> load -> view('Test/login');
		$this -> load -> view('layout/footer');
	}

	function login_validation()
	{
		if($this->input->post('login')){
			$username = $this->input->post('txtUsername');
			$password = $this->input->post('txtPassword');

			if($this->m->can_login($username,$password))
			{
				$this->session->set_userdata("username", $username);
				$this->session->set_userdata("password", $password);
				$this->session->set_userdata("logged_in", true);

				redirect('Test/logged');	
			}
		}

		redirect('Test/index');
	}

	public function logged()
	{	
		if($this->session->userdata('logged_in')){
			$get= $this->m->getHCID(
				$this->session->userdata('username')
			   ,$this->session->userdata('password')
			);

			$myvars = $get[0]->HCID;

			$hname['hname'] = $this->m->getHCName($myvars);
			$fdata['finfo'] = $this->m->getHCInfo($myvars);

			$data['data'] = array($hname,$fdata);
			$this->load-> view('Test/Test',$data);
		}	
	}

	public function filtered_logged($HCID)
	{	
		$myvars = $HCID;

		$searchValue = $this->input->post('searchValue');

		$hname['hname'] = $this->m->getHCName($myvars);
		$fdata['finfo'] = $this->m->getFilteredInfo($myvars,$searchValue);

		$data['data'] = array($hname,$fdata);
		$this -> load -> view ('Test/Filtered',$data);
	}


	public function add($HCID)
	{
		$data['familyinfo'] = $this->m->getFamilyCode($HCID);
		$data['services'] = $this->m->getServices();
		$data['brgyinfo'] = $this->m->getBrgyInfo($HCID);
		$data['tabletest'] = $this->m->get();
		$this -> load -> view('Test/add',$data);
	}

	public function edit($id)
	{
		$get = $this->m->getInfoID($id);
		$HCID = $get[0]->HCID;
		$data['familyinfo'] = $this->m->getFamilyCode($HCID);
		$data['services'] = $this->m->getServices();
		$data['brgyinfo'] = $this->m->getBrgyInfo($HCID);
		$data['tabletest'] = $get;

		$this -> load -> view('Test/edit',$data);
	}

	public function view($id)
	{
		$get = $this->m->getInfoID($id);
		$getRecorded = $this->m->getRecords($id);
		$HCID = $get[0]->HCID;
		$records = $this->m->getRecords($id);
		$data['familyinfo'] = $this->m->getFamilyCode($HCID);
		$data['brgyinfo'] = $this->m->getBrgyInfo($HCID);
		$data['recordsinfo'] = $getRecorded;
		$data['tabletest'] = $get;
		$this -> load -> view('Test/view',$data);
	}

	public function viewFamily($HCID)
	{
		$data['familyinfo'] = $this->m->getallFamily($HCID);
		$data['brgyinfo'] = $this->m->getBrgyInfo($HCID);
		$data['healthcenterinfo'] = $this->m->getHCName($HCID);
		$this -> load -> view('Test/viewFamily',$data);
	}

	public function submit()
	{
		redirect(base_url('Test/logged'));
	}

	public function submit2()
	{
		$result = $this->m->test();
		redirect(base_url('Test/sample'));
	}

	public function viewblob($recordno)
	{
		$result['hi'] = $this->m->getblob($recordno);
		$this -> load -> view('Test/sample',$result);
	}
	
	public function submitNewRecords($id)
	{
		$result = $this->m->addNewRecords();
		redirect(base_url('Test/view/'.$id));
	}

	public function submitNewFamily($id)
	{
		$result = $this->m->addNewFamilyRecords($id);
		redirect(base_url('Test/viewFamily/'.$id));
	}	

	public function update()
	{
		$result = $this->m->update();
		if($result)
		{
			$this->session->set_flashdata('success_msg', 'Successfully Updated');
		}
		else
		{
			$this->session->set_flashdata('error_msg', 'Error Updating');
		}
		redirect(base_url('Test/logged'));
	}

	public function addRecords($id)
	{
		$get = $this->m->getInfoID($id);
		$this -> load -> view('Test/add',$data);
	}

	public function viewImage($id)
	{
		$records = $this->m->getRecords($id);
	}

	public function delete($id)
	{
		$result = $this->m->delete($id);
		redirect(base_url('Test/logged'));
	}

	public function getFamilyInfo(){

		$data = $this->input->post();

		$values = $this->m->getFamily($data['brand']);

		foreach ($values as $value) {
			$row = array();
			$row[0] = $value->code;
			$row[1] = $value->LN;
			$row[2] = $value->FN;
			$row[3] = $value->RELATION;
			$data2[] = $row;
		}
		
		echo json_encode($data2);
	}
}