<?php
/**
 * 
 */
class Main_model extends CI_model
{
	
	function can_login($username, $password)
	{
		$this->db->where('name', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('one_employee');
		return $query;

		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
	function create($formArray)
	{
		$this->db->insert('one_user',$formArray);
	}

	function tracking($formArray)
	{
		$this->db->insert('one_tracking',$formArray);
	}

	function createEmployee($formArray)
	{
		$this->db->insert('one_employee',$formArray);
	}

	function all_user()
	{
		return $users = $this->db->get('one_user')->result_array();
	}

	function added()
	{
		return $users = $this->db->get_where('one_user', ['status'=>'Added'])->result_array();
	}

	function cancle()
	{
		return $users = $this->db->get_where('one_user', ['status'=>'Cancle'])->result_array();
	}

	function pending()
	{
		return $users = $this->db->get_where('one_user', ['status'=>'Pending'])->result_array();
	}

	function schedule()
	{
		return $users = $this->db->get_where('one_user', ['status'=>'Schedule'])->result_array();
	}

	function sold()
	{
		return $users = $this->db->get_where('one_user', ['status'=>'Sold'])->result_array();
	}

	function all_employee()
	{
		return $employees = $this->db->get('one_employee')->result_array();
	}

	function get_user($userId)
	{
		$this->db->where('id', $userId);
		return $user = $this->db->get('one_user')->row_array();
	}

	function get_employee($employeeId)
	{
		$this->db->where('id', $employeeId);
		return $user = $this->db->get('one_employee')->row_array();
	}

	function updateUser($userId,$formArray)
	{
		$this->db->where('id', $userId);
		$this->db->update('one_user',$formArray);
	}

	function updateEmployee($employeeId,$formArray)
	{
		$this->db->where('id', $employeeId);
		$this->db->update('one_employee',$formArray);
	}

	function deleteUser($userId)
	{
		$this->db->where('id', $userId);
		$this->db->delete( 'one_user');
	}

	function deleteEmployee($employeeId)
	{
		$this->db->where('id', $employeeId);
		$this->db->delete( 'one_employee');
	}
}
?>