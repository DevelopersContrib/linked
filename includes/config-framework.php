<?php
    $domain =   "{{DOMAIN}}";
    $domainid = "{{DOMAIN_ID}}";
    $memberid = "{{MEMBER_ID}}";
    $title = "{{TITLE}}";
    $logo =  "{{LOGO}}";
    $description = "{{DESCRIPTION}}";
    $account_ga = "{{ACCOUNT_GA}}";
    $description = stripslashes(str_replace('\n','<br>',$description));
    
    $background_image = "{{BACKGROUND_IMAGE}}";
    $top_description =  "{{TOP_DESCRIPTION}}";
    $top_description = stripslashes(str_replace('\n','<br>',$top_description));
    $forsale = "{{SHOW_FOR_SALE}}";
		$forsaletext = "{{FOR_SALE_TEXT}}";
    
    $footer_banner = "{{FOOTER_BANNER}}";
    $follow_count = "{{FOLLOW_COUNT}}";
    
    $domain_affiliate_link = "http://referrals.contrib.com/idevaffiliate.php?id=391&url=http://www.contrib.com/signup/firststep?domain=localhost:90";
    $data_widget_users = array (
  'success' => false,
  'data' => 
  array (
    'error_message' => 
    array (
      0 => 'Invalid api key.',
    ),
  ),
);
    $data_widget_jobs = array (
  'success' => false,
  'data' => 
  array (
    'error_message' => 
    array (
      0 => 'Invalid api key.',
    ),
  ),
);
    
    
    $rolesarray = array (
  0 => 
  array (
    'role_id' => '24',
    'role_name' => 'Advisor',
  ),
  1 => 
  array (
    'role_id' => '34',
    'role_name' => 'Chief Technology Officer',
  ),
  2 => 
  array (
    'role_id' => '30',
    'role_name' => 'Co-founder',
  ),
  3 => 
  array (
    'role_id' => '35',
    'role_name' => 'Community Manager',
  ),
  4 => 
  array (
    'role_id' => '7',
    'role_name' => 'Content Manager',
  ),
  5 => 
  array (
    'role_id' => '29',
    'role_name' => 'Domain Owner',
  ),
  6 => 
  array (
    'role_id' => '25',
    'role_name' => 'Engineer',
  ),
  7 => 
  array (
    'role_id' => '21',
    'role_name' => 'Execution Officer',
  ),
  8 => 
  array (
    'role_id' => '14',
    'role_name' => 'Graphics UI',
  ),
  9 => 
  array (
    'role_id' => '42',
    'role_name' => 'Human Resource Manager',
  ),
  10 => 
  array (
    'role_id' => '32',
    'role_name' => 'Investor',
  ),
  11 => 
  array (
    'role_id' => '17',
    'role_name' => 'Lead Developer',
  ),
  12 => 
  array (
    'role_id' => '15',
    'role_name' => 'Marketer',
  ),
  13 => 
  array (
    'role_id' => '23',
    'role_name' => 'Mentor',
  ),
  14 => 
  array (
    'role_id' => '11',
    'role_name' => 'Owner',
  ),
  15 => 
  array (
    'role_id' => '12',
    'role_name' => 'Partner',
  ),
  16 => 
  array (
    'role_id' => '27',
    'role_name' => 'Partner Manager',
  ),
  17 => 
  array (
    'role_id' => '31',
    'role_name' => 'Press/Marketing Relations',
  ),
  18 => 
  array (
    'role_id' => '1',
    'role_name' => 'Project Manager',
  ),
  19 => 
  array (
    'role_id' => '36',
    'role_name' => 'Quality Assurance Officer',
  ),
  20 => 
  array (
    'role_id' => '33',
    'role_name' => 'Research Specialist',
  ),
  21 => 
  array (
    'role_id' => '26',
    'role_name' => 'Revenue Officer',
  ),
  22 => 
  array (
    'role_id' => '16',
    'role_name' => 'Social and Media ',
  ),
  23 => 
  array (
    'role_id' => '38',
    'role_name' => 'Social Media Monitor',
  ),
  24 => 
  array (
    'role_id' => '37',
    'role_name' => 'Social Media Monitor',
  ),
  25 => 
  array (
    'role_id' => '9',
    'role_name' => 'Tester',
  ),
  26 => 
  array (
    'role_id' => '28',
    'role_name' => 'Venture Leader',
  ),
  27 => 
  array (
    'role_id' => '8',
    'role_name' => 'Web Developer',
  ),
);
	  $countriesarray = array (
  0 => 
  array (
    'country_id' => '11',
    'name' => 'Argentina',
  ),
  1 => 
  array (
    'country_id' => '12',
    'name' => 'Armenia',
  ),
  2 => 
  array (
    'country_id' => '14',
    'name' => 'Australia',
  ),
  3 => 
  array (
    'country_id' => '15',
    'name' => 'Austria',
  ),
  4 => 
  array (
    'country_id' => '17',
    'name' => 'Bahamas',
  ),
  5 => 
  array (
    'country_id' => '18',
    'name' => 'Bahrain',
  ),
  6 => 
  array (
    'country_id' => '200',
    'name' => 'Belarus',
  ),
  7 => 
  array (
    'country_id' => '21',
    'name' => 'Belgium',
  ),
  8 => 
  array (
    'country_id' => '29',
    'name' => 'Brazil',
  ),
  9 => 
  array (
    'country_id' => '35',
    'name' => 'Cambodia',
  ),
  10 => 
  array (
    'country_id' => '37',
    'name' => 'Canada',
  ),
  11 => 
  array (
    'country_id' => '42',
    'name' => 'Chile',
  ),
  12 => 
  array (
    'country_id' => '43',
    'name' => 'China',
  ),
  13 => 
  array (
    'country_id' => '46',
    'name' => 'Colombia',
  ),
  14 => 
  array (
    'country_id' => '207',
    'name' => 'Cuba',
  ),
  15 => 
  array (
    'country_id' => '51',
    'name' => 'Denmark',
  ),
  16 => 
  array (
    'country_id' => '56',
    'name' => 'Ecuador',
  ),
  17 => 
  array (
    'country_id' => '57',
    'name' => 'Egypt',
  ),
  18 => 
  array (
    'country_id' => '58',
    'name' => 'El Salvador',
  ),
  19 => 
  array (
    'country_id' => '64',
    'name' => 'Fiji',
  ),
  20 => 
  array (
    'country_id' => '65',
    'name' => 'Finland',
  ),
  21 => 
  array (
    'country_id' => '66',
    'name' => 'France',
  ),
  22 => 
  array (
    'country_id' => '71',
    'name' => 'Georgia',
  ),
  23 => 
  array (
    'country_id' => '72',
    'name' => 'Germany',
  ),
  24 => 
  array (
    'country_id' => '80',
    'name' => 'Guatemala',
  ),
  25 => 
  array (
    'country_id' => '83',
    'name' => 'Haiti',
  ),
  26 => 
  array (
    'country_id' => '85',
    'name' => 'Honduras',
  ),
  27 => 
  array (
    'country_id' => '87',
    'name' => 'Hungary',
  ),
  28 => 
  array (
    'country_id' => '88',
    'name' => 'Iceland',
  ),
  29 => 
  array (
    'country_id' => '89',
    'name' => 'India',
  ),
  30 => 
  array (
    'country_id' => '90',
    'name' => 'Indonesia',
  ),
  31 => 
  array (
    'country_id' => '91',
    'name' => 'Ireland',
  ),
  32 => 
  array (
    'country_id' => '92',
    'name' => 'Israel',
  ),
  33 => 
  array (
    'country_id' => '93',
    'name' => 'Italy',
  ),
  34 => 
  array (
    'country_id' => '94',
    'name' => 'Jamaica',
  ),
  35 => 
  array (
    'country_id' => '95',
    'name' => 'Japan',
  ),
  36 => 
  array (
    'country_id' => '111',
    'name' => 'Macedonia',
  ),
  37 => 
  array (
    'country_id' => '112',
    'name' => 'Madagascar',
  ),
  38 => 
  array (
    'country_id' => '113',
    'name' => 'Malawi',
  ),
  39 => 
  array (
    'country_id' => '114',
    'name' => 'Malaysia',
  ),
  40 => 
  array (
    'country_id' => '115',
    'name' => 'Maldives',
  ),
  41 => 
  array (
    'country_id' => '116',
    'name' => 'Mali',
  ),
  42 => 
  array (
    'country_id' => '117',
    'name' => 'Malta',
  ),
  43 => 
  array (
    'country_id' => '132',
    'name' => 'Netherlands',
  ),
  44 => 
  array (
    'country_id' => '135',
    'name' => 'New Zealand',
  ),
  45 => 
  array (
    'country_id' => '140',
    'name' => 'Norway',
  ),
  46 => 
  array (
    'country_id' => '145',
    'name' => 'Paraguay',
  ),
  47 => 
  array (
    'country_id' => '146',
    'name' => 'Peru',
  ),
  48 => 
  array (
    'country_id' => '147',
    'name' => 'Philippines',
  ),
  49 => 
  array (
    'country_id' => '148',
    'name' => 'Poland',
  ),
  50 => 
  array (
    'country_id' => '149',
    'name' => 'Portugal',
  ),
  51 => 
  array (
    'country_id' => '153',
    'name' => 'Romania',
  ),
  52 => 
  array (
    'country_id' => '154',
    'name' => 'Russia',
  ),
  53 => 
  array (
    'country_id' => '166',
    'name' => 'Singapore',
  ),
  54 => 
  array (
    'country_id' => '170',
    'name' => 'Spain',
  ),
  55 => 
  array (
    'country_id' => '175',
    'name' => 'Sweden',
  ),
  56 => 
  array (
    'country_id' => '176',
    'name' => 'Switzerland',
  ),
  57 => 
  array (
    'country_id' => '177',
    'name' => 'Taiwan',
  ),
  58 => 
  array (
    'country_id' => '180',
    'name' => 'Thailand',
  ),
  59 => 
  array (
    'country_id' => '189',
    'name' => 'Ukraine',
  ),
  60 => 
  array (
    'country_id' => '190',
    'name' => 'United Arab Emirates',
  ),
  61 => 
  array (
    'country_id' => '191',
    'name' => 'United Kingdom',
  ),
  62 => 
  array (
    'country_id' => '1',
    'name' => 'United States',
  ),
  63 => 
  array (
    'country_id' => '194',
    'name' => 'Venezuela',
  ),
  64 => 
  array (
    'country_id' => '195',
    'name' => 'Vietnam',
  ),
);
	  $industriesarray = array (
  0 => 
  array (
    'IndustryId' => '6',
    'Name' => 'Admin Support',
  ),
  1 => 
  array (
    'IndustryId' => '12',
    'Name' => 'Autos',
  ),
  2 => 
  array (
    'IndustryId' => '14',
    'Name' => 'Business Services',
  ),
  3 => 
  array (
    'IndustryId' => '19',
    'Name' => 'Computer and Technology',
  ),
  4 => 
  array (
    'IndustryId' => '5',
    'Name' => 'Design & Multimedia',
  ),
  5 => 
  array (
    'IndustryId' => '17',
    'Name' => 'Education',
  ),
  6 => 
  array (
    'IndustryId' => '4',
    'Name' => 'Engineering & Manufacturing',
  ),
  7 => 
  array (
    'IndustryId' => '10',
    'Name' => 'Events and Parties',
  ),
  8 => 
  array (
    'IndustryId' => '7',
    'Name' => 'Finance & Management',
  ),
  9 => 
  array (
    'IndustryId' => '13',
    'Name' => 'Fitness and Recreation',
  ),
  10 => 
  array (
    'IndustryId' => '11',
    'Name' => 'Healthcare and Beauty',
  ),
  11 => 
  array (
    'IndustryId' => '18',
    'Name' => 'Home Care and Services',
  ),
  12 => 
  array (
    'IndustryId' => '8',
    'Name' => 'Legal',
  ),
  13 => 
  array (
    'IndustryId' => '9',
    'Name' => 'Real Estate',
  ),
  14 => 
  array (
    'IndustryId' => '2',
    'Name' => 'Sales & Marketing',
  ),
  15 => 
  array (
    'IndustryId' => '15',
    'Name' => 'Staffing and Jobs',
  ),
  16 => 
  array (
    'IndustryId' => '16',
    'Name' => 'Travel',
  ),
  17 => 
  array (
    'IndustryId' => '1',
    'Name' => 'Web & Programming',
  ),
  18 => 
  array (
    'IndustryId' => '3',
    'Name' => 'Writing & Translation',
  ),
);

$experiencesarray = array (
  0 => 
  array (
    'experience' => 'Finance',
    'skill_id' => '1',
  ),
  1 => 
  array (
    'experience' => 'Managing people',
    'skill_id' => '2',
  ),
  2 => 
  array (
    'experience' => 'Marketing',
    'skill_id' => '3',
  ),
  3 => 
  array (
    'experience' => 'Product Management',
    'skill_id' => '4',
  ),
  4 => 
  array (
    'experience' => 'Sales',
    'skill_id' => '5',
  ),
  5 => 
  array (
    'experience' => 'Server Management and Infrastructure',
    'skill_id' => '9',
  ),
  6 => 
  array (
    'experience' => 'Technical',
    'skill_id' => '6',
  ),
  7 => 
  array (
    'experience' => 'Web Design',
    'skill_id' => '8',
  ),
  8 => 
  array (
    'experience' => 'Web Development',
    'skill_id' => '7',
  ),
);
	  $parnershiptypes = array('Sponsorship Marketing Partnerships','Distribution Marketing Partnerships','Affiliate Marketing Partnerships','Added Value Marketing Partnerships');
    
    
    
?>