<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <title>Simple Blog System—修改文章</title>
    </head>
    <body>
        <h1>博客文章修改</h1>
        <?php 
            require('config.php');

            $id=$_POST['id'];
            $title=$_POST['title'];
            $content=$_POST['content'];

            if(!$id){
                echo "你未选择要修改的文章!<br />"
                    .'请退回再次重试.';
                exit;
            }

            if(!$title||!$content){
                echo '你未输入文章的标题或正文.<br />'
                     .'请退回再次重试.';
                exit;
            }

            if(!get_magic_quotes_gpc()){
                $title=addslashes($title);
                $content=addslashes($content);
            }

            @$db=new mysqli($db_host,$db_username,$db_password,$db_database);

            if(mysqli_connect_errno()){
                echo '错误: 无法连接到数据库. 请稍后再次重试.';
                exit;
            }

            $db->query("SET NAMES utf8");

            $query="update post set post_title="."'$title'".", post_content="."'$content'"." where id=".$id;

            $result=$db->query($query);

            if($result){
                echo "文章修改成功!";
            }else{
                echo '修改文章错误，请检查程序代码';
            }

            $db->close();
        ?>
    </body>
</html>