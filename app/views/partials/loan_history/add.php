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
                    <h4 class="record-title"><?php print_lang('add_new_loan_history'); ?></h4>
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
                        <form id="loan_history-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("loan_history/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="Date"><?php print_lang('date'); ?> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <textarea placeholder="<?php print_lang('enter_date'); ?>" id="ctrl-Date"  required="" rows="5" name="Date" class=" form-control"><?php  echo $this->set_field_value('Date',""); ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_enter_text'); ?></div>-->
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
                                                <textarea placeholder="<?php print_lang('enter_district'); ?>" id="ctrl-District"  required="" rows="5" name="District" class=" form-control"><?php  echo $this->set_field_value('District',""); ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_enter_text'); ?></div>-->
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
                                                <textarea placeholder="<?php print_lang('enter_cluster'); ?>" id="ctrl-Cluster"  required="" rows="5" name="Cluster" class=" form-control"><?php  echo $this->set_field_value('Cluster',""); ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_enter_text'); ?></div>-->
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
                                                <select required=""  id="ctrl-Village" name="Village"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                    <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                    <?php 
                                                    $Village_options = $comp_model -> loan_history_Village_option_list();
                                                    if(!empty($Village_options)){
                                                    foreach($Village_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = $this->set_field_selected('Village',$value, "");
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
                                            <label class="control-label" for="Vsla"><?php print_lang('vsla'); ?> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <textarea placeholder="<?php print_lang('enter_vsla'); ?>" id="ctrl-Vsla"  required="" rows="5" name="Vsla" class=" form-control"><?php  echo $this->set_field_value('Vsla',""); ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_enter_text'); ?></div>-->
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
                                                <textarea placeholder="<?php print_lang('enter_name'); ?>" id="ctrl-Name"  required="" rows="5" name="Name" class=" form-control"><?php  echo $this->set_field_value('Name',""); ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_enter_text'); ?></div>-->
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
                                                <textarea placeholder="<?php print_lang('enter_mem_id'); ?>" id="ctrl-mem_id"  required="" rows="5" name="mem_id" class=" form-control"><?php  echo $this->set_field_value('mem_id',""); ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_enter_text'); ?></div>-->
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
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="Interest"><?php print_lang('interest'); ?> <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-Interest"  value="<?php  echo $this->set_field_value('Interest',""); ?>" type="number" placeholder="<?php print_lang('enter_interest'); ?>" step="0.1"  required="" name="Interest"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="Balance_Interest"><?php print_lang('balance_interest'); ?> <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-Balance_Interest"  value="<?php  echo $this->set_field_value('Balance_Interest',""); ?>" type="number" placeholder="<?php print_lang('enter_balance_interest'); ?>" step="0.1"  required="" name="Balance_Interest"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="Balance_Principle"><?php print_lang('balance_principle'); ?> <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-Balance_Principle"  value="<?php  echo $this->set_field_value('Balance_Principle',""); ?>" type="number" placeholder="<?php print_lang('enter_balance_principle'); ?>" step="0.1"  required="" name="Balance_Principle"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="Month"><?php print_lang('month'); ?> <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-Month"  value="<?php  echo $this->set_field_value('Month',""); ?>" type="text" placeholder="<?php print_lang('enter_month'); ?>"  required="" name="Month"  class="form-control " />
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
