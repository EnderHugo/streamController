<?php
$expression = $_POST['expression'];
$action = $_POST['action'];
$scene = $_POST['scene'];

$postarray = [
    "expression" => $expression,
    "action" => $action,
    "scene" => $scene
];

$json_data = file_get_contents('assets/stream.json');
$jsonarray = json_decode($json_data, true);

$contentarray = $jsonarray;

$keys = array_keys($contentarray);

for ($i = 0; $i < sizeof($contentarray); $i++){
    if($postarray[$keys[$i]] != $contentarray[$keys[$i]] && $postarray[$keys[$i]] != null)
    {
        $contentarray[$keys[$i]] = $postarray[$keys[$i]];
    }
}
$content = json_encode($contentarray);

$fp = fopen("assets/stream.json", "w");
fwrite($fp, $content);
fclose($fp)
?>
