<?php
/**
 * Created by PhpStorm.
 * User: tegaadigu
 * Date: 29/10/2017
 * Time: 9:24 PM
 */

namespace App\Traversals;

use App\Node;

/**
 * Interface TraversalsInterface
 * @package App\Traversals
 */
interface TraversalsInterface
{
    /**
     * @param Node $node
     * @return mixed/void
     */
    public function traverse(Node $node);
}