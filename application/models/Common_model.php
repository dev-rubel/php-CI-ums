<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin_model class.
 * 
 * @extends CI_Model
 */
class Common_model extends CI_Model {

	protected $table;
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
	}

	/**
	 * unique_entity function
	 * 
	 * @access public
	 * @param $id
	 * @param $filds
	 * @return void
	 * 
	*/

	public function unique_entity($id,$value,$col,$table) 
	{
		$dbValue = $this->db->get_where($table,['id'=>$id])->row()->$col;
		if($dbValue == $value) {
			return true;
		} else {
			$this->db->where($col,$value);
			$count = $this->db->get($table)->num_rows();
			if($count > 0) {
				return false;
			} else {
				return true;
			}			
		}
	}
	
	
}
