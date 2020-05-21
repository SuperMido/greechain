<?php include('templates/_header.php'); ?>
<?php
if (
    !isset($_GET['batchNo']) || (isset($_GET['batchNo']) && $_GET['batchNo'] == '') &&
    !isset($_GET['txn']) || (isset($_GET['txn']) && $_GET['txn'] == '')
) {
    echo "<script>window.location = 'index.php';</script>";
}
?>
<?php
$batchNo = isset($_GET['batchNo']) ? $_GET['batchNo'] : '';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greechain";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM comments WHERE batch_no='$batchNo'";
$comments = $conn->query($sql);
$conn->close();
?>
<style type="text/css">
    .verified_info {
        color: green;
    }
</style>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Quy trình Lô hàng <a href="javascript:void(0);" onclick="javascript:window.print();" class="text-info" title="Print Page Report"><i class="fa fa-print"></i> In QR</a></h3>
            <h4><b>Mã lô hàng: </b><?php echo $_GET['batchNo']; ?></h4>
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
                                <h4 class="timeline-title">Thông tin nông trại</h4>
                                <p><small class="text-muted text-success activityDateTime"></small> </p>
                                <span class="activityQrCode"></span>
                            </div>
                            <div class="timeline-body">
                                <table class="table activityData table-responsive">
                                    <tr>
                                        <td colspan="2">
                                            <p>Thông tin không khả dụng</p>
                                        </td>
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
                                <h4 class="timeline-title">Thông tin trồng</h4>
                                <p><small class="text-muted text-success activityDateTime"></small> </p>
                                <span class="activityQrCode"></span>
                            </div>
                            <div class="timeline-body">
                                <table class="table activityData table-responsive">
                                    <tr>
                                        <td colspan="2">
                                            <p>Thông tin không khả dụng</p>
                                        </td>
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
                                <h4 class="timeline-title">Thông tin thu hoạch</h4>
                                <p><small class="text-muted text-success activityDateTime"></small> </p>
                                <span class="activityQrCode"></span>
                            </div>
                            <div class="timeline-body">
                                <table class="table activityData table-responsive">
                                    <tr>
                                        <td colspan="2">
                                            <p>Thông tin không khả dụng</p>
                                        </td>
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
                                <h4 class="timeline-title">Thông tin xuất kho</h4>
                                <p><small class="text-muted text-success activityDateTime"></small> </p>
                                <span class="activityQrCode"></span>
                            </div>
                            <div class="timeline-body">
                                <table class="table activityData table-responsive">
                                    <tr>
                                        <td colspan="2">
                                            <p>Thông tin không khả dụng</p>
                                        </td>
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
                                <h4 class="timeline-title">Thông tin nhập kho</h4>
                                <p><small class="text-muted text-success activityDateTime"></small> </p>
                                <span class="activityQrCode"></span>
                            </div>
                            <div class="timeline-body">
                                <table class="table activityData table-responsive">
                                    <tr>
                                        <td colspan="2">
                                            <p>Thông tin không khả dụng</p>
                                        </td>
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
                                <h4 class="timeline-title">Thông tin nhà phân phối</h4>
                                <p><small class="text-muted text-success activityDateTime"></small> </p>
                                <span class="activityQrCode"></span>
                            </div>
                            <div class="timeline-body">
                                <table class="table activityData table-responsive">
                                    <tr>
                                        <td colspan="2">
                                            <p>Thông tin không khả dụng</p>
                                        </td>
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
<div class="container-fluid">
    <div class="white-box">
                <div class="card-body ">
                    <h4 class="card-title">Thêm bình luận</h4>
                    <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên của bạn:</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Bình luận</label>
                            <textarea class="form-control" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_submit">Gửi</button>
                    </form>
                </div>
    </div>
</div>

<div class="container-fluid">
    <div class="white-box">
                <div class="card-body">
                <?php foreach ($comments as $key => $value) {
        ?>
                    <h4 class="card-title"><?php echo $value['userName']; ?></h4>
                    <h5 class="card-subtitle"><?php echo $value['comment']; ?></h5>
                    <h6><?php echo $value['timestamp']; ?></h6>
                    <hr size="10">
                    <?php } ?>
                </div>

    </div>
</div>

<input type="hidden" id="batchNo" value="<?php echo $batchNo; ?>">

<?php include('templates/_footer.php');
if (isset($_POST[add_submit])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO comments (userName, comment, batch_no)
                VALUES ('$_POST[username]','$_POST[comment]','$batchNo');";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
}
?>