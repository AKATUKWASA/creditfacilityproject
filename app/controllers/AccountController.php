<?php 
/**
 * Account Page Controller
 * @category  Controller
 */
class AccountController extends SecureController{
	function __construct(){
		parent::__construct(); 
		$this->tablename = "users";
		$this->soft_delete = true;
		$this->delete_field_name = "is_deleted";
		$this->delete_field_value = "1";
	}
	/**
		* Index Action
		* @return null
		*/
	function index(){
		$db = $this->GetModel();
		$rec_id = $this->rec_id = USER_ID; //get current user id from session
		$db->where ("id", $rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"userName", 
			"email", 
			"user_role_id", 
			"role", 
			"action_name");
		$user = $db->getOne($tablename , $fields);
		if(!empty($user)){
			$page_title = $this->view->page_title = get_lang('my_account');
			$this->render_view("account/view.php", $user);
		}
		else{
			$this->set_page_error();
			$this->render_view("account/view.php");
		}
	}
	/**
     * Update user account record with formdata
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = USER_ID;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","userName","img","user_role_id","role","action_name");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'userName' => 'required',
				'img' => 'required',
				'role' => 'required',
				'action_name' => 'required',
			);
			$this->sanitize_array = array(
				'userName' => 'sanitize_string',
				'img' => 'sanitize_string',
				'user_role_id' => 'sanitize_string',
				'role' => 'sanitize_string',
				'action_name' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			//Check if Duplicate Record Already Exit In The Database
			if(isset($modeldata['userName'])){
				$db->where("userName", $modeldata['userName'])->where("id", $rec_id, "!=");
				if($db->has($tablename)){
					$this->view->page_error[] = $modeldata['userName'].get_lang('_already_exist_');
				}
			} 
			if($this->validated()){
				$db->where("users.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg(get_lang('record_updated_successfully'), "success");
					$db->where ("id", $rec_id);
					$user = $db->getOne($tablename , "*");
					set_session("user_data", $user);// update session with new user data
					return $this->redirect("account");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$this->set_flash_msg(get_lang('no_record_updated'), "warning");
						return	$this->redirect("account");
					}
				}
			}
		}
		$db->where("users.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = get_lang('my_account');
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("account/edit.php", $data);
	}
	/**
     * Change account email
     * @return BaseView
     */
	function change_email($formdata = null){
		if($formdata){
			$email = trim($formdata['email']);
			$db = $this->GetModel();
			$rec_id = $this->rec_id = USER_ID; //get current user id from session
			$tablename = $this->tablename;
			$db->where ("id", $rec_id);
			$result = $db->update($tablename, array('email' => $email ));
			if($result){
				$this->set_flash_msg(get_lang('email_address_changed_successfully'), "success");
				$this->redirect("account");
			}
			else{
				$this->set_page_error(get_lang('email_not_changed'));
			}
		}
		return $this->render_view("account/change_email.php");
	}
}
