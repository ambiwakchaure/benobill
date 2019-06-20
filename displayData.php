<?php

    require("connection.php");
    header("Access-Control-Allow-Origin: *");
    header("Content-type:application/json");
    $RESPONSE = array();

    $QUERY = "SELECT * FROM tbl_demo";
    $EXE_QUERY = mysqli_query($con,$QUERY) or die("error 1");

    if(mysqli_num_rows($EXE_QUERY))
    {
        while($row = mysqli_fetch_assoc($EXE_QUERY))
        {
            $row_data [] = $row;
        }
        $RESPONSE['success'] = '1';
        $RESPONSE['data'] = $row_data;
        echo(json_encode($RESPONSE));
    }
    else
    {
        $RESPONSE['success'] = '0';
        echo(json_encode($RESPONSE));
    }

     
?>