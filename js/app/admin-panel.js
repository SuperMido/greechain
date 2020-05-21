var globCurrentUser = false;

$(window).on('coinbaseReady', function () {
  getUserEvents(globUserContract);
});

function userFormSubmit() {
  if ($('form#userForm').parsley().isValid()) {
    var userWalletAddress = $('#userWalletAddress').val();
    var userName = $('#userName').val();
    var userContactNo = $('#userContactNo').val();
    var userRoles = $('#userRoles').val();
    var isActive = $('#isActive').is(':checked');
    var userImageAddress = $('#userProfileHash').val();

    globUserContract.methods
      .updateUserForAdmin(
        userWalletAddress,
        userName,
        userContactNo,
        userRoles,
        isActive,
        userImageAddress
      )
      .send({ from: globCoinbase, to: globUserContract._address })
      .on('transactionHash', function (hash) {
        handleTransactionResponse(hash);
        $('#userFormModel').modal('hide');
      })
      .on('receipt', function (receipt) {
        receiptMessage = 'User Created Successfully';
        handleTransactionReceipt(receipt, receiptMessage);
        $('#userFormModel').modal('hide');
        getUserEvents(globUserContract);
      })
      .on('error', function (error) {
        handleGenericError(error.message);
        return;
      });
  }
}