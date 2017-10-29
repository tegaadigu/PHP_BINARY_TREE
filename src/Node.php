<?php
/**
 * Created by PhpStorm.
 * User: tegaadigu
 * Date: 29/10/2017
 * Time: 9:25 PM
 */

namespace App;


class Node
{
    /**
     * @var null
     */
    protected $leftNode;

    /**
     * @var int
     */
    protected $value;
    /**
     * @var null
     */
    protected $rightNode;

    /**
     * Node constructor.
     * @param $value
     */
    function __construct(int $value)
    {
        $this->value = $value;
        $this->leftNode = null;
        $this->rightNode = null;
    }

    /**
     * @param Node $rightNode
     * @return $this
     */
    public function setRightNode(Node $rightNode)
    {
        $this->rightNode = $rightNode;
        return $this;
    }

    /**
     * @param Node $leftNode
     * @return $this
     */
    public function setLeftNode(Node $leftNode)
    {
        $this->leftNode = $leftNode;
        return $this;
    }

    /**
     * @return Node
     */
    public function getRightNode()
    {
        return $this->rightNode;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return Node
     */
    public function getLeftNode()
    {
        return $this->leftNode;
    }


}