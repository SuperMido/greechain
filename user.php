<?php include('templates/_navbar.php'); ?>
        

            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"></h4>
                    </div>
                    <div class="col-lg-3 col-sm-8 col-md-8 col-xs-12">
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info" id="divOngoingTransaction" style="display: none">Ongoing Transaction: <span id="linkOngoingTransaction">None</span> </div>
                    </div>    
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/heading-bg/slide3.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="#"><img src="plugins/images/users/genu.jpg" id="userImage" class="thumb-lg img-circle" alt="img"></a>
                                        <strong><h2 class="text-white" id="userName">--</h2></strong>
                                        <h4 class="text-white" id="currentUserAddress">--</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="fa fa-mobile"></i> <strong>Số điện thoại</strong> </p>
                                    <h1 id="userContact">--</h1>
                                </div>

                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="fa fa-user"></i> <strong> Vai trò</strong></p>
                                    <h1 id="userRole">--</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="fa fa-gears"></i> <strong>Cài đặt</strong> </p>
                                    <a class="btn btn-info m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" id="editUser" href="javascript:void(0);" >Chỉnh sửa</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <!-- /.row -->
                

                               <!-- row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Thông tin lô hàng</h3> 
                            <div class="table-responsive">
                                <table class="table product-overview" id="userCultivationTable">
                                    <thead>
                                        <tr>
                                            <th>Mã lô hàng</th>
                                            <th>Nông trại</th>
                                            <th>Thu hoạch</th>
                                            <th>Xuất kho</th>
                                            <th>Nhập kho</th>
                                            <th>Phân phối</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                             <td colspan="7" align="center">No Data Available</td>
                                         </tr>                                         
                                    </tbody>
                                </table>

                            <!-- Update User Form -->
                            <div id="userFormModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h2 class="modal-title" id="userModelTitle">Cập nhật thông tin cá nhân</h2>
                                    </div>

                                    <div class="modal-body">
                                        <form id="updateUserForm" onsubmit="return false;">
                                            <fieldset style="border:0;">
                                                <div class="form-group">
                                                    <label class="control-label" for="fullname">Họ và tên <i class="red">*</i></label>
                                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Name" data-parsley-required="true">
                                                </div>                              
                                                <div class="form-group">
                                                    <label class="control-label" for="contactNumber">Số điện thoại<i class="red">*</i></label>
                                                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Contact No." data-parsley-required="true" data-parsley-type="digits" data-parsley-length="[10, 15]" maxlength="15">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="role">Vai trò </label>
                                                    <select class="form-control" id="role" disabled="true" name="role">
                                                        <option value="">Lựa chọn vai trò</option>
                                                        <option value="NONG_TRAI">Nông trại</option>
                                                        <option value="THU_HOACH">Thu hoạch</option>
                                                        <option value="XUAT_KHO">Xuất kho</option>
                                                        <option value="NHAP_KHO">Nhập kho</option>
                                                        <option value="PHAN_PHOI">Chế biến</option>
                                                    </select>    
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="isActive">Trạng thái tài khoản</label>
                                                    <input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" id="isActive" name="isActive" data-size="small"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="userProfileHash">Ảnh đại diện <i class="red">*</i></label>
                                                    <input type="file" class="form-control" onchange="handleFileUpload(event);" />
                                                    <input type="hidden" class="form-control" id="userProfileHash" name="userProfileHash" placeholder="User Profile Hash" data-parsley-required="true" >
                                                    <span id="imageHash"></span>
                                                </div>
                                            </fieldset>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <i style="display: none;" class="fa fa-spinner fa-spin"></i>
                                         <button type="button" class="btn btn-primary" id="userFormBtn">Lưu</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                            

                            <!-- Farm Inspection Form -->
                            <form id="farmInspectionForm" class="mfp-hide white-popup-block">
                                <h1>Nông trại</h1><br>
                                <fieldset style="border:0;">
                                    <!-- <div class="form-group">
                                        <label class="control-label" for="InspectorId">Inspector ID Number</label>
                                        <input type="text" class="form-control" id="InspectorId" name="inspectorId" placeholder="inspector id number" data-parsley-required="true">
                                    </div>   -->                            
                                    <div class="form-group">
                                        <label class="control-label" for="typeOfSeed">Loại hạt giống</label>
                                        <input type="text" class="form-control" id="typeOfSeed" name="typeOfSeed" placeholder="type of seed" data-parsley-required="true">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="coffeeFamily">Loại cà phê</label>
                                        <input type="text" class="form-control" id="coffeeFamily" name="coffeeFamily" placeholder="coffee family" data-parsley-required="true">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="fertilizer">Loại phân bón</label>
                                        <input type="text" class="form-control" id="fertilizerUsed" name="fertilizer" placeholder="fertilizer used" data-parsley-required="true">
                                    </div>
                                     <div class="form-group float-right">
                                        <button type="reset" class="btn btn-default waves-effect" >Đặt lại</button>
                                        <button type="button" id="updateFarmInspection" class="btn btn-primary">Lưu</button>
                                    </div>
                                </fieldset>
                            </form>

                             <!-- Harvesting Form -->
                            <form id="harvesterForm" class="mfp-hide white-popup-block ">
                                <h1>Thu hoạch</h1><br>
                                <fieldset style="border:0;">
                                                            
                                    <div class="form-group">
                                        <label class="control-label" for="cropVariety">Sản lượng</label>
                                        <input type="text" class="form-control" id="cropVariety" name="cropVariety" placeholder="coffee variety" data-parsley-required="true">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="temperatureUsed">Nhiệt độ (độ C)</label>
                                        <input type="text" class="form-control" id="temperatureUsed" name="temperatureUsed" placeholder="temperature" data-parsley-required="true">
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label" for="humidity">Độ ẩm</label>
                                        <input type="text" class="form-control" id="humidity" name="humidity" placeholder="humidity" data-parsley-required="true">
                                    </div>                                
                                    <div class="form-group float-right">
                                        <button type="reset" class="btn btn-default waves-effect">Đặt lại</button>
                                        <button type="button" id="updateHarvest"class="btn btn-primary">Lưu</button>
                                    </div>
                                </fieldset>
                            </form>

                            <!-- Exporter Form -->
                            <form id="exporterForm" class="mfp-hide white-popup-block">
                                <h1>Xuất kho</h1><br>
                                <fieldset style="border:0;">

                                    <div class="form-group">
                                        <label class="control-label" for="quantity">Số lượng (Kg)</label>
                                        <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="Quantity" data-parsley-required="true">
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label" for="destinationAddress">Nơi nhận</label>
                                        <input type="text" class="form-control" id="destinationAddress" name="destinationAddress" placeholder="Destination Address" data-parsley-required="true">
                                    </div> 


                                    <div class="form-group">
                                        <label class="control-label" for="shipName">Nhà vận chuyển</label>
                                        <input type="text" class="form-control" id="shipName" name="shipName" placeholder="Ship Name" data-parsley-required="true">
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label" for="shipNo">Mã vận chuyển</label>
                                        <input type="text" class="form-control" id="shipNo" name="shipNo" placeholder="Ship No" data-parsley-required="true">
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label" for="estimateDateTime">Ngày giao dự kiến</label>
                                        <input type="text" class="form-control datepicker-master" id="estimateDateTime" name="estimateDateTime" placeholder="Estimate Datetime" data-parsley-required="true">
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label" for="exporterId">Mã người xuất kho</label>
                                        <input type="number" class="form-control" id="exporterId" name="exporterId" placeholder="Exporter ID" data-parsley-required="true">
                                    </div>
                                     <div class="form-group float-right">
                                        <button type="reset" class="btn btn-default waves-effect">Đặt lại</button>
                                        <button type="button" id="updateExport"class="btn btn-primary">Lưu</button>
                                    </div>
                                </fieldset>
                            </form>

                            <!-- Importer Form -->
                            <form id="importerForm" class="mfp-hide white-popup-block">
                                <h1>Nhập kho</h1><br>
                                <fieldset style="border:0;">

                                    <div class="form-group">
                                        <label class="control-label" for="quantity">Số lượng</label>
                                        <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="Quantity" data-parsley-required="true">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="shipName">Nhà vận chuyển</label>
                                        <input type="text" class="form-control" id="shipName" name="shipName" placeholder="Ship Name" data-parsley-required="true">
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label" for="shipNo">Mã vận chuyển</label>
                                        <input type="text" class="form-control" id="shipNo" name="shipNo" placeholder="Ship No" data-parsley-required="true">
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label" for="transportInfo">Thông tin vận chuyển</label>
                                        <input type="text" class="form-control" id="transportInfo" name="transportInfo" placeholder="Transport Info" data-parsley-required="true">
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label" for="warehouseName">Tên kho</label>
                                        <input type="text" class="form-control" id="warehouseName" name="warehouseName" placeholder="Warehouse Name" data-parsley-required="true">
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label" for="warehouseAddress">Địa chỉ kho</label>
                                        <input type="text" class="form-control" id="warehouseAddress" name="warehouseAddress" placeholder="Warehouse Address" data-parsley-required="true" >
                                    </div>                              
                                    <div class="form-group">
                                        <label class="control-label" for="importerId">Mã người nhập kho</label>
                                        <input type="number" min="1" class="form-control" id="importerId" name="importerId" placeholder="Importer Id" data-parsley-required="true" >
                                    </div>                              
                                    
                                     <div class="form-group float-right">
                                        <button type="reset" class="btn btn-default waves-effect">Đặt lại</button>
                                        <button type="button" id="updateHarvest"class="btn btn-primary">Lưu</button>
                                    </div>
                                </fieldset>
                            </form>

                            <!-- Processor Form -->
                            <form id="processingForm" class="mfp-hide white-popup-block">
                                <h1>Chế biến</h1><br>
                                <fieldset style="border:0;">
                                    <div class="form-group">
                                        <label class="control-label" for="quantity">Số lượng (Kg)</label>
                                        <input type="number" min="1" class="form-control" id="quantity" name="quantity" placeholder="Quantity" data-parsley-required="true">
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label" for="processingTemperature">Nhiệt độ (độ F)</label>
                                        <input type="text" class="form-control" id="processingTemperature" name="temperature" placeholder="Temperature" data-parsley-required="true">
                                    </div>                              
                                    <div class="form-group">
                                        <label class="control-label" for="rostingDuration">Thời gian rang (giây)</label>
                                        <input type="number" min="1" class="form-control" id="rostingDuration" name="rostingDuration" placeholder="Time for roasting" data-parsley-required="true" >
                                    </div>
                               
                                    <div class="form-group">
                                        <label class="control-label" for="internalBatchNo">Mã lô hàng (thành phẩm)</label>
                                        <input type="text" class="form-control" id="internalBatchNo" name="internalBatchNo" placeholder="Internal Batch no" data-parsley-required="true">
                                    </div>
                           
                                    <div class="form-group">
                                        <label class="control-label" for="packageDateTime">Ngày đóng gói</label>
                                        <input type="text" class="form-control datepicker-master" id="packageDateTime" name="packageDateTime" placeholder="Packaging Date" data-parsley-required="true">
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label" for="processorName">Tên xưởng</label>
                                        <input type="text" class="form-control" id="processorName" name="processorName" placeholder="Processor Name" data-parsley-required="true">
                                    </div>                              
                                    <div class="form-group">
                                        <label class="control-label" for="processorAddress">Địa chỉ xưởng</label>
                                        <input type="text" class="form-control" id="processorAddress" name="processorAddress" placeholder="Processor Address" data-parsley-required="true">
                                    </div>
                                     <div class="form-group float-right">
                                        <button type="reset" class="btn btn-default waves-effect">Đặt lại</button>
                                        <button type="button" id="updateHarvest"class="btn btn-primary">Lưu</button>
                                    </div>
                                </fieldset>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <!-- /.container-fluid -->

        <script type="text/javascript">
            var switchery;
            $(document).ready(function(){
                initSwitch();
                initDateTimePicker();
            });

            function initSwitch(){
                /*For User Form Pop Up*/
                switchery = new Switchery($("#isActive")[0], $("#isActive").data());    
            }

            function initDateTimePicker(){
                $('.datepicker-master').datetimepicker({
                    format: 'dd-mm-yyyy hh:ii:ss',
                    weekStart: 1,
                    todayBtn:  1,
                    autoclose: 1,
                    todayHighlight: 1,
                    startView: 2,
                    forceParse: 0,
                    showMeridian: 1,
                    minuteStep: 1
                });
            }
        </script>
        
<?php include('templates/_footer.php');?>   