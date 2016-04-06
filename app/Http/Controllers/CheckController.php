<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CheckController extends Controller
{
    //
    // background check
      public function postJSON($data){
       $url = 'https://api.imsasllc.com/v3/ ';
       $data_string = json_encode($data);
       $ch = curl_init($url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, array(
           'Content-Type: application/json',
           'Content-Length: ' . strlen($data_string))
       );
       $result = curl_exec($ch);
       curl_close($ch);
       return $result;
   }

   $data=array();
   $data['credentials']=array(
                   'account_id'=>'127998',
                   'api_key'=>'IvezlsE82ZOUH5eRPrdwicKGjn'
                   );
   $data['product']='federal_criminal';
   $data['data']=array(
                   'FirstName' => 'Stevie',            // search by first name 'Stevie'
                   'LastName' => 'Pinero',            // search by last name 'Pinero'
                   'MiddleName'=> 'R',                // search by middle name 'R'
                   'Limit' => 25                    // limit the number of results to 25
                   );

   $json_response = postJSON($data);
   header('Content-type: application/json');
   echo $json_response;
   $this->save($json_response);

}
