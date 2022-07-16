<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("loans/add");
$can_edit = ACL::is_allowed("loans/edit");
$can_view = ACL::is_allowed("loans/view");
$can_delete = ACL::is_allowed("loans/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title"><?php print_lang('view_loans'); ?></h4>
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
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['']) ? urlencode($data['']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-mem_id">
                                        <th class="title"> <?php print_lang('mem_id'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-date1">
                                        <th class="title"> <?php print_lang('date1'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-district">
                                        <th class="title"> <?php print_lang('district'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-cluster1">
                                        <th class="title"> <?php print_lang('cluster1'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-village">
                                        <th class="title"> <?php print_lang('village'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-name">
                                        <th class="title"> <?php print_lang('name'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-gender">
                                        <th class="title"> <?php print_lang('gender'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-age">
                                        <th class="title"> <?php print_lang('age'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-marital_status">
                                        <th class="title"> <?php print_lang('marital_status'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-telephone">
                                        <th class="title"> <?php print_lang('telephone'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['telephone']; ?>" 
                                                data-name="telephone" 
                                                data-title="Enter Telephone" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['telephone']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-vsla_id">
                                        <th class="title"> <?php print_lang('vsla_id'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-vsla">
                                        <th class="title"> <?php print_lang('vsla'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-report_month">
                                        <th class="title"> <?php print_lang('report_month'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-loan_amount">
                                        <th class="title"> <?php print_lang('loan_amount'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-monthly_interest">
                                        <th class="title"> <?php print_lang('monthly_interest'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-loan_period">
                                        <th class="title"> <?php print_lang('loan_period'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-interest">
                                        <th class="title"> <?php print_lang('interest'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-total_interest">
                                        <th class="title"> <?php print_lang('total_interest'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-interest_paid">
                                        <th class="title"> <?php print_lang('interest_paid'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-interest_paid_prop">
                                        <th class="title"> <?php print_lang('interest_paid_prop'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-prev_interest_paid">
                                        <th class="title"> <?php print_lang('prev_interest_paid'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-cum_interest_paid">
                                        <th class="title"> <?php print_lang('cum_interest_paid'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-prev_exp_interest">
                                        <th class="title"> <?php print_lang('prev_exp_interest'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-cum_exp_interest">
                                        <th class="title"> <?php print_lang('cum_exp_interest'); ?>: </th>
                                        <td class="value">
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
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
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
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> <?php print_lang('no_record_found'); ?>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
