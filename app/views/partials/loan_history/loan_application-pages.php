    <?php
    $comp_model = new SharedController;
    $view_data = $this->view_data; //array of all  data passed from controller
    $field_name = $view_data['field_name'];
    $field_value = $view_data['field_value'];
    $form_data = $this->form_data; //request pass to the page as form fields values
    $page_id = random_str(6);
    ?>
    <div class="master-detail-page">
        <div class="card-header p-0 pt-2 px-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a data-toggle="tab" href="#loan_history_loan_application_List_<?php echo $page_id ?>" class="nav-link active">
                        List
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#loan_history_loan_application_View_<?php echo $page_id ?>" class="nav-link ">
                        View
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#loan_history_loan_application_Add_<?php echo $page_id ?>" class="nav-link ">
                        Add
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#loan_history_loan_application_Edit_<?php echo $page_id ?>" class="nav-link ">
                        Edit
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active show" id="loan_history_loan_application_List_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("loan_application/list/mem_id/$field_value"); ?>
            </div>
            <div class="tab-pane fade show " id="loan_history_loan_application_View_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("loan_application/view/$field_value"); ?>
            </div>
            <div class="tab-pane fade show " id="loan_history_loan_application_Add_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("loan_application/add/?mem_id=$field_value"); ?>
            </div>
            <div class="tab-pane fade show " id="loan_history_loan_application_Edit_<?php echo $page_id ?>" role="tabpanel">
                <?php $this->render_page("loan_application/edit/$field_value"); ?>
            </div>
        </div>
    </div>
    