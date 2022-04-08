<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <title>注册账号</title>
    </head>
    <body>
        <h1>注册账号</h1>
        <?php
            require('config.php');

            $username=$_POST['username'];
            $password=$_POST['password'];

            if(!$username||!$password){
                echo "你未输入用户名或密码。</br>"
                    .'请退回再次重试!';
                exit;
            }

            @ $db=new mysqli($db_host,$db_username,$db_password,$db_database);

            if(mysqli_connect_errno()){
                echo '错误:无法连接到数据库,请稍后再次重试!';
                exit;
            }
            
            //设置字符集
            $db->query("SET NAMES utf8");

            $password_hash=hash('sha256',$password);

            //插入语句
            $query="insert into user values('','".$username."','".$password_hash."');";

            $result=$db->query($query);

            if ($result)
                echo  '注册成功,请到登录页面登录。';
            else
                echo '注册失败，请检查程序代码';

            $db->close();
        ?>
    </body>
</html>