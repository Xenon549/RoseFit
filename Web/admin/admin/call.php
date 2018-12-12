<?php

$link = file_get_contents('http://120.110.113.61:3000/website/test');

$data = json_decode($link);

echo $data -> status;


?>