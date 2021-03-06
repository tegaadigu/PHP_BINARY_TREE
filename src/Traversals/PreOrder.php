<?php
/**
 * Created by PhpStorm.
 * User: tegaadigu
 * Date: 29/10/2017
 * Time: 9:27 PM
 */

namespace App\Traversals;

use App\Node;

/**
 * Class PreOrder
 * @package App\Traversals
 */
class PreOrder implements TraversalsInterface
{
    /**
     * @param Node $node
     * @return mixed|void
     */
    public function traverse(Node $node)
    {
        echo $node->getValue().', ';
        if ($node->getLeftNode()) {
            $this->traverse($node->getLeftNode());
        }
        if ($node->getRightNode()) {
            $this->traverse($node->getRightNode());
        }
    }
}
