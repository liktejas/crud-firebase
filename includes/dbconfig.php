<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount(__DIR__.'/crud-7ea57-firebase-adminsdk-2fope-e466c5f06c.json')->withDatabaseUri('https://crud-7ea57-default-rtdb.firebaseio.com/contact');
$database = $factory->createDatabase();
?>