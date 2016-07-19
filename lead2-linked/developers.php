<? include 'header.php'; ?>
	
<div class="container devpage">
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-code"></i>&nbsp;Are you a Developer?</h2>
			<div class="devbox">
				<p class="devdesc"><i class="fa fa-rocket"></i>&nbsp;Do you have code or an app that could run this brand? Interpricing.com is connected with Contrib. </p>
				<p class="devdesc"><i class="fa fa-rocket"></i>&nbsp;Contrib is the new way to contribute and get equity building the world's biggest brands and startups. We have our own Developers platform, and we run the world's best brands on them. Do you have an app, or code that could help run Interpricing.com? </p>
				<p class="proceedto"><a href="http://<?php echo $domain?>/contact" class="btn btn-success">Inquire Here</a></p>
			</div>
		</div>
	</div>
</div>

<? include_once 'footer.php';?>

<script>

  $(document).ready(function() {

   var docHeight = $(window).height();
   var footerHeight = $('.footer-v1').height();
   var footerTop = $('.footer-v1').position().top + footerHeight;

   if (footerTop < docHeight) {
    $('.footer-v1').css('margin-top', 10+ (docHeight - footerTop) + 'px');
   }
  });
 </script>