<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>園児リストへの新規登録</title>
</head>
<body>
  <h2>削除する園児データ</h2>
  <form action="/test_php/dbaccess_insert.php" method="POST">
    <div class="create_form">
      <table>
        <tr>
          <th><label for="name">名前</label></th>
          <th><input type="text" id="name" name="name"></th>
        </tr>
        <tr>
          <th><label for="age">学年</label></th>
          <th><input type="number" id="age" name="age"></th>
        </tr>
        <tr>
          <th><label for="brother">兄弟児有無 (0:なし, 1:あり)</label></th>
          <th><input type="number" id="brother" name="brother"></th>
        </tr>
        <tr>
          <th><label for="Allergie">アレルギー</label></th>
          <th><input type="text" id="allergie" name="allergie"></th>
        </tr>
        <tr>
          <th><label for="address">住所</label></th>
          <th><input type="text" id="address" name="address"></th>
        </tr>
        <tr>
          <th><label for="parentname">保護者氏名</label></th>
          <th><input type="text" id="parentname" name="parentname"></th>
        </tr>
        <tr>
          <th><label for="parentphone">保護者連絡先</label></th>
          <th><input type="text" id="parentphone" name="parentphone"></th>
        </tr>
      </table>
    </div>

    <div class="create_button"><input type="submit" value="新規登録"></div>
  </form>

  <div class='return'><a href="/test_php/index.php"><br><br>戻る</a></div>
</body>
</html>
