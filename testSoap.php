<?php

header("Content-Type: text/xml; charset=utf-8");
header('Cache-Control: no-store, no-cache');
//header('Expires: '.date('r'));
ini_set("soap_wsdl_cache_enabled", "0");
$_POST['username'] = 'nscwss';
$_POST['password'] = 'Y@D4hF&Y9pQ)';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$params = array('username' => $username,
                'password' => $password
);

try {

    $headerArr = array('Username' => 'nscwss',
                       'Password' => 'Y@D4hF&Y9pQ)',
                       'Nonce'    => 'pZ5iQhQUQdytz1J1bX/Hvg==',
                       'Created'  => '2011-04-27T16:58:19.056Z',
    );

    $DriverQuery = array(
        'DlNum'      => '123456',
        'DlLastName' => 'Testone',
        'DlState'    => 'GA',
    );

    $DriverQueries = array('DriverQuery' => $DriverQuery);

    $request = array(
        "DOTNumber"       => "0",
        "UserName"        => "nscwss",
        "Password"        => "Y@D4hF&Y9pQ)",
        "UserIPAddress"   => '',
        "DriverFirstName" => "Gary",
        "DriverLastName"  => "Testone",
        "DriverDOB"       => "07/07/1974",
        "MotorCarrierId"  => "10643",
        "InternalRefId"   => "Internal Reference",
        "DriverConsent"   => true,
        "AuthCode"        => "",
        "DriverQueries"   => array($DriverQueries),
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

    $str
        = <<<XML
       <ns1:GetDriverData>
          <ns1:request>
             <ns2:DOTNumber>0</ns2:DOTNumber>
             <ns2:UserName>nscwss</ns2:UserName>
             <ns2:Password>Test4UspW!59</ns2:Password>
             <ns2:UserIPAddress xsi:nil="true"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
             <ns2:DriverFirstName>Test</ns2:DriverFirstName>
             <ns2:DriverLastName>Testlastname</ns2:DriverLastName>
             <ns2:DriverDOB>11-Dec-1949</ns2:DriverDOB>
             <ns2:MotorCarrierId>10643</ns2:MotorCarrierId>
             <ns2:InternalRefId>Test Transaction</ns2:InternalRefId>
             <ns2:DriverConsent>true</ns2:DriverConsent>
             <ns2:RAuthCode xsi:nil="true"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
             <ns2:DriverQueries>
                <ns2:DriverQuery>
                   <ns2:DlNum>123456</ns2:DlNum>
                   <ns2:DlLastName>Testlastname</ns2:DlLastName>
                   <ns2:DlState>PA</ns2:DlState>
                </ns2:DriverQuery>
             </ns2:DriverQueries>
          </ns1:request>
       </ns1:GetDriverData>
XML;

    $ns = array(
        "dot"     => "http://schemas.datacontract.org/2004/07/Dot.Psp.Common",
        "soapenv" => "http://schemas.xmlsoap.org/soap/envelope/",
        "tem"     => "http://tempuri.org/",
    );

    $options = array(
//            'soap_version' => SOAP_1_2,
//            "ns2:" => "http://schemas.datacontract.org/2004/07/Dot.Psp.Common",
//            "soapenv:" => "http://schemas.xmlsoap.org/soap/envelope/",
//            "tns:" => "http://tempuri.org/",
//            'location' => 'https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc',
//            'login' => 'nscwss',
//            'password' => 'Test4UspW!59',
        'trace' => true,
    );

    $client = new SoapClient('https://www.psp.fmcsa.dot.gov/Dot.Psp.Web.ServiceWeb/ServiceWeb.wsdl', $options);

    //$client->username = $username;
    //$client->password = $password;

    //$client->__setLocation("https://www.psp.fmcsa.dot.gov/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc"); // production server location
    //$client->__setLocation("https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc"); // test server location
    $soapHeaderStr
        = new SoapVar($headerStr, XSD_ANYXML, 'ns2', 'http://schemas.datacontract.org/2004/07/Dot.Psp.Common', 'soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

    $ns = array();
    $ns[] = new SOAPHeader("http://schemas.datacontract.org/2004/07/Dot.Psp.Common", "dot");
    $ns[] = new SOAPHeader("http://schemas.xmlsoap.org/soap/envelope/", "soapenv");
    $ns[] = new SOAPHeader("http://tempuri.org/", "tem");

    $soapHeader
        = new SOAPHeader('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'Security', $soapHeaderStr, true);


    $soapStr[]
        = new SoapVar($str, XSD_ANYXML, "tem", "http://tempuri.org/", 'soapenv', 'http://schemas.xmlsoap.org/soap/envelope/');

    //$result = $client->GetDriverData("request", $soapStr);
    $result = $client->__soapCall("GetDriverData", $soapStr, $options, $soapHeader);

    $request
        = <<< XML
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
            <dot:DriverFirstName>Test</dot:DriverFirstName>
            <dot:DriverLastName>Testlastname</dot:DriverLastName>
            <dot:DriverDOB>11-Dec-1949</dot:DriverDOB>
            <dot:MotorCarrierId>10643</dot:MotorCarrierId>
            <dot:InternalRefId>Test Transaction</dot:InternalRefId>
            <dot:DriverConsent>true</dot:DriverConsent>
            <dot:AuthCode xsi:nil="true"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"/>
            <dot:DriverQueries>
               <dot:DriverQuery>
                  <dot:DlNum>xxxxxxxxxxxxx</dot:DlNum>
                  <dot:DlLastName>Testlastname</dot:DlLastName>
                  <dot:DlState>PA</dot:DlState>
               </dot:DriverQuery>
            </dot:DriverQueries>
         </tem:request>
      </tem:GetDriverData>
   </soapenv:Body>
</soapenv:Envelope>
XML;
    $location = "https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc";
    $action = "http://tempuri.org/IServiceWeb/GetDriverData";
    $version = 1;

    $client->__doRequest($request, $location, $action, $version);
    //print_r($result);

    echo("\n---------------------\n");
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
