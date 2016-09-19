<?php
$con=  mysql_connect("localhost","root","");
            
            if(!$con)
            {
                die("can not connect".mysql_error());
            }
            
            mysql_select_db("gym",$con);
            ?>