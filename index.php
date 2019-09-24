<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();

$names = array(
    'ML' => 'Коля',
    'OK' => 'Саша',
    'OL' => 'Олег',
    'MP' => 'Міша',
    'YL' => 'Юра',
    'IL' => 'Ігор',
);

if(isset($_POST['participants'])){
    $counter = 0;
    foreach ($_POST['participants'] as $key=>$value){
        if($_POST['winner'] != 'none'){
            if($value == $_POST['winner']){
                $winningNumbers[$counter] = $names[$value];
                $counter = $counter + 1;
            }else{
                $winningNumbers[$counter] = $winningNumbers[$counter + 1] = $names[$value];
                $counter = $counter + 2;
            }
        }else{
            $winningNumbers[$counter] = $winningNumbers[$counter + 1] = $names[$value];
            $counter = $counter + 2;
        }
    }

    $winNum = $rand = rand(0,$counter - 1);
    $happyWinner = $winningNumbers[$winNum];
}

include 'index.html';
