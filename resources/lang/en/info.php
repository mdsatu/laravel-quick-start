<?php

// Web Info
$keys = 'title,short_title,slogan,web_url,email,mobile,address,copyright,logo,favicon';
$info = Info::InfoKey($keys);

return [
    'title'         => $info['title'],
    'short_title'   => $info['short_title'],
    'slogan'        => $info['slogan'],
    'web_url'       => $info['web_url'],
    'email'         => $info['email'],
    'mobile'        => $info['mobile'],
    'address'       => $info['address'],
    'copyright'     => $info['copyright'],
    'logo'          => $info['logo'] ? asset('uploads/info/' . $info['logo']) : asset('img/logo.png'),
    'favicon'       => $info['favicon'] ? asset('uploads/info/' . $info['favicon']) : asset('img/favicon.png'),
];