<?php
include("../includes/simple_html_dom.php");
include("../includes/main_class.php");
$page_protect = new Main_Class();

// $path = $_POST['path'];

if($_POST) {

    $q=$_POST['search'];

    $sql_res=mysql_query("select user_id,username,email from users where username like '%$q%' or email like '%$q%' order by user_id ");

    while($row=mysql_fetch_array($sql_res)) {
        $username=$row['username'];
        $email=$row['email'];
        $b_username='<strong>'.$q.'</strong>';
        $b_email='<strong>'.$q.'</strong>';
        $final_username = str_ireplace($q, $b_username, $username);
        $final_email = str_ireplace($q, $b_email, $email);
        ?>
        <div class="show" align="left">
        <?php echo $final_username; ?></span>&nbsp;<br/><?php echo $final_email; ?><br/>
        </div>
    <?php
    }
}

// if($path != ""){
//     $table   = '<table border="1">';
//     $table .= "<tr>".$path."</tr>";
// switch ($path){
//     case "report_list.php":
//                 $table  .= $page_protect->get_report_csv(NULL);
//         break;

//     case "tutors.php":
//         if($_POST['filter'] != ''){
//                 $table  .= $page_protect->get_conversion_csv($_POST['filter']);
//             }
//         else{
//                 $table  .= $page_protect->get_conversion_csv(NULL);    
//             }
//         break;
//     case "pricing.php":
//         if($_POST['filter'] != ''){
//                 $table  .= $page_protect->get_credit_csv($_POST['filter']);
//             }
//         else{
//                 $table  .= $page_protect->get_credit_csv(NULL);    
//             }
//         break;
//     }
// $name = explode('.',$path);
//     $table  .='</table>';
//     $html = str_get_html($table);
//     include("../includes/create_csv.php");
// }
// else{
//     echo "there's something wrong.";
//     }
?>