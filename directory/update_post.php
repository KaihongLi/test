<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
        <title>Simple Blog System—修改文章</title>
    </head>
    <body>
        <h1>修改博客文章</h1>
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

            //查询语句
            $query="select* from post where id=".$id;

            $result=$db->query($query);

            $num_results=$result->num_rows;

            if($num_results){
                $row=$result->fetch_assoc();
                $content=htmlspecialchars(stripslashes($row['post_content']));
                echo "<form action="."'update.php'"." method="."'post'"."/>";
                echo "<p>标题:</p>";
                echo "<p><input type="."'text'"." name="."'title'"."maxlength="."'60'"."size="."'30'"." value=". htmlspecialchars(stripslashes($row['post_title'])) ." /></p>";
                echo "<p>正文:</p>";
                echo "<p><textarea name = "."'content'"." rows="."'10'"." cols="."'80'"." >".$content."</textarea></p>";
                echo "<input type="."'hidden'"." name="."'id'"." value=".$row['id']." >";
                echo "<p><input type="."'submit'"." value="."'修改'"."/></p>";
                echo "</form>";
            }else{
                echo "获取文章失败,请检查程序代码!";
            }

            $result->free();
            $db->close();
        ?>
    </body>
</html>