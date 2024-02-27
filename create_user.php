<?php
require('dbaccess.php');

$sql = "INSERT INTO `users` (`id`, `name`, `mode`) VALUES (NULL, 'debug3', 'debug3');";
echo $sql;

$stmt = $db->prepare($sql);
if (!$stmt):
  die($db->error);
endif;

$success = $stmt->execute();

?>
<div class='return'><a href="/test_php/index.php">戻る</a></div>
