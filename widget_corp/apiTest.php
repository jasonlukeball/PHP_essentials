<?php
// Set your API key and secret here. Change the subdomain to the one chosen in Addon Setup.
$api_key        = '293b7df4416c31d6d0f31f20fa9a680307b0a965';
$api_secret     = 'b18373ba5c7b1ee79987cefed0e7786ffcf96dfc';
$api_url        = 'https://you.mystreamtime.com/api/streamtime/1.1/jobs/';

$post_data = array(
    'key' => $api_key,
    'xml' => ''
);
$post_body = http_build_query( $post_data );

// Generate the request signature string.
$api_signature = base64_encode( hash_hmac( "sha1", $post_body, $api_secret, true ) );

$headers = array(
    'Accept: application/json',                // Or application/xml
    'X-Request-Signature: '.$api_signature
);


$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $api_url.'?'.$post_body );
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

$data = curl_exec($ch);
curl_close($ch);

if( $data ){

    // Decode JSON response.
    $result = json_decode( $data );
    print_r ($data);

    // Or use an XML parser if you changed the 'Accepts' header to xml.
    // $result = simplexml_load_string( $data );

} else {
    echo curl_error( $ch );
}
?>