<?php
include "includes/main_functions_test.php";
//include 'http://www.domaindirectory.com/includes/main_functions_test.php';
$dir = new DIR_LIB();
if(isset ($_REQUEST['count'])){
    die($dir->CountLeads($_REQUEST['domain']));
}
$email = $_REQUEST['email'];
$domain = $_REQUEST['domain'];
$user_ip = $_REQUEST['user_ip'];
//add codes to check if the email is already saved in database..
// if already in database, skipp save line
  $save = "success";
  
//else if new email

$save = $dir->SaveLeads($email,$domain,$user_ip);

/*
try {
			$returnArray = array();
			$host = "127.0.0.1";
			$dbname = "domaindi_managedomain";
			$user = "domaindi_maida";
			$pass = "bing2k";
			$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			
			
			
			$q = $DBH->query("SELECT category_id FROM domain WHERE domain_name='$domain'");
			while($r = $q->fetch()) {
				$catID = $r['category_id'];
			}
			
			$STH = $DBH->query("SELECT domain_name,category_id FROM `domain` WHERE category_id = '$catID' AND NOT domain_name = '$domain' ORDER BY RAND() LIMIT 4");
			
			
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			while($row = $STH->fetch()) {
				$returnArray[] = $row['domain_name'];
			}

			  $DBH = null;
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		
	$randomDomains = "";
	if(sizeof($returnArray) > 0){
		for($i = 0; $i < sizeof($returnArray); $i++){
			$randomDomains .= '<a style="text-decoration:none;line-height:25px;" href="http://'.$returnArray[$i].'">'.ucfirst($returnArray[$i]).'</a><br>';
		}
	}
*/
	
if($save=="success"){
	$admin_emails = '';
	$admin = $dir->GetAdminData();
	for($x =0;$x<count($admin);$x++){
            if($admin_emails!='') $admin_emails .= ',';
            $admin_emails .= $admin[$x]['admin_email'];
	}
	
	
    $to = $email; 
    $from = $domain; 
    $subject = "Your ".ucwords($domain)." Subscription"; 
    $contactname = $name;
	
	
		/* GET LOGO */
			$logo='';
			$api_url = "http://contrib.com/api/";
			$key = md5($domain);
			
			//require('curl_client.php');
			$max_redirect = 3;  // Skipable: default => 3
			$client = new Curl_Client(array(

				CURLOPT_FRESH_CONNECT => 1,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_USERAGENT => ''

			), $max_redirect);
			
			$url = $api_url.'getdomaininfo?domain='.$domain.'&key='.$key;
			$client->get($url);
			$result = $client->currentResponse('body');
			$data_domain = json_decode($result,true);
			$error = 0;
			
			if (!$data_domain['error'])
			{
				$logo = $data_domain[0]['Logo'];
			}
			
			if($logo=='') $logo = ucwords($domain);
			else $logo = '<img src="'.$logo.'" height="70px">';
			
		/* END GET LOGO*/
  



	/*$message = '
				<table cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;color:#555;font-family:Arial,sans-serif;font-size:12px;line-height:22px">
				<tbody>
					<tr>
						<td bgcolor="#545454"><br>
							<table cellpadding="0" cellspacing="0" width="90%" bgcolor="#ffffff" border="0" rules="none" frame="border" align="center" style="border-width: 10px 0px 0px 0px;border-color: #E4E2E4;color:#555;font-family:Arial,sans-serif;font-size:12px;line-height:22px">
								<tbody>
									<tr>
										<td valign="top">
											<br><br>
											<table cellpadding="0" cellspacing="0" width="90%" align="center" style="color:#555;font-family:Arial,sans-serif;font-size:12px;line-height:22px">
												<tbody>
													<tr>
														<td width="55%" valign="top"><a href="http://'.ucfirst($domain).'">'.$logo.'</a></td>
														<td width="5%">&nbsp;</td>
														<td width="35%" valign="top" align="right">'.date("F d, Y").' <br>
															<b><a href="http://'.ucfirst($domain).'">'.ucfirst($domain).'</a></b></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr><td style="background: rgb(255, 249, 249);"><br></td></tr>
									<tr><td><br></td></tr>
									<tr>
										<td>
											<table width="100%">
												<tr>
													<td width="20%" valign="top">
																<h4>Please check out <a href="http://globalventures.com">Global Ventures</a> other great companies and Opportunities below. </h4>
																&raquo;&nbsp;<a style="text-decoration:none;line-height:25px;" href="http://referrals.com">Referrals.com</a><br>
																&raquo;&nbsp;<a style="text-decoration:none;line-height:25px;" href="http://handyman.com">HandyMan.com</a><br>
																&raquo;&nbsp;<a style="text-decoration:none;line-height:25px;" href="http://venturecamp.com">VentureCamp.com</a><br>
																&raquo;&nbsp;<a style="text-decoration:none;line-height:25px;" href="http://domainpower.com">DomainPower.com</a><br>
																&raquo;&nbsp;<a style="text-decoration:none;line-height:25px;" href="http://talentdirect.com">TalentDirect.com</a><br>
													</td>
													<td width="70%" valign="top">
														<p style="padding:0px 20px;">Hi,
															<br><br>
																You are now in our private and exclusive beta list! <br />
																Thanks for your interest in <a href="http://'.$domain.'">'.ucwords($domain).'</a>! 
																You&#39;ve been added to our queue for Beta access to the <a href="http://'.$domain.'">'.ucwords($domain).'</a> platform. 
																We&#39;ll be in touch soon! </b> <br><br><br></p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td><br><br></td></tr>
									<tr>
										<td width="80%" valign="top" align="center" style="background: #E4E2E4;padding:10px 0;font-size: 11px;line-height: 15px;"> 
											'.ucwords($domain).' is a member of <a href="http://domaindirectory.com">DomainDirectory.com</a> and a venture of <a href="http://globalventures.com">GlobalVentures.com</a><br> 
										</td>
									</tr>
									<tr>
										<td style="background: #E4E2E4;padding: 10px;">
											<table cellpadding="0" cellspacing="0" width="80%" align="center" style="color:#555;font-family:Arial,sans-serif;font-size:12px;line-height:22px">
												<tbody>
													<tr>
													<td width="120">Connect with us:</td>
													<td width="35"><img src="http://domaindirectory.com/servicepage/images/facebook.png" width="24" height="24" border="0" alt=""></td>
													<td width="80"><a href="'.$fb_page.'">Facebook</a> </td>
													<td width="35"><img src="http://domaindirectory.com/servicepage/images/twitter.png" width="24" height="24" border="0" alt=""></td>
													<td width="80"><a href="'.$twitter.'">Twitter</a> </td>
													<td width="35"><img src="http://domaindirectory.com/servicepage/images/contact.png" width="24" height="24" border="0" alt=""></td>
													<td width="90"><a href="http://domaindirectory.com/contactus.html">Contact Us</a></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							 </table>
						  <br>
						  <br>
						</td>
					</tr>
				</tbody>
			</table>
			
			';*/
			
	$message = '<table cellspacing="0" border="0" style="background: #f1f0e8;" cellpadding="0" width="100%">
	
	<tr>
		<td>
			<table cellspacing="0" bgcolor="#484845" width="100%" cellpadding="0">
				<tr>
					<td height="50" valign="top">
						<table cellspacing="0" align="center" width="600" cellpadding="0">
							<tr>
								<td class="header-text" align="center" style="color: #FFF; font-family: Verdana; font-size: 10px; text-transform: uppercase; padding: 0 20px;">
									<br /><a href="http://'.ucfirst($domain).'" style="color: #00ffff; text-decoration: none;">'.ucfirst($domain).'</a> is a member of <a href="http://domaindirectory.com" style="color: #00ffff; text-decoration: none;">DomainDirectory.com</a> and a venture of <a href="http://globalventures.com" style="color: #00ffff; text-decoration: none;">GlobalVentures.com</a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	
	<tr>
		<td>
			<table cellspacing="0" width="100%" cellpadding="0">
				<tr>
					<td valign="top">
						<table cellspacing="0" align="center" width="600" cellpadding="0">
							<tr>
								<td class="main-title" style="padding: 0 20px; font-size: 28px; text-align: center; font-family: Georgia; text-transform: uppercase; letter-spacing: 6px;">
									<br />'.$logo.'
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td valign="top">
						<table cellspacing="0" align="center" width="600" cellpadding="0">
							<tr>
								<td class="date" valign="top" style="color: #999; text-transform: uppercase; text-align: center; font-size: 11px; font-family: Verdana;">
									'.date("F d, Y").'<br /><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>	
	
	<tr>
		
		<td valign="top">

			<table cellspacing="0" border="0" align="center" cellpadding="0" width="600" >
				<tr>
					<td>
						<table cellspacing="0" border="0" cellpadding="0" width="600" >
							<tr>
								<td valign="top" width="220" bgcolor="#e5e4dc">
									<table cellspacing="0" bgcolor="#e5e4dc" width="220" cellpadding="0">
										
										<tr>
											<td valign="top">
												<img src="http://domaindirectory.com/images/sidebar-top-left.gif" alt="" />
											</td>
										</tr>
										
										<tr>
											<td valign="top">
												<table cellspacing="0" cellpadding="0">
													<tr>
														<td style="padding: 0 0 0 20px;">
															<br />
															<strong class="subtitle" style="display: block; font-size: 11px; font-family: Verdana; text-transform: uppercase; margin: 0 0 10px 0;">Please check out <a href="http://globalventures.com" style="text-decoration: none;color: inherit;">Global Ventures</a> other great companies and Opportunities below.</strong>
															<table cellspacing="0" border="0" cellpadding="0">
																<tr>
																	<td height="20"><img src="http://domaindirectory.com/images/bullet.gif" alt="" style="border: 0;" /></td>
																	<td class="list" ><a style="color: #cc0000; text-transform: uppercase; font-size: 11px; text-decoration: none; font-family: Verdana;" href="http://referrals.com">Referrals.com</a></td>
																</tr>
																<tr>
																	<td height="20"><img src="http://domaindirectory.com/images/bullet.gif" alt="" style="border: 0;" /></td>
																	<td class="list" ><a style="color: #cc0000; text-transform: uppercase; font-size: 11px; text-decoration: none; font-family: Verdana;" href="http://handyman.com">HandyMan.com</a></td>
																</tr>
																<tr>
																	<td height="20"><img src="http://domaindirectory.com/images/bullet.gif" alt="" style="border: 0;" /></td>
																	<td class="list" ><a style="color: #cc0000; text-transform: uppercase; font-size: 11px; text-decoration: none; font-family: Verdana;" href="http://venturecamp.com">VentureCamp.com</a></td>
																</tr>
																<tr>
																	<td height="20"><img src="http://domaindirectory.com/images/bullet.gif" alt="" style="border: 0;" /></td>
																	<td class="list" ><a style="color: #cc0000; text-transform: uppercase; font-size: 11px; text-decoration: none; font-family: Verdana;" href="http://domainpower.com">DomainPower.com</a></td>
																</tr>
																<tr>
																	<td height="20"><img src="http://domaindirectory.com/images/bullet.gif" alt="" style="border: 0;" /></td>
																	<td class="list" ><a style="color: #cc0000; text-transform: uppercase; font-size: 11px; text-decoration: none; font-family: Verdana;" href="http://talentdirect.com">TalentDirect.com</a></td>
																</tr>
																<tr>
																	<td><br /></td>
																	<td><br /></td>
																</tr>
															</table>
														</td>

													</tr>
													
												</table>
												
											</td>
										</tr>
									
										<tr>
											<td valign="top">
												<img src="http://domaindirectory.com/images/sidebar-bottom-left.gif" alt="" />
											</td>
										</tr>
									
									</table>
								</td>
								<td valign="top" width="450" bgcolor="#fff">
									<table cellspacing="0" style="background: #fff;" width="450" cellpadding="0">
										
										<tr>
											<td valign="top" width="344"><img src="http://domaindirectory.com/images/spacer.gif" alt="" /></td>
											<td valign="top" width="6" align="right">
												<img src="http://domaindirectory.com/images/top-right.gif" alt="" />
											</td>
										</tr>
										
										<tr>
											<td class="content-copy" valign="top" style="padding: 0 20px; color: #000; font-size: 14px; font-family: Georgia; line-height: 20px;" colspan="2">
												<br />
																You are now in our private and exclusive beta list! <br /><br />
																Thanks for your interest in <a href="http://'.$domain.'">'.ucwords($domain).'</a>! <br /><br />
																You&#39;ve been added to our queue for Beta access to the <a href="http://'.$domain.'">'.ucwords($domain).'</a> platform. 
																<br /><br />We&#39;ll be in touch soon! </b> <br><br><br>
											</td>
										</tr>	
										
										<tr>
											<td><br /><br /></td>
										</tr>
										
										<tr>
											<td valign="top" width="344" height="6"><img src="http://domaindirectory.com/images/spacer.gif" alt="" /></td>
											<td valign="top" width="6" height="6" align="right">
												<img src="http://domaindirectory.com/images/bottom-right.gif" alt="" />
											</td>
										</tr>
									</table>
								</td>
							</tr>

						</table>
					</td>
				</tr>
			</table>
			
		</td>
	
	</tr>
	<tr>
		<td valign="top">
			<table cellspacing="0" width="100%" cellpadding="0">
				<tr>
					<td valign="top">
						<br />
					</td>
				</tr>
				<tr>
					<td valign="top" bgcolor="#484845">
						<table cellpadding="0" cellspacing="0" width="600" align="center" style="color:#555;font-family:Arial,sans-serif;font-size:12px;line-height:22px;padding:10px;color:white">
									<tbody>
										<tr>
										<td width="120">Connect with us:</td>
										<td width="35"><img src="http://domaindirectory.com/servicepage/images/facebook.png" width="24" height="24" border="0" alt=""></td>
										<td width="80"><a style="color:white;text-decoration:none" href="'.$fb_page.'">Facebook</a> </td>
										<td width="35"><img src="http://domaindirectory.com/servicepage/images/twitter.png" width="24" height="24" border="0" alt=""></td>
										<td width="80"><a style="color:white;text-decoration:none" href="'.$twitter_page.'">Twitter</a> </td>
										<td width="35"><img src="http://domaindirectory.com/servicepage/images/contact.png" width="24" height="24" border="0" alt=""></td>
										<td width="90"><a style="color:white;text-decoration:none" href="http://domaindirectory.com/contactus.html">Contact Us</a></td>
										</tr>
									</tbody>
								</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>

</table>';
	 

   //end of message 
    $headers = "From: $from\r\n"; 
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
    //options to send to cc+bcc 
    //$headers .= "Cc: [email]maa@p-i-s.cXom[/email]"; 
    //$headers .= "Bcc: [email]email@maaking.cXom[/email]"; 
    // now let's send the email. 
    mail($to, $subject, $message, $headers); 
    echo "Your email will never be sold and kept strictly for notification when we launch!";
}else{
	echo $save;
}

?>