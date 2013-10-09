<?php

header("Content-Type: text/xml; charset=utf-8");
header('Cache-Control: no-store, no-cache');
//header('Expires: '.date('r'));
ini_set("soap_wsdl_cache_enabled", "0");

$_POST['username'] = 'nscwss';
$_POST['password'] = 'Test4UspW!59';

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$params = array('username' => $username,
                'password' => $password
);

try {
    $headerArr = array('Username' => $username,
                       'Password' => $password,
                       'Nonce'    => 'pZ5iQhQUQdytz1J1bX/Hvg==',
                       'Created'  => '2011-04-27T16:58:19.056Z',
    );

    $DriverQuery = array(
        'DlNum'      => 'LICENSE2582166',
        'DlLastName' => 'LastName3040342',
        'DlState'    => 'VI',
    );

    $DriverQueries = array('DriverQuery' => $DriverQuery);

    $bodyArr = array(
        "DOTNumber"       => "0",
        "UserName"        => $username,
        "Password"        => $password,
        "UserIPAddress"   => '',
        "DriverFirstName" => "Franklin",
        "DriverLastName"  => "LastName3040342",
        "DriverDOB"       => "14-Mar-1934",
        "MotorCarrierId"  => "10643",
        "InternalRefId"   => "Internal Reference",
        "DriverConsent"   => true,
        "AuthCode"        => "",
        "DriverQueries"   => $DriverQueries,
    );

    $headerStr
        = '
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

    
 $requestStrFull = <<< XML
            <soapenv:Envelope
xmlns:dot="http://schemas.datacontract.org/2004/07/Dot.Psp.Common"
xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
xmlns:tem="http://tempuri.org/">
   <soapenv:Header>
      <wsse:Security soapenv:mustUnderstand="1"
xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
         <wsse:UsernameToken wsu:Id="UsernameToken-3"
xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
            <wsse:Username>nscwss</wsse:Username>
            <wsse:Password
Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">Test4UspW!59</wsse:Password>
            <wsse:Nonce
EncodingType="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary">pZ5iQhQUQdytz1J1bX/Hvg==</wsse:Nonce>
            <wsu:Created>2011-04-27T16:58:19.056Z</wsu:Created>
         </wsse:UsernameToken>
      </wsse:Security>
   </soapenv:Header>
   <soapenv:Body>
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
            <dot:AuthCode xsi:nil="true"
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
   </soapenv:Body>
</soapenv:Envelope>
XML;

    $ns = array(
        "dot"     => "http://schemas.datacontract.org/2004/07/Dot.Psp.Common",
        "soapenv" => "http://schemas.xmlsoap.org/soap/envelope/",
        "tem"     => "http://tempuri.org/",
    );

    $options = array(
        "ns2:" => "http://schemas.datacontract.org/2004/07/Dot.Psp.Common",
        "soapenv:" => "http://schemas.xmlsoap.org/soap/envelope/",
        "tns:" => "http://tempuri.org/",
        'location' => 'https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc',
        'login' => 'nscwss',
        'password' => 'Test4UspW!59',
        'trace' => true,
    );

    //$client = new SoapClient('https://www.psp.fmcsa.dot.gov/Dot.Psp.Web.ServiceWeb/ServiceWeb.wsdl', $options);
        $client = new SoapClient('https://www.psp.fmcsa.dot.gov/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc?wsdl', $options);

//    $client->username = $username;
//    $client->password = $password;
    //$client->setCredentials($username, $password);

    //$client->__setLocation("https://www.psp.fmcsa.dot.gov/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc"); // production server location
    //$client->__setLocation("https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc"); // test server location
    $soapHeaderStr = new SoapVar($headerStr, XSD_ANYXML, 'ns2', 'http://schemas.datacontract.org/2004/07/Dot.Psp.Common', 'soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

    $ns = array();
    $ns[] = new SOAPHeader("http://tempuri.org/", "tem");
    $ns[] = new SOAPHeader("http://schemas.datacontract.org/2004/07/Dot.Psp.Common", "dot");
    //$ns[] = new SOAPHeader("http://schemas.xmlsoap.org/soap/envelope/", "soapenv");

    $soapHeader = new SOAPHeader('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'Security', $soapHeaderStr, true);
    //$client->setHeaders($soapHeader);

    $soapStr = new SoapVar($str, XSD_ANYXML, "tem", "http://tempuri.org/", 'soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');
    $client->__setSoapHeaders($soapHeader);

    $arguments = array($options, $soapStr);
    
    //$result = $client->GetDriverData("GetDriverData", $tmpArr);    
    $result = $client->__call('GetDriverData',$ns, $arguments);
    //$result = $client->__soapCall("GetDriverData", $soapStr, $options, $soapHeader);

   // $location = "https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc";
   // $action = "http://tempuri.org/IServiceWeb/GetDriverData";
   // $version = 1;

    //$client->__doRequest($request, $location, $action, $version);


    echo("\n--------RESULT-------------\n");
     print_r($result);
    echo("\n--------/RESULT-------------\n");
} catch (SoapFault $s) {
    echo('ERROR: [' . $s->faultcode . '] ' . $s->faultstring . "\n");
} catch (Exception $e) {
    echo('ERROR: ' . $e->getMessage() . "\n");
}
echo("\n----------getLastRequest-----------\n");
echo $client->__getLastRequest() . "\n";
echo("\n----------getLastRequestHeaders----------- " . "\n");
echo $client->__getLastRequestHeaders() . "\n";
echo("\n----------getLastResponse----------- " . "\n");
echo $client->__getLastResponse() . "\n";
echo("\n----------getLastResponseHeaders----------- \n");
echo $client->__getLastResponseHeaders() . "\n";
