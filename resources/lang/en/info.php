<?php

// Web Info
$keys = 'title,short_title,slogan,web_address,email,mobile,address,copyright,logo,favicon';
$info = Info::InfoKey($keys);

return [
    'name'          => $info['title'],
    'short_name'    => $info['short_title'],
    'domain'        => $info['web_address'],
    'email'         => $info['email'],
    'mobile'        => $info['mobile'],
    'slogan'        => $info['address'],
    'copyright'     => $info['copyright'],
    'logo'          => $info['logo'] ?? asset('img/logo.png'),
    'favicon'       => $info['favicon'] ?? asset('img/favicon.png'),
];