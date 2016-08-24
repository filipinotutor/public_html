<?php

include('header-tutor.php');
$page_protect->get_user_info();
$uid = @$page_protect->user_id;
  $m = date("M", strtotime("now"));
  $y = date("Y",strtotime("now"));
  $thismonth = date("Y-m-d", strtotime("".$y."-".$m."-01"));
if(isset($_POST['conversion_submit_filter'])){
  $from_m = $_POST['from'];
  $to_m = $_POST['to'];
  $from = date("Y-m-d",strtotime($from_m." 1, ".$y));
  $to = date("Y-m-d",strtotime($to_m." 30, 2014".$y));
  
  $filter = " `date` <= '$to' AND `date` >= '$from' ";
}
else{
  $filter=" `date` >= '$thismonth' ";
}

$totalAp = $page_protect->get_tutor_conversions_count($uid,"approved",$filter);
$totalPend = $page_protect->get_tutor_conversions_count($uid,"new",$filter);
$totalDissapp = $page_protect->get_tutor_conversions_count($uid,"disapproved",$filter);
$totalClass = $page_protect->get_tutor_conversions_count($uid,"",$filter);

?>

        <div class="col-md-9">
        <div class="row">
        <div class="col-md-6">
      
              <table class="table table-striped table-bordered " >
              <tr>
                <td width="70%">Total Approved Classes:</td>
                <td >
                 <span style="background-color:rgb(20,120,255);" class="label">
                 <?php echo $totalAp; ?>
                 </span>
                </td>

              </tr>

              <tr>

                <td>Total Disapproved Classes:</td>

                <td>
                <span style="background-color:rgb(220,20,20);" class="label">
                 <?php echo $totalDissapp ; ?>
                 </span>
                </td>

              </tr>

              <tr>

                <td>Total Number of Pending Classes:</td>

                <td>
                 <span style="background-color:rgb(20,120,20);" class="label">
                 <?php echo $totalPend; ?></span>
                 </td>

              </tr>

              <tr>

                <td>Total Number of Classes:</td>

                <td><?php echo $totalClass; ?></td>

              </tr>

              </table>

              </div>
<?php
if(isset($_POST['conversion_submit_filter'])){
        $page_protect->get_conversion_value();
                $conv=number_format($page_protect->convalue,2);
                $totalConversion = number_format($totalAp * $conv,2);

?>
          <div class="col-md-4">
            <table class="table table-bordered table-condensed table-hover table-striped">
            <tbody>
              <tr>
                <th>Total Points for the month of <?php echo $from_m." to ".$to_m;?></th>
                <td style="text-align:right;"> <?php echo $totalAp; ?> point(s) </td>
              </tr>
              <tr>
                <th>Amount per success class/credit point:</th>
                <td style="text-align:right;"><?php echo $conv; ?></td>
              </tr>
              <tr>
                <th>Total Amount:</th>
                <td style="text-align:right;"><?php echo $totalConversion; ?></td>
              </tr>
            </tbody>
            </table>
          </div>
<?php
}
?>

          </div>            
 <div class="row">
          <div class="col-md-4">
                <h4>Conversions</h4>
          </div>
        <div class="col-md-7 pull-right">
        <?php
             include("../includes/utilities/forms/conversion_filter_form.php");           
        ?>
        </div>
        </div>

            <div class="row">
        
            <div class="col-md-12">

           <table class="table table-striped table-bordered table-hover table-condensed">

           <tr>
             <th>Date
             </th>

              <th>Time</th>
              
              <th>Student

             </th>

              

              <th>
              <span class="hidden-xs">
              Approved/Pending/Disapproved
              </span>
              <span class="visible-xs-block">
                <p class="label label-success"><i class="glyphicon glyphicon-minus"></i></p>
                <p class="label label-info"><i class="glyphicon glyphicon-ok"></i></p>
                <p class="label label-danger"><i class="glyphicon glyphicon-remove"></i></p>
              </span>
             </th>

           </tr>

<?php

        $sql = 'SELECT * FROM classhistory WHERE '.$filter.' AND tutor = "'.$uid.'"';
        $rsd = mysql_query($sql) or die("Error in SQL:".mysql_error());

        $reccnt=0;

            while($row = mysql_fetch_array($rsd,MYSQL_NUM))

            {

            echo "<tr>
                  <td>".$row[14]."</td>";

            echo "<td>".$row[15]."</td>";

            $StudentName = $page_protect->get_student_info($row[16]);



            echo "<td>".$page_protect->student_first_name." ".$page_protect->student_last_name."</td>";

            if($row[12] == "approved")

              {

                echo '
                <td>
                  <span class="hidden-xs" style="background-color:rgb(20,120,255);color:white;" class="label">Report Approved</span>
                  <span class="visible-xs-block label label-info"><i class="glyphicon glyphicon-ok"></i></span>
                </td>
                ';
              }

            elseif($row[12] == "new")

              {
                  echo '
                  <td>
                    <span class="hidden-xs" style="background-color:rgb(20,120,20);color:white;" class="label">Pending Report</span>
                    <span class="visible-xs-block label label-success"><i class="glyphicon glyphicon-minus"></i></span>
                  </td>';
              }

              else

              {
               echo '
                  <td>
                    <span class="hidden-xs" style="background-color:rgb(220,20,20);color:white;" class="label">Report Disapproved</span>
                    <span class="visible-xs-block label label-danger"><i class="glyphicon glyphicon-remove"></i></span>
                  </td>';
              }

            

            }

?>   </table>

          </div><!--/row-->

         </div>
      </div><!--/ col-md-9 -->


 <?php

 include('footer-tutor.php');

 ?>   