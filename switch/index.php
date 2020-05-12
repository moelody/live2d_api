<?php
isset($_GET['id']) ? $modelId = (int)$_GET['id'] : exit('error');

require '../tools/modelList.php';
require '../tools/jsonCompatible.php';

$listName = isset($_GET['json']) ? $_GET['json'] : 'model_list';
$modelList = new modelList();
$jsonCompatible = new jsonCompatible();

$modelList = $modelList->get_list($listName);
$modelSwitchId = $modelId + 1;
if (!isset($modelList['models'][$modelSwitchId-1])) $modelSwitchId = 1;

header("Content-type: application/json");
echo $jsonCompatible->json_encode(array('model' => array(
    'id' => $modelSwitchId,
    'name' => $modelList['models'][$modelSwitchId-1],
    'message' => $modelList['messages'][$modelSwitchId-1]
)));
