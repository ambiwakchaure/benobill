<?php

    require("connection.php");

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, POST, DELETE, OPTIONS");
    header('Access-Control-Max-Age: 86400');
    header("Access-Control-Expose-Headers: Content-Length, X-JSON");
    header("Access-Control-Allow-Headers: *");

    $RESPONSE = array();

    $QUERY = "SELECT * FROM tbl_types";
    $EXE_QUERY = mysqli_query($con,$QUERY) or die("error 1");

    if(mysqli_num_rows($EXE_QUERY))
    {
        while($row = mysqli_fetch_assoc($EXE_QUERY))
        {
            $row_data [] = $row;
        }
        $RESPONSE['success'] = '1';
        $RESPONSE['types'] = $row_data;
        echo(json_encode($RESPONSE));
    }
    else
    {
        $RESPONSE['success'] = '0';
        echo(json_encode($RESPONSE));
    }
?>