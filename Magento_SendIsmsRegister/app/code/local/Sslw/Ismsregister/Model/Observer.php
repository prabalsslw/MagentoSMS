<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Sslw_Ismsregister_Model_Observer {

    public function SendSmsRegister(Varien_Event_Observer $observer) {  
          $msisdn = $observer->getCustomerAddress()->getTelephone();// Customer Mobile No
                 
    		//START SMS API Code here your code
			//$msisdn2='0171767xxxx'; // Store Admin Mobile No
			$sms = 'Congrats! You have successfully Register. Thank You.@KHIKSHA';	//May Change SMS Body here			
			$user ="UserID";
			$pass = "UserPassword"; //if change login password isms.sslwireless.com then change new here
			$sid = "StakeHolderName";	 	//Stake Holder Name here 	 	
            $url = "http://sms.sslwireless.com/pushapi/dynamic/server.php";
            $unique_id_1 = uniqid();
            $unique_id_2 = uniqid();

            $param = "user=$user&pass=$pass&sid=$sid&";
            $sms = "sms[0][0]=$msisdn&sms[0][1]=" . urlencode($sms) . "&sms[0][2]=" . $unique_id_1 . "&sms[1][0]=$msisdn2&sms[1][1]=" . urlencode($sms) . "&sms[1][2]=" . $unique_id_2 . "";

            $data = $param . $sms . $sid;
            $crl = curl_init();
            curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($crl, CURLOPT_URL, $url);
            curl_setopt($crl, CURLOPT_HEADER, 0);
            curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($crl, CURLOPT_POST, 1);
            curl_setopt($crl, CURLOPT_POSTFIELDS, $data);
            $response = curl_exec($crl);
            curl_close($crl);
            //echo $response;
           
           
  //ENd SMS API Code here your code          
        
          //Mage::log('obersver custave_after12'.'Mobile=='.$msisdn,null,'SendSmsRegister.log' );
          

         
         
    }

}
?>