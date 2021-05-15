<html lang="en">
  <head>
    <title>Orders - IIIT MANIPUR</title>
  </head>
</html>


<?php

include('../../config/config.inc.php');
include('../../init.php');

$venue_id = $_POST['venue_id'];
$total_price = $_POST['price'];
$checkin = $_POST['room_check_in'];
$checkout = $_POST['room_check_out'];

$img = 'views/img/'.$venue_id.'.jpg';


$venue = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'a_iiitm_venue_details where id = '.$venue_id);

$x = $venue[0]['name'];
$features = Db::getInstance()->executeS('SELECT feature FROM '._DB_PREFIX_."a_iiitm_venue_features where venue_name = '$x' ");
foreach($features as $feature)
{
    $ftr[] = $feature['feature'];
}

$venue_name = $venue[0]['name'];
$venue_price = $venue[0]['price'];



if(isset($_POST['checkout']))
{
    $venue_id = $_POST['venue_id'];
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_name = $user_firstname." ".$user_lastname;
    $user_email = $_POST['email'];

    $user_mobile_STR = $_POST['mobile'];  //STRING
    $user_mobile = (int)$user_mobile_STR; //INT

    $checkin = $_POST['check_in'];
    $checkout = $_POST['check_out'];
    $order_reference = $_POST['order_reference'];    


    $venue = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'a_iiitm_venue_details where id = '.$venue_id);

    $venue_name = $venue[0]['name'];
    $venue_price = $venue[0]['price'];


    $userData = array(
        'firstname' => $user_firstname,
        'lastname' => $user_lastname,
        'email' => $user_email,
        'mobile' => $user_mobile
     );
    $checkpoint1 = Db::getInstance()->insert('a_iiitm_user_details', $userData);

 
    $bookingData = array(
        'customer_email' => $user_email,
        'customer_name' => $user_name,
        'venue_id' => $venue_id,
        'venue_name' => $venue_name,
        'checkin' => $checkin,
        'checkout' => $checkout,
        'order_reference' => $order_reference
    );
    $checkpoint2 = Db::getInstance()->insert('a_iiitm_venue_booking_details', $bookingData);
    

    if($checkpoint1 && $checkpoint2)
    {
        $redirect =  Tools::getHttpHost(true).__PS_BASE_URI__;
        echo"<div style='width:1000px;height:800px;display:block;margin:auto;margin-top:60px;box-shadow: 1px 1px 18px 15px rgba(0,0,0,0.20);text-align:center;padding:10px;font-weight:normal'>";
        echo"<h1 style='margin-top:10%;color:#26bd01;font-size:40px'>Booking Confirmed!</h1>";
        echo"<div style='width:600px;height:400px;margin:auto;margin-top:60px;box-shadow: 1px 1px 18px 15px rgba(0,0,0,0.20);padding:50px;font-weight:normal'>";
        echo"<div style='display:flex;justify-content:space-around'>";
        echo"<img src='{$img}' style='width:100px;height:100px;'>";
        echo "<p style='font-size:20px;color:#013cbd'>$venue_name</p>";
        $date = $checkin." ➖ ".$checkout;
        echo "<p style='padding-top:1.1%;color:#013cbd'>$date</p>";
        echo"</div>";
        echo "<p style='font-size:15px'>NAME : $user_name</p>";
        echo "<p style='font-size:15px'>EMAIL : $user_email</p>";
        echo "<p style='font-size:15px'>MOBILE : $user_mobile</p>";
        echo "<p style='font-size:15px'>Order Reference : $order_reference</p>";
        echo"<a style='width:130px;height:40px;color:white;' href='$redirect'>
        	<button style='width:100px;height:35px;cursor:pointer;border:1px solid white;border-radius:20px;background-color:#1457e7;color:white;font-weight:bold'>DONE</button>
            </a>";
        echo"</div>";
        echo"</div>";
    }


    ?>
    
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

  
<?php
}

else
{
if(isset($venue_id))
{
    function gen_reference($length_of_string) 
    {  
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 

        return substr(str_shuffle($str_result), 0, $length_of_string); 
    } 
    $order_reference = gen_reference(12);


    echo"<div style='width:1000px;height:840px;display:block;margin:auto;margin-top:40px;box-shadow: 1px 1px 18px 15px rgba(0,0,0,0.20);text-align:center;padding:10px;font-weight:normal'>";
    echo"<h4 style='margin-left:-780px;font-weight:normal;display:inline-block'>Venue & Price Summary</h4>";
    echo"<div style='display:flex;margin:10px;justify-content:space-between;margin-right:200px'>";
    echo"<div style=''>";
    echo"<img src='{$img}' style='width:200px;height:200px'>";
    echo"</div>";    
    echo"<div style='margin-left:20px'>";
    echo"<h2 style='font-weight:normal;margin-top:0'>$venue_name</h2>";
    foreach($ftr as $x)
    {
        echo"<div style='display:inline-block;margin:1px 10px;border:1px solid black;padding:4px;background:#eee;color:black;border-radius:20px;font-size:13px;font-weight:normal;margin-bottom:15px'><span style='color:#09d109'>✔</span>{$x}</div>";
    }
    echo"<div style='display:flex;justify-content:space-between;margin-left:10%'>";
        echo"<div>";
            echo"<br><br> <h1 style='font-weight:normal;color:#0e48e9;margin-top:0'>$total_price</h1>";
            echo"<p style='font-size:12px;color:grey'>Total Venue Price</p>";
            echo"<p style='font-size:12px;color:grey'>(Incl.) all taxes.</p>";
        echo"</div>";

        echo"<div style='width:50%;margin-top:5%'>";
        $date = $checkin." - ".$checkout;
        echo "<p style='color:#0e48e9;font-size:18px;'>$date</p>";
        echo"</div>";

    echo"</div>";


    echo"</div>";
    echo"</div>";
    
    
    echo"<h4 style='margin-left:-880px;font-weight:normal;display:inline-block;'>Your Details</h4>";
    
    echo"<form method='POST'>";
    echo "<div style='margin-left:30px;margin-top:-20px'>";

    echo"<input type='hidden' value='$venue_id' name='venue_id'>";
    echo"<input type='hidden' value='$checkin' name='check_in'>";
    echo"<input type='hidden' value='$checkout' name='check_out'>";
    echo"<input type='hidden' value='$order_reference' name='order_reference'>";

    echo "<p style='color:black;margin-bottom:-10px'>First Name:</p><br>";
    echo "<input style='padding:5px;margin-bottom:10px' type='text' name='firstname' required>";
    echo "<p style='color:black;margin-bottom:-10px'>Last Name:</p><br>";
    echo "<input style='padding:5px;margin-bottom:10px' type='text' name='lastname' required><br>";
    echo "<p style='color:black;margin-bottom:-10px'>Email:</p><br>";
    echo "<input style='padding:5px;margin-bottom:10px' type='email' name='email' placeholder='abc@gmail.com' required>";
    echo "<p style='color:black;margin-bottom:-10px'>Mobile:</p><br>";
    echo "<input style='padding:5px;margin-bottom:10px' type='text' name='mobile' pattern='\d{10}' placeholder='0123456789' required><br>";
    echo"<button type='submit' name='checkout' style='margin-top:1%;border:1px solid white;width:130px;height:40px;border-radius:20px;background-color:#17c717;color:white;font-weight:bold;cursor:pointer'>Book Now</button>";
    echo"</form";
    
    
    
    echo "</div>";
}
else
{
	$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    	$redirect = substr($current_url, 0, strpos($current_url, "modules"));
    	header("Location: ".$redirect);
}
}
