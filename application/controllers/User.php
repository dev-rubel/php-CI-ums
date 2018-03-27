<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->model('user_model');
		
	}
	
	
	public function index() {
		

		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('login');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user_type = $this->input->post('user_type');

			//$user_type = 'admin';
			$type = ['depertment','accountant','librarian'];
			if(in_array($user_type,$type)) {
				redirect('login');
			}
			
			
			if ($this->user_model->resolve_user_login($username, $password, $user_type)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username, $user_type);
				$user    = $this->user_model->get_user($user_id, $user_type);
				
				// set session user datas
				$_SESSION['user_id']      = $user->id;
				$_SESSION['username']     = $user->username;
				$_SESSION['useremail']    = $user->email;
				$_SESSION['user_type']    = $user_type;
				
				// user login ok
				redirect($user_type);
				
			} else {				
				// login failed
				$data->error = 'Wrong username or password.';				
				// send error to the view
				$this->load->view('login', $data);
			}
			
		}
		
	}
	
	
}
