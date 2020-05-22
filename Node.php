<?php

class Node
{
    public function __construct($data)
    {
        $this->data = $data;
    }

    public $lNode;
    public $rNode;
    public $data;
}