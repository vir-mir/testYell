<?php
/**
 * Created by PhpStorm.
 * User: vir-mir
 * Date: 18.03.15
 * Time: 19:03
 */

spl_autoload_register(function ($name) {
    $name = str_replace('\\', '/', $name);
    require_once __DIR__ . '/' . $name . '.php';
});

use Tree\TreeFactory;


$trees = [
    ['node_id' => 1, 'parent_id' => null, 'title' => 'Node 1'],
    ['node_id' => 2, 'parent_id' => 1, 'title' => 'Node 2'],
    ['node_id' => 3, 'parent_id' => 2, 'title' => 'Node 3'],
    ['node_id' => 4, 'parent_id' => 2, 'title' => 'Node 4'],
    ['node_id' => 5, 'parent_id' => null, 'title' => 'Node 5'],
];

$tree = TreeFactory::get('node');
$tree->load($trees);
echo '<pre>';
echo json_encode($tree) . '<br /><br /><br />';
print_r($tree->toArray());