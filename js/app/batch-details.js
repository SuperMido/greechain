var batchNo;
window.addEventListener('load', function() 
{	
  batchNo = $("#batchNo").val();

	if(batchNo!="" || batchNo!=null || batchNo!=undefined){
    if(web3.givenProvider != null) $("#printQR").attr("style", "");
		getCultivationData(globMainContract,batchNo,function(result)
		{
			var parentSection = $("#cultivationSection");
			var activityName =  "PerformCultivation";
			var built = buildCultivationBlock(result);

			populateSection(parentSection,built,activityName,batchNo)
		});

		getFarmInspectorData(globMainContract,batchNo,function(result){
			
			var parentSection = $("#farmInspectionSection"); 
			var activityName = "DoneInspection";  
			var built = buildFarmInspectionBlock(result);

			populateSection(parentSection,built,activityName,batchNo);
		});

		getHarvesterData(globMainContract,batchNo,function(result){
			
			var parentSection = $("#harvesterSection");
			var activityName = "DoneHarvesting";
			var built = buildHarvesterBlock(result);

			populateSection(parentSection,built,activityName,batchNo);
		});

		getExporterData(globMainContract,batchNo,function(result){
			
			var parentSection = $("#exporterSection");
			var activityName = "DoneExporting";
			var built = buildExporterBlock(result);   

			populateSection(parentSection,built,activityName,batchNo);             
		});

		getImporterData(globMainContract,batchNo,function(result){

			 var parentSection = $("#importerSection");
			 var activityName = "DoneImporting";
			 var built = buildImporterBlock(result); 

			 populateSection(parentSection,built,activityName,batchNo);              
		});

		getProcessorData(globMainContract,batchNo,function(result){
			var parentSection = $("#processorSection");
			var activityName = "DoneProcessing";
			var built = buildProcessorBlock(result); 

			populateSection(parentSection,built,activityName,batchNo);   

      $('.qr-code-magnify').magnificPopup({
          type:'image',
          mainClass: 'mfp-zoom-in'
      });

		});
	}

});

function populateSection(parentSection,built,activityName,batchNo)
{
  if(built.isDataAvail==true)
  {
  	getActivityTimestamp(activityName,batchNo, function(resultData)
  	{
     
      if(resultData.dataTime)
  		{
        var phoneNoSec = '';
        if(resultData.contactNo!='-'){
          phoneNoSec = `<i class="fa fa-phone"></i> `+resultData.contactNo+`<br/>`;  
        } 

        var userAddress = resultData.user;
        if($(window).width() <= 565){
          userAddress = userAddress.substring(0,15)+'...';
        }

        var refLink = 'https://rinkeby.etherscan.io/tx/'+resultData.transactionHash;
        var html = `<span class="text-info"><i class='fa fa-user'> </i>
                        `+resultData.name+` (`+userAddress+`) <br/>
                        `+phoneNoSec+`
                    </span>
                    <i class='fa fa-clock-o'> </i> `+resultData.dataTime.toLocaleString()+`
                    <a href='`+refLink+`' target='_blank'><i class='fa fa-external-link text-danger'></i></a>
                   `;
        $(parentSection).find(".activityDateTime").html(html);
  			$(parentSection).find(".timeline-body .activityData").append('<img src="plugins/images/verified.jpg" alt="user-img" style="width:80px;height:80px" class="img-circle pull-right">');
  		}

      if(resultData.transactionHash){
        var url = 'https://rinkeby.etherscan.io/tx/'+resultData.transactionHash;
        var qrCode = 'https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=400x400&chl='+url;
        var qrCodeSec = `<a href="`+qrCode+`" title="`+resultData.transactionHash+`" class="qr-code-magnify pull-right" data-effect="mfp-zoom-in">
                          <img src="`+qrCode+`" class="img-responsive" style="width:70px; height:70px; margin-top:-75px;"/>
                        </a>`;

        $(parentSection).find(".activityQrCode").html(qrCodeSec);
      }
  	});

	  var tmpTimelineBadge = $(parentSection).prev(".timeline-badge");

	
		$(tmpTimelineBadge).removeClass("danger").addClass("success");
		$(tmpTimelineBadge).find("i").removeClass().addClass("fa fa-check");
	}


	$(parentSection).find(".activityData").html(built.html); 
}

function getActivityTimestamp(activityName, batchNo, callback)
{
	globMainContract.getPastEvents(activityName,{
		fromBlock:0,
		filter:{batchNo: batchNo}
	},function(error,eventData)
	{
		try
		{
      web3.eth.getBlock(eventData[0].blockNumber,function(error,blockData)
			{
        var resultData = {};
				var date = blockData.timestamp;
				/* Convert Seconds to Miliseconds */
			 	date = new Date(date * 1000);
			 	// $("#cultivationDateTime").html("<i class='fa fa-clock-o'> </i> " + date.toLocaleString());

        resultData.dataTime = date;
        resultData.transactionHash = eventData[0].transactionHash;

        var userAddress = eventData[0].returnValues.user;
        getUserDetails(globUserContract,userAddress,function(result){
            if(userAddress == globAdminAddress){
                resultData.name      = 'Admin';
                resultData.contactNo = '-';
            }else{
                resultData.name      = result.name;
                resultData.contactNo = result.contactNo;
            }  
            
            resultData.user      = userAddress;

            callback(resultData);
        });
			})	
		}
		catch(e)
		{
			callback(false);
		}
	});
}

function buildCultivationBlock(result)
{
	var cultivationData = {};
	var registrationNo = result.registrationNo;
	var farmerName     = result.farmerName;
	var farmAddress    = result.farmAddress;
	var exporterName   = result.exporterName;
	var importerName   = result.importerName;

	if(registrationNo!='' && farmerName!='' && farmAddress!='' && exporterName!='' && importerName!=''){
		cultivationData.html =  `<tr>
                                <td><b>Mã nông trại:</b></td>
                                <td>`+registrationNo+` <i class="fa fa-check-circle verified_info"></i></td>
                            </tr>
                            <tr>
                                <td><b>Tên nông trại:</b></td>
                                <td>`+farmerName+` <i class="fa fa-check-circle verified_info"></i></td>
                            </tr>
                            <tr>
                                <td><b>Địa chỉ nông trại:</b></td>
                                <td>`+farmAddress+` <i class="fa fa-check-circle verified_info"></i></td>
                            </tr>
                            <tr>
                                <td><b>Đơn vị xuất kho:</b></td>
                                <td>`+exporterName+` <i class="fa fa-check-circle verified_info"></i></td>
                            </tr>
                            <tr>
                                <td><b>Đơn vị nhập kho:</b></td>
                                <td>`+importerName+` <i class="fa fa-check-circle verified_info"></i></td>
                            </tr>`;

        cultivationData.isDataAvail = true;                    
    }else{
    	cultivationData.html = ` <tr>
                                    <td colspan="2"><p>Thông tin không khả dụng</p></td>
                            </tr>`;

        cultivationData.isDataAvail = false;                                        
    }

    return cultivationData;
}

function buildFarmInspectionBlock(result){
	var farmInspactorData = {};
	var coffeeFamily      = result.coffeeFamily;
	var typeOfSeed        = result.typeOfSeed;
	var fertilizerUsed    = result.fertilizerUsed;	

	if(coffeeFamily!='' && typeOfSeed!='' && fertilizerUsed!=''){
		farmInspactorData.html =  `<tr>
                                    <td><b>Loại cà phê:</b></td>
                                    <td>`+coffeeFamily+` <i class="fa fa-check-circle verified_info"></i></td>
                                  </tr>
                                  <tr>
                                    <td><b>Loại hạt giống:</b></td>
                                    <td>`+typeOfSeed+` <i class="fa fa-check-circle verified_info"></i></td>
                                  </tr>
                                  <tr>
                                    <td><b>Loại phân bón đã sử dụng:</b></td>
                                    <td>`+fertilizerUsed+` <i class="fa fa-check-circle verified_info"></i></td>
                                  </tr>`;
        farmInspactorData.isDataAvail = true;                          
    }else{
    	farmInspactorData.html = `<tr>
	                                    <td colspan="2"><p>Thông tin không khả dụng</p></td>
	                            </tr>`;
	    farmInspactorData.isDataAvail = false;                        
    } 

    return farmInspactorData;  
}

function buildHarvesterBlock(result){
	var harvesterData = {};
	var cropVariety   = result.cropVariety;
	var temperatureUsed = result.temperatureUsed;
	var humidity      = result.humidity;

	if(cropVariety!='' && temperatureUsed!='' && humidity!=''){
		harvesterData.html =  `<tr>
                                <td><b>Mật độ trồng:</b></td>
                                <td>`+cropVariety+` <i class="fa fa-check-circle verified_info"></i></td>
                              </tr>
                              <tr>
                                <td><b>Nhiệt độ khi thu hoạch:</b></td>
                                <td>`+temperatureUsed+`&#x2109; <i class="fa fa-check-circle verified_info"></i></td>
                              </tr>
                              <tr>
                                <td><b>Độ ẩm khi thu hoạch:</b></td>
                                <td>`+humidity+`% <i class="fa fa-check-circle verified_info"></i></td>
                              </tr>`;
        harvesterData.isDataAvail = true;                      
    }else{
    	harvesterData.html = `<tr>
                                    <td colspan="2"><p>Thông tin không khả dụng</p></td>
                        </tr>`;
        harvesterData.isDataAvail = false;                
    }    

    return harvesterData;
}	

function buildExporterBlock(result){
	var exporterData = {};
	var quantity           = result.quantity;
	var destinationAddress = result.destinationAddress;
	var shipName           = result.shipName;
	var shipNo             = result.shipNo;
	var departureDateTime  = result.departureDateTime;
	var estimateDateTime   = result.estimateDateTime;
	var exporterId         = result.exporterId;

	if(quantity!='' && destinationAddress!='' && shipName!='' && shipNo!='' && departureDateTime!='' && estimateDateTime!='' && exporterId!=''){
		
    var departureDateTime = new Date(result.departureDateTime * 1000).toLocaleString();
    var estimateDateTime = new Date(result.estimateDateTime * 1000).toLocaleString();
    exporterData.html =  `<tr>
                            <td><b>Sản lượng:</b></td>
                            <td>`+quantity+` (đơn vị tính: Kg) <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Địa chỉ chuyển đến:</b></td>
                            <td>`+destinationAddress+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Tên đơn vị vận chuyển:</b></td>
                            <td>`+shipName+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Mã đơn vị vận chuyển:</b></td>
                            <td>`+shipNo+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Thời gian bắt đầu vận chuyển:</b></td>
                            <td>`+departureDateTime+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Thời gian đến dự tính:</b></td>
                            <td>`+estimateDateTime+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Mã đơn vị xuất kho:</b></td>
                            <td>`+exporterId+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>`;
        exporterData.isDataAvail = true;                  
	}else{
    	exporterData.html = ` <tr>
                                    <td colspan="2"><p>Thông tin không khả dụng</p></td>
                        </tr>`;
        exporterData.isDataAvail = false;                
    }   

    return exporterData;
}

function buildImporterBlock(result){
	var importerData = {};
	var quantity         = result.quantity;
	var shipName         = result.shipName;
	var shipNo           = result.shipNo;
	var arrivalDateTime  = result.arrivalDateTime;
	var transportInfo    = result.transportInfo;
	var warehouseName    = result.warehouseName;
	var warehouseAddress = result.warehouseAddress;
	var importerId       = result.importerId;

	if(quantity!='' && shipName!='' && shipNo!='' && arrivalDateTime!='' && transportInfo!='' && warehouseName!='' && warehouseAddress!='' && importerId!=''){
		
    var arrivalDateTime = new Date(result.arrivalDateTime * 1000).toLocaleString();
    importerData.html =  `<tr>
                            <td><b>Sản lượng:</b></td>
                            <td>`+quantity+` (đơn vị tính: Kg) <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Tên đơn vị vận chuyển:</b></td>
                            <td>`+shipName+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Mã đơn vị vận chuyển:</b></td>
                            <td>`+shipNo+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Thời điểm nhận:</b></td>
                            <td>`+arrivalDateTime+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Thông tin vận chuyển:</b></td>
                            <td>`+transportInfo+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Tên kho:</b></td>
                            <td>`+warehouseName+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Địa chỉ kho:</b></td>
                            <td>`+warehouseAddress+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Mã đơn vị nhập kho:</b></td>
                            <td>`+importerId+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>`;
        importerData.isDataAvail = true;                  
    }else{
    	importerData.html = ` <tr>
                                    <td colspan="2"><p>Thông tin không khả dụng</p></td>
                        </tr>`;
        importerData.isDataAvail = false;                
    }

    return importerData;    
}

function buildProcessorBlock(result){
	var processorData = {};
	var quantity         = result.quantity;
	var temperature        = result.temperature;
	var rostingDuration  = result.rostingDuration;
	var internalBatchNo  = result.internalBatchNo;
	var packageDateTime  = result.packageDateTime;
	var processorName    = result.processorName;
	var processorAddress = result.processorAddress;

	if(quantity!='' && temperature!='' && rostingDuration!='' && internalBatchNo!='' && packageDateTime!='' && processorName!='' && processorAddress!=''){
		
    var packageDateTime = new Date(result.packageDateTime * 1000).toLocaleString();

    processorData.html =  `<tr>
                            <td><b>Sản lượng:</b></td>
                            <td>`+result.quantity+` (đơn vị tính: Kg) <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Nhiệt độ:</b></td>
                            <td>`+result.temperature+`&#x2109; <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Thời lượng rang:</b></td>
                            <td>`+result.rostingDuration+` in seconds <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Mã lô hàng:</b></td>
                            <td>`+result.internalBatchNo+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Thời điểm đóng gói:</b></td>
                            <td>`+new Date(result.packageDateTime * 1000).toLocaleString() +` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Đơn vị chế biến:</b></td>
                            <td>`+result.processorName+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>
                            <td><b>Địa chỉ kho:</b></td>
                            <td>`+result.processorAddress+` <i class="fa fa-check-circle verified_info"></i></td>
                          </tr>
                          <tr>`;
        processorData.isDataAvail = true;                  
    }else{
    	processorData.html = ` <tr>
                                    <td colspan="2"><p>Thông tin không khả dụng</p></td>
                        </tr>`;
        processorData.isDataAvail = false;                
    }    
    
    return processorData; 
}