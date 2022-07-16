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
                    <h4 class="record-title"><?php print_lang('add_new_users'); ?></h4>
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
                        <form id="users-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("users/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="userName"><?php print_lang('username'); ?> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-userName"  value="<?php  echo $this->set_field_value('userName',""); ?>" type="text" placeholder="<?php print_lang('enter_username'); ?>"  required="" name="userName"  data-url="api/json/users_userName_value_exist/" data-loading-msg="<?php print_lang('checking_availability_'); ?>" data-available-msg="<?php print_lang('available'); ?>" data-unavailable-msg="<?php print_lang('not_available'); ?>" class="form-control  ctrl-check-duplicate" />
                                                    <div class="check-status"></div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="email"><?php print_lang('email'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-email"  value="<?php  echo $this->set_field_value('email',""); ?>" type="email" placeholder="<?php print_lang('enter_email'); ?>"  required="" name="email"  data-url="api/json/users_email_value_exist/" data-loading-msg="<?php print_lang('checking_availability_'); ?>" data-available-msg="<?php print_lang('available'); ?>" data-unavailable-msg="<?php print_lang('not_available'); ?>" class="form-control  ctrl-check-duplicate" />
                                                        <div class="check-status"></div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="passWord"><?php print_lang('password'); ?> <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input id="ctrl-passWord"  value="<?php  echo $this->set_field_value('passWord',""); ?>" type="password" placeholder="<?php print_lang('enter_password'); ?>"  required="" name="passWord"  class="form-control  password password-strength" />
                                                            <div class="input-group-append cursor-pointer btn-toggle-password">
                                                                <span class="input-group-text"><i class="fa fa-eye"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="password-strength-msg">
                                                            <small class="font-weight-bold"><?php print_lang('should_contain'); ?></small>
                                                            <small class="length chip">6 <?php print_lang('characters_minimum'); ?></small>
                                                            <small class="caps chip"><?php print_lang('capital_letter'); ?></small>
                                                            <small class="number chip"><?php print_lang('number'); ?></small>
                                                            <small class="special chip"><?php print_lang('symbol'); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="confirm_password"><?php print_lang('confirm_password'); ?> <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <input id="ctrl-passWord-confirm" data-match="#ctrl-passWord"  class="form-control password-confirm " type="password" name="confirm_password" required placeholder="<?php print_lang('confirm_password'); ?>" />
                                                                <div class="input-group-append cursor-pointer btn-toggle-password">
                                                                    <span class="input-group-text"><i class="fa fa-eye"></i></span>
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    Password does not match
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="img"><?php print_lang('img'); ?> <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <div class="dropzone required" input="#ctrl-img" fieldname="img"    data-multiple="false" dropmsg="<?php print_lang('choose_files_or_drag_and_drop_files_to_upload'); ?>"    btntext="<?php print_lang('browse'); ?>" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                                    <input name="img" id="ctrl-img" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('img',""); ?>" type="text"  />
                                                                        <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_a_choose_file'); ?></div>-->
                                                                        <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="user_role_id"><?php print_lang('user_role_id'); ?> </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <select  id="ctrl-user_role_id" name="user_role_id"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                                        <?php 
                                                                        $user_role_id_options = $comp_model -> users_user_role_id_option_list();
                                                                        if(!empty($user_role_id_options)){
                                                                        foreach($user_role_id_options as $option){
                                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                        $selected = $this->set_field_selected('user_role_id',$value, "");
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
                                                                <label class="control-label" for="role"><?php print_lang('role'); ?> <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <select required=""  id="ctrl-role" name="role"  placeholder="<?php print_lang('select_a_value_'); ?>"    class="custom-select" >
                                                                        <option value=""><?php print_lang('select_a_value_'); ?></option>
                                                                        <?php
                                                                        $role_options = Menu :: $role;
                                                                        if(!empty($role_options)){
                                                                        foreach($role_options as $option){
                                                                        $value = $option['value'];
                                                                        $label = $option['label'];
                                                                        $selected = $this->set_field_selected('role', $value, "");
                                                                        ?>
                                                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                            <?php echo $label ?>
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
                                                                <label class="control-label" for="action_name"><?php print_lang('action_name'); ?> <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-action_name"  value="<?php  echo $this->set_field_value('action_name',""); ?>" type="text" placeholder="<?php print_lang('enter_action_name'); ?>"  required="" name="action_name"  class="form-control " />
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
