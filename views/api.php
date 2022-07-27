<?php

function encontrar_usuario_ss($dni, $email){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://app.smartfit.com.br/api/public/v1/person_session',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{ "login": "'.$dni.'","authentication_field": "email", "authentication_value": "'.$email.'"
  }',
    CURLOPT_HTTPHEADER => array(
      'Authorization: Token token=1c01110e0f6d6c6cda0f4557c3458c92',
      'Content-Type: application/json'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  // echo $response;
  
  // $registrado = '{"auth_token":"AWnIi0zFVQg83iJ7hn"}';
  // $no_registrado = '{"errors":"invalid_login"}'; // necesitamos esto, porque no está registrado

  $pattern = "/invalid/i";

  // echo preg_match($pattern, $response);
  // necesitamos de respuesta un uno
  return preg_match($pattern, $response); // devuelve un entero
}
// encontrar_usuario_ss("7413w8743", "fabioleofc@gmail.com");
?>
