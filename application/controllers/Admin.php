<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Admin extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	private $user_type;
	public function __construct() 
	{		
		parent::__construct();
		$this->load->model('admin_model','adminmodel');		
		$this->load->model('Common_model','commonmodel');		
		if(empty($_SESSION['user_type'])) {			
			redirect('login');
		}
		$this->user_type = $_SESSION['user_type'];
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
		$this->loadview('Dashboard', 'dashboard','');		
	}

	/**
	* admins_page function
	*
	* @access public
	* @return void
	*/
	
	public function admins_page() 
	{
		$crud = new grocery_CRUD();		
		//$crud->set_theme('datatables');
		$crud->set_table('ums_admin')
				->set_subject('Admin')
				->columns('username','name','email','avatar');
		$crud->edit_fields('id','username','name','email','password','avatar','updated_at');
		$crud->unset_add_fields('updated_at');
		$crud->set_rules('name','Name','required');
		$crud->set_rules('password','Password','min_length[5]|max_length[10]');
		$crud->set_rules('created_at','Created At','required');
		$crud->set_rules('updated_at','Updated At','required');
		if(isset($_POST['created_at'])) {
			$crud->set_rules('username','Username','required|min_length[3]|is_unique[ums_admin.username]');
			$crud->set_rules('email','Email','required|valid_email|is_unique[ums_admin.email]');
		} 		
		/* CHECK UNIQUE ENTITY ON UPDATE */
		if(isset($_POST['updated_at'])) {
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['email'],'email','ums_admin');
			if($result == false) {
				$crud->set_rules('email','Email','required|valid_email|is_unique[ums_admin.email]');
			}			
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['username'],'username','ums_admin');
			if($result == false) {
				$crud->set_rules('username','Username','required|min_length[3]|is_unique[ums_admin.username]');
			}
		}		
		$crud->change_field_type('password', 'password');
		$crud->callback_before_insert(array($this,'callback_password_hash'));
 		$crud->callback_edit_field('password',array($this,'set_password_input_to_empty'));		
		$crud->callback_before_update(array($this,'encrypt_password_callback_admin'));
		$crud->set_field_upload('avatar','assets/uploads/admin');
		$crud->unset_read();
		$crud->unset_clone();
		$output = $crud->render();		
		$this->loadview('Admins', 'admin', $output);		
	}

	/**
	* depertments_page function
	*
	* @access public
	* @return void
	*/
	
	public function depertments_page() 
	{
		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
		$crud->set_table('ums_dept_list')
				->set_subject('Depertment')
				->columns('name','created_at','updated_at');
		$crud->edit_fields('name','updated_at');
		$crud->unset_add_fields('updated_at');
		$crud->set_rules('name','Name','required|min_length[3]|is_unique[ums_dept_list.name]');
		$crud->set_rules('created_at','Created At','required');
		$crud->set_rules('updated_at','Updated At','required');		
		$crud->unset_read();
		$crud->unset_clone();
		$output = $crud->render();		
		$this->loadview('Depertment', 'depertment', $output);		
	}

	/**
	* depertments_page function
	*
	* @access public
	* @return void
	*/
	
	public function depertments_account_page() 
	{
		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
		$crud->set_table('ums_depertment')
				->set_subject('Depertment Account')
				->columns('name','dept_id','username','email','status');
		$crud->display_as('dept_id','Dept.Name');
		$crud->edit_fields('id','dept_id','name','username','password','email','status','updated_at');
		$crud->unset_add_fields('updated_at');
		$crud->set_relation('dept_id','ums_dept_list','name');	
		$crud->set_relation('status','ums_status2','name');	
		$crud->set_rules('name','Name','required|min_length[3]');		
		$crud->set_rules('status','Status','required');		
		$crud->set_rules('password','Password','min_length[5]|max_length[10]');
		if(isset($_POST['created_at'])) {
			$crud->set_rules('username','Username','required|min_length[3]|is_unique[ums_depertment.username]');
			$crud->set_rules('email','Email','required|valid_email|is_unique[ums_depertment.email]');
		} 		
		/* CHECK UNIQUE ENTITY ON UPDATE */
		if(isset($_POST['updated_at'])) {
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['email'],'email','ums_depertment');
			if($result == false) {
				$crud->set_rules('email','Email','required|valid_email|is_unique[ums_depertment.email]');
			}			
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['username'],'username','ums_depertment');
			if($result == false) {
				$crud->set_rules('username','Username','required|min_length[3]|is_unique[ums_depertment.username]');
			}
		}		
		$crud->set_rules('created_at','Created At','required');
		$crud->set_rules('updated_at','Updated At','required');
		$crud->change_field_type('password', 'password');
		$crud->callback_before_insert(array($this,'callback_password_hash'));
		$crud->callback_edit_field('password',array($this,'set_password_input_to_empty'));
		$crud->callback_before_update(array($this,'encrypt_password_callback_deptAc'));		
		$crud->unset_read();
		$crud->unset_clone();
		$output = $crud->render();		
		$this->loadview('Depertment Account', 'depertment_account', $output);		
	}

	/**
	* batchs_page function
	*
	* @access public
	* @return void
	*/
	
	public function batchs_page() 
	{
		$crud = new grocery_CRUD();		
		//$crud->set_theme('datatables');
		$crud->set_table('ums_batch')
				->set_subject('Batch')
				->columns('dept_id','shift_id','name','created_at');
		$crud->display_as('dept_id','Depertment')
				->display_as('shift_id','Shift')
				->display_as('name','Batch Name');		
		$crud->edit_fields('dept_id','shift_id','name','updated_at');
		$crud->unset_add_fields('updated_at');
		$crud->set_relation('dept_id','ums_dept_list','name');
		$crud->set_relation('shift_id','ums_shift','name');
		$crud->set_rules('name','Name','required|min_length[3]|is_unique[ums_batch.name]');
		$crud->set_rules('dept_id','Depertment','required');
		$crud->set_rules('shift_id','Shift','required');
		$crud->set_rules('created_at','Created At','required');
		$crud->set_rules('updated_at','Updated At','required');		
		$crud->unset_read();
		$crud->unset_clone();
		$output = $crud->render();		
		$this->loadview('Batch', 'batch', $output);		
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
		$crud->set_table('ums_teacher')
				->set_subject('Teacher')
				->columns('name','address','phone','email','dept_id','avatar','status');
		$crud->edit_fields('id','username','name','address','phone','email','password','avatar','dept_id','status','updated_at');
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
			}			
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['username'],'username','ums_teacher');
			if($result == false) {
				$crud->set_rules('username','Username','required|min_length[3]|is_unique[ums_teacher.username]');
			}
		}		
		$crud->change_field_type('password', 'password');
		$crud->callback_before_insert(array($this,'callback_password_hash'));
 		$crud->callback_edit_field('password',array($this,'set_password_input_to_empty'));
		$crud->callback_before_update(array($this,'encrypt_password_callback_teacher'));
		$crud->set_field_upload('avatar','assets/uploads/teacher');
		$crud->unset_read();
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
		//$crud->set_theme('datatables');
		$crud->set_table('ums_student')
				->set_subject('Student')
				->columns('shift_id','dept_id','batch_id','semester_id','status','session','registration_no');
		$crud->display_as('dept_id','Depertment')
				->display_as('shift_id','Shift')
				->display_as('batch_id','Batch')
				->display_as('semester_id','Semester')
				->display_as('registration_no','Reg.No.');
		$crud->edit_fields('id','shift_id','dept_id','batch_id','semester_id','status','session','registration_no','roll','name','address','phone','email','username','password','avatar','updated_at');
		$crud->unset_add_fields('updated_at');
		$crud->set_relation('shift_id','ums_shift','name');
		$crud->set_relation('dept_id','ums_dept_list','name');
		$crud->set_relation('batch_id','ums_batch','name');
		$crud->set_relation('semester_id','ums_semester','name');
		$crud->set_relation('status','ums_status2','name');
		$crud->set_rules('shift_id','Shift','required');
		$crud->set_rules('batch_id','Batch','required');
		$crud->set_rules('semester_id','Semester','required');
		$crud->set_rules('depertment','Depertment','required');
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
			}			
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['username'],'username','ums_student');
			if($result == false) {
				$crud->set_rules('username','Username','required|min_length[3]|is_unique[ums_student.username]');
			}			
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['registration_no'],'registration_no','ums_student');
			if($result == false) {
				$crud->set_rules('registration_no','Reg.No','required|numeric|is_unique[ums_student.registration_no]');
			}
		}		
		$crud->change_field_type('password', 'password');
		$crud->callback_before_insert(array($this,'callback_password_hash'));
 		$crud->callback_edit_field('password',array($this,'set_password_input_to_empty'));
		$crud->callback_before_update(array($this,'encrypt_password_callback_student'));
		$crud->set_field_upload('avatar','assets/uploads/student');
		$crud->unset_read();
		$crud->unset_clone();
		$output = $crud->render();
		$this->loadview('Students', 'students', $output);
	}

	/**
	 * subjects_page function
	 *
	 * @access public
	 * @return void 
	 */
	
	public function subjects_page()
	{
		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
		$crud->set_table('ums_subject')
				->set_subject('Subject')
				->columns('shift_id','dept_id','semester_id','name','subject_code','status');
		$crud->display_as('dept_id','Depertment')
				->display_as('shift_id','Shift')
				->display_as('semester_id','Semester');
		$crud->edit_fields('id','shift_id','dept_id','semester_id','name','subject_code','status','updated_at');
		$crud->set_relation('status','ums_status2','name');
		$crud->unset_add_fields('updated_at');
		$crud->set_relation('shift_id','ums_shift','name');
		$crud->set_relation('dept_id','ums_dept_list','name');
		$crud->set_relation('semester_id','ums_semester','name');
		$crud->set_rules('shift_id','Shift','required');
		$crud->set_rules('semester_id','Semester','required');
		$crud->set_rules('status','Status','required');
		$crud->set_rules('dept_id','Depertment','required');
		$crud->set_rules('name','Name','required');		
		$crud->set_rules('created_at','Created At','required');
		$crud->set_rules('updated_at','Updated At','required');
		if(isset($_POST['created_at'])) {
			$crud->set_rules('subject_code','Subject Code','required|is_unique[ums_subject.subject_code]');	
		} 		
		/* CHECK UNIQUE ENTITY ON UPDATE */
		if(isset($_POST['updated_at'])) {
			$result = $this->commonmodel->unique_entity($_POST['id'],$_POST['subject_code'],'subject_code','ums_subject');
			if($result == false) {
				$crud->set_rules('subject_code','Subject Code','required|is_unique[ums_subject.subject_code]');	
			}	
		}		
		$crud->unset_read();
		$crud->unset_clone();
		$output = $crud->render();
		$this->loadview('Subjects', 'subjects', $output);
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

	function encrypt_password_callback_teacher($post_array, $primary_key) 
	{
		if(!empty($post_array['password']))
		{	
			if(strlen($post_array['password']) <= 10) {
				$post_array['password'] = password_hash($post_array['password'], PASSWORD_BCRYPT);
			}			
		} else {
			$post_array['password'] = $this->db->get_where('ums_teacher',['id'=>$post_array['id']])->row()->password;
		}	 
		return $post_array;
	}

	function encrypt_password_callback_admin($post_array, $primary_key) 
	{
		if(!empty($post_array['password']))
		{	
			if(strlen($post_array['password']) <= 10) {
				$post_array['password'] = password_hash($post_array['password'], PASSWORD_BCRYPT);
			}			
		} else {
			$post_array['password'] = $this->db->get_where('ums_admin',['id'=>$post_array['id']])->row()->password;
		}	 
		return $post_array;
	}

	function encrypt_password_callback_deptAc($post_array, $primary_key) 
	{
		if(!empty($post_array['password']))
		{	
			if(strlen($post_array['password']) <= 10) {
				$post_array['password'] = password_hash($post_array['password'], PASSWORD_BCRYPT);
			}			
		} else {
			$post_array['password'] = $this->db->get_where('ums_depertment',['id'=>$post_array['id']])->row()->password;
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
