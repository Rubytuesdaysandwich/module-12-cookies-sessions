<?php 
require_once('../private/initialize.php');
    //set default value of variables for initial page load
    if (!isset($investment)) { $investment = ''; } 
    if (!isset($interest_rate)) { $interest_rate = ''; } 
    if (!isset($years)) { $years = ''; } 
    
    ?> 

<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
<?php

//$expires_time = time()+60*60*24*2;//* note to self number of seconds since 1970
// if(is_post_request()){
    //!moved to display.php
    // //tracking if form is submitted
    //     $investment=$_POST['investment'] ?? '0';
    //     $interest_rate=$_POST['interest_rate']??'0';
    //     $years=$POST['years']??'0';
    //     $expires_time;
    //     setcookie('investment',$investment,$expires_time,"/");
    //     setcookie('interest_rate',$interest_rate,$expires_time,"/");
    //     setcookie('years',$years,$expires_time,"/");
    // }

    if(is_get_request()){//if it is a get request then this will put the previous values into the form.

        $investment= $_SESSION['investment'] ??'';
        $interest_rate= $_SESSION['interest_rate'] ??'';
        $years= $_SESSION['years'] ??'';


    }

?>

    <main>
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>
    <form action="display_results.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <input type="text" name="investment"
                   value="<?php echo htmlspecialchars($investment); ?>">
            <br>

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php echo htmlspecialchars($interest_rate); ?>">
            <br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo htmlspecialchars($years); ?>">
            <br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"><br>
        </div>

    </form>
    </main>
</body>
</html>