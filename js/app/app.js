var globIcoAddress = {
	/*'old-CoffeeMain': "0xfA171Cda184d815D20a318fCe9920AafdC04934e",
		  'old-CoffeeUser': "0x26d723acFe39f93A9702592dD9371851f81cF59F",*/

	CoffeeMain: '0x2b6b23505660d1ac9ac09f05da2a24dd00f8e0a0',
	CoffeeUser: '0xe1b21898a041c0193f0d86437581cceaeeb8a522',
	Storage: '0x50064ce16a8a5176052fb83b5a6ebd1f043a3a4b',
};

var globSuperAdmin = "0xf3b3ac17b58e11ad5b1eb7f60a29fcfcd7c14c3f";
var globAdminAddress = '';
var globMainContract = false;
var globUserContract = false;
var globCoinbase = false;
var globUserData = [];

window.addEventListener('load', function () {
	$('#storageContractAddress').html(globIcoAddress.Storage);
	$('#coffeeSupplychainContractAddress').html(globIcoAddress.CoffeeMain);
	$('#userContractAddress').html(globIcoAddress.CoffeeUser);

	if (typeof web3 !== 'undefined') {
		web3 = new Web3(window.ethereum);
		ethereum.enable();
		//   web3 = new Web3(new Web3.providers.HttpProvider("https://rinkeby.infura.io/v3/d7dde0fa90274c6d873d75e84505f624"));
		//   web3 = new Web3(new Web3.providers.HttpProvider("https://winter-wandering-thunder.rinkeby.quiknode.pro/7f2ad124d76e6ac40604842d2c003283d3cb0c98/"));
	} else {
		// set the provider you want from Web3.providers
		web3 = new Web3(new Web3.providers.HttpProvider('http://localhost:8545'));
	}

	initContract();

	getCurrentAccountAddress((address) => {
		/*  To Restrict User in Admin Section */
		var currentPath = window.location.pathname;
		var tmpStack = currentPath.split('/');
		var currentPanel = tmpStack.pop();
		globCoinbase = address;
		$('#currentUserAddress').html(globCoinbase);
		$(window).trigger('coinbaseReady');

		if (currentPanel == "admin.php") {
			getUser(globUserContract, function (data) {
				if(data == undefined) window.location = "index.php";
				if(data.role != "DOANH_NGHIEP") window.location = "index.php";
			});
			globAdminAddress = address;
		} else if (currentPanel == "admin-panel.php") {
			this.console.log(address, globSuperAdmin);

			if(address != globSuperAdmin) {
				window.location = "index.php";
			}
			globAdminAddress = globSuperAdmin;
		}
	});

	updateLoginAccountStatus();

	/* setInterval(function () {
			  updateLoginAccountStatus();
		  }, 500); */
});

function initContract() {
	globMainContract = new web3.eth.Contract(
		CoffeeSupplyChainAbi,
		globIcoAddress.CoffeeMain
	);
	$(window).trigger('mainContractReady');

	globUserContract = new web3.eth.Contract(
		SupplyChainUserAbi,
		globIcoAddress.CoffeeUser
	);
	$(window).trigger('userContractReady');
}

function updateLoginAccountStatus() {
	web3.eth.getAccounts(function (err, accounts) {
		if (err) {
			console.log('An error occurred ' + err);
		} else if (accounts.length == 0) {
			sweetAlert('Error', 'Please login to MetaMask..!', 'error');
			$('#currentUserAddress').html(
				'0x0000000000000000000000000000000000000000'
			);
		}
	});
}

function getCurrentAccountAddress(callback) {
	callback = callback || false;
	web3.eth
		.getCoinbase()
		.then((_coinbase) => {
			callback(_coinbase);
		})
		.catch((err) => {
			if (callback) {
				callback(0);
			}
		});
}

function getUserDetails(contractRef, userAddress, callback) {
	callback = callback || false;

	contractRef.methods
		.getUser(userAddress)
		.call()
		.then((result) => {
			callback(result);
		})
		.catch((error) => {
			sweetAlert('Error', 'Unable to get User Details', 'error');
			callback(0);
		});
}

function getCultivationData(contractRef, batchNo, callback) {
	if (batchNo == undefined) {
		callback(0);
		return;
	}

	callback = callback || false;

	contractRef.methods
		.getBasicDetails(batchNo)
		.call()
		.then((result) => {
			callback(result);
		})
		.catch((error) => {
			sweetAlert('Error', 'Unable to get Cultivation Details', 'error');
			callback(0);
		});
}

function getFarmInspectorData(contractRef, batchNo, callback) {
	if (batchNo == undefined) {
		callback(0);
		return;
	}

	callback = callback || false;

	contractRef.methods
		.getFarmInspectorData(batchNo)
		.call()
		.then((result) => {
			callback(result);
		})
		.catch((error) => {
			sweetAlert('Error', 'Unable to get Farm Inspection Details', 'error');
			callback(0);
		});
}

function getHarvesterData(contractRef, batchNo, callback) {
	if (batchNo == undefined) {
		callback(0);
		return;
	}

	callback = callback || false;

	contractRef.methods
		.getHarvesterData(batchNo)
		.call()
		.then((result) => {
			callback(result);
		})
		.catch((error) => {
			sweetAlert('Error', 'Unable to get Harvesting Details', 'error');
			callback(0);
		});
}

function getExporterData(contractRef, batchNo, callback) {
	if (batchNo == undefined) {
		callback(0);
		return;
	}

	callback = callback || false;

	contractRef.methods
		.getExporterData(batchNo)
		.call()
		.then((result) => {
			callback(result);
		})
		.catch((error) => {
			sweetAlert('Error', 'Unable to get Exporting Details', 'error');
			callback(0);
		});
}

function getImporterData(contractRef, batchNo, callback) {
	if (batchNo == undefined) {
		callback(0);
		return;
	}

	callback = callback || false;

	contractRef.methods
		.getImporterData(batchNo)
		.call()
		.then((result) => {
			callback(result);
		})
		.catch((error) => {
			sweetAlert('Error', 'Unable to get Importing Details', 'error');
			callback(0);
		});
}

function getProcessorData(contractRef, batchNo, callback) {
	if (batchNo == undefined) {
		callback(0);
		return;
	}

	callback = callback || false;

	contractRef.methods
		.getProcessorData(batchNo)
		.call()
		.then((result) => {
			callback(result);
		})
		.catch((error) => {
			sweetAlert('Error', 'Unable to get Processing Details', 'error');
			callback(0);
		});
}

function getUserEvents(contractRef) {
	contractRef
		.getPastEvents('UserUpdate', {
			fromBlock: 0,
		})
		.then(function (events) {
			$('#tblUser').DataTable().destroy();
			$('#tblUser tbody').html(buildUserDetails(events));
			$('#tblUser').DataTable({
				displayLength: 3,
				order: [[1, 'asc']],
			});
		})
		.catch((err) => {
			console.log(err);
		});
}

function buildUserDetails(events) {
	var filteredUser = {};
	var isNewUser = false;

	/*filtering latest updated user record*/
	$(events).each(function (index, event) {
		if (filteredUser[event.returnValues.user] == undefined) {
			filteredUser[event.returnValues.user] = {};
			filteredUser[event.returnValues.user].address = event.address;
			filteredUser[event.returnValues.user].role = event.returnValues.role;
			filteredUser[event.returnValues.user].user = event.returnValues.user;
			filteredUser[event.returnValues.user].name = event.returnValues.name;
			filteredUser[event.returnValues.user].contactNo =
				event.returnValues.contactNo;
			filteredUser[event.returnValues.user].blockNumber = event.blockNumber;
		} else if (
			filteredUser[event.returnValues.user].blockNumber < event.blockNumber
		) {
			filteredUser[event.returnValues.user].role = event.returnValues.role;
			filteredUser[event.returnValues.user].user = event.returnValues.user;
			filteredUser[event.returnValues.user].address = event.address;
			filteredUser[event.returnValues.user].name = event.returnValues.name;
			filteredUser[event.returnValues.user].contactNo =
				event.returnValues.contactNo;
			filteredUser[event.returnValues.user].blockNumber = event.blockNumber;
		}
	});

	var builtUser = [];
	for (tmpUser in filteredUser) {
		builtUser.push(filteredUser[tmpUser]);
	}

	/*build user Table*/
	$('#totalUsers').html(builtUser.length);
	return buildUserTable(builtUser);
}

function buildUserTable(globUserData) {
	var tbody = '';
	var roleClass = '';

	$(globUserData).each(function (index, data) {
		var role = data.role;

		if (role == 'NONG_TRAI') {
			roleClass = 'info';
		} else if (role == 'THU_HOACH') {
			roleClass = 'success';
		} else if (role == 'XUAT_KHO') {
			roleClass = 'warning';
		} else if (role == 'NHAP_KHO') {
			roleClass = 'danger';
		} else if (role == 'PHAN_PHOI') {
			roleClass = 'primary';
		} else if (role == 'DOANH_NGHIEP') {
			roleClass = 'secondary';
		}

		tbody +=
			`<tr>
	                        <td>` +
			data.user +
			`</td>
	                        <td>` +
			data.name +
			`</td>
	                        <td>` +
			data.contactNo +
			`</td>
	                        <td><span class="label label-` +
			roleClass +
			` font-weight-100">` +
			role +
			`</span></td>
	                        <td><a href="javascript:void(0);" class="text-inverse p-r-10" data-toggle="tooltip" data-userAddress="` +
			data.user +
			`" onclick="openEditUser(this);" title="Edit"><i class="ti-marker-alt"></i></a> </td>
	                  </tr>`;
	});

	return tbody;
}

function handleTransactionResponse(txHash, finalMessage) {
	var txLink = 'https://rinkeby.etherscan.io/tx/' + txHash;
	var txLinkHref =
		"<a target='_blank' href='" +
		txLink +
		"'> Click here for Transaction Status </a>";

	sweetAlert(
		'Success',
		'Please Check Transaction Status here :  ' + txLinkHref,
		'success'
	);

	$('#linkOngoingTransaction').html(txLinkHref);
	$('#divOngoingTransaction').fadeIn();
	/*scroll to top*/
	$('html, body').animate({ scrollTop: 0 }, 'slow', function () { });
}

function handleTransactionReceipt(receipt, finalMessage) {
	$('#linkOngoingTransaction').html('');
	$('#divOngoingTransaction').fadeOut();

	// sweetAlert("Success", "Token Purchase Complete ", "success");
	sweetAlert('Success', finalMessage, 'success');
}

function handleGenericError(error_message) {
	if (error_message.includes('MetaMask Tx Signature')) {
		sweetAlert('Error', 'Transaction Refused ', 'error');
	} else {
		// sweetAlert("Error", "Error Occured, Please Try Again , if problem persist get in touch with us. ", "error");
		sweetAlert('Error', error_message, 'error');
	}
}

function changeSwitchery(element, checked) {
	if (
		(element.is(':checked') && checked == false) ||
		(!element.is(':checked') && checked == true)
	) {
		element.parent().find('.switchery').trigger('click');
	}
}

/*==================================Bootstrap Model Start=========================================*/

function startLoader() {
	$('.preloader').fadeIn();
}

function stopLoader() {
	$('.preloader').fadeOut();
}

/*Set Default inactive*/
$('#userFormClick').click(function () {
	$('#userForm').trigger('reset');
	changeSwitchery($('#isActive'), false);
	$('#userModelTitle').html('Add User');
	$('#imageHash').html('');
	$('#userFormModel').modal();
});

/*Edit User Model Form*/
function getUser(contractRef,callback)
{
   contractRef.methods.getUser(globCoinbase).call(function (error, result) {
        if(error){
            alert("Unable to get User" + error);    
        }
        newUser = result;
        if (callback)
        {
            callback(newUser);
        }        
    });
}
function openEditUser(ref) {
	var userAddress = $(ref).attr('data-userAddress');
	startLoader();
	getUserDetails(globUserContract, userAddress, function (result) {
		$('#userWalletAddress').val(userAddress);
		$('#userName').val(result.name);
		$('#userContactNo').val(result.contactNo);
		$('#userProfileHash').val(result.profileHash);
		$('#userRoles').val(result.role).prop('selected', true);

		var profileImageLink = 'https://ipfs.io/ipfs/' + result.profileHash;
		var btnViewImage =
			'<a href="' +
			profileImageLink +
			'" target="_blank" class=" text-danger"><i class="fa fa-eye"></i> View Image</a>';
		$('#imageHash').html(btnViewImage);

		changeSwitchery($('#isActive'), result.isActive);
		$('#userModelTitle').html('Update User');
		stopLoader();
		$('#userFormModel').modal();
	});
}

// ipfs = window.IpfsApi('localhost', 5001);
ipfs = window.IpfsApi('ipfs.infura.io', '5001', { protocol: 'https' });

function handleFileUpload(event) {
	const file = event.target.files[0];

	let reader = new window.FileReader();
	reader.onloadend = function () {
		$('#userFormBtn').prop('disabled', true);
		$('i.fa-spinner').show();
		$('#imageHash').html('Processing......');
		saveToIpfs(reader);
	};

	reader.readAsArrayBuffer(file);
}

function saveToIpfs(reader) {
	let ipfsId;

	const Buffer = window.IpfsApi().Buffer;
	const buffer = Buffer.from(reader.result);

	/*Upload Buffer to IPFS*/
	ipfs.files.add(buffer, (err, result) => {
		if (err) {
			console.error(err);
			return;
		}

		var imageHash = result[0].hash;

		var profileImageLink = 'https://ipfs.io/ipfs/' + imageHash;
		var btnViewImage =
			'<a href="' +
			profileImageLink +
			'" target="_blank" class=" text-danger"><i class="fa fa-eye"></i> View Image</a>';

		$('#userProfileHash').val(imageHash);
		$('#imageHash').html(btnViewImage);

		$('#userFormBtn').prop('disabled', false);
		$('i.fa-spinner').hide();
	});
}
