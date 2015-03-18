<?php
/**
 * Created by PhpStorm.
 * User: vir-mir
 * Date: 18.03.15
 * Time: 19:06
 */

namespace Tree\Node;

use Tree\TreeInterface;
use Tree\Node\TreeNode;
use Tree\TreesInterface;

class TreeNodes implements TreesInterface, \JsonSerializable {

    /**
     * @var TreeInterface[]
     */
    private $trees;

    /**
     * @var TreeInterface[]
     */
    private $treesParent;


    /**
     * @param array $trees
     * @return $this
     * @throws \Exception
     */
    public function load(array $trees)
    {
        $this->trees = $this->treesParent = [];
        foreach ($trees as $tree)
        {
            $parentId = $tree['parent_id'];
            $id = $tree['node_id'];
            $name = $tree['title'];

            if ($parentId && array_key_exists($parentId, $this->treesParent))
            {
                $parent = $this->treesParent[$parentId];
                $node = new TreeNode($id, $name);
                $parent->setParent($node);
                $this->treesParent[$id] = $node;
            }
            elseif (!$parentId) {
                $this->treesParent[$id] = $this->trees[$id] = new TreeNode($id, $name);
            } else {
                throw new \Exception("Undefined parent node '{$name}'");
            }

        }
        $this->treesParent = [];

        return $this;
    }

    /**
     *
     * @return array
     */
    public function toArray()
    {
        $treesList = [];
        foreach ($this->trees as $tree)
        {
            $treesList[$tree->getId()] = $tree->toArray();
        }

        return $treesList;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}