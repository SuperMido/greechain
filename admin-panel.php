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

                <!-- row -->
                <div class="row">
                    <div class="col-12">
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
                                            <option value="NONG_TRAI">Nông trại</option>
                                            <option value="THU_HOACH">Thu hoạch</option>
                                            <option value="XUAT_KHO">Xuất khẩu</option>
                                            <option value="NHAP_KHO">Nhập khẩu</option>
                                            <option value="PHAN_PHOI">Phân phối</option>
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