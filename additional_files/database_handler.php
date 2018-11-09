<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "rocketblocks_challenge";

$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);













//
// if(isset($_POST["data"]))
// {
//   $data = $_POST["data"];
//   $query = '',
//
//   for($count = 0; $count<count($data); $count ++)
//   {
//     $data_clean = mysqli_real_escape_string($connect, $data[$count])
//
//     if($data_name_clean != '')
//     {
//       $query .= '
//       INSERT INTO brainstorm_responses(answer)
//       VALUES("'.$data_clean.'");';
//     }
//
//
//   }
//   if($query != '')
//   {
//     if(mysqli_multi_query($connect, $query))
//     {
//       echo 'Item Data Inserted';
//     }
//     else
//     {
//       echo 'error';
//     }
//   }
//   else
//   {
//     echo 'This field is empty';
//   }
// }
















 ?>
