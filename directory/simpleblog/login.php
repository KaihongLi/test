<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <title>登录</title>
    </head>
    <body>
        <h1>登录博客</h1>
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

            //查询语句
            $query="select* from user where username='".$username."';";

            $result=$db->query($query);

            $result_rows=$result->num_rows;

            if($result_rows==0){
                echo "用户名不存在!";
            }

            $login=false;
            for($i=0;$i<$result_rows;$i++){
                $row=$result->fetch_assoc();
                if($row['password']==$password_hash){
                    $login=true;
                    //启动SESSION
                    session_start();
                    $_SESSION['admin']=true;
                    echo "登录成功!";
                    break;
                }
            }

            if($login==false&&$result_rows>0){
                echo "密码错误!";
            }

            $db->close();
        ?>
    </body>
</html>