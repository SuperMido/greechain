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
$username = "greechain";
$password = "greechain";
$dbname = "greechain";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM comments WHERE batch_no='$batchNo'";
$comments = $conn->query($sql);
$conn->close();

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";   
else  
$url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    

//echo $url;  
?>
<style type="text/css">
    .verified_info {
        color: green;
    }
</style>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <div style="display: none;">
                <div class="modal-body" id="qrcode">
                    <img src="https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=400x400&chl=<?php echo $url?>">
                </div>
            </div>
            <h3 class="page-title">Quy trình Lô hàng </h3>
            <h4><b>Mã lô hàng: </b><?php echo $_GET['batchNo']; ?></h4>
            <button onclick="qrcodeFunction('qrcode');" class="btn btn-outline-primary" title="Print Page Report"><i class="fa fa-print"></i> In QR</button>
        </div>
        <script>
            function qrcodeFunction(divId) {
                var content = document.getElementById(divId).outerHTML;
                var mywindow = window.open('', 'Print', 'height=600,width=800');

                mywindow.document.write('<html><head><title>Print</title>');
                mywindow.document.write('</head><body>');
                mywindow.document.write(content);
                mywindow.document.write('</body></html>');

                mywindow.document.close();
                mywindow.focus();
                setTimeout(function() {
                    mywindow.print();
                    mywindow.close();
                }, 400);
                return true;
            }
        </script>
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

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $host    = "34.87.51.188";
    $port    = 1080;
    set_time_limit(0);

    $sql = "SELECT id, comment FROM comments ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);

    $data->id = $row["id"];
    $data->comment = $row["comment"];
    $message = json_encode($data);
    echo "Message To server :" . $message;
    // create socket
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
    // connect to server
    $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
    // send string to server
    socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
    // get server response
    $result = socket_read($socket, 1024) or die("Could not read server response\n");
    echo "Reply From Server  :" . $result;

    $jsonLiteral = $result;
    $dataR = json_decode($jsonLiteral);
    $output = $result . "\n";

    //insert into database
    $sql = "UPDATE comments SET label = '" .  $dataR->label . "' WHERE id = '" . $dataR->id . "'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
    socket_close($socket);
} else {
}
?>
