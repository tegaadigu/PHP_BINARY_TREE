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
 * Class PostOrder
 * @package App\Traversals
 */
class PostOrder implements TraversalsInterface {

    /**
     * @param Node $node
     * @return mixed
     */
    public function traverse(Node $node) {
        if($node->getLeftNode()) {
            $this->traverse($node->getLeftNode());
        }
        if($node->getRightNode()) {
            $this->traverse($node->getRightNode());
        }
        echo $node->getValue().', ';
    }
}