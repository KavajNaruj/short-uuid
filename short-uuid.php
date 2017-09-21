<?php

// encode
$uuid = '00024bbf-e4b0-471c-b198-1b60b0040c19';
$data = pack('H*', str_replace('-', '', $uuid));
$str = rtrim(base64_encode($data), '=');

// decode
$data = base64_decode($str);
$unpack = unpack('H*', $data);
$data = array_shift($unpack);
$components = [
    substr($data, 0, 8),
    substr($data, 8, 4),
    substr($data, 12, 4),
    substr($data, 16, 4),
    substr($data, 20)
];
$uuid2 = implode('-', $components);

// output
echo $uuid . ' -> ' . $str . ' -> ' . $uuid2;
echo " -> " . strlen($uuid) . ":" . strlen($str);
exit ;
