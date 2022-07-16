<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * vsla_groups_Vsla_option_list Model Action
     * @return array
     */
	function vsla_groups_Vsla_option_list($lookup_Village){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Vsla AS value,Vsla AS label FROM vsla_groups WHERE Village= ? ORDER BY vsla_id ASC" ;
		$queryparams = array($lookup_Village);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_groups_District_option_list Model Action
     * @return array
     */
	function vsla_groups_District_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT District AS value,District AS label FROM vsla_groups ORDER BY District ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_groups_Cluster_option_list Model Action
     * @return array
     */
	function vsla_groups_Cluster_option_list($lookup_District){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Cluster AS value,Cluster AS label FROM vsla_groups WHERE District= ? ORDER BY Cluster ASC" ;
		$queryparams = array($lookup_District);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_groups_Village_option_list Model Action
     * @return array
     */
	function vsla_groups_Village_option_list($lookup_Cluster){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Village AS value,Village AS label FROM vsla_groups WHERE Cluster= ? ORDER BY Village ASC" ;
		$queryparams = array($lookup_Cluster);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_members_Sex_option_list Model Action
     * @return array
     */
	function vsla_members_Sex_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Sex AS value,Sex AS label FROM vsla_members ORDER BY Sex ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_members_Maritalstatus_option_list Model Action
     * @return array
     */
	function vsla_members_Maritalstatus_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Maritalstatus AS value,Maritalstatus AS label FROM vsla_members ORDER BY Maritalstatus ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_members_District_option_list Model Action
     * @return array
     */
	function vsla_members_District_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT District AS value,District AS label FROM vsla_groups ORDER BY Cluster ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_members_Cluster_option_list Model Action
     * @return array
     */
	function vsla_members_Cluster_option_list($lookup_District){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Cluster AS value,Cluster AS label FROM vsla_groups WHERE District= ? ORDER BY Cluster ASC" ;
		$queryparams = array($lookup_District);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_members_Village_option_list Model Action
     * @return array
     */
	function vsla_members_Village_option_list($lookup_Cluster){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Village AS value,Village AS label FROM vsla_groups WHERE Cluster= ? ORDER BY Village ASC" ;
		$queryparams = array($lookup_Cluster);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_members_Vsla_option_list Model Action
     * @return array
     */
	function vsla_members_Vsla_option_list($lookup_Village){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Vsla AS value,Vsla AS label FROM vsla_groups WHERE Village= ? ORDER BY Vsla ASC" ;
		$queryparams = array($lookup_Village);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_members_vsla_id_option_list Model Action
     * @return array
     */
	function vsla_members_vsla_id_option_list($lookup_Vsla){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT vsla_id AS value,vsla_id AS label FROM vsla_groups WHERE Vsla= ? ORDER BY vsla_id ASC"  ;
		$queryparams = array($lookup_Vsla);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * vsla_members_vsla_id_default_value Model Action
     * @return Value
     */
	function vsla_members_vsla_id_default_value(){
		$db = $this->GetModel();
		$sqltext = "SELECT * FROM vsla_groups WHERE vsla_id = Vsla";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * users_user_role_id_option_list Model Action
     * @return array
     */
	function users_user_role_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT user_role_id AS value, role AS label FROM users";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * users_userName_value_exist Model Action
     * @return array
     */
	function users_userName_value_exist($val){
		$db = $this->GetModel();
		$db->where("userName", $val);
		$exist = $db->has("users");
		return $exist;
	}

	/**
     * users_email_value_exist Model Action
     * @return array
     */
	function users_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("users");
		return $exist;
	}

	/**
     * loans_mem_id_option_list Model Action
     * @return array
     */
	function loans_mem_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT mem_id AS value,mem_id AS label FROM vsla_members";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loans_district_option_list Model Action
     * @return array
     */
	function loans_district_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT District AS value,District AS label FROM vsla_members ORDER BY District ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loans_cluster1_option_list Model Action
     * @return array
     */
	function loans_cluster1_option_list($lookup_district){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Cluster AS value,Cluster AS label FROM vsla_members WHERE District= ? ORDER BY Cluster ASC" ;
		$queryparams = array($lookup_district);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loans_village_option_list Model Action
     * @return array
     */
	function loans_village_option_list($lookup_cluster1){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Village AS value,Village AS label FROM vsla_members WHERE Cluster= ? ORDER BY Village ASC" ;
		$queryparams = array($lookup_cluster1);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loans_name_option_list Model Action
     * @return array
     */
	function loans_name_option_list($lookup_village){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Name AS value,Name AS label FROM vsla_members WHERE Village= ? ORDER BY Name ASC" ;
		$queryparams = array($lookup_village);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loans_gender_option_list Model Action
     * @return array
     */
	function loans_gender_option_list($lookup_mem_id){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Maritalstatus AS value,Maritalstatus AS label FROM vsla_members WHERE mem_id= ? ORDER BY mem_id ASC" ;
		$queryparams = array($lookup_mem_id);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loans_age_option_list Model Action
     * @return array
     */
	function loans_age_option_list($lookup_mem_id){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Age AS value,Age AS label FROM vsla_members WHERE mem_id= ? ORDER BY Age ASC" ;
		$queryparams = array($lookup_mem_id);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_application_District_option_list Model Action
     * @return array
     */
	function loan_application_District_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT District AS value,District AS label FROM vsla_members ORDER BY District ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_application_Cluster_option_list Model Action
     * @return array
     */
	function loan_application_Cluster_option_list($lookup_District){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Cluster AS value,Cluster AS label FROM vsla_members WHERE District= ? ORDER BY Cluster ASC" ;
		$queryparams = array($lookup_District);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_application_Village_option_list Model Action
     * @return array
     */
	function loan_application_Village_option_list($lookup_Cluster){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Village AS value,Village AS label FROM vsla_members WHERE Cluster= ? ORDER BY Village ASC" ;
		$queryparams = array($lookup_Cluster);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_application_Vsla_option_list Model Action
     * @return array
     */
	function loan_application_Vsla_option_list($lookup_Village){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Vsla AS value,Vsla AS label FROM vsla_members WHERE Village= ? ORDER BY Vsla ASC" ;
		$queryparams = array($lookup_Village);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_application_Name_option_list Model Action
     * @return array
     */
	function loan_application_Name_option_list($lookup_Vsla){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Name AS value,Name AS label FROM vsla_members WHERE Vsla= ? ORDER BY Name ASC" ;
		$queryparams = array($lookup_Vsla);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_application_mem_id_option_list Model Action
     * @return array
     */
	function loan_application_mem_id_option_list($lookup_Name){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT mem_id AS value,mem_id AS label FROM vsla_members WHERE Name= ? ORDER BY mem_id ASC" ;
		$queryparams = array($lookup_Name);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_payment_District_option_list Model Action
     * @return array
     */
	function loan_payment_District_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT District AS value,District AS label FROM loan_application ORDER BY District ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_payment_Cluster_option_list Model Action
     * @return array
     */
	function loan_payment_Cluster_option_list($lookup_District){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Cluster AS value,Cluster AS label FROM loan_application WHERE District= ? ORDER BY Cluster ASC" ;
		$queryparams = array($lookup_District);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_payment_Village_option_list Model Action
     * @return array
     */
	function loan_payment_Village_option_list($lookup_Cluster){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Village AS value,Village AS label FROM loan_application WHERE Cluster= ? ORDER BY Village ASC" ;
		$queryparams = array($lookup_Cluster);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_payment_Vsla_option_list Model Action
     * @return array
     */
	function loan_payment_Vsla_option_list($lookup_Village){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Vsla AS value,Vsla AS label FROM loan_application WHERE Village= ? ORDER BY Vsla ASC" ;
		$queryparams = array($lookup_Village);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_payment_Name_option_list Model Action
     * @return array
     */
	function loan_payment_Name_option_list($lookup_Vsla){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Name AS value,Name AS label FROM loan_application WHERE Vsla= ? ORDER BY Name ASC" ;
		$queryparams = array($lookup_Vsla);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loan_payment_mem_id_option_list Model Action
     * @return array
     */
	function loan_payment_mem_id_option_list($lookup_Name){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT mem_id AS value,mem_id AS label FROM loan_application WHERE Name= ? ORDER BY mem_id ASC" ;
		$queryparams = array($lookup_Name);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * Monitoring_Date_option_list Model Action
     * @return array
     */
	function Monitoring_Date_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Name AS value,Name AS label FROM Staff ORDER BY Name ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * Monitoring_District_option_list Model Action
     * @return array
     */
	function Monitoring_District_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT District AS value,District AS label FROM vsla_groups ORDER BY District ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * Monitoring_Cluster_option_list Model Action
     * @return array
     */
	function Monitoring_Cluster_option_list($lookup_District){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Cluster AS value,Cluster AS label FROM vsla_groups WHERE District= ? ORDER BY Cluster ASC" ;
		$queryparams = array($lookup_District);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * Monitoring_Village_option_list Model Action
     * @return array
     */
	function Monitoring_Village_option_list($lookup_Cluster){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Village AS value,Village AS label FROM vsla_groups WHERE Cluster= ? ORDER BY Village ASC" ;
		$queryparams = array($lookup_Cluster);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * Monitoring_Vsla_option_list Model Action
     * @return array
     */
	function Monitoring_Vsla_option_list($lookup_Village){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Vsla AS value,Vsla AS label FROM vsla_groups WHERE Village= ? ORDER BY Vsla ASC" ;
		$queryparams = array($lookup_Village);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * Monitoring_Officer_option_list Model Action
     * @return array
     */
	function Monitoring_Officer_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Name AS value,Name AS label FROM Staff ORDER BY Name ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_beneficiaries Model Action
     * @return Value
     */
	function getcount_beneficiaries(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM vsla_members";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_vslagroups Model Action
     * @return Value
     */
	function getcount_vslagroups(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM vsla_groups";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_amountloanedugx Model Action
     * @return Value
     */
	function getcount_amountloanedugx(){
		$db = $this->GetModel();
		$sqltext = "SELECT  SUM(la.Amount) AS sum_of_Amount FROM loan_application AS la";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_expectedinterestugx Model Action
     * @return Value
     */
	function getcount_expectedinterestugx(){
		$db = $this->GetModel();
		$sqltext = "SELECT SUM( (la.Amount * la.Rate * la.Period)/100) FROM loan_application AS la";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_principlepaidugx Model Action
     * @return Value
     */
	function getcount_principlepaidugx(){
		$db = $this->GetModel();
		$sqltext = "SELECT  SUM(lp.Principle) AS sum_of_Principle FROM loan_payment AS lp";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_interestpaidugx Model Action
     * @return Value
     */
	function getcount_interestpaidugx(){
		$db = $this->GetModel();
		$sqltext = "SELECT  SUM(lp.Interest) AS sum_of_Interest FROM loan_payment AS lp";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* barchart_maritalstatus Model Action
	* @return array
	*/
	function barchart_maritalstatus(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(vm.mem_id) AS count_of_mem_id, vm.Maritalstatus FROM vsla_members AS vm GROUP BY vm.Maritalstatus";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_mem_id');
		$dataset_labels =  array_column($dataset1, 'Maritalstatus');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* doughnutchart_sex Model Action
	* @return array
	*/
	function doughnutchart_sex(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  COUNT(vm.mem_id) AS count_of_mem_id, vm.Sex FROM vsla_members AS vm GROUP BY vm.Sex";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'count_of_mem_id');
		$dataset_labels =  array_column($dataset1, 'Sex');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* linechart_principleugx Model Action
	* @return array
	*/
	function linechart_principleugx(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  lp.Date, lp.Principle, lp.Interest FROM loan_payment AS lp";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'Principle');
		$dataset_labels =  array_column($dataset1, 'Date');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

	/**
	* linechart_interestugx Model Action
	* @return array
	*/
	function linechart_interestugx(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "SELECT  lp.Date, lp.Principle, lp.Interest FROM loan_payment AS lp";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, 'Interest');
		$dataset_labels =  array_column($dataset1, 'Date');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

}
