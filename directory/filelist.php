<?php
    function filelist($path,$l){
        //打开目录句柄
        $dir=opendir($path);
        //读取目录内容
        while(($file=readdir($dir))!==false)
        {
            //判断是否为目录,以及是否为同级或上级目录
            if(is_dir($path."/".$file)&&$file!="."&&$file!="..")
            {
                //缩进区分目录下的子目录
                for($i=0;$i<5*$l;$i++)
                {
                    echo " ";
                }
                echo $file."\n";
                //递归调用
                filelist($path."/".$file,$l+1);
            }else{
                for($i=0;$i<5*$l;$i++)
                {
                    echo " ";
                }
                echo $file."\n";
            }
        }
        //关闭目录句柄
        closedir($dir);
    }
    $server=$_SERVER['DOCUMENT_ROOT'];
    filelist($server,0);
?>