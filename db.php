<?php

$pdo = new PDO('postgres://kormjsjhynjjfj:67135a414a33b079b24e41b88bf8a01760c6be3c7b4c81ae04671dd5b2ec164d@ec2-54-154-101-45.eu-west-1.compute.amazonaws.com:5432/dck3ohp8rfuha0');

$sql = file_get_contents('./dump.sql');

$query = $pdo->query($sql);

var_dump($query->execute());