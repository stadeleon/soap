<?php

header("Content-Type: text/xml; charset=utf-8");
header('Cache-Control: no-store, no-cache');
//header('Expires: '.date('r'));
ini_set("soap_wsdl_cache_enabled", "0");
require_once ("nusoap/lib/nusoap.php");

        $options = array(
            'soap_version' => SOAP_1_1,
            "dot" => "http://schemas.datacontract.org/2004/07/Dot.Psp.Common",
            "soapenv" => "http://schemas.xmlsoap.org/soap/envelope/",
            "tem" => "http://tempuri.org/",
            'location' => 'https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc',
            'login' => 'nscwss',
            'password' => 'Y@D4hF&Y9pQ)',
            'trace' => true,
        );

        try {
            
            $headerArr = array('Username' => 'nscwss',
                               'Password' => 'Y@D4hF&Y9pQ)',
                               'Nonce' => 'pZ5iQhQUQdytz1J1bX/Hvg==',
                               'Created' => '2011-04-27T16:58:19.056Z',
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
             <dot:AuthCode xsi:nil="true"
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
            
/*    $before = '
        <soapenv:Envelope
        xmlns:dot="http://schemas.datacontract.org/2004/07/Dot.Psp.Common"
        xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
        xmlns:tem="http://tempuri.org/">';
    $after = '
        </soapenv:Body>
        </soapenv:Envelope>';*/
            
/*     $body = new stdClass();
     $body->parameters = new stdClass();
     $body->parameters->DOTNumber = '0';
        $body->parameters->UserName = 'nscwss';
        $body->parameters->Password = 'Y@D4hF&Y9pQ)';
        $body->parameters->UserIPAddress = ''; 
        $body->parameters->DriverFirstName = 'Gary';
        $body->parameters->DriverLastName = 'Testone';
        $body->parameters->DriverDOB = '07/07/1974';
        $body->parameters->MotorCarrierId = '10643';
        $body->parameters->InternalRefId = 'Internal Reference';
        $body->parameters->DriverConsent = true;
        $body->parameters->AuthCode = array('xsi:nil' => true, 'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance');
        $body->parameters->DriverQueries = new stdClass();
        $body->parameters->DriverQueries->DriverQuery = new stdClass();
        $body->parameters->DriverQueries->DriverQuery->DlNum = '123456';
        $body->parameters->DriverQueries->DriverQuery->DlLastName = 'Testone';
        $body->parameters->DriverQueries->DriverQuery->DlState = 'GA';
            */
   /*     $query2 = array(
            "DOTNumber" => "0",
            "UserName" => "nscwss",
            "Password" => "Y@D4hF&Y9pQ)",
            "UserIPAddress" => '127.0.0.1',
            "DlNum" => "123456",
            "DriverFirstName" => "Gary",
            "DriverLastName" => "Testone",
            "DriverDOB" => "07/07/1974",
            "MotorCarrierId" => "10643",
            "InternalRefId" => "Internal Reference",
            "DriverConsent" => true,
            "AuthCode" => "",
            "DlNum" => "123456",
            "DlLastName" => "Testone",
            "DlState" => "GA",
        );*/
            $ns = array(
                "dot" => "http://schemas.datacontract.org/2004/07/Dot.Psp.Common",
                "soapenv" => "http://schemas.xmlsoap.org/soap/envelope/",
                "tem" => "http://tempuri.org/",
            ); 
//            $client = new SoapClient('http://soap/psp.wsdl?wsdl', $options);
            $client = new nusoap_client('https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc?wsdl', $options);
//            $client = new SoapClient('https://psp-stage.cdc.nicusa.com/Dot.Psp.Web.ServiceWeb/ServiceWeb.svc?wsdl');
           
            $soapHeaderStr = new SoapVar($headerStr, XSD_ANYXML); 
            
           /* $ns[] = new SOAPHeader("http://schemas.datacontract.org/2004/07/Dot.Psp.Common", "dot");
            $ns[] = new SOAPHeader("http://schemas.xmlsoap.org/soap/envelope/", "soapenv");
            $ns[] = new SOAPHeader("http://tempuri.org/", "tem");*/
            $soapHeader = new SOAPHeader('http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd', 'Security', $soapHeaderStr, true);
            
            echo ("\n<br/>" . "--------------------- " . "\n<br/>");

            $soapStr[] = new SoapVar($str, XSD_ANYXML);
            //print_r($client->__getFunctions());
            //print_r($client->__getTypes());
            //print_r($client->wsdl());
            //$client->__setSoapHeaders($soapHeader);
            $result = $client->call("GetDriverData", $options, $ns,"GetDriverData", $soapHeader);
           // $result = $client->__soapCall("GetDriverData", $soapStr, $options, $soapHeader);
            
            //print_r($result);
            
            echo ("\n<br/>" . "--------------------- " . "\n");
        } catch (SoapFault $s) {
            echo('ERROR: [' . $s->faultcode . '] ' . $s->faultstring . "\n");
        } catch (Exception $e) {
            echo('ERROR: ' . $e->getMessage() . "\n");
        }
            echo ("\n<br/>" . "----------getLastRequest----------- " . "\n");
       echo $client->__getLastRequest() . "\n<br/>";
            echo ("\n<br/>" . "----------getLastRequestHeaders----------- " . "\n");
       echo $client->__getLastRequestHeaders() . "\n<br/>";
            echo ("\n<br/>" . "----------getLastResponse----------- " . "\n");
         echo $client->__getLastResponse() . "\n<br/>";
            echo ("\n<br/>" . "----------getLastResponseHeaders----------- " . "\n");
         echo $client->__getLastResponseHeaders() . "\n<br/>";
?>
