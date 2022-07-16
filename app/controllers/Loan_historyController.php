<?php 
/**
 * Loan_history Page Controller
 * @category  Controller
 */
class Loan_historyController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "loan_history";
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
		$fields = array("loan_history.Date", 
			"loan_history.District", 
			"loan_history.Cluster", 
			"loan_history.Village", 
			"loan_application.Date AS loan_application_Date", 
			"loan_history.Vsla", 
			"loan_history.Name", 
			"loan_history.mem_id", 
			"loan_history.Amount", 
			"loan_history.Rate", 
			"loan_history.Period", 
			"loan_history.Interest", 
			"loan_history.Balance_Interest", 
			"loan_history.Balance_Principle", 
			"loan_history.Month");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				loan_history.Date LIKE ? OR 
				loan_history.District LIKE ? OR 
				loan_history.Cluster LIKE ? OR 
				loan_history.Village LIKE ? OR 
				loan_history.Vsla LIKE ? OR 
				loan_history.Name LIKE ? OR 
				loan_history.mem_id LIKE ? OR 
				loan_history.Amount LIKE ? OR 
				loan_history.Rate LIKE ? OR 
				loan_history.Period LIKE ? OR 
				loan_history.Interest LIKE ? OR 
				loan_history.Balance_Interest LIKE ? OR 
				loan_history.Balance_Principle LIKE ? OR 
				loan_history.Month LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "loan_history/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("loan_history.Date", ORDER_TYPE);
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
		$page_title = $this->view->page_title = get_lang('loan_history');
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("loan_history/list.php", $data); //render the full page
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
			$fields = $this->fields = array("Date","District","Cluster","Village","Vsla","Name","mem_id","Amount","Rate","Period","Interest","Balance_Interest","Balance_Principle","Month");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'Date' => 'required',
				'District' => 'required',
				'Cluster' => 'required',
				'Village' => 'required',
				'Vsla' => 'required',
				'Name' => 'required',
				'mem_id' => 'required',
				'Amount' => 'required|numeric',
				'Rate' => 'required|numeric',
				'Period' => 'required|numeric',
				'Interest' => 'required|numeric',
				'Balance_Interest' => 'required|numeric',
				'Balance_Principle' => 'required|numeric',
				'Month' => 'required',
			);
			$this->sanitize_array = array(
				'Date' => 'sanitize_string',
				'District' => 'sanitize_string',
				'Cluster' => 'sanitize_string',
				'Village' => 'sanitize_string',
				'Vsla' => 'sanitize_string',
				'Name' => 'sanitize_string',
				'mem_id' => 'sanitize_string',
				'Amount' => 'sanitize_string',
				'Rate' => 'sanitize_string',
				'Period' => 'sanitize_string',
				'Interest' => 'sanitize_string',
				'Balance_Interest' => 'sanitize_string',
				'Balance_Principle' => 'sanitize_string',
				'Month' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg(get_lang('record_added_successfully'), "success");
					return	$this->redirect("loan_history");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = get_lang('add_new_loan_history');
		$this->render_view("loan_history/add.php");
	}
// No Edit Function Generated Because No Field is Defined as the Primary Key
// No Delete Function Generated Because No Field is Defined as the Primary Key on the Database Table/View
}
