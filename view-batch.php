<?php include('templates/_header.php');?>
<?php 
     if(!isset($_GET['batchNo']) || (isset($_GET['batchNo']) && $_GET['batchNo']=='') &&
        !isset($_GET['txn']) || (isset($_GET['txn']) && $_GET['txn']=='')){
        echo "<script>window.location = 'index.php';</script>";
     }   
?>
<style type="text/css">
    .verified_info{
        color: green;
    }
</style>
<div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                <h3 class="page-title">Quy trình Lô hàng <a href="javascript:void(0);" onclick="javascript:window.print();" class="text-info" title="Print Page Report"><i class="fa fa-print"></i> In quy trình</a></h3> 
                <h4><b>Mã lô hàng: </b><?php echo $_GET['batchNo'];?></h4>
            </div>
            <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge danger">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="timeline-panel" id="cultivationSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Cultivation</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" >
                                        <tr>
                                            <td colspan="2"><p>Information Not Avilable</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="farmInspectionSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Farm-Inspector</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive">
                                        <tr>
                                            <td colspan="2"><p>Information Not Avilable</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li>
                           <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="harvesterSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Harvester</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" >
                                        <tr>
                                            <td colspan="2"><p>Information Not Avilable</p></td>
                                        </tr>
                                    </table>        
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="exporterSection"> 
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Exporter</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive">
                                        <tr>
                                            <td colspan="2"><p>Information Not Avilable</p></td>
                                        </tr>
                                    </table>  
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="importerSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Importer</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                   <table class="table activityData table-responsive" >
                                        <tr>
                                            <td colspan="2"><p>Information Not Avilable</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="timeline-panel" id="processorSection">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Processor</h4>
                                    <p><small class="text-muted text-success activityDateTime"></small> </p>
                                    <span class="activityQrCode"></span>
                                </div>
                                <div class="timeline-body">
                                    <table class="table activityData table-responsive" >
                                        <tr>
                                            <td colspan="2"><p>Information Not Avilable</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- .right-sidebar -->
        
        <!-- /.right-sidebar -->
</div>
<input type="hidden" id="batchNo" value="<?php $batchNo = isset($_GET['batchNo'])?$_GET['batchNo']:''; echo $batchNo;?>">

<?php include('templates/_footer.php');?>            