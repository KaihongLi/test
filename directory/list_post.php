<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <title>Simple Blog System—发表文章</title>
  </head>
  <body>
  <h1>Simple Blog System—文章列表</h1>
<?php
  require('config.php');

  @ $db = new mysqli($db_host, 	$db_username, $db_password, $db_database);

  if (mysqli_connect_errno()) {
     echo '错误: 无法连接到数据库. 请稍后再次重试.';
     exit;
  }
    // 设置字符集
  $db->query("SET NAMES utf8");

  $query = "select * from post";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo '<p>共有文章: '.$num_results.' 篇</p>';

  //启动SESSION
  session_start();
  for ($i=0; $i <$num_results; $i++)
  {
     $row = $result->fetch_assoc();
     echo '<h2>'.($i+1).'.  ' . htmlspecialchars(stripslashes($row['post_title'])) . "</h2>\n";
     echo '<p>发表时间:' . htmlspecialchars(stripslashes($row['post_date'])) . "</p>\n";
     if(isset($_SESSION['admin'])&&$_SESSION['admin']===true){
            echo "操作:";
            echo "<form action="."'delete_post.php'"." method="."'post'"." />";
            echo "<input type="."'hidden'"." name="."'id'"." value=".$row['id']." >";
            echo "<input type="."'submit'"." value="."'删除'"." />";
            echo "</form>";
            echo "<form action="."'update_post.php'"." method="."'post'"." />";
            echo "<input type="."'hidden'"." name="."'id'"." value=".$row['id']." >";
            echo "<input type="."'submit'"." value="."'修改'"." />";
            echo "</form>";
      }else{
          $_SESSION['admin']=false;
      }
     echo '<p>'.nl2br(htmlspecialchars(stripslashes($row['post_content']))).'</p>';
  }

  $result->free();
  $db->close();
?>
</body>
</html>
