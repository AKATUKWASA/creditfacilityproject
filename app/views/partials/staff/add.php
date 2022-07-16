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
                    <h4 class="record-title"><?php print_lang('add_new_staff'); ?></h4>
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
                        <form id="staff-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("Staff/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="id"><?php print_lang('id'); ?> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-id"  value="<?php  echo $this->set_field_value('id',""); ?>" type="text" placeholder="<?php print_lang('enter_id'); ?>"  required="" name="id"  class="form-control " />
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
                                                <label class="control-label" for="Title"><?php print_lang('title'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <textarea placeholder="<?php print_lang('enter_title'); ?>" id="ctrl-Title"  required="" rows="5" name="Title" class=" form-control"><?php  echo $this->set_field_value('Title',""); ?></textarea>
                                                    <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_enter_text'); ?></div>-->
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
                                                    <textarea placeholder="<?php print_lang('enter_email'); ?>" id="ctrl-email"  required="" rows="5" name="email" class=" form-control"><?php  echo $this->set_field_value('email',""); ?></textarea>
                                                    <!--<div class="invalid-feedback animated bounceIn text-center"><?php print_lang('please_enter_text'); ?></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="Telephone"><?php print_lang('telephone'); ?> <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-Telephone"  value="<?php  echo $this->set_field_value('Telephone',""); ?>" type="text" placeholder="<?php print_lang('enter_telephone'); ?>"  required="" name="Telephone"  class="form-control " />
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
