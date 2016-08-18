<?php
include("main_class.php"); 
$page_protect = new Main_Class;

            header("Content-type:application/pdf");
           	$page_protect->get_materials_info($_GET['mid']);
           	echo $page_protect->m_content;
           readfile("../materials/".$page_protect->m_content);
?>
