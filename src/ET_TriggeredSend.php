<?php
// spl_autoload_register( function($class_name) {
//     include_once 'src/'.$class_name.'.php';
// });
namespace FuelSdk;

/**
* Defines a triggered send in the account.
*/
class ET_TriggeredSend extends ET_CUDSupport
{
	/**
	* @var array    		Gets or sets the subscribers. e.g. array("EmailAddress" => "", "SubscriberKey" => "")
	*/
	public  $subscribers;

	/**
	* @var int      		Gets or sets the folder identifier.
	*/
    public  $folderId;
    public $folderProperty;
    public $folderMediaType;
	/** 
	* Initializes a new instance of the class.
	*/
	function __construct()
	{
		$this->obj = "TriggeredSendDefinition";
		$this->folderProperty = "CategoryID";
		$this->folderMediaType = "triggered_send";
	}

    /**
	* Send this instance.
    * @return ET_Post     Object of type ET_Post which contains http status code, response, etc from the POST SOAP service
    */	
	public function Send()
	{
		$tscall = array("TriggeredSendDefinition" => $this->props , "Subscribers" => $this->subscribers);
		$response = new ET_Post($this->authStub, "TriggeredSend", $tscall);
		return $response;
	}
}
?>