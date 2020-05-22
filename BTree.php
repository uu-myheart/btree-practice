<?php

class BTree
{
    public $root;

    /**
     * BTree constructor.
     *
     * @param $items
     */
    public function __construct(array $items)
    {
        $this->addItems($items);
    }

    /**
     * 排序
     *
     * @param $items
     */
    protected function addItems(array $items)
    {
        foreach ($items as $item) {
            $this->addNode($item);
        }
    }

    /**
     * 添加节点
     *
     * @param $item
     * @param null $node
     * @return bool
     */
    public function addNode($item)
    {
        if (! $this->root) {
            $this->root = $this->createNode($item);

            return;
        }

        $this->addNodeRecursive($item, $this->root);
    }

    /**
     * 增加节点
     *
     * @param $item
     * @param $node
     * @param string $son
     * @return bool|null
     */
    protected function addNodeRecursive($item, $node, $son = '')
    {
        if ($son) {
            if (! $node->{$son}) {
                $node->{$son} = $this->createNode($item);
            } else {
                $node = $node->{$son};
            }
        }

        if ($item < $node->data) {
            return $this->addNodeRecursive($item, $node, 'lNode');
        } elseif ($item > $node->data) {
            return $this->addNodeRecursive($item, $node, 'rNode');
        } else {
            return false;
        }
    }

    /**
     * 创建新节点
     *
     * @param $item
     * @return Node
     */
    protected function createNode($item)
    {
        return new Node($item);
    }

    /**
     * 中序遍历
     *
     * @param null|Node $node
     */
    public function inOrderTraverse()
    {
        return $this->inOrderTraverseRecursive($this->root);
    }

    /**
     * 中序遍历(内部递归)
     *
     * @param null|Node $node
     */
    protected function inOrderTraverseRecursive($node)
    {
        if (! $node) {
            return;
        }

        $this->inOrderTraverseRecursive($node->lNode, $this->root);
        echo $node->data."\n";
        $this->inOrderTraverseRecursive($node->rNode, $this->root);
    }

}