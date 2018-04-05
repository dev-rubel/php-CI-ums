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
	private $batch;
	private $shift;
	private $cr;
	private $student_id;
	public function __construct() {		
		parent::__construct();
		$this->load->model('student_model');		
		if(empty($_SESSION['user_type'])) {			
			redirect('login');
		}
		$this->user_type = $_SESSION['user_type'];
		$this->depertment = $_SESSION['user']['dept_id'];
		$this->batch = $_SESSION['user']['batch_id'];
		$this->shift = $_SESSION['user']['shift_id'];
		$this->cr = $_SESSION['user']['cr'];
		$this->student_id = $_SESSION['user']['id'];
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
	 * students_page function
	 *
	 * @access public
	 * @return void 
	 */
	
	public function students_page()
	{
		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
		$crud->where('ums_student.dept_id',$this->depertment);
		$crud->where('batch_id',$this->batch);
		$crud->set_table('ums_student')
				->set_subject('Student')
				->columns('avatar','name','address','email','roll','represnet','registration_no','status');	
		
		$crud->callback_column('represnet',array($this,'callback_represent'));
		$crud->set_relation('status','ums_status2','name');		
		$crud->set_field_upload('avatar','assets/uploads/student');
		$crud->unset_operations();
		$crud->order_by('roll','asc');
		$output = $crud->render();
		$this->loadview('Students', 'students', $output);
	}

	public function callback_represent($value, $row) 
	{
		return $row->cr==true?'CR-'.$this->db->get_where('ums_student',['id'=>$row->id])->row()->phone:'Student';
	}

	/**
	 * subject_page function
	 *
	 * @access public
	 * @return void 
	 */

	public function subject_page() 
	{				
		$subject_id = $this->uri->segment(3);
		$crud = new grocery_CRUD();
		$crud->where('dept_id',$this->depertment);
		$crud->where('batch_id',$this->batch);
		$crud->where('subject_id',$subject_id);
		//$crud->set_theme('datatables');
		$crud->set_table('ums_teacher_assign_subject_notice')
				->set_subject('Subject Notice')
				->columns('title','description','created_at','updated_at');

		// $crud->set_field_upload('file','assets/uploads/files');

		$crud->unset_operations();
		$output = $crud->render();
		
		$this->loadview('Subject Page', 'SubjectPage', $output);
		
	}

	/**
	 * batch_notice_page function
	 *
	 * @access public
	 * @return void 
	 */

	public function batch_notice_page() 
	{	
		$crud = new grocery_CRUD();
		$crud->where('ums_student_batch_notice.dept_id',$this->depertment);
		$crud->where('batch_id',$this->batch);
		//$crud->set_theme('datatables');
		$crud->set_table('ums_student_batch_notice')
				->set_subject('Batch Notice')
				->columns('title','description','created_at','updated_at');
		if($this->cr):
			$crud->add_fields('dept_id','batch_id','title','description','created_at');
			$crud->edit_fields('dept_id','batch_id','title','description','updated_at');		
			$crud->change_field_type('dept_id', 'hidden', $this->depertment);
			$crud->change_field_type('batch_id', 'hidden', $this->batch);
			$crud->set_rules('title','Title','required');
			$crud->set_rules('description','Description','required');
			$crud->set_rules('created_at','Created At','required');
			$crud->set_rules('updated_at','Updated At','required');
		else:
			$crud->unset_operations();
		endif;
		$output = $crud->render();
		$this->loadview('Batch Notices', 'batchNotice', $output);		
	}

	/**
	 * notice_page function
	 *
	 * @access public
	 * @return void 
	 */

	public function teacher_profile() 
	{
		$teacher_id = $this->uri->segment(3);
		$pageData['teacher'] = $this->db->get_where('ums_teacher',['id'=>$teacher_id])->result_array();
		$this->loadview('Teacher Profile', 'teacherProfile', $pageData);
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
		$crud->where('status',2);
		//$crud->set_theme('datatables');
		$crud->set_table('ums_notice')
				->set_subject('Notice')
				->columns('name','description','file','created_at');	

		$crud->set_relation('status','ums_status2','name');		
		$crud->set_field_upload('file','assets/uploads/files');
		$crud->unset_operations();
		$output = $crud->render();
		$this->loadview('Notices', 'notices', $output);
	}

	/**
	 * report function
	 *
	 * @access public
	 * @return void 
	 */

	public function report() 
	{
		$crud = new grocery_CRUD();
		$crud->where('dept_id',$this->depertment);
		$crud->where('student_id',$this->student_id);
		//$crud->set_theme('datatables');
		$crud->set_table('ums_student_report')
				->set_subject('Report')
				->columns('title','description','created_at');	
		$crud->add_fields('dept_id','student_id','title','description','created_at');
		$crud->change_field_type('dept_id','hidden',$this->depertment);
		$crud->change_field_type('student_id','hidden',$this->student_id);

		$crud->set_rules('title','Title','required');
		$crud->set_rules('description','Description','required');
		$crud->set_rules('created_at','Created At','required');

		if($this->cr == false) {
			$crud->unset_operations();	
		} else {
			$crud->unset_edit();
			$crud->unset_clone();
			$crud->unset_delete();			
		}
		$output = $crud->render();
		$this->loadview('Report', 'report', $output);
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
		if(is_object($pageData)) {
			$pageData->title = $pageTitle;
		} else {
			$pageData['title'] = $pageTitle;
		}		
		$data['header']  = $this->load->view('inc/back_header',$pageData,true);
		$data['sidebar'] = $this->load->view($this->user_type.'/'.'sidebar','',true);
		$data['footer']  = $this->load->view('inc/back_footer',$pageData,true);
		$data['content'] = $this->load->view($this->user_type.'/'.$pageName,$pageData,true);
		$this->load->view('back_master',$data);
	}
	
	
}
