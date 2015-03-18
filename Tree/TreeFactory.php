<?php
/**
 * Created by PhpStorm.
 * User: vir-mir
 * Date: 18.03.15
 * Time: 19:17
 */

namespace Tree;


class TreeFactory {
    /**
     * @param $driver
     * @return TreesInterface
     * @throws \Exception
     */
    public static function get($driver) {
        $object = null;
        switch ($driver) {
            case 'node':
                $object = new \Tree\Node\TreeNodes();
                break;
        }

        if (!$object) {
            throw new \Exception("Undefined driver '{$driver}'");
        }

        return $object;
    }
}