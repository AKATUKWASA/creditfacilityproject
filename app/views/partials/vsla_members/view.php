<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("vsla_members/add");
$can_edit = ACL::is_allowed("vsla_members/edit");
$can_view = ACL::is_allowed("vsla_members/view");
$can_delete = ACL::is_allowed("vsla_members/delete");
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
                    <h4 class="record-title"><?php print_lang('view_vsla_members'); ?></h4>
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
                                            <span <?php if($can_edit){ ?> data-name="mem_id" 
                                                data-title="Enter Member ID" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['mem_id']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Name">
                                        <th class="title"> <?php print_lang('name'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-name="Name" 
                                                data-title="Enter Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Age">
                                        <th class="title"> <?php print_lang('age'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Age']; ?>" 
                                                data-name="Age" 
                                                data-title="Enter Age" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Age']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Sex">
                                        <th class="title"> <?php print_lang('sex'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/vsla_members_Sex_option_list'); ?>' 
                                                data-value="<?php echo $data['Sex']; ?>" 
                                                data-name="Sex" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Sex']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Maritalstatus">
                                        <th class="title"> <?php print_lang('maritalstatus'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/vsla_members_Maritalstatus_option_list'); ?>' 
                                                data-value="<?php echo $data['Maritalstatus']; ?>" 
                                                data-name="Maritalstatus" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Maritalstatus']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Telephone">
                                        <th class="title"> <?php print_lang('telephone'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Telephone']; ?>" 
                                                data-name="Telephone" 
                                                data-title="Enter Telephone" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Telephone']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-District">
                                        <th class="title"> <?php print_lang('district'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/vsla_members_District_option_list'); ?>' 
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
                                    </tr>
                                    <tr  class="td-Cluster">
                                        <th class="title"> <?php print_lang('cluster'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php 
                                                $dependent_field = (!empty($data['District']) ? urlencode($data['District']) : null);
                                                print_link('api/json/vsla_members_Cluster_option_list/'.$dependent_field); 
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
                                    </tr>
                                    <tr  class="td-Village">
                                        <th class="title"> <?php print_lang('village'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php 
                                                $dependent_field = (!empty($data['Cluster']) ? urlencode($data['Cluster']) : null);
                                                print_link('api/json/vsla_members_Village_option_list/'.$dependent_field); 
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
                                    </tr>
                                    <tr  class="td-Vsla">
                                        <th class="title"> <?php print_lang('vsla'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php 
                                                $dependent_field = (!empty($data['Village']) ? urlencode($data['Village']) : null);
                                                print_link('api/json/vsla_members_Vsla_option_list/'.$dependent_field); 
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
                                    </tr>
                                    <tr  class="td-vsla_id">
                                        <th class="title"> <?php print_lang('vsla_id'); ?>: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php 
                                                $dependent_field = (!empty($data['Vsla']) ? urlencode($data['Vsla']) : null);
                                                print_link('api/json/vsla_members_vsla_id_option_list/'.$dependent_field); 
                                                ?>' 
                                                data-value="<?php echo $data['vsla_id']; ?>" 
                                                data-name="vsla_id" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['vsla_id']; ?> 
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
