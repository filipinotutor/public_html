<?php
class admin_web_settings{
function admin_settings(){ 


        $url = $_SERVER['HTTP_HOST']; 

        $isProd = preg_match("/\bfilipinotutor\b/", $url);

        if($isProd) {
            $user_name = "filipino_tutor";
            $database = "filipino_tutor";
            $pw = "NdZVnxahGIhZ";
        } else {
            $user_name = "root";
            $database = "filipino_tutor";
            $pw = "";
        }


        $mysql_connect = @mysql_pconnect ("localhost", 
                                          $user_name, 
                                          $pw); 

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