<?php include 'header.php';?>
	</head>
	<body>
		<div class="wrap-otherpage-container-logo">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<img height="80" alt="" src="http://d2qcctj8epnr7y.cloudfront.net/images/marvinpogi/logo-linked4.png" />
					</div>
				</div>
			</div>
		</div>
		<div class="wrap-otherpage-container-title">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="ttle text-uppercase">Join our Partner Network</h1>
						<p>
							Learn more about Joining our Partner Network
						</p>
						<p>
							<a class="btn btn-lg btn-primary" data-toggle="modal" data-target="#applymodal">
								Join our partner network
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="wrap-otherpage-container-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap-partners-container">
							<div class="row">
								<div class="col-sm-3">
									<a href="">
										<img class="img-responsive" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-contrib-green13.png" alt="" />
									</a>
								</div>
								<div class="col-md-9">
									<h1 class="ttle-partners">
										<a href="" class="a-links-partners text-capitalize">
											contrib.com
										</a>
									</h1>
									<p>
										Our network of Contributors power our domains. Browse through our Marketplace of People, Partnerships,Proposals and Brands and find your next great opportunity. Join Free Today.
									</p>
								</div>
							</div>
						</div>
						<div class="wrap-partners-container">
							<div class="row">
								<div class="col-sm-3">
									<a href="">
										<img class="img-responsive" src="http://d2qcctj8epnr7y.cloudfront.net/images/lucille/logo-gv-re283x35.png" alt="" />
									</a>
								</div>
								<div class="col-md-9">
									<h1 class="ttle-partners">
										<a href="" class="a-links-partners text-capitalize">
											globalventures.com
										</a>
									</h1>
									<p>
										Global Ventures owns a premium network of 20,000 websites and powerful tools to help you build successful companies quickly. Some of the things we offer you include a great domain name with targeted traffic, unique business model, equity ownership, and flexible, performance based compensation. You just need to bring your knowledge, passion and work smart.
									</p>
									<p>
										With over 17 years of internet experience, we built a network of over 20,000 websites and created dozens of successful businesses. We would love to work on the next cutting-edge projects with great companies and talented people.
									</p>
								</div>
							</div>
						</div>
						<div class="wrap-partners-container">
							<div class="row">
								<div class="col-sm-3">
									<a href="">
										<img class="img-responsive" src="http://www.contrib.com/uploads/logo/ifund.png" alt="" />
									</a>
								</div>
								<div class="col-md-9">
									<h1 class="ttle-partners">
										<a href="" class="a-links-partners text-capitalize">
											iFund.com
										</a>
									</h1>
									<p>
										iFund is a software as a service crowdfunding platform. iFund is not a registered broker-dealer and does not offer investment advice or advise on the raising of capital through securities offerings. iFund does not recommend or otherwise suggest that any investor make an investment in a particular company, or that any company offer securities to a particular investor. iFund takes no part in the negotiation or execution of transactions for the purchase or sale of securities, and at no time has possession of funds or securities. No securities transactions are executed or negotiated on or through the iFund platform. iFund receives no compensation in connection with the purchase or sale of securities.
									</p>
								</div>
							</div>
						</div>
						<div class="wrap-partners-container">
							<div class="row">
								<div class="col-sm-3">
									<a href="">
										<img class="img-responsive" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/logo-ichallenge1.png" alt="" />
									</a>
								</div>
								<div class="col-md-9">
									<h1 class="ttle-partners">
										<a href="" class="a-links-partners text-capitalize">
											iChallenge.com
										</a>
									</h1>
									<p>
										The best internet challenges. Solve and win online prizes. 
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php include 'footer.php';?>
		<div class="modal fade" id="applymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Submit Team Application</h4>
					</div>
					<div class="modal-body">
						<script type="text/javascript" src="http://tools.contrib.com/contactform?d=<?echo $info['domain']?>&f=staffing"></script>
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="inquiremodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Send Inquiry</h4>
					</div>
					<div class="modal-body">
						<script type="text/javascript" src="http://tools.contrib.com/contactform?d=<?echo $info['domain']?>"></script>
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>