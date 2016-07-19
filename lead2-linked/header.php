<?php include('includes/config.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<html lang="en-US">
<head profile="http://www.w3.org/2005/10/profile">
<link rel="icon" type="image/icon" href="favicon.ico">
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
<link rel="canonical" href="http://<?=$domain?>" />
<meta name="robots" content="index, follow" />
<title><?=$title?></title>
<meta name="title" content="<?=$domain?> " />
<meta name="description" content="<?=$domain?> <?=$description?>" />

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800">
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
	<link rel="stylesheet" type="text/css" href="css/leadver1.css">
	<link rel="stylesheet" type="text/css" href="css/verticals.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url?>css/jquery.glue.css">
	<link rel="stylesheet" href="<?php echo $base_url?>css/exitpage.css">
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- maam kareen linkedin account -->
<script type="text/javascript" src="//platform.linkedin.com/in.js"> 
			api_key: 78c8mstf5k8lbd
			authorize: true
		</script>
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '<?=$account_ga?>']);
	  _gaq.push(['_trackPageview']);
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
  <!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//www.stats.numberchallenge.com/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', <?=$piwik_id?>]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//www.stats.numberchallenge.com/piwik.php?idsite=<?=$piwik_id?>" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

	<script src="http://tools.contrib.com/cwidget?d=<?echo $domain?>&p=sb&c=f"></script>
																		
	
	<?if($background_image != ""): 
				$bg = $background_image;
                else:
                        $bg = "http://d2qcctj8epnr7y.cloudfront.net/images/jayson/leadtemplate1/bg3-green.jpg";
		endif;?>
<style type="text/css">
		.wrap-v1{
			background: url('<?echo $bg?>') no-repeat scroll;
			background-position: center;
			background-size: cover;
			color: #fff;
			background-attachment: fixed;
		}
	</style>
	</head>
<body>
<input type="hidden" name="domain_name" id="domain_name" value=<?echo $domain?> />	
	<? if($forsale=='1' || $forsaledefault=='1'){ ?>
		<div class="wrap-banner-sale">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<?=$forsaletext?> <a href="http://domaindirectory.com/servicepage/?domain=<?=$domain?>" target="_blank" style="color:blue;">Inquire now</a>.
					</div>
				</div>
			</div>
		</div>
	<? } ?>
	<div class="relative">
		<div class="animated rotateIn r-d" style="">
			<a class="rotate-a-wrap" alt="Contrib" target="_blank" href="<?=$domain_affiliate_link;?>">
				<img class="img-responsive" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/badge-contrib-3.png">
			</a>	
		</div>
	</div>
	<div class="wrap-v1">
		<nav class="navbar navbar-default nav-v1-style" role="navigation">
			<div class="container lightpaddbtm">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">
							<? if($logo == "" || empty($logo) || $logo == "_"){ ?>
								<p class="logotext"><?=ucwords($domain)?></p>
							<? }else{ ?>
								<a href="http://<?=$domain?>"><img class="img-logo-nav-v1 img-responsive" src="<?=$logo?>"></a>
							<? } ?>						
					</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/about">About</a></li>
						<li><a href="/contact">Contact us</a></li>
						<li><a href="/partners">Partner with us</a></li>
						<li><a href="/staffing">Apply now</a></li>
						<li><a href="/referral">Referral</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="container">
