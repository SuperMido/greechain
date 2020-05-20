<?php include('templates/_navbar.php'); ?>
        

            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"></h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
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
                    <div class="col-lg-4 col-sm-6 ">
                        <div class="white-box">
                            <h3 class="box-title">NGƯỜI DÙNG</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-user text-info"></i></li>
                                <li class="text-right"><span class="counter text-info" id="totalUsers">0</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 ">
                        <div class="white-box">
                            <h3 class="box-title">VAI TRÒ</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-graduation text-purple"></i></li>
                                <li class="text-right "><span class="counter text-purple">5</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 ">
                        <div class="white-box">
                            <h3 class="box-title">LÔ HÀNG</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-doc text-success"></i></li>
                                <li class="text-right"><span class="counter text-success" id="totalBatch">0</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--row -->
                <!-- /.row -->
                

                               <!-- row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                             <a href="javascript:void(0);" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light" onclick="javascript:$('#batchFormModel').modal();">Thêm lô hàng</a>
                            <h3 class="box-title">TỔNG QUAN LÔ HÀNG</h3> 
                            <div class="table-responsive">
                                <table class="table product-overview" id="adminCultivationTable">
                                    <thead>
                                        <tr>
                                            <th>Mã lô hàng</th>
                                            <th>Mã QR</th>
                                            <th>Nông trại</th>
                                            <th>Thu hoạch</th>
                                            <th>Xuất kho</th>
                                            <th>Nhập kho</th>
                                            <th>Nhà phân phối</th>
                                            <th>Chi tiết</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                             <td colspan="7" text-align="center">Dữ liệu không có sẵn</td>
                                         </tr>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Mã ví của bạn <i class="fa fa-qrcode fa-2x text-success"></i></h3>
                            <ul class="list-inline two-part">
                                <li class="text-right" id="currentUserAddress">0x0000000000000000000000000000000000000000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box">
                           <h3 class="box-title">Hợp đồng lưu trữ <i class="fa fa-qrcode fa-2x text-danger"></i></h3>
                            <ul class="list-inline two-part">
                                <li class="text-right" id="storageContractAddress">0x0000000000000000000000000000000000000000</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Hợp đồng cung cấp <i class="fa fa-qrcode fa-2x text-info"></i></h3>
                            <ul class="list-inline two-part">
                                <li class="text-right" id="coffeeSupplychainContractAddress">0x0000000000000000000000000000000000000000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="white-box">
                           <h3 class="box-title">Hợp đồng người dùng <i class="fa fa-qrcode fa-2x text-info"></i></h3>
                            <ul class="list-inline two-part">
                                <li class="text-right" id="userContractAddress">0x0000000000000000000000000000000000000000</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--row -->
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Vai trò người dùng</h3> 
                            <div class="table-responsive">
                                <table class="table product-overview">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Nhãn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nông trại</td>
                                            <td><span class="label label-info font-weight-100">NONG_TRAI</span></td>
                                        </tr>
                                         <tr>
                                            <td>Thu hoạch</td>
                                            <td><span class="label label-success font-weight-100">THU_HOACH</span></td>
                                        </tr>
                                        <tr>
                                            <td>Xuất kho</td>
                                            <td><span class="label label-warning font-weight-100">XUAT_KHO</span></td>
                                        </tr>
                                        <tr>
                                            <td>Nhập kho</td>
                                            <td><span class="label label-danger font-weight-100">NHAP_KHO</span></td>
                                        </tr>
                                        <tr>
                                            <td>Chế biến</td>
                                            <td><span class="label label-primary font-weight-100">CHE_BIEN</span></td>
                                        </tr>
                                        <tr>
                                            <td>Phân phối</td>
                                            <td><span class="label label-primary font-weight-100">PHAN_PHOI</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="white-box">
                             <a href="javascript:void(0);" id="userFormClick" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Thêm người dùng</a>
                            <h3 class="box-title">Người dùng</h3> 
                            <div class="table-responsive">
                                <table class="table product-overview table-responsive" id="tblUser">
                                    <thead>
                                        <tr>
                                            <th>Địa chỉ ví</th>
                                            <th>Tên</th>
                                            <th>Liên lạc</th>
                                            <th>Vai trò</th>
                                            <th>Chỉnh sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
  
            </div>
            <!-- /.container-fluid -->

            <div id="batchFormModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h2 class="modal-title">Thêm lô hàng</h2>
                        </div>
                        <div class="modal-body">
                            <form id="batchForm" onsubmit="return false;">
                            <fieldset style="border:0;">
                                <div class="form-group">
                                    <label class="control-label" for="farmerRegistrationNo">Tên lô hàng<i class="red">*</i></label>
                                    <input type="text" class="form-control" id="farmerRegistrationNo" name="farmerRegistrationNo" placeholder="Tên hô hàng..." data-parsley-required="true">
                                </div> 
                                <div class="form-group">
                                    <label class="control-label" for="farmerName">Chi tiết <i class="red">*</i></label>
                                    <input type="text" class="form-control" id="farmerName" name="farmerName" placeholder="Chi tiết..." data-parsley-required="true">
                                </div>                              
                                <div class="form-group">
                                    <label class="control-label" for="farmerAddress">Địa chỉ <i class="red">*</i></label>
                                    <textarea class="form-control" id="farmerAddress" name="farmerAddress" placeholder="#" data-parsley-required="true"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="exporterName">Tên đơn vị xuất kho <i class="red">*</i></label>
                                    <input type="text" class="form-control" id="exporterName" name="exporterName" placeholder="#" data-parsley-required="true">
                                </div> 
                                <div class="form-group">
                                    <label class="control-label" for="importerName">Tên đơn vị nhập kho<i class="red">*</i></label>
                                    <input type="text" class="form-control" id="importerName" name="importerName" placeholder="#" data-parsley-required="true">
                                </div> 
                            </fieldset>
                            
                        </div>
                        <div class="modal-footer">
                             <button type="submit" onclick="addCultivationBatch();" class="fcbtn btn btn-primary btn-outline btn-1f">Thêm lô hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="userFormModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; padding-top: 170px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h2 class="modal-title" id="userModelTitle">Thêm người dùng</h2>
                        </div>
                        <div class="modal-body">
                            <form id="userForm" onsubmit="return false;">
                                <fieldset style="border:0;">
                                    <div class="form-group">
                                        <label class="control-label" for="userWalletAddress">Địa chỉ ví <i class="red">*</i></label>
                                        <input type="text" class="form-control" id="userWalletAddress" name="userWalletAddress" placeholder="Địa chỉ ví..." data-parsley-required="true" minlength="42" maxlength="42">
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label" for="userName">Tên người dùng <i class="red">*</i></label>
                                        <input type="text" class="form-control" id="userName" name="userName" placeholder="Tên..." data-parsley-required="true">
                                    </div>                              
                                    <div class="form-group">
                                        <label class="control-label" for="userContactNo">Liên lạc <i class="red">*</i></label>
                                        <input type="text" class="form-control" id="userContactNo" name="userContactNo" placeholder="Nhập số điện thoại..." data-parsley-required="true" data-parsley-type="digits" data-parsley-length="[10, 15]" maxlength="15">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="userRoles">Vai trò người dùng <i class="red">*</i></label>
                                        <select class="form-control" id="userRoles" name="userRoles" data-parsley-required="true">
                                            <option value="">Chọn vai trò</option>
                                            <option value="FARM_INSPECTION">Nông trại</option>
                                            <option value="HARVESTER">Thu hoạch</option>
                                            <option value="EXPORTER">Xuất khẩu</option>
                                            <option value="IMPORTER">Nhập khẩu</option>
                                            <option value="PROCESSOR">Xử lý</option>
                                            <option value="PROCESSOR">Phân phối</option>
                                        </select>    
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="isActive">Trạng thái</label>
                                        <input type="checkbox" class="js-switch" data-color="#99d683" data-secondary-color="#f96262" id="isActive" name="isActive" data-size="small"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="userProfileHash">Ảnh <i class="red">*</i></label>
                                        <input type="file" class="form-control" onchange="handleFileUpload(event);" />
                                        <input type="hidden" class="form-control" id="userProfileHash" name="userProfileHash" placeholder="User Profile Hash" data-parsley-required="true" >
                                        <span id="imageHash"></span>
                                    </div>
                                </fieldset>
                            
                        </div>
                        <div class="modal-footer">
                            <i style="display: none;" class="fa fa-spinner fa-spin"></i>
                             <button type="submit" onclick="userFormSubmit();" class="fcbtn btn btn-primary btn-outline btn-1f" id="userFormBtn">Tạo người dùng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
            

        <script type="text/javascript">
            var batchFormInstance, userFormInstance;
            $(document).ready(function(){
                userFormInstance = $("#userForm").parsley();
                batchFormInstance = $("#batchForm").parsley();

                initSwitch();
            });

            function initSwitch(){
                /*For User Form Pop Up*/
                 new Switchery($("#isActive")[0], $("#isActive").data());     
            }
        </script>

<?php include('templates/_footer.php');?>            