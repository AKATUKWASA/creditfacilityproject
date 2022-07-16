<?php 
/**
 * Vsla_groups Page Controller
 * @category  Controller
 */
class Vsla_groupsController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "vsla_groups";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("vsla_id", 
			"District", 
			"Cluster", 
			"Village", 
			"Vsla");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				vsla_groups.vsla_id LIKE ? OR 
				vsla_groups.District LIKE ? OR 
				vsla_groups.Cluster LIKE ? OR 
				vsla_groups.Village LIKE ? OR 
				vsla_groups.Vsla LIKE ? OR 
				vsla_groups.date_deleted LIKE ? OR 
				vsla_groups.is_deleted LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "vsla_groups/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("vsla_groups.vsla_id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = get_lang('vsla_groups');
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("vsla_groups/list.php", $data); //render the full page
	}
	/**
     * Load csv data
     * @return data
     */
	function import_data(){
		if(!empty($_FILES['file'])){
			$finfo = pathinfo($_FILES['file']['name']);
			$ext = strtolower($finfo['extension']);
			if(!in_array($ext , array('csv'))){
				$this->set_flash_msg(get_lang('file_format_not_supported'), "danger");
			}
			else{
			$file_path = null;
			$uploader=new Uploader;
			$config = array('uploadDir' => UPLOAD_FILE_DIR, 'title' => '{{file_name}}{{date}}', 'required' => true, 'extensions' => array('csv'), 'filenameprefix' => 'vsla_groups_');
			$upload_data=$uploader->upload($_FILES['file'], $config);
			if($upload_data['isComplete']){
				$files = $upload_data['data'];
				$file_path = $upload_data['data']['files'][0];
			}
			if($upload_data['hasErrors']){
				$this->set_flash_msg($upload_data['errors'], "danger");
			}
				if(!empty($file_path)){
					$request = $this->request;
					$db = $this->GetModel();
					$tablename = $this->tablename;
					$options = array('table' => $tablename, 'fields' => '', 'delimiter' => ',', 'quote' => '"');
					$data = $db->loadCsvData( $file_path , $options , true );
					if($db->getLastError()){
						$this->set_flash_msg($db->getLastError(), "danger");
					}
					else{
						$this->set_flash_msg(get_lang('data_imported_successfully'), "success");
					}
				}
				else{
					$this->set_flash_msg(get_lang('error_uploading_file'), "danger");
				}
			}
		}
		else{
			$this->set_flash_msg(get_lang('no_file_selected_for_upload'), "warning");
		}
		$this->redirect("vsla_groups");
	}
// No View Function Generated Because No Field is Defined as the Primary Key on the Database Table
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("vsla_id","Vsla","District","Cluster","Village");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'vsla_id' => 'required',
				'Vsla' => 'required',
				'District' => 'required',
				'Cluster' => 'required',
				'Village' => 'required',
			);
			$this->sanitize_array = array(
				'vsla_id' => 'sanitize_string',
				'Vsla' => 'sanitize_string',
				'District' => 'sanitize_string',
				'Cluster' => 'sanitize_string',
				'Village' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg(get_lang('record_added_successfully'), "success");
					return	$this->redirect("vsla_groups");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = get_lang('add_new_vsla_groups');
		$this->render_view("vsla_groups/add.php");
	}
// No Edit Function Generated Because No Field is Defined as the Primary Key
// No Delete Function Generated Because No Field is Defined as the Primary Key on the Database Table/View
}
