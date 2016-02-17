<?php include 'includes/config.php';?>
<?php include 'includes/metatitle.php';?>
<!DOCTYPE html>
<html>
	<head>
		<title>Linked.com</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Demo project with jQuery">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon"  type="image/png" href="favicon.ico" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<link rel="stylesheet" type="text/css" href="css/green.css">
		<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


		 <script type="text/javascript" src="js/sweetalert.min.js"></script>
		 <link rel="stylesheet" type="text/css" href="js/sweetalert.css">

		<script src="js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/jquery.rateit.js"></script>	
		<link rel="stylesheet" type="text/css" href="css/rateit.css">

		<!-- custom js-->
		<script type="text/javascript" src="js/signup.js"></script>
		
		
		<script>
			$(document).ready(function(){
				var owl = $('.container-feature');
				owl.owlCarousel({
					items:4,
					loop:true,
					margin:10,
					autoplay:true,
					autoplayTimeout:1000,
					autoplayHoverPause:true,
					responsiveClass:true,
				    responsive:{
				        0:{
				            items:1,
				            nav:true
				        },
				        480:{
				            items:2,
				            nav:false
				        },
				        768:{
				            items:3,
				            nav:true,
				            loop:false
				        }
				    }
				});    
				    	
				$("#applynow").click(function(){
					$(".wrap-ecorp-container").hide();
					$(".wrap-inquire-container").hide();
					$('.wrap-apply-container').show('slow');
					return false;
				});

				$("#inquirenow").click(function(){
					$(".wrap-ecorp-container").hide();
					$('.wrap-apply-container').hide();
					$('.wrap-inquire-container').show('slow');
					return false;
				});

			});
			
	</script>
