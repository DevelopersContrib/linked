<?php
function createApiCall($url, $method, $headers, $data = array(),$user=null,$pass=null)
{
        if (($method == 'PUT') || ($method=='DELETE'))
        {
            $headers[] = 'X-HTTP-Method-Override: '.$method;
        }

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        if ($user){
         curl_setopt($handle, CURLOPT_USERPWD, $user.':'.$pass);
        } 

        switch($method)
        {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($handle, CURLOPT_POST, true);
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'PUT':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'DELETE':
                curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }
        $response = curl_exec($handle);
        return $response;
}
    $api_url = "http://api2.contrib.co/request/";
    $headers = array('Accept: application/json');
    $domain = $_SERVER["HTTP_HOST"]."".$_SERVER['REQUEST_URI'];//input sitename without www
    $key = md5('vnoc.com');

if (!file_exists('includes/config-framework.php')) {
    $file = file_get_contents('./includes/config-template.php');
    $api_url = "http://api2.contrib.co/request/";
    $headers = array('Accept: application/json');
    $domain = $_SERVER["HTTP_HOST"]."".$_SERVER['REQUEST_URI'];//input sitename without www
    $error = 0;
    
    if(stristr($domain,'~') ===FALSE) {
    	$domain = $_SERVER["HTTP_HOST"];
      $domain = str_replace("http://","",$domain);
    	$domain = str_replace("www.","",$domain);
    	$key = md5($domain);
    }else {
       $key = md5('vnoc.com');
       $d = explode('~',$domain);
       $user = str_replace('/','',$d[1]);
       
       $url = $api_url.'getdomainbyusername?username='.$user.'&key='.$key;
       $result =  createApiCall($url, 'GET', $headers, array());
       $data_domain = json_decode($result,true);
       $domain =   $data_domain['data']['domain'];
       
    }
    
    $url = $api_url.'getdomaininfo?domain='.$domain.'&key='.$key;
    $result = createApiCall($url, 'GET', $headers, array());
    $data_domain = json_decode($result,true);
    
    
    if ($data_domain['success']){
    	$domainid = $data_domain['data']['DomainId'];
    	$domainname = $data_domain['data']['DomainName'];
    	$memberid = $data_domain['data']['MemberId'];
    	$title = $data_domain['data']['Title'];
    	$logo = $data_domain['data']['Logo'];
    	$description = $data_domain['data']['Description'];
    	$account_ga = $data_domain['data']['AccountGA'];
    	$description = stripslashes(str_replace('\n','<br>',$description));
    	
      $url2 = $api_url.'getdomainattributes?domain='.$domain.'&key='.$key;
      $result2 = createApiCall($url2, 'GET', $headers, array());
    	$data_domain2 = json_decode($result2,true);
    	
      if($data_domain2['success']){
    		$background_image = $data_domain2['data']['background_image_url'];
    		$top_description = $data_domain2['data']['top_description'];
    		$top_description = stripslashes(str_replace('\n','<br>',$top_description));
    		
    		$forsale = $data_domain2['data']['show_for_sale_banner'];
    		$forsaletext = $data_domain2['data']['for_sale_text'];
    	
    		if($forsaletext=='') $forsaletext = 'This domain belongs to the Global Ventures network. We have interesting opportunities for work, sponsors and partnerships.';
    		
    		
    	}else{
    		$error++;
    	}
    			
          $file = str_replace('{{DOMAIN}}',$domain , $file);
          $file = str_replace('{{DOMAIN_ID}}',$domainid , $file);
          $file = str_replace('{{MEMBER_ID}}',$memberid, $file);
          $file = str_replace('{{TITLE}}',$title, $file);
          $file = str_replace('{{LOGO}}',$logo, $file);
          $file = str_replace('{{DESCRIPTION}}',$description, $file);
          $file = str_replace('{{ACCOUNT_GA}}',$account_ga, $file);
          $file = str_replace('{{BACKGROUND_IMAGE}}',$background_image, $file);
          $file = str_replace('{{TOP_DESCRIPTION}}',$top_description, $file);
          $file = str_replace('{{SHOW_FOR_SALE}}',$forsale, $file);
          $file = str_replace('{{FOR_SALE_TEXT}}',$forsaletext, $file);
          $file = str_replace('{{FOOTER_BANNER}}',$footer_banner, $file);
  
    }else {
    	$error++;
    }
    
    
    //get monetize ads from vnoc
    $url = $api_url.'getbannercode?d='.$domain.'&p=footer';
    $result = createApiCall($url, 'GET', $headers, array());
    $data_ads = json_decode($result,true);
    // $footer_banner = html_entity_decode(base64_decode($data_ads['data']['content']));
    
    //get domain affiliate id
    $url = $api_url.'getdomainaffiliateid?domain='.$domain.'&key='.$key;
    $result = createApiCall($url, 'GET', $headers, array());
    $data_domain_affiliate = json_decode($result,true);
    if ($data_domain_affiliate['success']){
    	$domain_affiliate_id = $data_domain_affiliate['data']['affiliate_id'];
    }else {
    	$domain_affiliate_id = '391'; //contrib.com affiliate id
    }
    $domain_affiliate_link = 'http://referrals.contrib.com/idevaffiliate.php?id='.$domain_affiliate_id.'&url=http://www.contrib.com/signup/firststep?domain='.$domain;
    
    
    	
    //get Widget Users
    $url = $api_url.'getwidget?ma=users&key='.$key;
    $result = createApiCall($url, 'GET', $headers, array());
    $data_widget_users = json_decode($result,true);
    
    	
    //get Widget Jobs
    $url = $api_url.'getwidget?ma=jobs&key='.$key;
    $result = createApiCall($url, 'GET', $headers, array());
    $data_widget_jobs = json_decode($result,true);
    
    //get form option selects
    $url = $api_url.'getsignupformdata';
    $result = createApiCall($url, 'GET', $headers, array());
    $data_signup = json_decode($result,true);
    
    if ($data_signup['success']){
    	$rolesarray = $data_signup['data']['roles'];
    	$countriesarray = $data_signup['data']['countries'];
    	$industriesarray = $data_signup['data']['industries'];
      $experiencearray = $data_signup['data']['experiences'];
    	$parnershiptypes = array('Sponsorship Marketing Partnerships','Distribution Marketing Partnerships','Affiliate Marketing Partnerships','Added Value Marketing Partnerships');
    }	
	
	
  
  //create file
  //$file = str_replace('{{FOLLOW_COUNT}}',$follow_count, $file);
  $file = str_replace('{{AFF_LINK}}',$domain_affiliate_link, $file);
  $file = str_replace('{{WIDGETS}}',var_export($data_widget_users, true), $file);
  $file = str_replace('{{JOBS}}',var_export($data_widget_jobs, true), $file);
  $file = str_replace('{{ROLES}}',var_export($rolesarray, true), $file);
  $file = str_replace('{{COUNTRIES}}',var_export($countriesarray, true) , $file);
  $file = str_replace('{{INDUSTRIES}}',var_export($industriesarray, true), $file);
  $file = str_replace('{{EXPERIENCES}}',var_export($experiencearray, true), $file);
  //$file = str_replace('{{PARTNERS}}',var_export($approved_partner, true), $file);
  file_put_contents('./includes/config-framework.php', $file);
}

	include "./includes/config-framework.php";
  
	//partners 
	$url = $api_url.'getpartners?domain='.$domain.'&key='.$key;
	$result = createApiCall($url, 'GET', $headers, array());
	$partners_result = json_decode($result,true);
	$partners = array();  
	if ($partners_result['success']){
		$partners = $partners_result;
	}	
  
	//get number of leads for counter
    $url = $api_url.'getdomainleadscount?domain='.$domain.'&key='.$key;
    $result = createApiCall($url, 'GET', $headers, array());
    $data_follow_count = json_decode($result,true);
    if ($data_follow_count['success']){
    	$follow_count = ($data_follow_count['data']['leads'] + 1 ) * 25;
    }else {
    	$follow_count = 1 * 25;
    }

	//	generate robots.txt if not exist
	$filename = '/robots.txt';
	//if(!(file_exists($filename))) {
    $my_file = 'robots.txt';
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = '---BEGIN ROBOTS.TXT ---
User-Agent: *
Disallow:

Sitemap: http://'.$domain.'/sitemap.html
--- END ROBOTS.TXT ----';
	fwrite($handle, $data);
	//}
?>