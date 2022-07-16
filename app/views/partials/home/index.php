<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 ><?php print_lang('project_summary_dashboard'); ?></h4>
                </div>
                <div class="col-md-4 comp-grid">
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_beneficiaries();  ?>
                    <a class="animated zoomIn record-count card bg-warning text-white"  href="<?php print_link("vsla_members/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-user "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Beneficiaries</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_vslagroups();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("vsla_groups/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-group "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Vsla Groups</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_amountloanedugx();  ?>
                    <a class="animated zoomIn record-count card bg-warning text-white"  href="<?php print_link("loan_application/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-credit-card "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Amount Loaned (UGX)</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_expectedinterestugx();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("loan_application/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-money "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Expected Interest (UGX)</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_principlepaidugx();  ?>
                    <a class="animated zoomIn record-count card bg-warning text-white"  href="<?php print_link("loan_payment/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-check-square-o "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Principle Paid (UGX)</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                    <?php $rec_count = $comp_model->getcount_interestpaidugx();  ?>
                    <a class="animated zoomIn record-count alert alert-secondary"  href="<?php print_link("loan_payment/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-check-square-o "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Interest Paid (UGX)</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 comp-grid">
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->barchart_maritalstatus();
                        ?>
                        <div>
                            <h4>Marital Status</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="barchart_maritalstatus"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Marital Status',
                            backgroundColor:'rgba(0 , 64 , 128, 0.5)',
                            type:'bar',
                            borderWidth:1,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('barchart_maritalstatus');
                            var chart = new Chart(ctx, {
                            type:'bar',
                            data: chartData,
                            options: {
                            scaleStartValue: 0,
                            responsive: true,
                            scales: {
                            xAxes: [{
                            ticks:{display: true},
                            gridLines:{display: true},
                            categoryPercentage: 1.0,
                            barPercentage: 0.8,
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            },
                            }],
                            yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            display: true
                            },
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }]
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
                <div class="col-md-6 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->doughnutchart_sex();
                        ?>
                        <div>
                            <h4>Sex</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="doughnutchart_sex"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Dataset 1',
                            borderColor:'rgba(0 , 64 , 128, 0.7)',
                            backgroundColor:[
                            <?php 
                            foreach($chartdata['labels'] as $g){
                            echo "'" . random_color(0.9) . "',";
                            }
                            ?>
                            ],
                            borderWidth:1,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('doughnutchart_sex');
                            var chart = new Chart(ctx, {
                            type:'doughnut',
                            data: chartData,
                            options: {
                            responsive: true,
                            scales: {
                            yAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            xAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div  class="my-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->linechart_principleugx();
                        ?>
                        <div>
                            <h4>Principle (UGX)</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="linechart_principleugx"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Principle Paymernt Trend',
                            fill:false,
                            borderColor:'rgba(255 , 128 , 0, 0.7)',
                            borderWidth:1,
                            pointStyle:'circle',
                            pointRadius:5,
                            lineTension:0.1,
                            type:'',
                            steppedLine:false,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('linechart_principleugx');
                            var chart = new Chart(ctx, {
                            type:'line',
                            data: chartData,
                            options: {
                            scaleStartValue: 0,
                            responsive: true,
                            scales: {
                            xAxes: [{
                            ticks:{display: true},
                            gridLines:{display: true},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            display: true
                            },
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }]
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
                <div class="col-md-6 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->linechart_interestugx();
                        ?>
                        <div>
                            <h4>Interest (UGX)</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="linechart_interestugx"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Interest Payment trend',
                            fill:false,
                            borderColor:'rgba(0 , 128 , 192, 0.7)',
                            borderWidth:1,
                            pointStyle:'circle',
                            pointRadius:5,
                            lineTension:0.1,
                            type:'',
                            steppedLine:false,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('linechart_interestugx');
                            var chart = new Chart(ctx, {
                            type:'line',
                            data: chartData,
                            options: {
                            scaleStartValue: 0,
                            responsive: true,
                            scales: {
                            xAxes: [{
                            ticks:{display: true},
                            gridLines:{display: true},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            display: true
                            },
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }]
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
