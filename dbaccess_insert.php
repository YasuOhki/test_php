<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>この画面は後で消す</title>
</head>
<body>
<?php

require('dbaccess.php');

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
$brother = filter_input(INPUT_POST, 'brother', FILTER_SANITIZE_NUMBER_INT);
$statusNum = 0;
$allergie = filter_input(INPUT_POST, 'allergie', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$parentname = filter_input(INPUT_POST, 'parentname', FILTER_SANITIZE_STRING);
$parentphone = filter_input(INPUT_POST, 'parentphone', FILTER_SANITIZE_STRING);

// INSERTメソッドのSQL発行
$str1 = "INSERT INTO `students` (`id`, `name`, `age`, `brother`, `status`, `アレルギー`, `住所`, `保護者氏名`, `保護者連絡先`)
       VALUES (NULL, ";

$str2 = "'" . $name . "',";
//$str2 = "'name', ";
$str3 = "'" . $age . "',";
//$str3 = "'0', ";
$str4 = "'" . $brother . "',";
//$str4 = "'0', ";
$str5 = "'" . $statusNum . "',";
//$str5 = "'0', ";
$str6 = "'" . $allergie . "',";
//$str6 = "'う', ";
$str7 = "'" . $address . "',";
//$str7 = "'う', ";
$str8 = "'" . $parentname . "',";
//$str8 = "'う', ";
$str9 = "'" . $parentphone . "');";
//$str9 = "'123');";

$sql = $str1.$str2.$str3.$str4.$str5.$str6.$str7.$str8.$str9;
/* $str3 = "'" . $name . "', ";
$str4 = "'" . $age . "', ";
$str5 = "'" . $brother . "', ";
$str6 = "'" . $statusNum . "', ";
$str7 = "'" . $allergie . "', ";
$str8 = "'" . $address . "', ";
$str9 = "'" . $parentname . "', ";
$str10 = "'" . $parentphone . "')"; */

//$sql = $str1.$str2.$str3.$str4.$str5.$str6.$str7.$str8.$str9.$str10;


$stmt = $db->prepare($sql);
$success = $stmt->execute();
echo $success;

/* if ($success) {
  echo ('データベースに新規登録しました');
}
else {
  echo ('データベースに登録できませんでした')
  die($db->error);
} */
?>

<div class='return'><a href="/test_php/index.php">戻る</a></div>
</body>
</html>
