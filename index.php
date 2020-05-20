<?php

require __DIR__.'/vendor/autoload.php';

$numbers = [1,456,2,57,523,6,8,64,7,34,9,25845,23647,376];

$btree = new BTree();

dd($btree);

function addNode(int $item) {
    if (! $btree->root) {
        $btree->root = createNode($item);

        return;
    }

    if ($item < $btree->root->data) {
        addNode();
    }
}

function createNode($data) {
    $node = new Node();

    $node->data = $data;

    return $node;
}