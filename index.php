<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
</head>
<body>
  <link rel="stylesheet" href="styles/index.css">
  <?php
  require('dbaccess.php');
  ?>
  <h1>園児リスト<br></h1>
  <div class="list">
      <table border="1">
        <tr>
          <th>id</th>
          <th>名前</th>
          <th>学年</th>
          <th>状態</th>
          <th>詳細</th>
        </tr>
      <?php
      $records = $db->query('SELECT id, name, age, status FROM `students`');
      if ($records) {

        while ($record = $records->fetch_assoc()) {
          if ($record["status"] == 1) {
            $status = '登園';
          }
          else {
            $status = '降園';
          }

          if ($record["age"] <= 2) {
            $class = $record["age"] . "才児";
          }
          elseif ($record["age"] == 3) {
            $class = "年少";
          }
          elseif ($record["age"] == 4) {
            $class = "年中";
          }
          elseif ($record["age"] == 5) {
            $class = "年長";
          }
          else {
            $class = null;
          }
      ?>
          <tr>
            <td><?php echo $record["id"] ?></td>
            <td><a href="/test_php/attendance.php?id=<?php echo $record["id"]; ?>">
              <?php echo $record["name"] ?></a>
            </td>
            <td><?php echo $class ?></td>
            <td><?php echo $status ?></td>
            <td><a href="/test_php/show.php?id=<?php echo $record["id"]; ?>">詳細</a></td>
          </tr>
      <?php
        }
      }
      else {
        echo $db->error;
      }
    ?>
    </table>
  </div>

  <h1>てすと</h1>
  <a href="/test_php/create_user.php">ユーザ新規登録</a>

  <h1>新規登録</h1>
  <div class="create_field">
    <a href="/test_php/create.php">新規登録ページへ</a>
  </div>


  <h1>園児データ削除</h1>
  <div class="delete_field">
    <form action="/test_php/delete.php" method="post">
      <div>
        <label for="id">id</label>
        <input type="text" id="id" name="id">
        <div class="delete_button"><input type="submit" value="送信"></div>
      </div>
    </form>
  </div>
</body>
</html>
