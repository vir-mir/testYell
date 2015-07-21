<?php

namespace Tree;


interface TreesInterface {

    /**
     * @param array $trees
     * @return TreesInterface
     */
    public function load(array $trees);

    /**
     * @return array
     */
    public function toArray();
} 
