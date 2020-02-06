<?php include("includes/css.php");?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Dashboard
                <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    
                    <li>
                        
                    </li>
                    <li></li>
                    
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Filters</h3>
                                <div class="box-tools pull-right">
                                    <div style="padding-right: 20px;">
                                        <form action="<?= base_url('admin/dashboard') ?>" method="post">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <select class="form-control" name="month">
                                                        <option>Month</option>
                                                        <option value="01">January</option>
                                                        <option value="02">Febraury</option>
                                                        <option value="03">March</option>
                                                        <option value="04">April</option>
                                                        <option value="05">May</option>
                                                        <option value="06">June</option>
                                                        <option value="07">July</option>
                                                        <option value="08">August</option>
                                                        <option value="09">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="submit" class="btn btn-sm btn-info" value="Submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                        </div>
                    </div>
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                        <div class="small-box">
                            <div style="width: 100%;display: flex;">
                                <div style="width: 50%;background-color: #00a65a;padding-top: 10px;padding-left: 10px;color: white;">
                            <h3><?= $finish ?></h3>
                            <p style="padding-bottom: 10px;">Total leads won this month</p>
                        </div>
                            
                            <div style="width: 50%;background-color: #dd4b39;padding-top: 10px;padding-left: 10px;color: white">
                            <!-- small box -->
                            <h3><?= $lost ?></h3>
                            <p>Total leads lost this month</p>
                        </div>
                    </div>
                    <a style="background-color: #008548" href="<?= base_url('admin/close_leads') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?= $hot ?></h3>
                                <p>Total Hot Leads</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?= base_url('admin/hot_leads') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?= $warm ?></h3>
                                <p>Total Warm Leads</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?= base_url('admin/warm_leads') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-12">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?= $cool ?></h3>
                                <p>Total Cool Leads</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?= base_url('admin/cool_leads') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="box-title">Action Items:</h3>
                                    </div>
                                    <div class="col-md-4">
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding: 20px;">
                                <div class="col-md-6">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Phone Call - Actions</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table class="table no-margin">
                                                    <thead>
                                                        <tr>
                                                            <th>Lead ID</th>
                                                            <th>C.Name</th>
                                                            <th>Status</th>
                                                            <th>Follow Up Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $n=1; foreach($list_phone as $lead){
                                                        $rt='';if($lead['position']=='Cool'){$rt='admin/cool_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Warm'){$rt='admin/warm_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Hot'){$rt='admin/hot_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Finish'){$rt='admin/close_leads/d/'.$lead['lead_id'];}
                                                        ?>
                                                        <tr>
                                                            <td><a target="_blank" href="<?= base_url($rt) ?>"><?= $lead['lead_id'] ?></a></td>
                                                            <td><?= $lead['firstname'].' '.$lead['lastname'] ?></td>
                                                            <td><span class="label label-info"><?= $lead['leads_status'] ?></span></td>
                                                            <?php $date='';if(!empty($lead['finish_follow_up_date'])){$date=$lead['finish_follow_up_date'];}elseif(!empty($lead['hot_follow_up_date'])){$date=$lead['hot_follow_up_date'];}elseif(!empty($lead['warm_follow_up_date'])){$date=$lead['warm_follow_up_date'];} ?>
                                                            <td><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></td>
                                                        </tr>
                                                        <?php $n++;} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer clearfix">
                                            <a href="<?= base_url('admin/add_lead') ?>" class="btn btn-sm btn-info btn-flat pull-left">Add New Lead</a>
                                        </div>
                                        <!-- /.box-footer -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Proposal - Actions</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table class="table no-margin">
                                                    <thead>
                                                        <tr>
                                                            <th>Lead ID</th>
                                                            <th>C.Name</th>
                                                            <th>Status</th>
                                                            <th>Follow Up Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $n=1; foreach($list_proposal as $lead){
                                                        $rt='';if($lead['position']=='Cool'){$rt='admin/cool_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Warm'){$rt='admin/warm_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Hot'){$rt='admin/hot_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Finish'){$rt='admin/close_leads/d/'.$lead['lead_id'];}
                                                        ?>
                                                        <tr>
                                                            <td><a target="_blank" href="<?= base_url($rt) ?>"><?= $lead['lead_id'] ?></a></td>
                                                            <td><?= $lead['firstname'].' '.$lead['lastname'] ?></td>
                                                            <td><span class="label label-info"><?= $lead['leads_status'] ?></span></td>
                                                            <?php $date='';if(!empty($lead['finish_follow_up_date'])){$date=$lead['finish_follow_up_date'];}elseif(!empty($lead['hot_follow_up_date'])){$date=$lead['hot_follow_up_date'];}elseif(!empty($lead['warm_follow_up_date'])){$date=$lead['warm_follow_up_date'];} ?>
                                                            <td><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></td>
                                                        </tr>
                                                        <?php $n++;} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer clearfix">
                                            <a href="<?= base_url('admin/add_lead') ?>" class="btn btn-sm btn-info btn-flat pull-left">Add New Lead</a>
                                        </div>
                                        <!-- /.box-footer -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Meeting - Actions</h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="table-responsive">
                                                <table class="table no-margin">
                                                    <thead>
                                                        <tr>
                                                            <th>Lead ID</th>
                                                            <th>C.Name</th>
                                                            <th>Status</th>
                                                            <th>Follow Up Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $n=1; foreach($list_meeting as $lead){
                                                        $rt='';if($lead['position']=='Cool'){$rt='admin/cool_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Warm'){$rt='admin/warm_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Hot'){$rt='admin/hot_leads/d/'.$lead['lead_id'];}elseif($lead['position']=='Finish'){$rt='admin/close_leads/d/'.$lead['lead_id'];}
                                                        ?>
                                                        <tr>
                                                            <td><a target="_blank" href="<?= base_url($rt) ?>"><?= $lead['lead_id'] ?></a></td>
                                                            <td><?= $lead['firstname'].' '.$lead['lastname'] ?></td>
                                                            <td><span class="label label-info"><?= $lead['leads_status'] ?></span></td>
                                                            <?php $date='';if(!empty($lead['finish_follow_up_date'])){$date=$lead['finish_follow_up_date'];}elseif(!empty($lead['hot_follow_up_date'])){$date=$lead['hot_follow_up_date'];}elseif(!empty($lead['warm_follow_up_date'])){$date=$lead['warm_follow_up_date'];} ?>
                                                            <td><?= substr($date, -2).substr($date, 4,4).substr($date, 0,4) ?></td>
                                                        </tr>
                                                        <?php $n++;} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer clearfix">
                                            <a href="<?= base_url('admin/add_lead') ?>" class="btn btn-sm btn-info btn-flat pull-left">Add New Lead</a>
                                        </div>
                                        <!-- /.box-footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php");?>
        <div class="control-sidebar-bg"></div>
    </div>
    <?php include("includes/js.php");?>
</body>
</html>