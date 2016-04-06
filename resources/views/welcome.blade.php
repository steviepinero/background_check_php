<?php
function postJSON($data){
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
                       'account_id'=>'127999',
                       'api_key'=>'oVuiZ6gfhwT41MoBJDMUyS6y4B'
                       );
       $data['product']='federal_criminal';
       $data['data']=array(
                       'FirstName' => 'John',            // search by first name 'John'
                       'LastName' => 'Smith',            // search by last name 'Smith'
                       'MiddleName'=> 'A',                // search by middle name 'A'
                       'Limit' => 25                    // limit the number of results to 25
                       );

       $json_response = postJSON($data);
       header('Content-type: application/json');
       echo $json_response;
      //  $this->save($json_response); <~~~ will save the data but display the html as plain text, moved logic into controller. Need to figure out how to call the controller. Still very new to php.
       ///////////////////////////////////////////////////
       //TODO save the response to Postgresql database


?>

 <!-- curl -d
 '{
     "credentials": {
         "account_id": "127999",
         "api_key": "oVuiZ6gfhwT41MoBJDMUyS6y4B"
     },
     "product": "federal_criminal",
     "data": {
         "FirstName": "Stevie",
         "LastName": "Pinero",
         "MiddleName": "R",
         "Limit": 25
     }
 }' https://api.imsasllc.com/v3/ -->

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
        .error{
background: none repeat scroll 0 0 #EECACA;
color: #302E2E;
font-weight: bold;
padding: 10px;
width: 95%;
}

.ubc_main_table{
background: none repeat scroll 0 0 #DEDDDD;
color: #000000;
margin: 20px 0;
width: 95%;
}

.ubc_main_table .tr_left{
background: #cfcfcf;
padding: 5px;
font-weight: bold;
}

.ubc_main_table .tr_right{
background: #eee;
padding: 5px;
}

.ubc_sub_table{
width: 100%;
}

.ubc_sub_table .tr_header{
background: #A9A9A9;
padding: 5px;
font-weight: bold;
}

.ubc_sub_table .tr_data{
background: #eee;
padding: 5px;
}

.tr_head_highlight{
background: #8AA5D6 !important;
}
.tr_data_highlight{
background: #C5D4EF !important;
}

.ubc_user_info p{
font-weight: bold;
}
.ubc_user_info{
background: none repeat scroll 0 0 #DEDDDD;
font-weight: bold !important;
padding: 10px;
width: 93%;
}

.ubc_user_info input[type='button']{
width: 75px;

}

.ubc_user_info a{
text-decoration: none;
}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
                <form action="">
                <input type="text" name="location" value="">
              <button type="submit">submit </button> </form>

            </div>
        </div>
    </body>
</html>
