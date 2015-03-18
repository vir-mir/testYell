<?php
/**
 * Created by PhpStorm.
 * User: vir-mir
 * Date: 18.03.15
 * Time: 19:10
 */

namespace Tree\Node;

use Tree\TreeInterface;

class TreeNode implements TreeInterface {
    private $nodeId,
            $nodeName,
            $param;

    /**
     * @var TreeNode[]
     */
    private $parentsNode;

    /**
     * @param int $nodeId
     * @param string $nodeName
     * @param null|mixed $param
     */
    public function __construct($nodeId, $nodeName, $param = null) {
        $this->nodeId = $nodeId;
        $this->nodeName = $nodeName;
        $this->parentsNode = [];
        $this->param = $param;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->nodeName;
    }

    /**
     * @return null|TreeInterface
     */
    public function getParents()
    {
       return $this->parentsNode;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->nodeId;
    }

    /**
     * @param TreeInterface $node
     */
    public function setParent(TreeInterface $node)
    {
        $this->parentsNode[$node->getId()] = $node;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->getArray($this);
    }


    /**
     * @param TreeNode $node
     * @return array
     */
    private function getArray(TreeNode $node)
    {
        $nodeList = [
            'id' => $node->getId(),
            'name' => $node->getName(),
        ];

        if ($parents = $node->getParents())
        {
            $nodeList['parents'] = [];
            foreach ($parents as $parent)
            {
                $nodeList['parents'][$parent->getId()] = $this->getArray($parent);
            }
        }

        return $nodeList;
    }
}