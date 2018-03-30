<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Student extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	private $user_type;
	private $depertment;
	private $shift;
	public function __construct() {		
		parent::__construct();
		$this->load->model('student_model');		
		if(empty($_SESSION['user_type'])) {			
			redirect('login');
		}
		$this->user_type = $_SESSION['user_type'];
		$this->depertment = $_SESSION['user']['dept_id'];
		$this->shift = $_SESSION['user']['shift_id'];
		$this->load->library('grocery_CRUD');
	}
	
	/**
	* index function
	*
	* @access public
	* @return void
	*/
	
	public function index() 
	{		
		$this->loadview('Dashboard', 'dashboard', '');		
	}

	/**
	 * notice_page function
	 *
	 * @access public
	 * @return void 
	 */

	public function notice_page() 
	{
		$crud = new grocery_CRUD();
		$crud->where('dept_id',$this->depertment);
		$crud->where('shift_id',$this->shift);
		$crud->where('status',2);
		//$crud->set_theme('datatables');
		$crud->set_table('ums_notice')
				->set_subject('Notice')
				->columns('shift_id','dept_id','name','file','created_at');
		$crud->display_as('dept_id','Depertment')
				->display_as('shift_id','Shift');	
		$crud->set_relation('shift_id','ums_shift','name');		
		$crud->set_relation('dept_id','ums_dept_list','name');		
		$crud->set_relation('status','ums_status2','name');		
		$crud->set_field_upload('file','assets/uploads/files');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_clone();
		$output = $crud->render();
		$this->loadview('Notices', 'notices', $output);
	}

	/**
	 * viewload function
	 *
	 * @access public
	 * @param string $pageTitle
	 * @param string $pageName
	 * @param string $pageData 
	 * @return void
	 */
	
	public function loadview($pageTitle,$pageName,$pageData = '')
	{
		$title['title'] = $pageTitle;
		$data['header']  = $this->load->view('inc/back_header',$title,true);
		$data['sidebar'] = $this->load->view($this->user_type.'/'.'sidebar','',true);
		$data['footer']  = $this->load->view('inc/back_footer','',true);
		$data['content'] = $this->load->view($this->user_type.'/'.$pageName,$pageData,true);
		$this->load->view('back_master',$data);
	}
	
	
}
