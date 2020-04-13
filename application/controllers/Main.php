<?php
/**
 * 
 */
class Main extends CI_controller
{
	
	function index()
	{
		$this->login();
	}

	function login()
	{
		if ($this->session->userdata('username') !='') {
			$this->load->model('main_model');
			$users = $this->main_model->all_user();

			$data = array();
			$data['users'] = $users;

			$this->load->view('list', $data);
			
		}
		else {
			$data['title'] = 'CodeIgniter Simple Login Form With Sessions';
			$this->load->view('login',$data);
		}	
	}

	function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('main_model');
			$validate = $this->main_model->can_login($username, $password);
			if ($validate) {
				$data = $validate->row_array();
				$id = $data['id'];
		        $name = $data['name'];
		        $email = $data['email'];
		        $level = $data['level'];
		        $post = $data['post'];
				$session_data = array(
					'username'  => $username,
					'id'        => $id,
					'name'      => $name,
		            'email'     => $email,
		            'level'     => $level,
		            'post'      => $post,
		            'logged_in' => TRUE
				);
				$this->session->set_userdata($session_data);
				redirect(base_url().'index.php/main/list');
			}
			else {
				$this->session->set_flashdata('error','Invalid Username and Password');
				redirect(base_url().'index.php/main/login');
			}
		}
		else{
			$this->login();
		}
	}

	function list()
	{
		if ($this->session->userdata('username') !='') {
			$this->load->model('main_model');
			$users = $this->main_model->added();

			$data = array();
			$data['users'] = $users;

			$this->load->view('list', $data);
			// echo '<h2>Welcome -'.$this->session->userdata('username').' </h2>';
			
		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function pending()
	{
		if ($this->session->userdata('username') !='') {
			$this->load->model('main_model');
			$users = $this->main_model->pending();

			$data = array();
			$data['users'] = $users;

			$this->load->view('list', $data);
			// echo '<h2>Welcome -'.$this->session->userdata('username').' </h2>';
		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function cancle()
	{
		if ($this->session->userdata('username') !='') {
			$this->load->model('main_model');
			$users = $this->main_model->cancle();

			$data = array();
			$data['users'] = $users;

			$this->load->view('list', $data);
			// echo '<h2>Welcome -'.$this->session->userdata('username').' </h2>';
			
		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function schedule()
	{
		if ($this->session->userdata('username') !='') {
			$this->load->model('main_model');
			$users = $this->main_model->schedule();

			$data = array();
			$data['users'] = $users;

			$this->load->view('list', $data);
			// echo '<h2>Welcome -'.$this->session->userdata('username').' </h2>';
			
		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function sold()
	{
		if ($this->session->userdata('username') !='') {
			$this->load->model('main_model');
			$users = $this->main_model->sold();

			$data = array();
			$data['users'] = $users;

			$this->load->view('list', $data);
			// echo '<h2>Welcome -'.$this->session->userdata('username').' </h2>';
			
		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function employee_list()
	{
		if ($this->session->userdata('username') !='') {
			if ($this->session->userdata('username') !='') {
				$this->load->model('main_model');
				$employees = $this->main_model->all_employee();

				$data = array();
				$data['employees'] = $employees;

				$this->load->view('employee_list', $data);
				
			}
			else {
				redirect(base_url(). 'index.php/main/login');
			}		
		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		redirect(base_url().'index.php/main/login');
	}

	function create()
	{

		if ($this->session->userdata('username') !='') {

			$this->load->model('main_model');
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			// $this->form_validation->set_rules('status','Status','required');
		
			if ($this->form_validation->run()==false) {
				$this->load->view('create');
			}else {
				$formArray = array();
				$formArray['name'] = $this->input->post('name');
				$formArray['email'] = $this->input->post('email');
				// $formArray['status'] = $this->input->post('status');
				$formArray['created_at'] = date('Y-m-d');
				$formArray['created_by'] = $this->session->userdata('email');
				$this->main_model->create($formArray);


				//tracking

				$formArray = array();
				$formArray['username'] = $this->input->post('name');
				$formArray['email/phone	'] = $this->input->post('email');
				$formArray['comment'] = $this->input->post('comment');
				$formArray['did'] = 'create';
				$formArray['created_at'] = date('Y-m-d');
				$formArray['employee_name'] = $this->session->userdata('email');
				$this->main_model->tracking($formArray);

				//tracking


				$this->session->set_flashdata('success', 'Record added successfully');
				redirect(base_url().'index.php/main/list');
			}

		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function create_employee()
	{
		if ($this->session->userdata('username') !='') {

			$this->load->model('main_model');
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('post','Post','required');
			$this->form_validation->set_rules('password','Password','required');
			
			if ($this->form_validation->run()==false) {
				$this->load->view('create_employee');
			}else {
				$formArray = array();
				$formArray['name'] = $this->input->post('name');
				$formArray['email'] = $this->input->post('email');
				$formArray['post'] = $this->input->post('post');
				$formArray['password'] = $this->input->post('password');
				$formArray['created_at'] = date('Y-m-d');
				$formArray['created_by'] = $this->session->userdata('email');
				if ($formArray['post'] = 'M.D') {
					$formArray['level'] = '1';
				}
				if ($formArray['post'] = 'Engineer') {
					$formArray['level'] = '2';
				}
				if ($formArray['post'] = 'Manager') {
					$formArray['level'] = '3';
				}
				$this->main_model->createEmployee($formArray);

				//tracking

				$formArray = array();
				$formArray['username'] = $this->input->post('name');
				$formArray['email/phone	'] = $this->input->post('email');
				// $formArray['comment'] = $this->input->post('comment');
				$formArray['did'] = 'create_employee';
				$formArray['created_at'] = date('Y-m-d');
				$formArray['employee_name'] = $this->session->userdata('email');
				$this->main_model->tracking($formArray);

				//tracking

				$this->session->set_flashdata('success', 'Record added successfully');
				redirect(base_url().'index.php/main/employee_list');
			}
		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}
	function edit($userId)
	{

		if ($this->session->userdata('username') !='') {

			$this->load->model('main_model');
			$user = $this->main_model->get_user($userId);
			$data = array();
			$data['user'] = $user;

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('status','Status','required');

			if ($this->form_validation->run()==false) {
				$this->load->view('edit',$data);
			}else {
				$formArray = array();
				$formArray['name'] = $this->input->post('name');
				$formArray['email'] = $this->input->post('email');
				$formArray['status'] = $this->input->post('status');
				$formArray['created_at'] = date('Y-m-d');
				$formArray['created_by'] = $this->session->userdata('email');
				$this->main_model->updateUser($userId,$formArray);

				//tracking

				$formArray = array();
				$formArray['username'] = $this->input->post('name');
				$formArray['email/phone	'] = $this->input->post('email');
				$formArray['comment'] = $this->input->post('comment');
				$formArray['user_id'] = $userId;
				$formArray['did'] = 'edit';
				$formArray['created_at'] = date('Y-m-d');
				$formArray['employee_name'] = $this->session->userdata('email');
				$this->main_model->tracking($formArray);

				//tracking

				$this->session->set_flashdata('success', 'Record updated successfully');
				redirect(base_url().'index.php/main/list');
			}

		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function employee_edit($employeeId)
	{

		if ($this->session->userdata('username') !='') {

			$this->load->model('main_model');
			$employee = $this->main_model->get_employee($employeeId);
			$data = array();
			$data['employee'] = $employee;

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('post','Post','required');
			$this->form_validation->set_rules('password','Password','required');

			if ($this->form_validation->run()==false) {
				$this->load->view('employee_edit',$data);
			}else {
				$formArray = array();
				$formArray['name'] = $this->input->post('name');
				$formArray['email'] = $this->input->post('email');
				$formArray['post'] = $this->input->post('post');
				$formArray['password'] = $this->input->post('password');
				$this->main_model->updateEmployee($employeeId,$formArray);

				//tracking

				$formArray = array();
				$formArray['username'] = $this->input->post('name');
				$formArray['email/phone	'] = $this->input->post('email');
				// $formArray['comment'] = $this->input->post('comment');
				$formArray['did'] = 'employee_edit';
				$formArray['created_at'] = date('Y-m-d');
				$formArray['employee_name'] = $this->session->userdata('email');
				$this->main_model->tracking($formArray);

				//tracking

				$this->session->set_flashdata('success', 'Record updated successfully');
				redirect(base_url().'index.php/main/employee_list');
		}

		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function delete($userId)
	{

		if ($this->session->userdata('username') !='') {

			$this->load->model('main_model');
			$user = $this->main_model->get_user($userId);
			if (empty($user)) {
				$this->session->set_flashdata('failure', 'Record not found in database');
				redirect(base_url().'index.php/main/list');
			}

			$this->main_model->deleteUser($userId);

			//tracking

			$formArray = array();
			// $formArray['username'] = $this->input->post('name');
			// $formArray['email/phone	'] = $this->input->post('email');
			// $formArray['user_id'] = $this->main_model->get_user($userId);
			// $formArray['comment'] = $this->input->post('comment');
			$formArray['did'] = 'delete';
			$formArray['created_at'] = date('Y-m-d');
			$formArray['employee_name'] = $this->session->userdata('email');
			$this->main_model->tracking($formArray);

			//tracking

			$this->session->set_flashdata('failure', 'Record deleted successfully');
			redirect(base_url().'index.php/main/list');

		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function employee_delete($employeeId)
	{

		if ($this->session->userdata('username') !='') {

			$this->load->model('main_model');
			$employee = $this->main_model->get_employee($employeeId);
			if (empty($employee)) {
				$this->session->set_flashdata('failure', 'Record not found in database');
				redirect(base_url().'index.php/main/employee_list');
			}

			$this->main_model->deleteEmployee($employeeId);

			//tracking

			$formArray = array();
			// $formArray['username'] = $this->input->post('name');
			// $formArray['email/phone	'] = $this->input->post('email');
			// $formArray['comment'] = $this->input->post('comment');
			$formArray['did'] = 'employee_delete';
			$formArray['created_at'] = date('Y-m-d');
			$formArray['employee_name'] = $this->session->userdata('email');
			$this->main_model->tracking($formArray);

			//tracking

			$this->session->set_flashdata('failure', 'Record deleted successfully');
			redirect(base_url().'index.php/main/employee_list');

		}
		else {
			redirect(base_url(). 'index.php/main/login');
		}
	}

	function profile()
	{
		$this->load->view('profile');
	}
}
?>