<?php
session_start();

define('PAYPAL_API_URL', 'https://api-m.sandbox.paypal.com');

$PAYPAL = array(
    'client_id' => 'AQRFsNpy5kE4lIbjaxXL4Uwv8qFXm6j6MAvkiyCFXxw33y0ZuemGGWHvBE6dQtdSSpO8Sh84K9zOYmgr',
    'client_secret' => 'EL1focgPHdQTnNY06ssHWf_ZSTs4im5XqbkVVC5oQjSPAURh3-ioJTU8u7kTg3AlklvqxB5jJXdfgedV',
    'redirect_uri' => 'http://localhost/php-knights/Knights-Club/mohammad-payment/thankyou.php'
);
$price = $_POST['price'];

get_token($PAYPAL);
$headache = $_SESSION['order']['id'];
//print $_SESSION['paypal']['token'];
create_order($PAYPAL, $price);

if (isset($_SESSION['order']['id']))
    capture_order($headache);

function get_token($config) {
    $url = PAYPAL_API_URL . '/v1/oauth2/token';
    $headers = array(
        'Accept: application/json',
        'Accept-Language: en_US'
    );
    //-H corresponds to HTTPHEADER
    //-u corresponds to USERPWD (make sure there are no extra spaces in the value--i.e. no spaces before and after the colon)
    //-d corresponds to POSTFIELDS
    //add CURLOPT_SSL_VERIFYPEER false, CURLOPT_SSL_VERIFYHOST false if not using HTTPS and it doesn't work
    //CURLOPT_POST is true for POST, false for GET
    //CURLOPT_RETURNTRANSFER must be "true" if you want to receive the result in a variable
    $opts = array(
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_USERPWD => $config['client_id'] . ':' . $config['client_secret'],
        CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
        CURLOPT_RETURNTRANSFER => true
    );
    $c = curl_init(); //initialize curl session
    curl_setopt_array($c, $opts); //set curl options
    $result = json_decode(curl_exec($c)); //execute request with curl_exec()
    $_SESSION['paypal']['token'] = $result->access_token;
    curl_close($c);
}

function create_order($config, $total) {
    $url = PAYPAL_API_URL . '/v2/checkout/orders';
    $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer " . $_SESSION['paypal']['token']
    );
    $data = array(
        "intent" => "CAPTURE",
        "purchase_units" => array(
            array(
                "amount" => array(
                    "currency_code" => "CAD",
                    "value" => (string)$total
                )
            )
        ),
        "application_context" => array(
            "brand_name" => "Knights Club Store",
            "user_action" => "PAY_NOW",
            "return_url" => $config['redirect_uri']
        )
    );
    $opts = array(
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_RETURNTRANSFER => true
    );
    $c = curl_init();
    curl_setopt_array($c, $opts);
    $result = json_decode(curl_exec($c));
    print "<a href='" . $result->links[1]->href . "'>Continue to Paypal</a>";

    //var_dump($result);
    $_SESSION['order']['id'] = $result->id;
    //print_r($_SESSION['paypal']['id']);
}


function capture_order($param){
    $url = PAYPAL_API_URL . '/v2/checkout/orders/' . $param . '/capture';
    $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer " . $_SESSION['paypal']['token']
        );
        $opts = array(
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true
        );
        $c = curl_init();
        curl_setopt_array($c, $opts);
        $result = json_decode(curl_exec($c));
        curl_close($c);
        var_dump($result->status);
}







