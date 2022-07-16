<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("loans/add");
$can_edit = ACL::is_allowed("loans/edit");
$can_view = ACL::is_allowed("loans/view");
$can_delete = ACL::is_allowed("loans/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title"><?php print_lang('loans'); ?></h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("loans/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        <?php print_lang('add_new_loans'); ?> 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('loans'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="<?php print_lang('search'); ?>" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('loans'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('loans'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <?php print_lang('search'); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="loans-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-sno">#</th>
                                                <th  class="td-mem_id"> <?php print_lang('mem_id'); ?></th>
                                                <th  class="td-date1"> <?php print_lang('date1'); ?></th>
                                                <th  class="td-district"> <?php print_lang('district'); ?></th>
                                                <th  class="td-cluster1"> <?php print_lang('cluster1'); ?></th>
                                                <th  class="td-village"> <?php print_lang('village'); ?></th>
                                                <th  class="td-name"> <?php print_lang('name'); ?></th>
                                                <th  class="td-gender"> <?php print_lang('gender'); ?></th>
                                                <th  class="td-age"> <?php print_lang('age'); ?></th>
                                                <th  class="td-marital_status"> <?php print_lang('marital_status'); ?></th>
                                                <th  class="td-telephone"> <?php print_lang('telephone'); ?></th>
                                                <th  class="td-vsla_id"> <?php print_lang('vsla_id'); ?></th>
                                                <th  class="td-vsla"> <?php print_lang('vsla'); ?></th>
                                                <th  class="td-report_month"> <?php print_lang('report_month'); ?></th>
                                                <th  class="td-loan_amount"> <?php print_lang('loan_amount'); ?></th>
                                                <th  class="td-monthly_interest"> <?php print_lang('monthly_interest'); ?></th>
                                                <th  class="td-loan_period"> <?php print_lang('loan_period'); ?></th>
                                                <th  class="td-interest"> <?php print_lang('interest'); ?></th>
                                                <th  class="td-total_interest"> <?php print_lang('total_interest'); ?></th>
                                                <th  class="td-interest_paid"> <?php print_lang('interest_paid'); ?></th>
                                                <th  class="td-interest_paid_prop"> <?php print_lang('interest_paid_prop'); ?></th>
                                                <th  class="td-prev_interest_paid"> <?php print_lang('prev_interest_paid'); ?></th>
                                                <th  class="td-cum_interest_paid"> <?php print_lang('cum_interest_paid'); ?></th>
                                                <th  class="td-prev_exp_interest"> <?php print_lang('prev_exp_interest'); ?></th>
                                                <th  class="td-cum_exp_interest"> <?php print_lang('cum_exp_interest'); ?></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            $sum_of_loan_amount = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['']) ? urlencode($data['']) : null);
                                            $counter++;
                                            $sum_of_loan_amount = $sum_of_loan_amount + $data['loan_amount'];
                                            ?>
                                            <tr>
                                                <th class="td-sno"><?php echo $counter; ?></th>
                                                <td class="td-mem_id">
                                                    <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/loans_mem_id_option_list'); ?>' 
                                                        data-value="<?php echo $data['mem_id']; ?>" 
                                                        data-name="mem_id" 
                                                        data-title="Enter Mem Id" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['mem_id']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-date1">
                                                    <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                        data-value="<?php echo $data['date1']; ?>" 
                                                        data-name="date1" 
                                                        data-title="Enter Date" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="flatdatetimepicker" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['date1']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-district">
                                                    <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/loans_district_option_list'); ?>' 
                                                        data-value="<?php echo $data['district']; ?>" 
                                                        data-name="district" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['district']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-cluster1">
                                                    <span <?php if($can_edit){ ?> data-source='<?php 
                                                        $dependent_field = (!empty($data['district']) ? urlencode($data['district']) : null);
                                                        print_link('api/json/loans_cluster1_option_list/'.$dependent_field); 
                                                        ?>' 
                                                        data-value="<?php echo $data['cluster1']; ?>" 
                                                        data-name="cluster1" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['cluster1']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-village">
                                                    <span <?php if($can_edit){ ?> data-source='<?php 
                                                        $dependent_field = (!empty($data['cluster1']) ? urlencode($data['cluster1']) : null);
                                                        print_link('api/json/loans_village_option_list/'.$dependent_field); 
                                                        ?>' 
                                                        data-value="<?php echo $data['village']; ?>" 
                                                        data-name="village" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['village']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-name">
                                                    <span <?php if($can_edit){ ?> data-source='<?php 
                                                        $dependent_field = (!empty($data['village']) ? urlencode($data['village']) : null);
                                                        print_link('api/json/loans_name_option_list/'.$dependent_field); 
                                                        ?>' 
                                                        data-value="<?php echo $data['name']; ?>" 
                                                        data-name="name" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['name']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-gender">
                                                    <span <?php if($can_edit){ ?> data-source='<?php 
                                                        $dependent_field = (!empty($data['mem_id']) ? urlencode($data['mem_id']) : null);
                                                        print_link('api/json/loans_gender_option_list/'.$dependent_field); 
                                                        ?>' 
                                                        data-value="<?php echo $data['gender']; ?>" 
                                                        data-name="gender" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['gender']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-age">
                                                    <span <?php if($can_edit){ ?> data-source='<?php 
                                                        $dependent_field = (!empty($data['mem_id']) ? urlencode($data['mem_id']) : null);
                                                        print_link('api/json/loans_age_option_list/'.$dependent_field); 
                                                        ?>' 
                                                        data-value="<?php echo $data['age']; ?>" 
                                                        data-name="age" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['age']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-marital_status">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['marital_status']; ?>" 
                                                        data-name="marital_status" 
                                                        data-title="Enter Marital Status" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['marital_status']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-telephone"><a href="<?php print_link("tel:$data[telephone]") ?>"><?php echo $data['telephone']; ?></a></td>
                                                <td class="td-vsla_id">
                                                    <span <?php if($can_edit){ ?> data-name="vsla_id" 
                                                        data-title="Enter Vsla Id" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="textarea" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['vsla_id']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-vsla">
                                                    <span <?php if($can_edit){ ?> data-name="vsla" 
                                                        data-title="Enter Vsla" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="textarea" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['vsla']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-report_month">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['report_month']; ?>" 
                                                        data-name="report_month" 
                                                        data-title="Enter Report Month" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['report_month']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-loan_amount">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['loan_amount']; ?>" 
                                                        data-name="loan_amount" 
                                                        data-title="Enter Loan Amount" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['loan_amount']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-monthly_interest">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['monthly_interest']; ?>" 
                                                        data-name="monthly_interest" 
                                                        data-title="Enter Monthly Interest" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['monthly_interest']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-loan_period">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['loan_period']; ?>" 
                                                        data-name="loan_period" 
                                                        data-title="Enter Loan Period" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['loan_period']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-interest">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['interest']; ?>" 
                                                        data-name="interest" 
                                                        data-title="Enter Interest" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['interest']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-total_interest">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['total_interest']; ?>" 
                                                        data-name="total_interest" 
                                                        data-title="Enter Total Interest" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['total_interest']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-interest_paid">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['interest_paid']; ?>" 
                                                        data-name="interest_paid" 
                                                        data-title="Enter Interest Paid" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['interest_paid']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-interest_paid_prop">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['interest_paid_prop']; ?>" 
                                                        data-name="interest_paid_prop" 
                                                        data-title="Enter Interest Paid Prop" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['interest_paid_prop']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-prev_interest_paid">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['prev_interest_paid']; ?>" 
                                                        data-name="prev_interest_paid" 
                                                        data-title="Enter Prev Interest Paid" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['prev_interest_paid']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-cum_interest_paid">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['cum_interest_paid']; ?>" 
                                                        data-name="cum_interest_paid" 
                                                        data-title="Enter Cum Interest Paid" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['cum_interest_paid']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-prev_exp_interest">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['prev_exp_interest']; ?>" 
                                                        data-name="prev_exp_interest" 
                                                        data-title="Enter Prev Exp Interest" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['prev_exp_interest']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-cum_exp_interest">
                                                    <span <?php if($can_edit){ ?> data-value="<?php echo $data['cum_exp_interest']; ?>" 
                                                        data-name="cum_exp_interest" 
                                                        data-title="Enter Cum Exp Interest" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['cum_exp_interest']; ?> 
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                            <!--endrecord-->
                                        </tbody>
                                        <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                        <tfoot><tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th>Loan Amount = <?php echo $sum_of_loan_amount;  ?></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr></tfoot>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php 
                                    if(empty($records)){
                                    ?>
                                    <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                        <i class="fa fa-ban"></i> <?php print_lang('no_record_found'); ?>
                                    </h4>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if( $show_footer && !empty($records)){
                                ?>
                                <div class=" border-top mt-2">
                                    <div class="row justify-content-center">    
                                        <div class="col-md-auto justify-content-center">    
                                            <div class="p-3 d-flex justify-content-between">    
                                                <div class="dropup export-btn-holder mx-1">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-save"></i> <?php print_lang('export'); ?>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                        <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                            <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                            </a>
                                                            <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                </a>
                                                                <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                    <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                    </a>
                                                                    <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                        </a>
                                                                        <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">   
                                                                <?php
                                                                if($show_pagination == true){
                                                                $pager = new Pagination($total_records, $record_count);
                                                                $pager->route = $this->route;
                                                                $pager->show_page_count = true;
                                                                $pager->show_record_count = true;
                                                                $pager->show_page_limit =true;
                                                                $pager->limit_count = $this->limit_count;
                                                                $pager->show_page_number_list = true;
                                                                $pager->pager_link_range=5;
                                                                $pager->render();
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
