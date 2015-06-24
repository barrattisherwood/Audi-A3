<?php 
error_reporting(~E_ALL);
ini_set('display_errors', 0);

while(list($k, $v) = each($_REQUEST))
{
   $post_data[$k] = trim(strip_tags($v)); 
}

try{
    $db = new PDO("mysql:host=192.168.100.13;dbname=mccarthypreowned", "adam", "1234567890"); 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(is_numeric($post_data['coynumber']))
    {
        if($post_data['coynumber'])//foreach($db->query("select * from dealerships where coynumber=".intval($post_data['coynumber'])." limit 1", PDO::FETCH_OBJ) as $dealership)
        {
            $coy = $post_data['coynumber'];
		
			switch ($coy) {
			
				case 280:
					$to = ",janb@mcmotor.co.za";

					break;
				
				case 233:
					$to = ",eugenech@mcmotor.co.za";
					break;
					
				case 136:
					$to = ",elainer@mcmotor.co.za";
					break;
					
				default:
					$to = "leads@cbrmarketing.co.za";
			}

            $extra_CC = "RenierK@mcmotor.co.za,leads@cbrmarketing.co.za";

            $subject = 'New Car Enquiry - Renegade';

            $headers = "From: Renagade<noreply@mccarthygm.co.za>\r\n";
            $headers .= "Reply-To: leads@cbrmarketing.co.za\r\n";
            $headers .= "CC: leads@cbrmarketing.co.za," . $extra_CC . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=utf8\r\n";

            $body = "<table cellpadding='6' align=center width=760 border='1'>
            <tr><td width='150' align=center style='border:none'><img src='http://mccarthycjd.co.za/renegade/images/custom/Jeep_logo.png'><td style='border:none'>A new lead has been received. See details below:</td></tr>
            <tr><td width='150'>Name</td><td>$post_data[name]</td></tr>
            <tr><td>Surname</td><td>$post_data[surname]</td></tr>
            <tr><td>Cell</td><td>$post_data[cellno]</td></tr>
            <tr><td>Dealer COY</td><td>$post_data[coynumber]</td></tr>
            <tr><td>Email</td><td>$post_data[email]</td></tr>
            <tr><td>Message</td><td>$post_data[message]</td></tr>
            <tr><td>Promo</td><td>Renegade</td></tr>
            <tr><td>Received</td><td>".date('d-m-Y H:i:s')."</td></tr>
            <tr><td>Source</td><td>http://mccarthycjd.co.za/renegade/</td></tr>
            <tr><td colspan='2' align=right style='border:none'><img src='http://mccarthygm.co.za/mokka/images/custom/bidvestlogo.png'></td></tr>
            
            </table>";

          
            mail($to, $subject,$body, $headers);
try{

            $db->query("INSERT INTO `renegade_leads` 
	            (
	            `name`, 
	            `surname`, 
	            `email`, 
	            `number`, 
	            `coy`, 
	            `sstockno`, 
	            `regno`, 
	            `created`
	            )
	            VALUES
	            (
	            '{$post_data[name]}', 
	            '{$post_data[surname]}', 
	            '{$post_data[email]}', 
	            '{$post_data[cellno]}', 
	            '{$post_data['coynumber']}', 
	            '0', 
	            'renegade', 
	            '".date('Y-m-d H:i:s')."'
	            )");
				}catch(PDOException $e)
{
   mail('percyla@gmail.com', 'Renegade error',print_r($e, 1));
}
        } else{
            echo "No posted id";
        }
    }else{
        echo "Not numeric";
    }
}catch(PDOException $e)
{
   mail('percyla@gmail.com', 'error',print_r($e, 1));
}

$pdo = NULL;
?>