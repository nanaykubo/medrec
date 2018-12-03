<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class getinfo extends CI_Model 
{
	public function get()
	{
		$query = $this -> db -> get('tabletest');
		if ($query -> num_rows() > 0)
		{
			return $query -> result();
		}
		else
		{
			return false;
		}
	}

	public function getServices()
	{
		$query = $this -> db -> get('services');
		if ($query -> num_rows() > 0)
		{
			return $query -> result();
		}
		else
		{
			return false;
		}
	}

	public function getHCID($username,$password)
	{
		$this->db->select('HCID');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('users');
		return $query->result();
	}

	public function getFilteredInfo($HCID,$searchValue)
	{
		$this->db->where('HCID',$HCID);
		$this->db->like('LN',$searchValue);
		$this->db->or_like('FN',$searchValue);
		$this->db->or_like('ID',$searchValue);
		$this->db->or_like('FamilyCode',$searchValue);
		$query = $this->db->get('tabletest');
		return $query->result();
	}

	public function getBrgyInfo($HCID)
	{
		$this->db->where('HCID',$HCID);
		$query = $this->db->get('brgy');
		return $query->result();
	}

	public function getRecordsByID()
	{
		$this->db->select('*');
		$query = $this->db->get('records');
		return $query->result();
	}

	public function getHCInfo($HCID)
	{
		$this->db->where('HCID',$HCID);
		$query = $this->db->get('tabletest');
		return $query->result();
	}

	public function getHCName($HCID)
	{
		$this->db->select('*');
		$this->db->where('HCID',$HCID);
		$query = $this->db->get('healthcenters');
		return $query->result();
	}

	public function getInfoById($username,$password)
	{
		$query = $this->db->get('tabletest');
		if ($query -> num_rows() > 0)
		{
			return $query -> row();
		}
		else
		{
			return false;
		}
	}

	public function getInfoID($id)
	{
		$this->db->select('*');
		$this->db->where('ID', $id);
		$query = $this->db->get('tabletest');
		return $query->result();
	}

	public function getID($id)
	{
		$this->db->select("Brgy");
		$this->db->where('ID', $id);
		$query = $this->db->get('tabletest');
		return $query->result();
	}

	public function can_login($username,$password)
	{
		$this->db->where('username',$username);	
		$this->db->where('password',$password);

		$query = $this->db->get('users');

		if ($query -> num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function addNewRecords()
	{		
	 $records = array(
			'ID'=>$this->input->post('ID'),
			'HCID'=>$this->input->post('txt_HCID'),	
			'DATE'=>$this->input->post('DATE'),
			'RETURNDATE'=>$this->input->post('ReturnDate'),
			'RecordType'=>$this->input->post('Service'),
			'PRESCRIPTION'=>$this->input->post('Prescription'),
			'RESULT'=>$this->input->post('Result'),
	);

	$this->db->insert('precords', $records);
	
	if($this->db->affected_rows() > 0)
	{
		return true;
	}

	else
	{
		return false;
	}
	
	}

	public function addNewFamilyRecords($id)
	{
		$records = array(
			'HCID'=>$this->input->post('txt_HCID'),	
			'Name'=>$this->input->post('txt_Name')
		);

	$this->db->insert('family', $records);
	
	if($this->db->affected_rows() > 0)
	{
		return true;
	}

	else
	{
		return false;
	}
	}

	public function submit()
	{
		$tabletest = array(
			'ID'=>$this->input->post('ID'),
			'HCID'=>$this->input->post('txt_HCID'),
			'Type'=>$this->input->post('hide'),
			'Status'=>$this->input->post('Status'),
			'LN'=>$this->input->post('txt_LN'),
			'FN'=>$this->input->post('txt_FN'),
			'MN'=>$this->input->post('txt_MN'),
			'Brgy'=>$this->input->post('BRGY'),
			'St'=>$this->input->post('ST'),
			'City'=>$this->input->post('CITY'),
			'BirthDate'=>$this->input->post('BDAY'),
			'CivilStatus'=>$this->input->post('cs'),
			'FamilyCode'=>$this->input->post('brand'),
			'Philhealth'=>$this->input->post('Philhealth'),
			'Remarks'=>$this->input->post('Remarks')
			);

		$familydesc = array(
			'ID'=>$this->input->post('ID'),
			'code'=>$this->input->post('brand'),
			'LN'=>$this->input->post('txt_LN'),
			'FN'=>$this->input->post('txt_FN'),
			'RELATION'=>$this->input->post('txtFamilyRelation')
			);

	$this->db->insert('tabletest', $tabletest);
	$this->db->insert('fdesc', $familydesc);
	
	if($this->db->affected_rows() > 0)
	{
		return true;
	}

	else
	{
		return false;
	}
	}

	public function update()
	{
		$id = $this->input->post('fc_ID');

		$field = array(
			'HCID'=>$this->input->post('txt_HCID'),
			'Type'=>$this->input->post('txt_hide'),
			'Status'=>$this->input->post('Status'),
			'LN'=>$this->input->post('txt_LN'),
			'FN'=>$this->input->post('txt_FN'),
			'MN'=>$this->input->post('txt_MN'),
			'Brgy'=>$this->input->post('BRGY'),
			'St'=>$this->input->post('ST'),
			'City'=>$this->input->post('CITY'),
			'BirthDate'=>$this->input->post('BDAY'),
			'CivilStatus'=>$this->input->post('cs'),
			'FamilyCode'=>$this->input->post('brand')
			);

		$familydesc = array(
			'ID'=>$this->input->post('ID'),
			'code'=>$this->input->post('brand'),
			'LN'=>$this->input->post('txt_LN'),
			'FN'=>$this->input->post('txt_FN'),
			'RELATION'=>$this->input->post('txtFamilyRelation')
			);

	$this->db->where('ID',$id);
	$this->db->update('tabletest', $field);
	$this->db->where('ID',$id);
	$this->db->update('fdesc', $familydesc);

	if($this->db->affected_rows() > 0)
	{
		return true;
	}

	else
	{
		return false;
	}
	}

	public function delete($id)
	{	
	$this->db->where('ID',$id);
	$this->db->delete('records');
	$this->db->where('ID',$id);
	$this->db->delete('fdesc');
	$this->db->where('ID',$id);
	$this->db->delete('tabletest');
	
	if($this->db->affected_rows() > 0)
	{
		return true;
	}

	else
	{
		return false;
	}
	
	}

	public function getFamilyCode($id)
	{
		$this->db->select("Code");
		$this->db->where('HCID', $id);
		$query = $this->db->get('family');
		return $query->result();
	}

	public function getRecords($id)
	{
		$this->db->select("*");
		$this->db->where('ID', $id);
		$query = $this->db->get('precords');
		return $query->result();
	}

	public function getblob($recordno)
	{
		$this->db->select("Attached");
		$this->db->where('recordno', $recordno);
		$query = $this->db->get('precords');
		return $query->result();
	}

	public function getFamily($id)
	{
		$this->db->select("*");
		$this->db->where('code', $id);
		$query = $this->db->get('fdesc');
		return $query->result();
	}

	public function getallFamily($id)
	{
		$this->db->select("*");
		$this->db->where('HCID', $id);
		$query = $this->db->get('family');
		return $query->result();
	}

}