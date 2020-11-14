<?php 
$date = date_create("2020-11-09"); 
date_add($date,date_interval_create_from_date_string("3 day"));
    $date=date_format($date,"Y-m-d");
    echo $date;

 ?>
