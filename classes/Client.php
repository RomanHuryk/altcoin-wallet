<?php if (!defined("IN_WALLET")) { die("u can't touch this."); } ?>
<?php
class Client {
	private $uri;
	private $jsonrpc;

	function __construct($host, $port, $user, $pass)
	{
		$this->uri = "http://" . $user . ":" . $pass . "@" . $host . ":" . $port . "/";
		$this->jsonrpc = new jsonRPCClient($this->uri);
	}

	function getBalance($user_session)
	{
		return $this->jsonrpc->getbalance("wallet(" . $user_session . ")", 6);
		//return 21;
	}

	function getAddressList($user_session)
	{
		return $this->jsonrpc->getaddressesbyaccount("wallet(" . $user_session . ")");
		//return array("1test", "1test");
	}

	function getTransactionList($user_session)
	{
		return $this->jsonrpc->listtransactions("wallet(" . $user_session . ")", 10);
	}

	function getNewAddress($user_session)
	{
		return $this->jsonrpc->getnewaddress("wallet(" . $user_session . ")");
		//return "1test";
	}

	function withdraw($user_session, $address, $amount)
	{
		return $this->jsonrpc->sendfrom("wallet(" . $user_session . ")", $address, (float)$amount, 6);
		//return "ok wow";
	}
}
?>