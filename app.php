<?php
include __DIR__ . '/vendor/autoload.php';

use App\BinaryTree;
use App\Traversals\InOrder;

$tree = new BinaryTree();
$tree->insert(3);
$tree->insert(2);
$tree->insert(4);
$tree->insert(1);
$tree->print();
echo 'Search Tree found '.$tree->search(2).PHP_EOL;

$tree->applyTraverseStrategy(new InOrder());
$tree->traverse();