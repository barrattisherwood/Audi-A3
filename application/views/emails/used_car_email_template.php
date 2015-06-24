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
                        <tr><td><h2 style="text-transform:uppercase"><?php echo $title ?></h2>A new "Used Vehicle" enquiry has been submitted. The details of the person enquiring follow:</td></tr>
                        <tr><td>

                                <table border=0 class="data">
                                    <tr><th bgcolor="#acacac">Name</th><td style="border:solid 1px #999; padding:12px"><?php echo $name?></td></tr>
                                    <tr><th bgcolor="#acacac">Email</th><td style="border:solid 1px #999; padding:12px"><?php echo $email?></td></tr>
                                    <tr><th bgcolor="#acacac">Phone</th><td style="border:solid 1px #999; padding:12px"><?php echo $cellno?></td></tr>
                                </table>

                            </td></tr>
                        <tr><td>Below are the specifics of the vehicle:</td></tr>
                        <tr><td>

                                <table border=0 class="data">
                                    <tr><th>The Vehicle</th><td></td></tr>
                                    <tr><td colspan="2"><img src="<?php echo (isset($offer->fimage640x480) ? : $offer->img1) ?>" width="100%" /></td></tr>
                                    <tr><th bgcolor="#acacac">Make</th><td style="border:solid 1px #999; padding:12px"><?php echo $offer->mmcode ?></td></tr>
                                    <tr><th bgcolor="#acacac">Model</th><td style="border:solid 1px #999; padding:12px"><?php echo $offer->mmmodel ?></td></tr>
                                    <tr><th bgcolor="#acacac">Year</th><td style="border:solid 1px #999; padding:12px"><?php echo $offer->yr ?></td></tr>
                                    <tr><th bgcolor="#acacac">Stock #</th><td style="border:solid 1px #999; padding:12px"><?php echo $offer->sstockno ?></td></tr>
                                    <tr><th bgcolor="#acacac">Mileage</th><td style="border:solid 1px #999; padding:12px"><?php echo number_format($offer->kms) ?>kms</td></tr>
                                    <tr><th bgcolor="#acacac">Advertised Price</th><td style="border:solid 1px #999; padding:12px">R<?php echo number_format($offer->princl) ?> (inc VAT)</td></tr>
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
