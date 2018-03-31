<?php
require_once '../config.php';
require_once 'db4ever.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$obj = new db4ever;
$data = [$_SERVER['DOCUMENT_ROOT'] . '/config.php'=>$obj->query(0)];

echo json_encode($data);
