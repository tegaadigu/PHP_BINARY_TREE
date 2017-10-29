<?php

namespace App;

use App\Traversals\InOrder;
use App\Traversals\TraversalsInterface;

class BinaryTree
{
    const RIGHT = 1;
    const LEFT = 2;
    public $root;

    /**
     * BinaryTree constructor.
     * @param Node $node
     */
    function __construct(Node $node = null)
    {
        $this->root = $node;
        $this->traversalStrategy = new InOrder();
    }

    /**
     * @param int $value
     */
    public function insert(int $value)
    {
        if ($this->root === null) {
            $this->root = new Node($value);
        } else {
            $this->processComplexInsertion($this->root, $value);
        }
    }

    /**
     * @param TraversalsInterface $treeTraversal
     */
    public function applyTraverseStrategy(TraversalsInterface $treeTraversal)
    {
        $this->traversalStrategy = $treeTraversal;
    }

    public function traverse()
    {
        echo 'Traversing Tree '.get_class($this->traversalStrategy).PHP_EOL;
        $this->traversalStrategy->traverse($this->root);
    }

    /**
     * @return null
     */
    public function getTree()
    {
        return $this->root;
    }

    /**
     * @param int $value
     * @param bool $root
     * @return int
     */
    public function search(int $value, $root = false)
    {
        $rootNode = $root === false ? $this->root : $root;
        if ($rootNode === null) {
            return -1;
        }
        if ($value == $rootNode->getValue()) {
            return $value;
        } else {
            if ($value > $rootNode->getValue()) {
                return $this->search($value, $rootNode->getRightNode());
            } else {
                return $this->search($value, $rootNode->getLeftNode());
            }
        }
    }

    /**
     * @param $node
     * @param $value
     * @param $position
     */
    private function traverseAndInsert(Node $node, $value, int $position)
    {
        switch ($position) {
            case self::RIGHT:
                if ($node->getRightNode()) {
                    $this->processComplexInsertion($node->getRightNode(), $value);
                } else {
                    $node->setRightNode(new Node($value));
                }
                break;
            case self::LEFT:
                if ($node->getLeftNode()) {
                    $this->processComplexInsertion($node->getLeftNode(), $value);
                } else {
                    $node->setLeftNode(new Node($value));
                }
                break;
        }
    }

    /**
     * @param $root
     * @param $value
     */
    private function processComplexInsertion(Node $root = null, $value)
    {
        if($root === null) {
            return;
        }

        if ($value > $root->getValue()) {
            $this->traverseAndInsert($root, $value, self::RIGHT);
        } else {
            $this->traverseAndInsert($root, $value, self::LEFT);
        }
    }

    public function print()
    {
        print_r($this->root);
    }

}
    
