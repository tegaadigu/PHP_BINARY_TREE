<?php
/**
 * Created by PhpStorm.
 * User: tegaadigu
 * Date: 29/10/2017
 * Time: 9:39 PM
 */

namespace tests;

use App\Node;
use PHPUnit\Framework\TestCase;


use App\BinaryTree;

class BinaryTreeTest extends TestCase
{
    /**
     * @var $binaryTree
     */
    protected $binaryTree;

    public function setUp()
    {
        $this->binaryTree = new BinaryTree();
    }

    /**
     * @test
     * @dataProvider provideShouldPopulateBinaryTree
     * @param array $insertion
     * @param Node $expectedNode
     */
    public function shouldPopulateBinaryTree(array $insertion, Node $expectedNode)
    {
        $mockedTree = $this->createMock(BinaryTree::class);
        $mockedTree->method('getTree')->willReturn($expectedNode);
        foreach ($insertion as $value) {
            $this->binaryTree->insert($value);
        }
        self::assertEquals($this->binaryTree->getTree(), $mockedTree->getTree());
    }

    /**
     * @return array
     */
    public function provideShouldPopulateBinaryTree()
    {
        return [
            [
                'insertion' => [1],
                'expected'  => $this->createNode(1),
            ],
            [
                'insertion' => [5, 3, 2],
                'expected'  => $this->createNode(5)
                                    ->setLeftNode(
                                        ($this->createNode(3))->setLeftNode($this->createNode(2))
                                    ),
            ],
            [
                'insertion' => [3, 4, 2],
                'expected'  => $this->createNode(3)
                                    ->setRightNode($this->createNode(4))
                                    ->setLeftNode($this->createNode(2)),
            ],
        ];
    }

    /**
     * @param int $value
     * @return Node
     */
    private function createNode(int $value)
    {
        return new Node($value);
    }

}