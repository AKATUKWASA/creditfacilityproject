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
                    <h4 class="record-title"><?php print_lang('view_loan_history'); ?></h4>
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
                                    <tr  class="td-Date">
                                        <th class="title"> <?php print_lang('date'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-District">
                                        <th class="title"> <?php print_lang('district'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Cluster">
                                        <th class="title"> <?php print_lang('cluster'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Village">
                                        <th class="title"> <?php print_lang('village'); ?>: </th>
                                        <td class="value">
                                            <div class="inline-page">
                                                <a class="btn btn-sm btn-primary open-page-inline" href="<?php print_link(); ?>">
                                                    <i class="fa fa-eye"></i> <?php echo $data['loan_application_Date'] ?>
                                                </a>
                                                <div class="page-content reset-grids d-none animated fadeIn"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr  class="td-Vsla">
                                        <th class="title"> <?php print_lang('vsla'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Name">
                                        <th class="title"> <?php print_lang('name'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-mem_id">
                                        <th class="title"> <?php print_lang('mem_id'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Amount">
                                        <th class="title"> <?php print_lang('amount'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Rate">
                                        <th class="title"> <?php print_lang('rate'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Period">
                                        <th class="title"> <?php print_lang('period'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Interest">
                                        <th class="title"> <?php print_lang('interest'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Balance_Interest">
                                        <th class="title"> <?php print_lang('balance_interest'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Balance_Principle">
                                        <th class="title"> <?php print_lang('balance_principle'); ?>: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Month">
                                        <th class="title"> <?php print_lang('month'); ?>: </th>
                                        <td class="value">
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
