<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Lang" content="en">
<meta name="author" content="">
<meta http-equiv="Reply-to" content="@.com">
<meta name="generator" content="PhpED 8.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="creation-date" content="09/06/2012">
<meta name="revisit-after" content="15 days">
<title>Leads</title>
<style>td{font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
   font-weight: 300;
}
th{text-align:left; width:180px; padding:12px}
.data td{}</style>
</head>
<body>
  <table cellspacing='0' cellpadding='0' style="width:70%;border:solid 1px #999;margin:4px auto;" align=center>
  <tr><td align="right"><img src='https://www.mccarthynissan.co.za/img/logo.png' /></td></tr>
  <tr><td>
  
  <table width="100%" cellpadding="6" cellspacing=1>
  <tr><td><h2 style="text-transform:uppercase"><?php echo $title ?></h2>A new online booking for a test drive has been made. The details of the person booking follow:</td></tr>
  <tr><td>
  
  <table border=0 class="data">
  <tr><th bgcolor="#acacac">Name</th><td style="border:solid 1px #999; padding:12px"><?php echo $name?></td></tr>
  <tr><th bgcolor="#acacac">Email</th><td style="border:solid 1px #999; padding:12px"><?php echo $email?></td></tr>
  <tr><th bgcolor="#acacac">Phone</th><td style="border:solid 1px #999; padding:12px"><?php echo $cellno?></td></tr>
  </table>
  
  </td></tr>
  <tr><td>Below are the specifics of the booking:</td></tr>
  <tr><td>
  
  <table border=0 class="data">
  <tr><th bgcolor="#acacac">Test Drive Date</th><td style="border:solid 1px #999; padding:12px"><?php echo $test_drive_date ?></td></tr>
  <tr><th bgcolor="#acacac">Test Drive Time</th><td style="border:solid 1px #999; padding:12px"><?php echo @$test_drive_time ?></td></tr>
  <tr><th>The Vehicle</th><td></td></tr>
  <?php 
  if($test_drive == 'preowned')
  {?>
  <tr><th bgcolor="#acacac">Make</th><td style="border:solid 1px #999; padding:12px"><?php echo $make ?></td></tr>
  <tr><th bgcolor="#acacac">Model</th><td style="border:solid 1px #999; padding:12px"><?php echo $model ?></td></tr>
  <tr><th bgcolor="#acacac">Year</th><td style="border:solid 1px #999; padding:12px"><?php echo $year ?></td></tr>
  <?php
  }
  else
  {?>
  <tr><th bgcolor="#acacac">Variant</th><td style="border:solid 1px #999; padding:12px"><?php echo $car_to_test ?></td></tr>
<?php
  }
  ?>
  </table>
  
  </td></tr>
  <tr><td>Below are some particulars of this lead in our system:</td></tr>
  <tr><td>
  
  <table border=0 class="data">
  <tr><th bgcolor="#acacac">Lead ID</th><td style="border:solid 1px #999; padding:12px"><?php echo $leadID?></td></tr>
  <tr><th bgcolor="#acacac">Date Saved</th><td style="border:solid 1px #999; padding:12px"><?php echo date('r')?></td></tr>
  <tr><th bgcolor="#acacac">Website</th><td style="border:solid 1px #999; padding:12px"><?php echo $_SERVER['SERVER_NAME'] ?></td></tr>
  </table>
  
  </td></tr>
  <tr><td style='color:#acacac;font-style:italic'>Below are some security details you do not need to look at:</td></tr>
  <tr><td>
  
  <table border=0 class="data">
  <tr><th bgcolor="#acacac" style='color:#999;font-style:italic'>IP</th><td style='border:solid 1px #999; padding:12px;color:#acacac;font-style:italic'><?php echo $_SERVER['REMOTE_ADDR']?></td></tr>
  <tr><th bgcolor="#acacac" style='color:#999;font-style:italic'>Useragent</th><td style='border:solid 1px #999; padding:12px;color:#acacac;font-style:italic'><?php echo $_SERVER['HTTP_USER_AGENT']?></td></tr>
  <tr><th bgcolor="#acacac" style='color:#999;font-style:italic'>Referer</th><td style='border:solid 1px #999; padding:12px;color:#acacac;font-style:italic'><?php echo $_SERVER['HTTP_REFERER']?></td></tr>
  </table>
  
  </td></tr>
  <tr><td>In case there are problems, please contact:</td></tr>
  <tr><td>
  
  <table border=0 class="data">
  <tr><th bgcolor="#acacac">Account Manager</th><td style="border:solid 1px #999; padding:12px">liezlf@cbrmaketing.co.za</td></tr>
  <tr><th bgcolor="#acacac">Developer</th><td style="border:solid 1px #999; padding:12px">percyl@cbrmarketing.co.za</td></tr>
  </table>
  
  </td></tr></table>
  
  
  
  </td></tr>
  </table>
</body>
</html>
