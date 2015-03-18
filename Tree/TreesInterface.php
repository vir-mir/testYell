<?php
/**
 * Created by PhpStorm.
 * User: vir-mir
 * Date: 18.03.15
 * Time: 19:15
 */

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