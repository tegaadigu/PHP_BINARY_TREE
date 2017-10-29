<?php

namespace App\Traversals;

use App\Node;

/**
 * Class BreadthFirst
 * @package App\Traversals
 */
class BreadthFirst implements TraversalsInterface
{

    /**
     * @param $node
     * @return int
     */
    private function getHeight(Node $node)
    {
        if ($node === null) {
            return 0;
        }
        $leftHeight = $this->getHeight($node->getLeftNode());
        $rightHeight = $this->getHeight($node->getRightNode());

        return $leftHeight > $rightHeight ? $leftHeight + 1 : $rightHeight + 1;
    }

    /**
     * @param Node $node
     * @return mixed|void
     */
    public function traverse(Node $node)
    {
        $height = $this->getHeight($node);
        echo 'height of tree '.$height.PHP_EOL;
        for ($i = 1; $i < $height + 1; $i++) {
            $this->printLevel($node, $i);
        }
    }

    /**
     * @param $node
     * @param int $level
     */
    private function printLevel(Node $node, int $level)
    {
        if ($node === null) {
            return;
        }
        if ($level === 1) {
            echo $node->getValue().',';
        } else {
            if ($level > 1) {
                $this->printLevel($node->getLeftNode(), $level - 1);
                $this->printLevel($node->getRightNode(), $level - 1);
            }
        }
    }
}