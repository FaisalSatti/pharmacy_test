<?php
include("../auth/db.php");
require_once('forgot_password/send_email.php');
header("Content-Type: application/json");
$json_array = array();

$email=$_POST['email'];
$token = uniqid();

$select="SELECT * FROM  COD_USER_LOGIN WHERE EMAIL = '$email'";
$compiled = oci_parse($c, $select);
oci_execute($compiled);
if($row=oci_fetch_assoc($compiled)){
	$user_name = $row['NAMENAME'];
	
	if($row['CONFIRMATION'] == '0'){
		$update="UPDATE COD_USER_LOGIN SET TOKEN = '$token' WHERE EMAIL = '$email'";
		$ucompiled = oci_parse($c, $update);

		if(oci_execute($ucompiled)){

			$url = "http://localhost/project-0010/recover-password.php?email=$email&token=$token";
			$reset_password_link = "<a href='".$url."'></a>";
			$to = $email;
			$subject = "Reset Password ";
		
			$forgot_password_template = "
				<!DOCTYPE html>
				<html lang='en'>
				<head>
					<meta charset='UTF-8'>
					<meta http-equiv='X-UA-Compatible' content='IE=edge'>
					<meta name='viewport' content='width=device-width, initial-scale=1.0'>
					<title>Document</title>
				</head>
				<body align='center' style='height:400px;'>
				<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
				<!-- START HEADER/BANNER -->
				<tbody>
					<tr>
						<td align='center'>
							<table class='col-600' width='600' border='0' align='center' cellpadding='0' cellspacing='0'>
								<tbody>
									<tr>
								
									<td style='font-family: sans-serif; font-size:15px; font-weight: 300;' align='center' valign='top'>
										<table class='col-600' width='600' height='400' border='0' align='center' cellpadding='0' cellspacing='0'>
			
											<tbody>
											<tr>
												<td height='20'></td>
											</tr>
				
											<tr>
												<td align='center' style=''>
													<img src='forgot_password_template/images/logo.png' bgcolor:'#66809b' alt='logo'>
												</td>
											</tr>
			
			
											<tr>
												<td align='center'>
													<p>Hi, $user_name.</p>
												</td>
											</tr>
											<tr>
												<td align='center'>
													<p>We recieved a request to reset your password. Click below to set up a new password for your account.</p>
												</td>
											</tr>
			
											<tr>
												<td align='center'>
												<a style='color:#fff;padding:10px;cursor:pointer;background: #286090;border: none;text-decoration: none;' href='$url' target='_blank' data-saferedirecturl='$url' type='submit'>Get Your Password</a>
												</td>
											</tr>
			
											<tr>
												<td height='20'></td>
											</tr>
										</tbody></table>
									</td>
								</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
				</table>
				</body>
				</html>
			";
		
			// $forgot_password_template = file_get_contents('forgot_password_template/forgot_password_template.php');
			$message = $forgot_password_template;	
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: <'.$email.'>' . "\r\n";
		
			// (for server)
			// $mail = mail($to,$subject,$message,$headers);
		
			// (for localhost)
			$mail = sendmail($to,$subject,$message,$headers);
		
		
			if ($mail) {
				$return_data = array(
					"status" => 1,
					"message" => "Check Email!",
				);
			}else{
				$return_data = array(
					"status" => 0,
					"message" => "Email Not sent!"
				);
			}
		}
		else
		{
			$return_data = array(
				"status" => 0,
				"message" => "Query Error!"
			);
		}
	}
	else
	{
		$return_data = array(
			"status" => 0,
			"message" => "Your Account Has Not Been Verified!"
		);
	}
}else{
		$return_data = array(
			"status" => 0,
			"message" => "Enter Correct Email Address"
		);
}
	
   oci_free_statement($compiled);
   oci_close($c);
	
echo json_encode($return_data);


?>