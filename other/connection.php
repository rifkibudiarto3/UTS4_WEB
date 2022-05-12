<?php

$hostDB = 'ec2-3-224-125-117.compute-1.amazonaws.com';
$portDB = '5432';
$nameDB = 'd6ovd4qa01kr3l';
$userDB = 'dgntuhybgvviox';
$pwDB = '5dfcaec0c6894c2cb8e0d72198cb1d8c42d2b11c170e30f6c53ee6c734736d90';

$connection = pg_connect("host=$hostDB port=$portDB dbname=$nameDB user=$userDB password=$pwDB");
session_start();
if($connection){
    
}else{
    
}