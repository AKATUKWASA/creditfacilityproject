<?php 
/**
 * Loans Page Controller
 * @category  Controller
 */
class LoansController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "loans";
		$this->soft_delete = true;
		$this->delete_field_name = "is_deleted";
		$this->delete_field_value = "1";
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
		$fields = array("mem_id", 
			"date1", 
			"district", 
			"cluster1", 
			"village", 
			"name", 
			"gender", 
			"age", 
			"marital_status", 
			"telephone", 
			"vsla_id", 
			"vsla", 
			"report_month", 
			"loan_amount", 
			"monthly_interest", 
			"loan_period", 
			"interest", 
			"total_interest", 
			"interest_paid", 
			"interest_paid_prop", 
			"prev_interest_paid", 
			"cum_interest_paid", 
			"prev_exp_interest", 
			"cum_exp_interest");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				loans.mem_id LIKE ? OR 
				loans.date1 LIKE ? OR 
				loans.district LIKE ? OR 
				loans.cluster1 LIKE ? OR 
				loans.village LIKE ? OR 
				loans.name LIKE ? OR 
				loans.gender LIKE ? OR 
				loans.age LIKE ? OR 
				loans.marital_status LIKE ? OR 
				loans.telephone LIKE ? OR 
				loans.vsla_id LIKE ? OR 
				loans.vsla LIKE ? OR 
				loans.report_month LIKE ? OR 
				loans.loan_amount LIKE ? OR 
				loans.monthly_interest LIKE ? OR 
				loans.loan_period LIKE ? OR 
				loans.interest LIKE ? OR 
				loans.total_interest LIKE ? OR 
				loans.interest_paid LIKE ? OR 
				loans.interest_paid_prop LIKE ? OR 
				loans.prev_interest_paid LIKE ? OR 
				loans.cum_interest_paid LIKE ? OR 
				loans.prev_exp_interest LIKE ? OR 
				loans.cum_exp_interest LIKE ? OR 
				loans.date_deleted LIKE ? OR 
				loans.is_deleted LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "loans/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("loans.mem_id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = get_lang('loans');
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("loans/list.php", $data); //render the full page
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
			$fields = $this->fields = array("date1","district","cluster1","village","name","mem_id","gender","age","marital_status","telephone","vsla_id","vsla","report_month","loan_amount","monthly_interest","loan_period","interest","total_interest","interest_paid","interest_paid_prop","prev_interest_paid","cum_interest_paid","prev_exp_interest","cum_exp_interest");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'date1' => 'required',
				'district' => 'required',
				'cluster1' => 'required',
				'village' => 'required',
				'name' => 'required',
				'mem_id' => 'required',
				'gender' => 'required',
				'age' => 'required',
				'marital_status' => 'required',
				'telephone' => 'required|numeric',
				'vsla_id' => 'required',
				'vsla' => 'required',
				'report_month' => 'required|numeric',
				'loan_amount' => 'required|numeric',
				'monthly_interest' => 'required|numeric',
				'loan_period' => 'required|numeric',
				'interest' => 'required|numeric',
				'total_interest' => 'required|numeric',
				'interest_paid' => 'required|numeric',
				'interest_paid_prop' => 'required|numeric',
				'prev_interest_paid' => 'required|numeric',
				'cum_interest_paid' => 'required|numeric',
				'prev_exp_interest' => 'required|numeric',
				'cum_exp_interest' => 'required|numeric',
			);
			$this->sanitize_array = array(
				'date1' => 'sanitize_string',
				'district' => 'sanitize_string',
				'cluster1' => 'sanitize_string',
				'village' => 'sanitize_string',
				'name' => 'sanitize_string',
				'mem_id' => 'sanitize_string',
				'gender' => 'sanitize_string',
				'age' => 'sanitize_string',
				'marital_status' => 'sanitize_string',
				'telephone' => 'sanitize_string',
				'vsla_id' => 'sanitize_string',
				'vsla' => 'sanitize_string',
				'report_month' => 'sanitize_string',
				'loan_amount' => 'sanitize_string',
				'monthly_interest' => 'sanitize_string',
				'loan_period' => 'sanitize_string',
				'interest' => 'sanitize_string',
				'total_interest' => 'sanitize_string',
				'interest_paid' => 'sanitize_string',
				'interest_paid_prop' => 'sanitize_string',
				'prev_interest_paid' => 'sanitize_string',
				'cum_interest_paid' => 'sanitize_string',
				'prev_exp_interest' => 'sanitize_string',
				'cum_exp_interest' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg(get_lang('record_added_successfully'), "success");
					return	$this->redirect("loans");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = get_lang('add_new_loans');
		$this->render_view("loans/add.php");
	}
// No Edit Function Generated Because No Field is Defined as the Primary Key
// No Delete Function Generated Because No Field is Defined as the Primary Key on the Database Table/View
}
