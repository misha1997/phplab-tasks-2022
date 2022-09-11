<?php

function generateUrl($key, $value, $page = 1) 
{
    $params = $_GET;
    $params['page'] = $page;
    $params[$key] = $value;
    return '/?' . http_build_query($params);
}