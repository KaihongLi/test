<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <title>Simple Blog System—发表文章</title>
  </head>
  <body>
  <h1>发表博客文章</h1>
<?php
  require('config.php');
  date_default_timezone_set('Asia/Shanghai');
  
  $title=$_POST['title'];
  $content=$_POST['content'];

  if (!$title || !$content)
  {
     echo '你未输入文章的标题或正文.<br />'
          .'请退回再次重试.';
     exit;
  }
  if (!get_magic_quotes_gpc()) {
    $title = addslashes($title);
    $body = addslashes($content);
  }

  @ $db = new mysqli($db_host, 	$db_username, $db_password, $db_database);

  if (mysqli_connect_errno()) {
     echo '错误: 无法连接到数据库. 请稍后再次重试.';
     exit;
  }
  // 设置字符集
  $db->query("SET NAMES utf8");

  $query = "insert into post values('', '" . $title . "', '"  . $content . "','" . date('Y-m-d H:i:s') . "')";
  echo '<pre>' . $query . '</pre>' ;

  $result = $db->query($query);
  if ($result)
      echo  $db->affected_rows.' 条记录被插入数据库中';
  else
      echo '插入记录错误，请检查程序代码';

  $db->close();
?>
</body>
</html>
