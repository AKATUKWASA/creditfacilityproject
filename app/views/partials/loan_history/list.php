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
                    <h4 class="record-title"><?php print_lang('loan_history'); ?></h4>
                </div>
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("loan_history/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        <?php print_lang('add_new_loan_history'); ?> 
                    </a>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('loan_history'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('loan_history'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('loan_history'); ?>">
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
                            <div id="loan_history-list-records">
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
                                                <th  class="td-Interest"> <?php print_lang('interest'); ?></th>
                                                <th  class="td-Balance_Interest"> <?php print_lang('balance_interest'); ?></th>
                                                <th  class="td-Balance_Principle"> <?php print_lang('balance_principle'); ?></th>
                                                <th  class="td-Month"> <?php print_lang('month'); ?></th>
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
                                                    <span  data-name="Date" 
                                                        data-title="Enter Date" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="textarea" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Date']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-District">
                                                    <span  data-name="District" 
                                                        data-title="Enter District" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="textarea" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['District']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Cluster">
                                                    <span  data-name="Cluster" 
                                                        data-title="Enter Cluster" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="textarea" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Cluster']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Village">
                                                    <div class="inline-page">
                                                        <a class="btn btn-sm btn-primary open-page-inline" href="<?php print_link(); ?>">
                                                            <i class="fa fa-eye"></i> <?php echo $data['loan_application_Date'] ?>
                                                        </a>
                                                        <div class="page-content reset-grids d-none animated fadeIn"></div>
                                                    </div>
                                                </td>
                                                <td class="td-Vsla">
                                                    <span  data-name="Vsla" 
                                                        data-title="Enter Vsla" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="textarea" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Vsla']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Name">
                                                    <span  data-name="Name" 
                                                        data-title="Enter Name" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="textarea" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Name']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-mem_id">
                                                    <span  data-name="mem_id" 
                                                        data-title="Enter Mem Id" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="textarea" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['mem_id']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Amount">
                                                    <span  data-step="0.1" 
                                                        data-value="<?php echo $data['Amount']; ?>" 
                                                        data-name="Amount" 
                                                        data-title="Enter Amount" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Amount']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Rate">
                                                    <span  data-step="0.1" 
                                                        data-value="<?php echo $data['Rate']; ?>" 
                                                        data-name="Rate" 
                                                        data-title="Enter Rate" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Rate']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Period">
                                                    <span  data-step="0.1" 
                                                        data-value="<?php echo $data['Period']; ?>" 
                                                        data-name="Period" 
                                                        data-title="Enter Period" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Period']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Interest">
                                                    <span  data-step="0.1" 
                                                        data-value="<?php echo $data['Interest']; ?>" 
                                                        data-name="Interest" 
                                                        data-title="Enter Interest" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Interest']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Balance_Interest">
                                                    <span  data-step="0.1" 
                                                        data-value="<?php echo $data['Balance_Interest']; ?>" 
                                                        data-name="Balance_Interest" 
                                                        data-title="Enter Balance Interest" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Balance_Interest']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Balance_Principle">
                                                    <span  data-step="0.1" 
                                                        data-value="<?php echo $data['Balance_Principle']; ?>" 
                                                        data-name="Balance_Principle" 
                                                        data-title="Enter Balance Principle" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="number" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Balance_Principle']; ?> 
                                                    </span>
                                                </td>
                                                <td class="td-Month">
                                                    <span  data-value="<?php echo $data['Month']; ?>" 
                                                        data-name="Month" 
                                                        data-title="Enter Month" 
                                                        data-placement="left" 
                                                        data-toggle="click" 
                                                        data-type="text" 
                                                        data-mode="popover" 
                                                        data-showbuttons="left" 
                                                        class="is-editable" >
                                                        <?php echo $data['Month']; ?> 
                                                    </span>
                                                </td>
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
