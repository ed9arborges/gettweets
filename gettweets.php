<?php

/////by Edgar Borges

require 'defines.php';
require CLASSES_TWITTER;
require CLASSES_WRITER;

$obj_twitter = new twitter($argv[1]);
$obj_writer = new writer();

$obj_twitter->set_url_options('&include_rts=0&count=50'); //setted for no retweets and limited to 50 records
$src_data=$obj_twitter->gettweets(URL_TWITTER_API);

$obj_writer->wr_file($argv[1],$src_data);



?>