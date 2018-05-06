<?php
require_once '../config.php';
require_once 'db4ever.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$obj = new db4ever;
$data = $obj->query(1);
$res = array();
foreach ($data as $k => $v)
{
    $res[] = htmlspecialchars($v['e'], ENT_QUOTES) . ' - ' . htmlspecialchars($v['f'], ENT_QUOTES);
    
//    break;
}

echo json_encode($res);
