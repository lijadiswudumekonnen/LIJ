<?php
//below is the receipent e-mail addresss of feedback mail i.e. info@emailaddress.com
$to		= 'info@yourdomain.com';
$name	= $_POST['name'];
$from 	= "noreply@".$_SERVER['HTTP_HOST']; //From Email
$phone	= $_POST['phone'];
$email	= $_POST['email'];
$message= $_POST['message'];
$sub	= "Contact Us Mail from : $name";

//Extras: User info (Optional!)
//Delete this part if you don't need it
//Display user information such as Ip address and browsers information...
$user_info .= "User IP : ".$_SERVER["REMOTE_ADDR"]."\r\n"; 			//Sender's IP
$user_info .= "Browser info : ".$_SERVER["HTTP_USER_AGENT"]."\r\n"; //User agent
$user_info .= "User come from : ".$_SERVER["HTTP_REFERER"];			//Referrer
//END: User info (Optional!)

$mess = '<html>
		<body>
		<table width="100%" border="0" cellpadding="3" cellspacing="0">
		  <tr>
		    <td width="160"><b>Name:</b></td>
		    <td>'.$name.'</td>
		  </tr>
		  <tr>
		    <td width="160"><b>Telephone:</b></td>
		    <td>'.$phone.'</td>
		  </tr>
		  <tr>
		    <td><b>Email Id:</b></td>
		    <td>'.$email.'</td>
		  </tr>
		  <tr>
		    <td><b>Message:</b></td>
		    <td>'.$message.'</td>
		  </tr>
		  <tr>
		    <td>&nbsp;</td>
		  </tr>
		  <tr>
		    <td colspan="2"><strong>User Information</strong></td>
		  </tr>
		  <tr>
		    <td colspan="2">'.$user_info.'</td>
		  </tr>
		</table>
		</body>
		</html>';

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $name <".$from.">\r\n";
$headers .= "Reply-To:$email\r\n";
$sent = mail($to,$sub,$mess,$headers);
if( $sent ){
	echo '1';
} else {
	echo '0';
}
exit;