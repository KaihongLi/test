<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>Simple Blog System—删除文章</title>
    </head>
    <body>
        <h1>删除博客文章<h1>
        <?php
            require('config.php');

            $id=$_POST['id'];

            if(!$id){
                echo '你未选择要删除的文章。<br/>'
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

            //删除语句
            $query="delete from post where id=".$id;

            $result=$db->query($query);

            if($result){
                echo "该文章已被删除!";
            }else{
                echo "文章删除失败,请检查程序代码!";
            }
            
            $db->close();
        ?>
    </body>
</html>