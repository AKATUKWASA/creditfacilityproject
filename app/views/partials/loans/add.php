<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title"><?php print_lang('add_new_loans'); ?></h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="loans-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("loans/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="date1"><?php print_lang('date'); ?> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-date1" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('date1',date_now()); ?>" type="datetime" name="date1" placeholder="<?php print_lang('enter_date'); ?>" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="district"><?php print_lang('district'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-district" data-load-select-options="cluster1" name="district"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                        <?php 
                                                        $district_options = $comp_model -> loans_district_option_list();
                                                        if(!empty($district_options)){
                                                        foreach($district_options as $option){
                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                        $selected = $this->set_field_selected('district',$value, "");
                                                        ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                            <?php echo $label; ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="cluster1"><?php print_lang('cluster'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-cluster1" data-load-path="<?php print_link('api/json/loans_cluster1_option_list') ?>" data-load-select-options="village" name="cluster1"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="village"><?php print_lang('village'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-village" data-load-path="<?php print_link('api/json/loans_village_option_list') ?>" data-load-select-options="name" name="village"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="name"><?php print_lang('name'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-name" data-load-path="<?php print_link('api/json/loans_name_option_list') ?>" name="name"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="mem_id"><?php print_lang('mem_id'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-mem_id"  value="<?php  echo $this->set_field_value('mem_id',""); ?>" type="text" placeholder="<?php print_lang('enter_mem_id'); ?>" list="mem_id_list"  required="" data-load-select-options="gender,age" name="mem_id"  class="form-control " />
                                                        <datalist id="mem_id_list">
                                                            <?php 
                                                            $mem_id_options = $comp_model -> loans_mem_id_option_list();
                                                            if(!empty($mem_id_options)){
                                                            foreach($mem_id_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            ?>
                                                            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="gender"><?php print_lang('gender'); ?> <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <select required=""  id="ctrl-gender" data-load-path="<?php print_link('api/json/loans_gender_option_list') ?>" name="gender"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                            <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="age"><?php print_lang('age'); ?> <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <select required=""  id="ctrl-age" data-load-path="<?php print_link('api/json/loans_age_option_list') ?>" name="age"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                            <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="marital_status"><?php print_lang('marital_status'); ?> <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-marital_status"  value="<?php  echo $this->set_field_value('marital_status',""); ?>" type="text" placeholder="<?php print_lang('enter_marital_status'); ?>"  required="" name="marital_status"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="telephone"><?php print_lang('telephone'); ?> <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-telephone"  value="<?php  echo $this->set_field_value('telephone',""); ?>" type="number" placeholder="<?php print_lang('enter_telephone'); ?>" step="1"  required="" name="telephone"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="vsla_id"><?php print_lang('vsla_id'); ?> <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="<?php print_lang('enter_vsla_id'); ?>" id="ctrl-vsla_id"  required="" rows="5" name="vsla_id" class=" form-control"><?php  echo $this->set_field_value('vsla_id',""); ?></textarea>
                                                                <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_enter_text'); ?></div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="vsla"><?php print_lang('vsla'); ?> <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <textarea placeholder="<?php print_lang('enter_vsla'); ?>" id="ctrl-vsla"  required="" rows="5" name="vsla" class=" form-control"><?php  echo $this->set_field_value('vsla',""); ?></textarea>
                                                                <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_enter_text'); ?></div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="report_month"><?php print_lang('report_month'); ?> <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-report_month"  value="<?php  echo $this->set_field_value('report_month',""); ?>" type="number" placeholder="<?php print_lang('enter_report_month'); ?>" step="1"  required="" name="report_month"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="loan_amount"><?php print_lang('loan_amount'); ?> <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-loan_amount"  value="<?php  echo $this->set_field_value('loan_amount',""); ?>" type="number" placeholder="<?php print_lang('enter_loan_amount'); ?>" step="1"  required="" name="loan_amount"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="monthly_interest"><?php print_lang('monthly_interest'); ?> <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-monthly_interest"  value="<?php  echo $this->set_field_value('monthly_interest',""); ?>" type="number" placeholder="<?php print_lang('enter_monthly_interest'); ?>" step="1"  required="" name="monthly_interest"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="loan_period"><?php print_lang('loan_period'); ?> <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-loan_period"  value="<?php  echo $this->set_field_value('loan_period',""); ?>" type="number" placeholder="<?php print_lang('enter_loan_period'); ?>" step="1"  required="" name="loan_period"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="interest"><?php print_lang('interest'); ?> <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-interest"  value="<?php  echo $this->set_field_value('interest',""); ?>" type="number" placeholder="<?php print_lang('enter_interest'); ?>" step="1"  required="" name="interest"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="total_interest"><?php print_lang('total_interest'); ?> <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input id="ctrl-total_interest"  value="<?php  echo $this->set_field_value('total_interest',""); ?>" type="number" placeholder="<?php print_lang('enter_total_interest'); ?>" step="1"  required="" name="total_interest"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="interest_paid"><?php print_lang('interest_paid'); ?> <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-interest_paid"  value="<?php  echo $this->set_field_value('interest_paid',""); ?>" type="number" placeholder="<?php print_lang('enter_interest_paid'); ?>" step="1"  required="" name="interest_paid"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="interest_paid_prop"><?php print_lang('interest_paid_prop'); ?> <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-interest_paid_prop"  value="<?php  echo $this->set_field_value('interest_paid_prop',""); ?>" type="number" placeholder="<?php print_lang('enter_interest_paid_prop'); ?>" step="1"  required="" name="interest_paid_prop"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label class="control-label" for="prev_interest_paid"><?php print_lang('prev_interest_paid'); ?> <span class="text-danger">*</span></label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="">
                                                                                                <input id="ctrl-prev_interest_paid"  value="<?php  echo $this->set_field_value('prev_interest_paid',""); ?>" type="number" placeholder="<?php print_lang('enter_prev_interest_paid'); ?>" step="1"  required="" name="prev_interest_paid"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="cum_interest_paid"><?php print_lang('cum_interest_paid'); ?> <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="">
                                                                                                    <input id="ctrl-cum_interest_paid"  value="<?php  echo $this->set_field_value('cum_interest_paid',""); ?>" type="number" placeholder="<?php print_lang('enter_cum_interest_paid'); ?>" step="1"  required="" name="cum_interest_paid"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <label class="control-label" for="prev_exp_interest"><?php print_lang('prev_exp_interest'); ?> <span class="text-danger">*</span></label>
                                                                                                </div>
                                                                                                <div class="col-sm-8">
                                                                                                    <div class="">
                                                                                                        <input id="ctrl-prev_exp_interest"  value="<?php  echo $this->set_field_value('prev_exp_interest',""); ?>" type="number" placeholder="<?php print_lang('enter_prev_exp_interest'); ?>" step="1"  required="" name="prev_exp_interest"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group ">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4">
                                                                                                        <label class="control-label" for="cum_exp_interest"><?php print_lang('cum_exp_interest'); ?> <span class="text-danger">*</span></label>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="">
                                                                                                            <input id="ctrl-cum_exp_interest"  value="<?php  echo $this->set_field_value('cum_exp_interest',""); ?>" type="number" placeholder="<?php print_lang('enter_cum_exp_interest'); ?>" step="1"  required="" name="cum_exp_interest"  class="form-control " />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                                                <div class="form-ajax-status"></div>
                                                                                                <button class="btn btn-primary" type="submit">
                                                                                                    <?php print_lang('submit'); ?>
                                                                                                    <i class="fa fa-send"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
