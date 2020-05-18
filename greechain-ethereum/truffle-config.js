// var HDWalletProvider = require("truffle-hdwallet-provider");
// module.exports = 
// {
//     networks: 
//     {
// 	    development: 
// 		{
// 	   		host: "127.0.0.1",
// 	   		port: 8545,
// 			network_id: "*", // Match any network id
// 			websockets: true,
// 			// from: '0x8f57ec360663215f50b142eab6daf53bf6aeaa7a'
// 		},
//     	rinkeby: {
//     	    provider: function() {
// 		      var mnemonic = "wolf dad route point mercy another repeat topple confirm before mix rice";//put ETH wallet 12 mnemonic code	
// 		      return new HDWalletProvider(mnemonic, "https://rinkeby.infura.io/v3/d7dde0fa90274c6d873d75e84505f624");
// 		    },
// 			network_id: '4',
// 		    from: '0xf3b3ac17b58e11ad5b1eb7f60a29fcfcd7c14c3f',/*ETH wallet 12 mnemonic code wallet address*/
// 		}  
// 	},
// };
var HDWalletProvider = require("truffle-hdwallet-provider");
var mnemonic = "wolf dad route point mercy another repeat topple confirm before mix rice";
module.exports = {
 networks: {
  development: {
   host: "127.0.0.1",
   port: 8545,
   network_id: "*"
  },
  rinkeby: {
      provider: function() { 
       return new HDWalletProvider(mnemonic, "https://rinkeby.infura.io/v3/d7dde0fa90274c6d873d75e84505f624");
      },
	  network_id: 4,
	  from: '0xf3b3ac17b58e11ad5b1eb7f60a29fcfcd7c14c3f'
  }
 }
};