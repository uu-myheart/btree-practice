<?php

require __DIR__.'/vendor/autoload.php';

$numbers = [1,456,2,57,523,6,8,64,7,34,9,25845,23647,376];

$btree = new BTree($numbers);

$btree->inOrderTraverse();
