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
                    <h4 class="record-title"><?php print_lang('add_new_loan_application'); ?></h4>
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
                        <form id="loan_application-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("loan_application/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Date"><?php print_lang('date'); ?> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-Date" class="form-control datepicker  datepicker" required="" value="<?php  echo $this->set_field_value('Date',datetime_now()); ?>" type="datetime"  name="Date" placeholder="<?php print_lang('enter_date'); ?>" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
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
                                                <label class="control-label" for="District"><?php print_lang('district'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-District" data-load-select-options="Cluster" name="District"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                        <?php 
                                                        $District_options = $comp_model -> loan_application_District_option_list();
                                                        if(!empty($District_options)){
                                                        foreach($District_options as $option){
                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                        $selected = $this->set_field_selected('District',$value, "");
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
                                                <label class="control-label" for="Cluster"><?php print_lang('cluster'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-Cluster" data-load-path="<?php print_link('api/json/loan_application_Cluster_option_list') ?>" data-load-select-options="Village" name="Cluster"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Village"><?php print_lang('village'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-Village" data-load-path="<?php print_link('api/json/loan_application_Village_option_list') ?>" data-load-select-options="Vsla" name="Village"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Vsla"><?php print_lang('vsla'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-Vsla" data-load-path="<?php print_link('api/json/loan_application_Vsla_option_list') ?>" data-load-select-options="Name" name="Vsla"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Name"><?php print_lang('name'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-Name" data-load-path="<?php print_link('api/json/loan_application_Name_option_list') ?>" data-load-select-options="mem_id" name="Name"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
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
                                                    <select required=""  id="ctrl-mem_id" data-load-path="<?php print_link('api/json/loan_application_mem_id_option_list') ?>" name="mem_id"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Amount"><?php print_lang('amount'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-Amount"  value="<?php  echo $this->set_field_value('Amount',""); ?>" type="number" placeholder="<?php print_lang('enter_amount'); ?>" step="0.1"  required="" name="Amount"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="Rate"><?php print_lang('rate'); ?> <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-Rate"  value="<?php  echo $this->set_field_value('Rate',""); ?>" type="number" placeholder="<?php print_lang('enter_rate'); ?>" step="0.1"  required="" name="Rate"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="Period"><?php print_lang('period'); ?> <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-Period"  value="<?php  echo $this->set_field_value('Period',""); ?>" type="number" placeholder="<?php print_lang('enter_period'); ?>" step="0.1"  required="" name="Period"  class="form-control " />
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
