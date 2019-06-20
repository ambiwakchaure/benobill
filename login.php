<?php

    require("connection.php");
    // header("Access-Control-Allow-Origin: *"); 
    // header("Access-Control-Request-Methods: *"); 
    // header("Access-Control-Allow-Headers: *"); 
    // header("Content-type:application/json");

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, POST, DELETE, OPTIONS");
    header('Access-Control-Max-Age: 86400');
    header("Access-Control-Expose-Headers: Content-Length, X-JSON");
    header("Access-Control-Allow-Headers: *");

    $RESPONSE = array();

    $username = $_POST['username'];
    $password = $_POST['password'];

    // $username = "sns";
    // $password = "sns";

    $QUERY = "SELECT * FROM tbl_users WHERE username ='$username' AND password = '$password '";
    $EXE_QUERY = mysqli_query($con,$QUERY) or die("error 1");

    if(mysqli_num_rows($EXE_QUERY))
    {
        if($row = mysqli_fetch_assoc($EXE_QUERY))
        {
            $row_data [] = $row;
        }
        $RESPONSE['success'] = '1';
        $RESPONSE['message'] = 'Success ! user login';
        $RESPONSE['data'] = $row_data;
        echo(json_encode($RESPONSE));
    }
    else
    {
        $RESPONSE['success'] = '0';
        $RESPONSE['message'] = 'Oops ! user account not found';
        echo(json_encode($RESPONSE));
    }
    

     
?>