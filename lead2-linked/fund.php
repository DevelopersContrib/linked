<? include 'header.php'; ?>
<div class="container fundpage">
	<div class="row">
		<div class="col-md-12">
			<h2>Fund Our Ventures</h2>
			<div class="venture-list">
			  <ul class="list-unstyled">
			  <?php if (count($fund_campaigns)>0):?>
			  <?php foreach ($fund_campaigns as $funds):?>
			  	<?if($funds['post_title'] != 'Micro Markets'):?>
					<li class="col-md-3 odd">
						<div class="ribbon-wrapper-green"><div class="ribbon-green">Staff Pick</div></div>
						<img class="img-responsive" src="<?php echo $funds['logo']?>">
						<a href="<?php echo $funds['permalink']?>" class="vlink" target="_blank"><?php echo $funds['post_title']?></a>
						<p class="vdesc"><?php echo strip_tags($funds['post_content'])?></p>
						<div class="fund-container">							
								<div class="funded-l">
									<div class="fund-icon"><i class="fa fa-usd"></i></div>
									<div class="fund-details">
										<p>Funded</p>
										<p><b><?php echo number_format($funds['campaign_goal'],2)?></b></p>
									</div>
									<div style="clear:both"></div>
								</div>
								<div class="funded-r">
									<div class="fund-icon"><i class="fa fa-bar-chart"></i></div>
									<div class="fund-details">
										<p>Funded</p>
										<p><b>10%</b></p>
									</div>
									<div style="clear:both"></div>
								</div>
								<div style="clear:both"></div>
						</div>
					</li>
					<?php endif?>
				<?php endforeach;?>
				<?php endif?>
			  </ul>
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
 
 <style>
 .ribbon-wrapper-green {
  width: 85px;
height: 88px;
overflow: hidden;
position: absolute;
margin-top: -16px;
margin-left: 182px;
z-index: 1;
}
.ribbon-green {
  font: bold 15px Sans-Serif;
  color: #fff;
  text-align: center;
  -webkit-transform: rotate(45deg);
  -moz-transform:    rotate(45deg);
  -ms-transform:     rotate(45deg);
  -o-transform:      rotate(45deg);
  position: relative;
  padding: 7px 0;
  left: -5px;
  top: 15px;
  width: 120px;
	border: solid 1px #da7c0c;
	background: #bfd255; /* Old browsers */
background: -moz-linear-gradient(top, #bfd255 0%, #8eb92a 50%, #72aa00 51%, #9ecb2d 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#bfd255), color-stop(50%,#8eb92a), color-stop(51%,#72aa00), color-stop(100%,#9ecb2d)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #bfd255 0%,#8eb92a 50%,#72aa00 51%,#9ecb2d 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #bfd255 0%,#8eb92a 50%,#72aa00 51%,#9ecb2d 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #bfd255 0%,#8eb92a 50%,#72aa00 51%,#9ecb2d 100%); /* IE10+ */
background: linear-gradient(to bottom, #bfd255 0%,#8eb92a 50%,#72aa00 51%,#9ecb2d 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#bfd255', endColorstr='#9ecb2d',GradientType=0 ); /* IE6-9 */
  -webkit-box-shadow: 0px 0px 3px rgba(0,0,0,0.3);
  -moz-box-shadow:    0px 0px 3px rgba(0,0,0,0.3);
  box-shadow:         0px 0px 3px rgba(0,0,0,0.3);
}

.ribbon-green:before, .ribbon-green:after {
  content: "";
  border-top:   3px solid #6e8900;   
  border-left:  3px solid transparent;
  border-right: 3px solid transparent;
  position:absolute;
  bottom: -3px;
}

.ribbon-green:before {
  left: 0;
}
.ribbon-green:after {
  right: 0;
}
.wrap-mt-box .ttle-mt {
padding: 8px 25px 10px !important;
}
 </style>