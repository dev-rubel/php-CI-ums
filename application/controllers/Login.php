<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	private $user_type;
	public function __construct() {
		
		parent::__construct();
		if(!empty($_SESSION['user_type'])) {
			$this->user_type = $_SESSION['user_type'];
			redirect($this->user_type);
		}
		
		
	}

	public function index()
	{
		$this->load->view('login');
	}

}
