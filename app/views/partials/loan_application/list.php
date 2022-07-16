<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("loan_application/add");
$can_edit = ACL::is_allowed("loan_application/edit");
$can_view = ACL::is_allowed("loan_application/view");
$can_delete = ACL::is_allowed("loan_application/delete");
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
                    <h4 class="record-title"><?php print_lang('loan_application'); ?></h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("loan_application/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        <?php print_lang('add_new_loan_application'); ?> 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('loan_application'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('loan_application'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('loan_application'); ?>">
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
                            <div id="loan_application-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-sno">#</th>
                                                <th  class="td-Date"> <?php print_lang('date'); ?></th>
                                                <th  class="td-District"> <?php print_lang('district'); ?></th>
                                                <th  class="td-Cluster"> <?php print_lang('cluster'); ?></th>
                                                <th  class="td-Village"> <?php print_lang('village'); ?></th>
                                                <th  class="td-Vsla"> <?php print_lang('vsla'); ?></th>
                                                <th  class="td-Name"> <?php print_lang('name'); ?></th>
                                                <th  class="td-mem_id"> <?php print_lang('mem_id'); ?></th>
                                                <th  class="td-Amount"> <?php print_lang('amount'); ?></th>
                                                <th  class="td-Rate"> <?php print_lang('rate'); ?></th>
                                                <th  class="td-Period"> <?php print_lang('period'); ?></th>
                                                <th  class="td-Interest_monthly"> <?php print_lang('interest_monthly_'); ?></th>
                                                <th  class="td-Interest_expected"> <?php print_lang('interest_total_'); ?></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['']) ? urlencode($data['']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <th class="td-sno"><?php echo $counter; ?></th>
                                                <td class="td-Date">
                                                    <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                        data-value="<?php echo $data['Date']; ?>" 
                                                        data-name="Date" 
                                                        data-title="Enter Date" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="flatdatetimepicker" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['Date']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-District">
                                                    <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/loan_application_District_option_list'); ?>' 
                                                        data-value="<?php echo $data['District']; ?>" 
                                                        data-name="District" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['District']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Cluster">
                                                    <span <?php if($can_edit){ ?> data-source='<?php 
                                                        $dependent_field = (!empty($data['District']) ? urlencode($data['District']) : null);
                                                        print_link('api/json/loan_application_Cluster_option_list/'.$dependent_field); 
                                                        ?>' 
                                                        data-value="<?php echo $data['Cluster']; ?>" 
                                                        data-name="Cluster" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['Cluster']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Village">
                                                    <span <?php if($can_edit){ ?> data-source='<?php 
                                                        $dependent_field = (!empty($data['Cluster']) ? urlencode($data['Cluster']) : null);
                                                        print_link('api/json/loan_application_Village_option_list/'.$dependent_field); 
                                                        ?>' 
                                                        data-value="<?php echo $data['Village']; ?>" 
                                                        data-name="Village" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['Village']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Vsla">
                                                    <span <?php if($can_edit){ ?> data-source='<?php 
                                                        $dependent_field = (!empty($data['Village']) ? urlencode($data['Village']) : null);
                                                        print_link('api/json/loan_application_Vsla_option_list/'.$dependent_field); 
                                                        ?>' 
                                                        data-value="<?php echo $data['Vsla']; ?>" 
                                                        data-name="Vsla" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['Vsla']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Name">
                                                    <span <?php if($can_edit){ ?> data-source='<?php 
                                                        $dependent_field = (!empty($data['Vsla']) ? urlencode($data['Vsla']) : null);
                                                        print_link('api/json/loan_application_Name_option_list/'.$dependent_field); 
                                                        ?>' 
                                                        data-value="<?php echo $data['Name']; ?>" 
                                                        data-name="Name" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['Name']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-mem_id">
                                                    <span <?php if($can_edit){ ?> data-source='<?php 
                                                        $dependent_field = (!empty($data['Name']) ? urlencode($data['Name']) : null);
                                                        print_link('api/json/loan_application_mem_id_option_list/'.$dependent_field); 
                                                        ?>' 
                                                        data-value="<?php echo $data['mem_id']; ?>" 
                                                        data-name="mem_id" 
                                                        data-title="Select a value ..." 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="select" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['mem_id']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Amount">
                                                    <span <?php if($can_edit){ ?> data-step="0.1" 
                                                        data-value="<?php echo $data['Amount']; ?>" 
                                                        data-name="Amount" 
                                                        data-title="Enter Amount" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['Amount']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Rate">
                                                    <span <?php if($can_edit){ ?> data-step="0.1" 
                                                        data-value="<?php echo $data['Rate']; ?>" 
                                                        data-name="Rate" 
                                                        data-title="Enter Rate" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['Rate']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Period">
                                                    <span <?php if($can_edit){ ?> data-step="0.1" 
                                                        data-value="<?php echo $data['Period']; ?>" 
                                                        data-name="Period" 
                                                        data-title="Enter Period" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" <?php } ?>>
                                                        <?php echo $data['Period']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Interest_monthly"> <?php echo $data['Interest_monthly']; ?></td>
                                                <td class="td-Interest_expected"> <?php echo $data['Interest_expected']; ?></td>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                            <!--endrecord-->
                                        </tbody>
                                        <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
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
                                                                    <?php Html :: import_form('loan_application/import_data' , get_lang('import_data'), 'CSV'); ?>
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
