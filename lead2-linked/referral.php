<? include_once 'header.php'; ?>
<style>
	.nav-pills.nav-pills-cust{
        background-color: #f8f8f8;
        border: 1px solid #e7e7e7;
        border-radius: 5px;
        padding: 5px 10px;
        margin-bottom: 5px;
    }
    .wrap-white-container{
        /* background-color: #fff;
        padding: 15px;
        color: #000; */
    }
</style>


<div class="row">
	<div class="col-lg-12">
		<div class="wrap-padtop-v1 clearfix">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="form-group text-center">
						<iframe src="http://referrals.contrib.com/aff_index.php?affiliate=<?=$domain?>" width="100%" height="800px" scrolling="auto" frameborder="0" seamless></iframe>
					</div>
					<ul role="tablist" class="nav nav-pills nav-pills-cust">
                        <li class="active" role="presentation">
                        	<a data-toggle="tab" role="tab" aria-controls="home" href="#home">
                        		Referral Programs
                        	</a>
                        </li>
                        <li role="presentation">
                        	<a data-toggle="tab" role="tab" aria-controls="bannerCode" href="#bannerCode">
                        		Banner
                        	</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-content-cust">
                    	<div id="home" class="tab-pane active" role="tabpanel">
	                    	<div class="es-blck-rnd text-center">
	                    		<div class="padd-banner">
	                    		     <?php if (count($programs)>0):?>
	                    		     	<?php foreach ($programs as $key=>$val):?>
			                    			 <div class="banner-main">
												 <dl class="dl-horizontal banner-info">
					                                            <dt>Referral Program</dt><dd><?php echo $val['title']?></dd>
					                             </dl>
		
												<div class="text-center">
													  <?php echo $val['code']?>
												</div>
		
												<p class="text-center banner-source">Source Code - Copy/Paste Into Your Website</p>
												<textarea readonly="readonly" onclick="this.focus();this.select()" rows="3" class="text-left form-control">
													  <?php echo $val['code']?>
												</textarea>
											</div>
									   <?php endforeach;?>
									<?php endif?>
	                    		</div>
	                    	</div>
                    	</div>
                    	<div id="bannerCode" class="tab-pane" role="tabpanel">
                    		<div class="es-blck-rnd text-center">
								<h1 class="xlg-title-slide xts-small ">
									Get <?echo $domain?> Banners and Make Money
								</h1>
								<div class="padd-banner">

									<div class="banner-main">
										<dl class="dl-horizontal banner-info">
											<dt>Marketing Group</dt><dd>Contrib</dd>
											<dt>Banner Size</dt><dd>728 x 90</dd>
											<dt>Banner Description</dt><dd><?echo $domain?> Banner</dd>
											<dt>Target URL</dt><dd>http://<?echo $domain?></dd>
										</dl>

										<div class="floating text-center banner-img-cont">
											<div class="wrap-allbanner">
												<div class="wrap-bannerLeft">
													<p class="aBnnrP ellipsis" href="">
														<!--wellnesschallenge.com-->
														<img  class="img-responsive logo-banners1" alt="<?echo $domain?>" src="<?echo $logo?>" class="logo-banners1">
													</p>
												</div>
												<div class="wrap-bannerRight ">
													<div class="content-rightText ">
														<span class="">Follow , Join and</span>
														<p class="ellipsis">Partner with Contrib.com</p>
													</div>
												</div>
											</div>
										</div>

										<p class="text-center banner-source">Source Code - Copy/Paste Into Your Website</p>
										<textarea readonly="readonly" onclick="this.focus();this.select()" rows="3" class="text-left form-control">
											<script type="text/javascript" src="http://www.contrib.com/widgets/leadbanner/<?echo $domain?>/<?echo $domainid?>"></script>
										</textarea>
									</div>
									<div class="banner-main">
										<dl class="dl-horizontal banner-info">
											<dt>Marketing Group</dt><dd>Contrib</dd>
											<dt>Banner Size</dt><dd>180 x 150</dd>
											<dt>Banner Description</dt><dd><?echo $domain?> Banner</dd>
											<dt>Target URL</dt><dd>http://<?echo $domain?></dd>
										</dl>

										<div class="floating text-center banner-img-cont">
											<div class="wrapBanner-2">
												<div class="wrap-topBanner ">
													<div class="wrap-contentTop">
														<span>Follow, Join</span>
														<span>and Partner with</span>
													</div>
												</div>
												<div class="wrap-downBanner">
													<div class="wrap-contentDown">
														<p class="ellipsis" href="">
															<img  class="img-responsive" alt="<?echo $domain?>" src="<?echo $logo?>">
														</p>
													</div>
												</div>
											</div>
										</div>

										<p class="text-center banner-source">Source Code - Copy/Paste Into Your Website</p>
										<textarea readonly="readonly" onclick="this.focus();this.select()" rows="3" class="text-left form-control">
											<script type="text/javascript" src="http://www.contrib.com/widgets/roundleadbanner/<?echo $domain?>/<?echo $domainid?>"></script>
										</textarea>
									</div>
								</div>
							</div>
                    	</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<? include_once 'footer.php';?>