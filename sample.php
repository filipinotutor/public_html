<?php 
// phpinfo(); 


$time = "23:300";
// $t = $time[]

// echo strlen($time) .'<br/>';	

$a = '';
for($i = 0; $i <= strlen($time) - 2; $i++){
	
	$a = $a.''.$time[$i];
}

// echo $a;

$a = strtotime(date("G:i", strtotime($a))) - 3600;

// echo '<br/>'.date("G:i", $a);

$y = 2016;
$m = 8;
$d = 4;

$t = "13:30";



$a1 = strtotime(date("Y-m-d G:i", strtotime(''.$y.'-'.$m.'-'.$d.' '.$t)));
$a2 = strtotime("now");
echo 'a1: '.strtotime(date("Y-m-d G:i", strtotime(''.$y.'-'.$m.'-'.$d.' '.$t))).'<br/>';

echo 'a2: '.strtotime("now");


// echo $a;


// $W= 31;
// $Y = 2016;

// $first_Day_Of_Year = mktime(0,0,0,1,1,$Y);
//  $first_Monday_Of_Year = strtotime("Monday this week",(mktime(0,0,0,1,1,$Y)));   

// echo $first_Day_Of_Year . '<br/>';
// echo $first_Monday_Of_Year. '<br/>';

// if (strftime("%W",$first_Monday_Of_Year) != "01"){
//     $first_Monday_Of_Year += (60 * 60 * 24 * 7);
// }

// echo  $first_Monday_Of_Year. '<br/>';

// $week_Start = array();
// $week_End = array();   


//  for($i=0;$i<=53;$i++){
//         if ($i == 0){   
//             if ($first_Day_Of_Year != $first_Monday_Of_Year){
//                 $week_Start[$i] = $first_Day_Of_Year;
//                 $week_End[$i] = $first_Monday_Of_Year - (60 * 60 * 24 * 1);
//             } else {
//                 // %W returns no week 00
//                 $week_Start[$i] = 0;
//                 $week_End[$i] = 0;                              
//             }
//             $current_Monday = $first_Monday_Of_Year;
//         } else {
//             $week_Start[$i] = $current_Monday;
//             $week_End[$i] = $current_Monday + (60 * 60 * 24 * 6);
//             // find next monday
//             $current_Monday += (60 * 60 * 24 * 7);
//             // test for end of year
//             if (strftime("%W",$current_Monday) == "01"){ $i = 999; };
//         }
//     };

//  echo strftime("%b %d", $week_Start[$W]). '<br/>';
//  echo strftime("%b %d", $week_End[$W]). '<br/><br/><br/>';

//  for($i = 1; $i < 40; $i++){
//  	echo $i . ': ';
//  	echo strftime("%b %d",$week_Start[$i]). '<br/>';
//  }

?>