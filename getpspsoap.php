<?php

require_once('nusoap/lib/nusoap.php');

$_POST['username'] = 'nscwss';
$_POST['password'] = 'Test4UspW!59';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$params = array('username' => $username,
                'password' => $password
);
$client = new nusoap_client("https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.wsdl", true);
$client->username = $username;
$client->password = $password;

//$client->soap_defencoding = 'utf-8';
$err = $client->getError();
if ($err) {
    echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}

$client->setCredentials($username, $password);

$headerStr = '
        <wsse:Security soapenv:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
          <wsse:UsernameToken wsu:Id="UsernameToken-4"
        xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
             <wsse:Username>nscwss</wsse:Username>
             <wsse:Password
        Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">Test4UspW!59</wsse:Password>
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
             <dot:Password>Test4UspW!59</dot:Password>
             <dot:UserIPAddress xsi:nil="true"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
             <dot:DriverFirstName>Franklin</dot:DriverFirstName>
             <dot:DriverLastName>LastName3040342</dot:DriverLastName>
             <dot:DriverDOB>14-Mar-1934</dot:DriverDOB>
             <dot:MotorCarrierId>10643</dot:MotorCarrierId>
             <dot:InternalRefId>Test Transaction</dot:InternalRefId>
             <dot:DriverConsent>true</dot:DriverConsent>
             <dot:RAuthCode xsi:nil="true"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
             <dot:DriverQueries>
                <dot:DriverQuery>
                   <dot:DlNum>LICENSE2582166</dot:DlNum>
                   <dot:DlLastName>LastName3040342</dot:DlLastName>
                   <dot:DlState>VI</dot:DlState>
                </dot:DriverQuery>
             </dot:DriverQueries>
          </tem:request>
       </tem:GetDriverData>
XML;

$client->setHeaders($headerStr);
$result = $client->call('GetDriverData', $str);

// Short Check for a fault
if ($client->fault) {
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
}
echo '<pre>';
var_dump($client->response);
echo '</pre>';

//INFO Driver's DOB cannot be empty, must be a valid date, must be over 18, and format must be 'dd-MMM-yyyy'. For example 26-Mar-1945
//INFO Either a valid DOT Number or a Motor Carrier ID must be provided before the Driver Information Resource may be executed.

// Full check for a fault
/*echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
echo '<h2>Client</h2><pre>';
print_r($client);
echo '</pre>';*/
