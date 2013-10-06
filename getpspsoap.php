<?php

require_once('nusoap/lib/nusoap.php');

$_POST['username'] = 'nscwss';
$_POST['password'] = 'Y@D4hF&Y9pQ)';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
 $params = array('username' => $username,
 				 'password' => $password);
$client = new nusoap_client("https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.wsdl", true);
    $client->username = $username;
    $client->password = $password;
//$client->version = SOAP_1_1;
$client->soap_defencoding = 'utf-8';
$err = $client->getError();
if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}

$client->setCredentials($username, $password);

$DriverQuery = array(
	'DlNum' => '123456',
	'DlLastName' => 'Testone',
	'DlState' => 'GA',
);

$DriverQueries = array('DriverQuery' => $DriverQuery);

$request = array(
    "DOTNumber" => "0",
    "UserName" => "nscwss",
    "Password" => "Y@D4hF&Y9pQ)",
    "UserIPAddress" => '',
    "DriverFirstName" => "Gary",
    "DriverLastName" => "Testone",
    "DriverDOB" => "07/07/1974",
    "MotorCarrierId" => "10643",
    "InternalRefId" => "Internal Reference",
    "DriverConsent" => true,
    "AuthCode" => "",
    "DriverQueries" => array($DriverQueries),
);
$headerStr = '
        <wsse:Security soapenv:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
          <wsse:UsernameToken wsu:Id="UsernameToken-4"
        xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
             <wsse:Username>nscwss</wsse:Username>
             <wsse:Password
        Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">Y@D4hF&Y9pQ)</wsse:Password>
             <wsse:Nonce
        EncodingType="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary">cur2TD5NrfjhegS6DFQnnA==</wsse:Nonce>
             <wsu:Created>2011-01-11T21:32:14.692Z</wsu:Created>
          </wsse:UsernameToken>
          </wsse:Security>
            ';

            $str = <<<XML
       <tem:GetDriverData>
          <tem:request>
             <dot:DOTNumber>0</dot:DOTNumber>
             <dot:UserName>nscwss</dot:UserName>
             <dot:Password>Y@D4hF&Y9pQ)</dot:Password>
             <dot:UserIPAddress xsi:nil="true"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
             <dot:DriverFirstName>Test</dot:DriverFirstName>
             <dot:DriverLastName>Testlastname</dot:DriverLastName>
             <dot:DriverDOB>11-Dec-1949</dot:DriverDOB>
             <dot:MotorCarrierId>10643</dot:MotorCarrierId>
             <dot:InternalRefId>Test Transaction</dot:InternalRefId>
             <dot:DriverConsent>true</dot:DriverConsent>
             <dot:RAuthCode xsi:nil="true"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
             <dot:DriverQueries>
                <dot:DriverQuery>
                   <dot:DlNum>123456</dot:DlNum>
                   <dot:DlLastName>Testlastname</dot:DlLastName>
                   <dot:DlState>PA</dot:DlState>
                </dot:DriverQuery>
             </dot:DriverQueries>
          </tem:request>
       </tem:GetDriverData>
XML;
            $nsArr = array(
                "dot" => "http://schemas.datacontract.org/2004/07/Dot.Psp.Common",
                "soapenv" => "http://schemas.xmlsoap.org/soap/envelope/",
                "tem" => "http://tempuri.org/",
            ); 

$nsStr = 'xmlns:dot="http://schemas.datacontract.org/2004/07/Dot.Psp.Common"
xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
xmlns:tem="http://tempuri.org/';

//$soapArr = new SoapVar($str, XSD_ANYXML);
    //$client->namespaces($nsArr);
    $client->setHeaders($headerStr);
$result = $client->call('GetDriverData', $str, $nsStr);

// Check for a fault
/*if ($client->fault) {
	echo '<h2>Fault</h2><pre>';
	print_r($result);
	echo '</pre>';
} else {
	// Check for errors
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {
		// Display the result
		echo '<h2>Result</h2><pre>';
		print_r($result);
		echo '</pre>';
	}
}*/
echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
echo '<h2>Client</h2><pre>';
print_r($client);
echo '</pre>';
