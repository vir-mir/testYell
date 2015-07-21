<?php

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
