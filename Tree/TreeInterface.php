<?php

namespace Tree;


interface TreeInterface {

    /**
     * @return array
     */
    public function toArray();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return null|TreeInterface
     */
    public function getParents();

    /**
     * @return int
     */
    public function getId();

    /**
     * @param TreeInterface $node
     */
    public function setParent(TreeInterface $node);
}
