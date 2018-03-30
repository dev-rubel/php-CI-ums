<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Depertment extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	private $user_type;
	private $depertment;
	public function __construct() {
		
		parent::__construct();
		$this->load->model('depertment_model');		
		$this->load->model('Common_model','commonmodel');	
		if(empty($_SESSION['user_type'])) {			
			redirect('login');
		}
		$this->user_type = $_SESSION['user_type'];
		$this->depertment = $_SESSION['user']['dept_id'];
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
		$page_data['dept_name'] = $this->db->get_where('ums_dept_list',['id'=>$this->depertment])->row()->name;
		$this->loadview('Dashboard', 'dashboard', $page_data);		
	}

	/**
	 * teachers_page function
	 *
	 * @access public
	 * @return void 
	 */
	
	public function teachers_page()
	{
		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
		$crud->where('dept_id',$this->depertment);
		$crud->set_table('ums_teacher')
				->set_subject('Teacher')
				->columns('name','address','phone','email','dept_id','avatar','status');
		$crud->edit_fields('id','name','address','phone','email','avatar','status','updated_at');
		$crud->unset_add_fields('updated_at');
		$crud->set_relation('dept_id','ums_dept_list','name');
		$crud->set_relation('status','ums_status2','name');
		$crud->set_rules('name','Name','required');
		$crud->set_rules('address','Address','required');
		$crud->set_rules('dept_id','Depertment','required');
		$crud->set_rules('phone','Phone','required');
		$crud->set_rules('status','Status','required');
		$crud->set_rules('password','Password','min_length[5]|max_length[10]');
		$crud->set_rules('created_at','Created At','required');
		$crud->set_rules('updated_at','Updated At','required');
		if(isset($_POST['created_at'])) {
			$crud->set_rules('username','Username','required|min_length[3]|is_unique[ums_teacher.username]');
			$crud->set_rules('email','Email','required|valid_email|is_unique[ums_teacher.email]');
		} 		
		/* CHECK UNIQUE ENTITY ON UPDATE */
		if(isset($_POST['updated_at'])) {
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['email'],'email','ums_teacher');
			if($result == false) {
				$crud->set_rules('email','Email','required|valid_email|is_unique[ums_teacher.email]');
			} else {
				$crud->set_rules('email','Email','required|valid_email');
			}
		}	
		
		$crud->change_field_type('password', 'password');
		$crud->callback_before_insert(array($this,'callback_password_hash'));
		$crud->set_field_upload('avatar','assets/uploads/teacher');
		$crud->unset_delete();
		$crud->unset_clone();
		$output = $crud->render();
		$this->loadview('Teachers', 'teachers', $output);
	}

	/**
	 * students_page function
	 *
	 * @access public
	 * @return void 
	 */
	
	public function students_page()
	{
		$crud = new grocery_CRUD();
		$crud->where('ums_student.dept_id',$this->depertment);
		//$crud->set_theme('datatables');
		$crud->set_table('ums_student')
				->set_subject('Student')
				->columns('shift_id','dept_id','semester_id','status','session','registration_no');
		$crud->display_as('dept_id','Depertment')
				->display_as('shift_id','Shift')
				->display_as('batch_id','Batch')
				->display_as('semester_id','Semester')
				->display_as('registration_no','Reg.No.');
		$crud->edit_fields('id','shift_id','dept_id','batch_id','semester_id','status','session','registration_no','roll','name','address','phone','email','avatar','updated_at');
		$crud->unset_add_fields('updated_at');
		$crud->set_relation('shift_id','ums_shift','name');
		$crud->set_relation('dept_id','ums_dept_list','name');
		$crud->set_relation('batch_id','ums_batch','name');		
		$crud->set_relation('semester_id','ums_semester','name');
		$crud->set_relation('status','ums_status2','name');
		$crud->set_rules('shift_id','Shift','required');
		$crud->set_rules('batch_id','Batch','required');
		$crud->set_rules('semester_id','Semester','required');
		$crud->set_rules('dept_id','Depertment','required');
		$crud->set_rules('status','Status','required');
		$crud->set_rules('session','Session','required|numeric');		
		$crud->set_rules('roll','Roll','required|numeric');
		$crud->set_rules('name','Name','required');
		$crud->set_rules('address','Address','required');		
		$crud->set_rules('phone','Phone','required');
		$crud->set_rules('password','Password','min_length[5]|max_length[10]');
		$crud->set_rules('created_at','Created At','required');
		$crud->set_rules('updated_at','Updated At','required');
		if(isset($_POST['created_at'])) {
			$crud->set_rules('registration_no','Reg.No','required|numeric|is_unique[ums_student.registration_no]');
			$crud->set_rules('username','Username','required|min_length[3]|is_unique[ums_student.username]');
			$crud->set_rules('email','Email','required|valid_email|is_unique[ums_student.email]');
		} 		
		/* CHECK UNIQUE ENTITY ON UPDATE */
		if(isset($_POST['updated_at'])) {
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['email'],'email','ums_student');
			if($result == false) {
				$crud->set_rules('email','Email','required|valid_email|is_unique[ums_student.email]');
			} else {
				$crud->set_rules('email','Email','required|valid_email');
			}	
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['registration_no'],'registration_no','ums_student');
			if($result == false) {
				$crud->set_rules('registration_no','Reg.No','required|numeric|is_unique[ums_student.registration_no]');
			} else {
				$crud->set_rules('registration_no','Reg.No','required|numeric');
			}
		}
		$crud->change_field_type('password', 'password');
		$crud->callback_before_insert(array($this,'callback_password_hash'));
		$crud->set_field_upload('avatar','assets/uploads/student');
		$crud->unset_delete();
		$crud->unset_clone();
		$output = $crud->render();
		$this->loadview('Students', 'students', $output);
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
		//$crud->set_theme('datatables');
		$crud->set_table('ums_notice')
				->set_subject('Notice')
				->columns('shift_id','dept_id','name','file','status','created_at');
		$crud->display_as('dept_id','Depertment')
				->display_as('shift_id','Shift');
		
		$crud->edit_fields('id','shift_id','dept_id','name','description','file','status','updated_at');
		$crud->unset_add_fields('updated_at');
		
		$crud->set_relation('shift_id','ums_shift','name');		
		$crud->set_relation('dept_id','ums_dept_list','name');		
		$crud->set_relation('status','ums_status2','name');
		$crud->set_rules('dept_id','Depertment','required');
		$crud->set_rules('name','Name','required');
		$crud->set_rules('description','Description','required');		
		$crud->set_rules('status','Status','required');		
		$crud->set_rules('created_at','Created At','required');
		$crud->set_rules('updated_at','Updated At','required');
		
		$crud->set_field_upload('file','assets/uploads/files');
		$crud->unset_clone();
		$output = $crud->render();
		$this->loadview('Notices', 'notices', $output);
	}

	/**
	 * grocery_CRUD calback functions
	 *
	 * @access public
	 * @param mixed	  
	 */

	function callback_password_hash($post_array)
	{
		$post_array['password'] = password_hash($post_array['password'], PASSWORD_BCRYPT);
		return $post_array;
	}

	function encrypt_password_callback_student($post_array, $primary_key) 
	{
		if(!empty($post_array['password']))
		{	
			if(strlen($post_array['password']) <= 10) {
				$post_array['password'] = password_hash($post_array['password'], PASSWORD_BCRYPT);
			}			
		} else {
			$post_array['password'] = $this->db->get_where('ums_student',['id'=>$post_array['id']])->row()->password;
		}	 
		return $post_array;
	}

	function set_password_input_to_empty() 
	{
		return "<input type='password' name='password' value='' />";
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