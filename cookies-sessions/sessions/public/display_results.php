<?php
require_once('../private/initialize.php');

$investment=0;
$interest_rate=0;
$years=0;
   if(isset($_POST['investment'])||isset($_POST['interest_rate'])||isset($_POST['years'])) //define the index of $_POST
   {
    $investment = $_POST["investment"];//define $_POST global variable 
    $interest_rate = $_POST["interest_rate"];//define $_POST global variable 
    $years = $_POST["years"];//define $_POST global variable 
   }
//isset($_POST['investment']) ? $_POST['investment']:'';
    // get the data from the form
    //$expires_time = time()+60*60*24*2;//* note to self number of seconds since 1970
    if(is_post_request()){
        //tracking if form is submitted
            $investment=$_POST['investment'] ?? '';
            $interest_rate=$_POST['interest_rate']??'';
            $years=$_POST['years']??'';
            //if it is a post request this will get value for the session
            $_SESSION['investment'] =$investment;
            $_SESSION['interest_rate'] =$interest_rate;
            $_SESSION['years'] =$years;

        }else{
            //if not postrequest it will output them
            $investment=$_SESSION['investment'] ??'';
            $interest_rate=$_SESSION['interest_rate'] ??'';
            $years=$_SESSION['years'] ??'';
        }
  

    // validate investment inputs here
    $error_message="";
    if(is_post_request()){

        $error_message = validate($investment,$interest_rate,$years);
    }
   //echo display_errors($errors);
    

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit(); }

    // calculate the future value
    $future_value = $investment;
    for ($i = 1; $i <= $years; $i++) {
        $future_value = 
            $future_value + ($future_value * $interest_rate * .01); 
    }

    // apply currency and percent formatting
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>
        <button> <a href="index.php"style="text-decoration:none;">return</a></button>
    </main>
</body>
</html>
