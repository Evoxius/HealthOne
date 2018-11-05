<?php

require __DIR__ . '/vendor/autoload.php';


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('logging');
$streamHandler=new StreamHandler('app.log.html', Logger::WARNING);
$streamHandler->setFormatter(new \Monolog\Formatter\HtmlFormatter());
$log->pushHandler($streamHandler);

$log->warning('ingelogd',['Jan van Vliet'=>'gebruiker']);
$log->error('1e inlog-poging',['Piet van Tol'=>'wachtwoord incorrect']);