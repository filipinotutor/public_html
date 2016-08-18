<?php
class admin_web_settings{
function admin_settings(){ 
        $mysql_connect = @mysql_pconnect ("localhost", 
                                          "filipino_tutor", 
                                          "NdZVnxahGIhZ"); 

        // $mysql_db = @mysql_select_db ("filipino_tutor"); 

        $mysql_db = @mysql_select_db ("filipino_tutor"); 

        $res = mysql_query("SELECT * FROM adminsettings");

        $result["w_n"] = mysql_result($res,0,"webmaster_name");
        $result["w_e"] = mysql_result($res,0,"webmaster_email");
        $result["a_n"] = mysql_result($res,0,"admin_name");
        $result["a_e"] = mysql_result($res,0,"admin_email");
		
        mysql_close();
  
        return $result;
    }
}
?>