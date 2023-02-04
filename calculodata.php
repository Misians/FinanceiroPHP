<?php
$date1=date_create("2016-07-10");
$date2=date_create("2017-08-13");
$diff=date_diff($date1,$date2);
echo $diff->format("%a");
?>

<?php
    $datea = '1986-10-03';
    $datea = '1990-10-03';
    $timeA = strtotime($dateA);
    $timeB = strtotime($dateB);
?>