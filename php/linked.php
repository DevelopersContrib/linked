<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linked extends CI_Controller {
	private $_token = '{"access_token":"ya29.AHES6ZQGu0JxjbtTAr60UQ6doeO9qrFNKmmlaXPLJWHEFa0","token_type":"Bearer","expires_in":3600,"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6IjQ2MGJhYjIyNGIwMDA2OTY4YTlmZjUyZTNlZDg3YzliODFjNTI2OWEifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiZW1haWwiOiJhZG1pbkBkb21haW5kaXJlY3RvcnkuY29tIiwiaWQiOiIxMTY5MDAyNTI5MTQxMTY4NDIyMTMiLCJzdWIiOiIxMTY5MDAyNTI5MTQxMTY4NDIyMTMiLCJoZCI6ImRvbWFpbmRpcmVjdG9yeS5jb20iLCJ0b2tlbl9oYXNoIjoiazNiSHh6ejdDcjZJTDdiUUxvLWtOUSIsImF0X2hhc2giOiJrM2JIeHp6N0NyNklMN2JRTG8ta05RIiwidmVyaWZpZWRfZW1haWwiOiJ0cnVlIiwiZW1haWxfdmVyaWZpZWQiOiJ0cnVlIiwiYXVkIjoiMTM2NzgwNzAwNTUtNW90cHQxaDNsZzVtcGZha2xxcHU0M2JxOWtpN2dqZzIuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJjaWQiOiIxMzY3ODA3MDA1NS01b3RwdDFoM2xnNW1wZmFrbHFwdTQzYnE5a2k3Z2pnMi5hcHBzLmdvb2dsZXVzZXJjb250ZW50LmNvbSIsImF6cCI6IjEzNjc4MDcwMDU1LTVvdHB0MWgzbGc1bXBmYWtscXB1NDNicTlraTdnamcyLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiaWF0IjoxMzc2NDQ3MDc4LCJleHAiOjEzNzY0NTA5Nzh9.qu8Ombx9Xh6lNxDtlf3K31HlTayYHXr-tmNZXy6ZNqik0ymy7uA953S-ejRR-ZT_p7vbX5Wu8qH1D_oKEzDSOPpzwZtvq0DuUrHQ2YS64fvX-9k4bEunKAb14LOXvslKLncJjZgyPXWFZoX3S4wZzVr_E_ikQ6HYBhAFymJ9GwI","refresh_token":"1\/RmBmgLjoRYUgxUkqPoe4kKy-wgtcI6ZoGLkwGDlFzC0","created":1376447461}';
	private $_hasAccessUsers = array('kjabellar@gmail.com','ecorpcom@gmail.com','maidabarrientos@gmail.com');
	
	private $intention = array('Looking to build a startup from an idea','Open to joining a team');	
	private $age = array('Below 18 years old','18 to 24 years old','25 to 35 years old','36 to 55 years old',
	                      'Above 56 years old');
	private $stage = array('Above 56 years old','Business plan drafted','Prototype built','Product tested','Got paying customers');
	private $time = array('10 hours per week','20 hours per week','30 hours per week','40 hours per week');
	private $investment = array('Sweat equity only','Results Based Equity','Can offer Equal investment','Hourly');
	private $current_status = array('Student','Experience'=>array('Less than 2 years','3 to 5 years','5 to 10 years','10 years and more'));
	private $notify = array(0=>'no',1=>'yes');
	private $capital = array('$1,000 or less', '$5000', '$10000', '$25k or more');
	private $db_offer = null;
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	    $this->load->library('session');
	    $this->load->model('members');
	    $this->load->model('countrydata');
	    $this->load->model('memberevent');
	    $this->load->model('eventdata');
	    $this->load->model('membersocials');
	    $this->load->model('socialdata');
	    $this->load->model('memberexperience');
	    $this->load->model('experiencedata');
	    $this->load->model('profiledata');
	    $this->load->model('industrydata');
	    $this->load->model('memberroles');
	    $this->load->model('applications');
		$this->load->model('partnersdata');
		$this->load->model('domaindirectorydata');
		$this->load->model('domain');
		$this->load->model('domainfollower');
		$this->load->model('boarddata');
		$this->load->model('vnocdata');
		$this->load->model('newsfeed');
		$this->load->model('newsfeed2');
		$this->load->model('teambadgemembers');		
		$this->load->model('affiliatedata');
		$this->load->model('newleadattributes');
		$this->load->model('leadver4attributes');
		$this->load->model('apitovnoc');
		$this->load->model('message');
		$this->load->model('badgememberpoints');
		$this->load->model('badgeactivitydata');
		$this->load->model('memberlegalforms');
		$this->load->model('widgettempactivities');
		$this->load->model('contentdata');
		$this->load->model('linkdata');
		$this->load->model('codeappsdata');
		$this->load->model('developers');
		$this->load->model('challengemembertypes');
		$this->load->model('frameworkvalues');
		$this->load->model('challenges');
		$this->load->model('twitteraccountsdata');
		
		$this->load->model('challengesolution');
		$this->load->model('challengeappimages');
		$this->load->model('challengeappvideo');
		$this->load->model('challengeappfiles');
		$this->load->model('challengediscussion');
		
	    $this->load->library('email');
		$this->load->library('facebook/fb','fb');
		$this->load->library('idevaffiliate');
		$this->load->library('curlclient');
		$this->load->library('apiresthelper');
		$this->load->library('twconnect');
		$this->load->library('googleurlapi');
		$this->load->database();
	    $this->db_offer = $this->load->database('offer', TRUE);
	}
	
	private function saveimageurl($link){
	    $ch = curl_init($link);
	    $filename = time().'.jpg';
		$fp = fopen('./uploads/profile/'.$filename, 'wb');
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		return $filename;
	}
		
	public function topdomains(){
		header('Access-Control-Allow-Origin: *');
		$keywords = $this->db->escape_str($this->input->post('keywords'));
		$limit = $this->db->escape_str($this->input->post('limit'));
		$query = $this->domainfollower->getTopFollowedSitesDomain($keywords,$limit);
		$rows_array = array();
		if ($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
				$rows_array[] =  $row->domain;
			}
		}
		// loaded brands .. 
		$data['query'] = $query;
		$html = $this->load->view('linked/brand_list',$data,true);
		$this->output
                             ->set_content_type('application/json')
                             ->set_output(json_encode(array('html'=>$html)));
		// $this->output
 		//	->set_content_type('application/json')
  		//  ->set_output(json_encode(array('domains'=>$rows_array)));
	}

	private function invitetoslack($email, $name, $domain)
	{
		
		$return = false;
		$status = '';
		if($domain=="contrib.com"){
			$answers = array();
			$response = array();
			
			$answers['answers']['email'] = $email;
			$answers['answers']['name'] = $name;

			array_push($response,$answers);
			

			$typeformData['responses'] = $response;
			$typeformEmailField = 'email';
			$typeformNameField = 'name';
			$previouslyInvitedEmails=array();

			date_default_timezone_set('America/Los_Angeles');
			mb_internal_encoding("UTF-8");
			// your slack team/host name 
			$slackHostName='contribcom';

			// find this when checking the post at https://nomadslack.slack.com/admin/invites/full
			$slackAutoJoinChannels='C0FSPU5FC';
			$slackAutoJoinChannels='C0FSPU5FC,C0FSXCMEW,C0FT6EWL9,C03P0DLA1';
			// generate token at https://api.slack.com/
			$slackAuthToken='xoxs-3782462307-3782462313-15907883970-4a21e68768';
			$slackAuthToken='xoxs-3782462307-3782462313-15915495570-4ed4086fd3';
			$usersToInvite=array();
			foreach($typeformData['responses'] as $response) {
				$user['email']=$response['answers'][$typeformEmailField];
				$user['name']=$response['answers'][$typeformNameField];
				
				if(!in_array($user['email'],$previouslyInvitedEmails)) {
					array_push($usersToInvite,$user);
				}
			}

			// 
			$slackInviteUrl='https://'.$slackHostName.'.slack.com/api/users.admin.invite?t='.time();

			$i=1;
			foreach($usersToInvite as $user) {
				//$status .= date('c').' - '.$i.' - '."\"".$user['name']."\" <".$user['email']."> - Inviting to ".$slackHostName." Slack\n";
				// 
				$fields = array(
					'email' => urlencode($user['email']),
					'channels' => urlencode($slackAutoJoinChannels),
					'first_name' => urlencode($user['name']),
					'token' => $slackAuthToken,
					'set_active' => urlencode('true'),
					'_attempts' => '1'
				);
				
				// url-ify the data for the POST
				$fields_string='';
				foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				rtrim($fields_string, '&');
				
				// open connection
				$ch = curl_init();

				// set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $slackInviteUrl);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch,CURLOPT_POST, count($fields));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

				// exec
				$replyRaw = curl_exec($ch);
				$reply=json_decode($replyRaw,true);
				if($reply['ok']==false) {
					$status .=  date('c').' - '.$i.' - '."\"".$user['name']."\" <".$user['email']."> - ".'Error: '.$reply['error']."\n";
					$return = false;
				}else {
					$status .=  date('c').' - '.$i.' - '."\"".$user['name']."\" <".$user['email']."> - ".'Invited successfully'."\n";
					$return = true;
				}

				// close connection
				curl_close($ch);

				array_push($previouslyInvitedEmails,$user['email']);

				// 
				$i++;
			}
		}
		
		if(!$return){
			$file = 'slack-invite-log.txt';
			$current = file_get_contents($file);
			$date = date('Y-m-d H:i:s');
			$current .= "\n\n $domain - $email - $status - $date";
			file_put_contents($file, $current);
		}
		
		return $return;
	}

	public function saveall2(){
		header('Access-Control-Allow-Origin: *');
		$firstname = $this->db->escape_str($this->input->post('firstname'));
	    $lastname = $this->db->escape_str($this->input->post('lastname'));
	    $email = $this->db->escape_str($this->input->post('email'));
		$exists = $this->members->CheckFieldExists('EmailAddress',$email);
		
		if(empty($email)){
			$this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(array('status'=>false)));
			return;
		}else if($exists){
			$this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(array('status'=>false,'error'=>'Email already exists.')));
			 return;
		}
		
	    $password = $this->db->escape_str($this->input->post('password'));
	    $country_id = $this->db->escape_str($this->input->post('country_id'));
	    $city = $this->db->escape_str($this->input->post('city'));
	    $country = $this->db->escape_str($this->input->post('country'));
	    $website = $this->db->escape_str($this->input->post('website'));
	    $phone = $this->db->escape_str($this->input->post('phone'));
	    $intention = $this->db->escape_str($this->input->post('intention'));
	    $pic = $this->db->escape_str($this->input->post('pics'));
	    $role_id = $this->db->escape_str($this->input->post('role_id'));
	    $role_name = $this->db->escape_str($this->input->post('role_name'));
	    $age_group = $this->db->escape_str($this->input->post('age_group'));
	    $industry_id = $this->db->escape_str($this->input->post('industry_id'));
	    $industry_name =  $this->db->escape_str($this->input->post('industry_name'));
	    $default_photo = $this->db->escape_str($this->input->post('default_photo'));
	    $referrer_id = $this->db->escape_str($this->input->post('referrer_id'));
	    $wa_id = $this->db->escape_str($this->input->post('wa_id'));
		$cam = $this->db->escape_str($this->input->post('cam'));
		$usertype = $this->db->escape_str($this->input->post('usertype'));
		
		$ifdeveloper = $this->db->escape_str($this->input->post('ifdeveloper'));
		$checkedPlatforms = $this->db->escape_str($this->input->post('checkedPlatforms'));
		$checkedTechnologies = $this->db->escape_str($this->input->post('checkedTechnologies'));
		$appnameArr = $this->db->escape_str($this->input->post('appnameArr'));
		$applinkArr = $this->db->escape_str($this->input->post('applinkArr'));
		$appcategoryArr = $this->db->escape_str($this->input->post('appcategoryArr'));
		$appdescArr = $this->db->escape_str($this->input->post('appdescArr'));
		$appimglinkArr = $this->db->escape_str($this->input->post('appimglinkArr'));
		$apppriceArr = $this->db->escape_str($this->input->post('apppriceArr'));
		$appcnt = $this->db->escape_str($this->input->post('appcnt'));
		$redirect_url = $this->db->escape_str($this->input->post('redirect_url'));
		
	
		if(empty($usertype) || $usertype == ""){
			$usertype = 'challenger';
		}
		
		if ($email != ''){
		
		if(!empty($pic)){
			$pic = $this->saveimageurl($pic);
		}
		
		
	    $socials = substr($this->db->escape_str($this->input->post('socials')), 0, -1);
	    $social_values = substr($this->db->escape_str($this->input->post('social_values')), 0, -2); 
	    
	    $experiences = substr($this->db->escape_str($this->input->post('experiences')), 0, -1);
	    $rating = substr($this->db->escape_str($this->input->post('rating')), 0, -2); 
	    
	    $domain = $this->db->escape_str($this->input->post('domain'));
	    
	    $code = $this->members->generateCode();
	    $num = 10;
	    
	    if ($pic == ""){
	    	if ($default_photo !="" && $cam != ""){	
				$pic = $default_photo;
				$text = "no default and cam";
	    	}
			else if($default_photo !=""){			
				$pic = $this->saveimageurl($default_photo);
				$text = "no default";

			}else{
				
				$text = "default";
			}
	    }else{
			$text = "no pic";
		}
		
		
	   $username = substr(strtolower(str_replace(' ','',$firstname.$lastname)), 0, $num);
     
    if ($this->members->CheckFieldExists('Username',$username)){
          $username = $username.$this->members->GetLastMemberId();
     }
	  	   
		while ($this->members->CheckFieldExists('Username',$username)){
			$num--;
			$username = substr(strtolower(str_replace(' ','',$firstname.$lastname)), 0, $num).rand(1, 30);
		}
    
		$uname = $username;
		$username = str_replace(' ', '-', $uname); // Replaces all spaces with hyphens.
		$username = preg_replace('/[^A-Za-z0-9\-]/', '', $uname); // Removes special chars
		
		
		//START --> SAVE MEMBER AFFILIATE ID
			$ausername = $username;
			$domain_name = $domain;
			$domain_affiliate_id = $this->vnocdata->GetInfo('affiliate_id','domain','domain_name',$domain_name);
			if($domain_affiliate_id == 0){ 
				$domain_affiliate_id = 391;
			}			
			if (strlen($username)< 5){
				$ausername = $username.'s30';
	   		}else if (strlen($username)> 10){
				$ausername = substr($username, 0, 8).rand(1,20);
	   		}
	   		if ($this->affiliatedata->CheckFieldExists('idevaff_affiliates','username',$ausername)===true){
	   			$ausername = "user".substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
	   		} 
	   			
			$session_referrer_id = $this->session->userdata('referrer_id');
			$this->session->unset_userdata(array('referrer_id' => ''));

			if(!empty($referrer_id) || $referrer_id > 0 ){
				$referred_by_id = $referrer_id; 
			}else if(!empty($session_referrer_id) || $session_referrer_id > 0){
				$referred_by_id = $session_referrer_id;
			}else{
				$referred_by_id = $domain_affiliate_id;
			}
			
			$member_affiliate_id = 0;
			$flag_user_affiliate = false;			
			if($referred_by_id > 0){
				if($this->idevaffiliate->getrefertype($referred_by_id)=='domain'){
					$member_affiliate_id = $this->idevaffiliate->add_affiliate($ausername,$password,$email,$firstname,$lastname,2,2,$referred_by_id);
					$member_affiliate_id = filter_var($member_affiliate_id, FILTER_SANITIZE_NUMBER_INT);
				}
			}	
				
			if ($member_affiliate_id == ""){
				$member_affiliate_id = 0;
			}
		//END
			$IsDeveloper = 0;   
			if($ifdeveloper == "true"){
				$IsDeveloper = 1;   
			}	
			   
	    	  $data = array(
               'FirstName' => $firstname,
               'LastName' => $lastname,
               'EmailAddress' => $email,
		       'Password'  => $password,
		       'City'=> $city,
		       'EmailCode'=>$code,
		       'CountryId'=>$country_id,
		       'Country'=>$country,
			   'Website'=>$website,
		       'Username'=>$username,
			   'AccountApproved'=>1,
			   'Phone'=>$phone,
	    	   'RoleId'=>$role_id,
	    	   'IndustryId'=>$industry_id,
			   'AffiliateId'=>$member_affiliate_id,
			   'ReferredBy'=>$referred_by_id,
				'IsDeveloper'=>$IsDeveloper
            );

            
         $this->db->insert('Members', $data); 

         
         $id = $this->db->insert_id();
		 
		 if(!empty($id)){
			$invitetoslack = $this->invitetoslack($email,$firstname.' '.$lastname,strtolower($domain));
		 }
		 
         $userid = $id;
         
		 $challengememberdata = array(
			'member_id' => $userid,
			'type' => $usertype,
			'date_registered' => date("Y-m-d H:i:s")
		 );
		 
		 $this->challengemembertypes->update(0,$challengememberdata);
		 $developer_id = 0;
		 $devcount = $this->developers->getqueryresult('SELECT * FROM user');
		
		$dev_apps ='';
		 
		 if($IsDeveloper==1){
			//check if member already exist in developer.contrib
			
			
			if($this->developers->checkexist('user','email',$email)===true){
				//get memberid
				$developer_id = $this->developers->getinfo('user','userid','email',$email);
			}else{		
				//create developers account
				$udata = array(
				'firstname'=>$firstname,
				'lastname'=>$lastname,
				'username'=>$username,
				'password'=>$password,
				'location'=>$country,
				'website'=>$website,
				'date_signedup'=>date('Y-m-d h:i:s'),
				'is_approved'=>1,
				'is_verified'=>1,
				'email'=>$email
				);
				$developer_id = $this->developers->update('user','userid',$developer_id,$udata);
			}
			
			//add user_platforms
			if(!empty($checkedPlatforms)){
				$platformdata = array(
				'userid'=>$developer_id,
				'platforms'=>$checkedPlatforms
				);
				$this->developers->update('user_platforms','userid',$developer_id,$platformdata);
			}
			//add user_technologies
			if(!empty($checkedTechnologies)){
				$technodata = array(
				'userid'=>$developer_id,
				'technologies'=>$checkedTechnologies
				);
				$this->developers->update('user_technologies','userid',$developer_id,$technodata);
			}
			//add user_apps
				$appnameArr = $this->db->escape_str($this->input->post('appnameArr'));
				$applinkArr = $this->db->escape_str($this->input->post('applinkArr'));
				$appcategoryArr = $this->db->escape_str($this->input->post('appcategoryArr'));
				$appdescArr = $this->db->escape_str($this->input->post('appdescArr'));
				$appimglinkArr = $this->db->escape_str($this->input->post('appimglinkArr'));
				$apppriceArr = $this->db->escape_str($this->input->post('apppriceArr'));
				$appcnt = $this->db->escape_str($this->input->post('appcnt'));
				
				if (!empty($appnameArr)){
					$dev_apps = '
					Developer Name : '.ucwords($firstname.' '.$lastname).'<br>
					Developer Email : '.$email.'<br>
					Profile Link : <a href="https://contrib.com/people/me/'.$username.'">https://contrib.com/people/me/'.$username.'</a><br><br>';
					
					for($i=0;$i<$appcnt;$i++){
						$appdata = array(
						'userid'=>$developer_id,
						'name'=>$appnameArr[$i],
						'link'=>$applinkArr[$i],
						'category_id'=>$appcategoryArr[$i],
						'description'=>$appdescArr[$i],
						'image_url'=>$appimglinkArr[$i],
						'price'=>$apppriceArr[$i],
						'slug'=>strtolower(str_replace(" ","-",$appnameArr[$i]))
						);
						$this->developers->update('user_apps','userid',0,$appdata);
						
						$dev_apps .= ($i+1).'.) Title of Application : '.$appnameArr[$i].'<br>
						Description : '.$appdescArr[$i].'<br><br>
						';
					}
					
					//notify admin for apps submitted
					$this->members->DeveloperAppsNotifyAdmin($dev_apps);
				}
				
			//send developer email
				$this->members->SendDeveloperContribNotification($email,$firstname,$lastname);	
		 }
		  
		
		 
		$bdata = array('activity_id'=>'1',
						'member_id'=>$userid,
						'points'=>'10',
						'message'=>'has signed up using '.$domain,
						'domain'=>$domain
		 );
		 $badgepoints = $this->badgememberpoints->update(0,$bdata);
         $pfdata = array('intention'=>$intention,'profile_image'=>$pic,'age_group'=>$age_group,'member_id'=>$id);
         
	     $this->profiledata->update($id,$pfdata);
		 
		 
		 //send message notification
			$receiver_id =  $userid;
			$to_username = $this->members->GetUserInfo('Username','MemberId',$receiver_id);
			
			$from_email = "chad@ecorp.com";
			$from = "Chad Folkening";
			
			
			$subject = "A letter from the Founder";
			$message = $to_username."<br> Welcome to Contrib.  We are focused on building great online brands with a new and advanced equity partnership model.  People make great companies and we welcome you to Contrib.  Browse through our <a href='/marketplace'>Marketplace of People, Partnerships, Proposals and Brands</a> and find your next great opportunity or join other great people doing amazing things.
			";
			
			$message_data = array('MemberId' => $receiver_id,
									'FromId' =>	'9',
									'From' => $from,
									'FromEmail' => $from_email,
									'Subject' => $subject,
									'Message' => $message,
									'Read' => '0',
									);
			$this->message->update(0,$message_data);
		
		 
		 //save to getresponse campaign
		 $reponse_url = "https://www.manage.vnoc.com/campaignresponse/addContact";
		 $param = array(
	   	   'campaign_id'=>'OZVR',
	   	   'contact_email'=>$email,
	   	   'contact_name'=>$firstname." ".$lastname
	   	 ); 
	   	 
		$result = json_decode($this->apiresthelper->createApiCall($reponse_url,'POST',array('Accept: application/json'),$param),true);
		 
	    $s = explode(',',$socials);
	    $v = explode (';;',$social_values);
	    
	    for ($i=0;$i<count($s);$i++){
	    	
	    	$sdata = array('member_id'=>$userid,'social_id'=>$s[$i],'value'=>$v[$i]);
	    	if ($this->membersocials->checkexist('member_id',$userid,'social_id',$s[$i])===false){
	    		$this->membersocials->update(0,$sdata);
	    	}else {
	    		$s_id = $this->membersocials->getinfo('s_id','member_id',$userid, 'social_id', $s[$i]);
	    		$this->membersocials->update($s_id,$sdata);
	    	}
	    	unset($sdata);
	    }
	    
	    
	    $ex = explode(',',$experiences);
	    $r = explode (';;',$rating);
	    
	    for ($j=0;$j<count($ex);$j++){
		    $rdata = array('member_id'=>$userid,'skill_id'=>$ex[$j],'rate'=>$r[$j]);
			if ($this->memberexperience->checkexist('member_id',$userid,'skill_id',$ex[$j])===false){
				$this->memberexperience->update(0,$rdata);
			}else {
				$ex_id = $this->memberexperience->getinfo('ex_id','member_id',$userid, 'skill_id', $ex[$j]);
				$this->memberexperience->update($ex_id,$rdata);
			}
	    }
	    
				//USER DETAILS
				$rowUsername = $this->members->GetUserInfo('UserName','MemberId',$userid);	
				$rowFirstname = $this->members->GetUserInfo('Firstname','MemberId',$userid);	
				$rowLastname = $this->members->GetUserInfo('Lastname','MemberId',$userid);	
				$rowavatar = $this->profiledata->getinfobyid('profile_image',$userid);
				
				if($rowavatar == 'NULL' || $rowavatar == "" || $rowavatar == "0")
					$rowProfile_image = 'https://d2qcctj8epnr7y.cloudfront.net/sheina/contrib/default_avatar.png';
				else
					$rowProfile_image = base_url().'img/timthumb.php?src=uploads/profile/'.$rowavatar.'&w=50&h=50';	
		
		
			if($domain!=''){
				$datafollow = array(
				   'member_id' => $id,
				   'domain' => $domain,
				   'date_followed' => date('Y-m-d h:i:s')
				);
				$this->domainfollower->update(0,$datafollow);				
				//$this->members->SendFollowNotification($email,$domain,$firstname,$lastname);
				$this->SaveLeadToDomainDi($email,$domain,$_SERVER['REMOTE_ADDR']);
			}
			
			
			//save initial badge
				$badgearray = array('member_id'=>$userid,'badge_id'=>1,'domain_name'=>($domain!="")?$domain:'contrib.com');
				$this->teambadgemembers->update(0,$badgearray);

			if( $domain!='' && $domain!='Contrib.com' && $domain!='contrib.com' ){			
				//save to newsfeed
				$domid = $this->domain->GetDomainInfo('DomainId','DomainName',$domain);
				$feedtitle = $this->domain->GetDomainInfo('Title','DomainName',$domain);
				$feeddescription = $this->domain->GetDomainInfo('Description','DomainName',$domain);
				$feedlogo = $this->domain->GetDomainInfo('Logo','DomainName',$domain);
				if($feedlogo=='') $feedlogo = 'https://d2qcctj8epnr7y.cloudfront.net/contrib/logo-contrib-brand2.png';
				if($feedtitle=='') $feedtitle = ucwords($domain);
				if($feeddescription=='') $feeddescription = 'The Best Place to find Stuff.';
				 
				 $newpost = '<div class="newspost" id="{{replace_id_here}}"><a class="pull-left" href="/people/me/'.$rowUsername.'" target="_blank"><img class="media-object p-u-i  img-circle" src="'.$rowProfile_image.'"></a><div class="previewPosted"><a href="/people/me/'.$rowUsername.'" target="_blank" class="newspost-name">'.ucwords($rowFirstname.' '.$rowLastname).'</a><span class="postfeed-date">'.date('M d, Y').'</span><div class="previewTextPosted">Hi! I just joined and followed '.ucwords($domain).'!</div><div class="previewImagesPosted"><div class="previewImagePosted"><a href="/brand/details/'.strtolower($domain).'" target="_blank"><img src="'.$feedlogo.'" style="width: 130px; height: auto; float: left;"></a></div></div><div class="previewContentPosted"><div class="previewTitlePosted" id="" style="width: 100%px"><a href="/brand/details/'.strtolower($domain).'" target="_blank"><span id="previewSpanTitle" style="background-color: transparent;">'.$feedtitle.'</span></a></div><div class="previewUrlPosted">www.'.strtolower($domain).'</div><div class="previewDescriptionPosted" id="" style="width: 100%px"> <span id="\&quot;previewSpanDescription\&quot;" style="\&quot;background-color:" transparent;\"="">'.$feeddescription.'</span></div></div><div style="clear: both"></div></div></div>';
				 $newpostdata = array('member_id'=>$userid,'message'=>$newpost,'domain'=>$domain);	
				 $this->newsfeed->update(0,$newpostdata);
				 
				 $datanewsfeed2 = array(
				 'member_id'=>$userid,
				 'message'=>'Hi! I just joined and followed '.ucwords($domain).'!',
				 'filter'=>'1',
				 'domain'=>$domain,
				 'prev_title'=>ucwords($domain),
				 'prev_desc'=>$feeddescription,
				 'prev_href'=>'www.'.$domain,
				 'prev_image'=>$feedlogo);				 
				 $this->newsfeed2->update(0,$datanewsfeed2);
				 
			}else{
				//save to newsfeed NOT FOLLOWING ANY DOMAIN				
				 $newpost = '<div class="newspost" id="{{replace_id_here}}"><a class="pull-left" href="/people/me/'.$rowUsername.'" target="_blank"><img class="media-object p-u-i  img-circle" src="'.$rowProfile_image.'"></a><div class="previewPosted"><a href="/people/me/'.$rowUsername.'" target="_blank" class="newspost-name">'.ucwords($rowFirstname.' '.$rowLastname).'</a><span class="postfeed-date">'.date('M d, Y').'</span><div class="previewTextPosted">Hi! I just joined Contrib.com! </div></div></div>';
				 $newpostdata = array('member_id'=>$userid,'message'=>$newpost);	
				 $this->newsfeed->update(0,$newpostdata);
				 
				  $datanewsfeed2 = array(
				 'member_id'=>$userid,
				 'message'=>'Hi! I just joined Contrib.com!');			 
				 $this->newsfeed2->update(0,$datanewsfeed2);
			}
	    
          if (!empty($id)){
          	$newdata = array(
                   'username'  => $firstname,
                   'userid'     => $id,
                   'logged_in' => TRUE,
                   'redirect_url' => $redirect_url
               );

            $this->session->set_userdata($newdata);
          	
            

            if($domain != '')
				$signed_up_domain = $domain;
			else
				$signed_up_domain = 'contrib.com';
				
			//$this->members->SendNotification($email,$code,$firstname,$lastname);
			$this->members->SendContribNotification($email,$code,$firstname,$lastname,$signed_up_domain);	
				
			
            $config['wordwrap'] = TRUE;
		    $config['mailtype'] = "html";
            $this->email->initialize($config);
            $subject = "Contrib.com New Sign Up";
					  $msg = "New user has signed up to contrib.com<br><br>";
					  $msg .= "Name: ".$firstname." ".$lastname."<br>";
					  $msg .= "Domain: ".$signed_up_domain."<br>";
					  $msg .= "Email: ".$email."<br>";
					  $msg .= "Country: ".$country."<br>";
					  $msg .= "City: ".$city."<br>";
					  $msg .= "Age group: ".$age_group."<br>";
					  $msg .= "Phone: ".$phone."<br>";
					  $msg .= "Website: ".$website."<br>";
					  $msg .= "Intention: ".$intention."<br>";
					  $msg .= "Role: ".$role_name."<br>";
					  $msg .= "Industry: ".$industry_name."<br>";
                      $msg .= "<br>
								 <a href=\"https://www.contrib.com/people/me/$username\">View user profile</a><br>";
					  $msg .= "<a href='https://manage.vnoc.com'>Go to Vnoc.Com</a><br>";
					  $msg .= "<a href='https://login.salesforce.com/'>Go to Salesforce.Com</a><br>";
					   $msg .= "<br><br>
								This Lead is at <a href='https://manage.vnoc.com/staffing'>Network/staffing</a> page at VNOC.";
						$emailmessage = wordwrap($msg);
						//$headers = "From: Admin <admin@contrib.com>\r\n".'X-Mailer: PHP/' . phpversion();
						//mail("sheinavi@gmail.com,jogacer679@gmail.com,maidabarrientos@gmail.com,chad@ecorp.com,kjabellar@gmail.com", $subject, $emailmessage, $headers);
						// mail("kjabellar@gmail.com", $subject, $emailmessage, $headers); 
				  
						$tos = array('kjabellar@gmail.com','chad@ecorp.com','maidabarrientos@gmail.com,jogacer679@gmail.com');
						//$tos = 'sheinavi@gmail.com';
						$this->email->from('admin@contrib.com','Admin');
						$this->email->to($tos);
						$this->email->subject($subject);
						$this->email->message($emailmessage);
						$this->email->send();
			   
					//	$this->addcomment($board_userid, $firstname." ".$lastname,$domain);
        
				//process all widget activities
				if ($wa_id != ""){
					$this->processwidgetactivity($wa_id,$userid);
				} 
				
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('status'=>true,'email'=>base64_encode($email),'ifdeveloper'=>$ifdeveloper,'developer_id'=>$developer_id,'devcount'=>$devcount->num_rows())));
          }else {
          	  $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(array('status'=>false)));
          }
	    
		}else {
			  $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode(array('status'=>false)));
		}
	    
	    
	}
	
} //end of class