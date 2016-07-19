<?php include 'header.php'; ?>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$('#next-email').click(function(event){
			var sEmail = $('#emailadd').val();
				if($.trim(sEmail).length == 0){
						$('.emailadd-msg').addClass("help-block");
						$('.emailadd-msg').text('Please enter your email address.');
						$('input[name=emailadd]').parents('.form-group').addClass("has-error");
					}else if(validateEmail(sEmail)) {
						$('.emailadd-msg').removeClass("help-block");
						$('.emailadd-msg').text('');
						$('input[name=emailadd]').parents('.form-group').removeClass("has-error");
						flagEmail = true;
					}else{
						$('.emailadd-msg').addClass("help-block");
						$('.emailadd-msg').text('Please enter valid email address.');
						$('input[name=emailadd]').parents('.form-group').addClass("has-error");
					}
				if (flagEmail==true){
					// $_SESSION['varname'] = $var_value;
					$.post('http://www.contrib.com/signup/checkemailexists',
					{
						email:sEmail
					},function(data){
						if (data.exists) {
						$('.emailadd-msg').addClass("help-block");
						$('.emailadd-msg').text('Email Already Exists');
						$('input[name=emailadd]').parents('.form-group').addClass("has-error");
						}else{
							var sEmail = $('#emailadd').val();
							$.session.set('email', sEmail);
							 window.location.href = 'signup';

						}
					}
					)	


				};	
			});
			function validateEmail(sEmail) {
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
				if (filter.test(sEmail)){
					 return true;
				}
				else{
				return false;
				}
			}
	});
</script>

<script type="text/javascript">
		function liAuth(){
	   IN.User.authorize(function(){
		   getProfileData();
	   });
	}

    // Handle the successful return from the API call
    function onSuccess(data) {
        console.log(data);
    }

    // Handle an error response from the API call
    function onError(error) {
        console.log(error);
    }

    // Use the API call wrapper to request the member's basic profile data
    function getProfileData() {
        //IN.API.Raw("/people/~").result(onSuccess).error(onError);
		IN.API.Profile("me").fields("first-name", "last-name", "email-address","public-profile-url").result(function (data) {
			console.log(data);
			// document.getElementById("email").value = data.values[0].emailAddress;
			// document.getElementById("firstname").value = data.values[0].firstName;
			// document.getElementById("lastname").value = data.values[0].lastName;
			//document.getElementById('btn-linkedin').style.display = 'none';
				
				var email = data.values[0].emailAddress;
				var firstname = data.values[0].firstName;
				var lastname = data.values[0].lastName;

				var formdata = {
					email:email,
					firstname:firstname,
					lastname:lastname
				}

			$.post('http://www.contrib.com/signup/checkemailexists',
					{
						email:email
					},function(data){
						if (data.exists) {
						$('.emailadd-msg').addClass("help-block");
						$('.emailadd-msg').text('Your Email in LinkedIn Already Exists');
						$('input[name=emailadd]').parents('.form-group').addClass("has-error");
							$.session.set('email', email);
							$.session.set('firstname', firstname);
							$.session.set('lastname',lastname);
						console.log(formdata);
						}else{
							console.log(formdata);
							$.session.set('email', email);
							$.session.set('firstname', firstname);
							$.session.set('lastname',lastname);
							 window.location.href = 'signup';

						}
					}
					)
		}).error(function (data) {
			console.log(data);
		});
    }
</script>

<script type="text/javascript">
	
	// for facebook retrieve 
    
  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
		

   function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      // document.getElementById('status').innerHTML = 'Please log ' +
      //   'into this app.';
      console.log("please log into this app");
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      // document.getElementById('status').innerHTML = 'Please log ' +
      //   'into Facebook.';
        console.log("Please Login to Facebook");
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.


  window.fbAsyncInit = function() {
  FB.init({
    appId      : '296067360739698',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.6' // use graph api version 2.5
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  // FB.getLoginStatus(function(response) {
  //   // statusChangeCallback(response);
  //   	if (response.status === 'connected') {
  //   			testAPI();
  //   	}else{
		// 	initializeFblogin();
  //   	}
  // });

  };
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      // statusChangeCallback(response);
      			if (response.status === 'connected') 
      			{
    				testAPI();
			    }
			    else
			    {
					initializeFblogin();
			    }
    });
  }
  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=name,email,first_name,last_name', function(response) {
      console.log('Successful login for: ' + response.name + " " + response.email + " " + response.first_name + " " + response.last_name);
      var myemail = response.email;
      var first_name = response.first_name;
      var last_name = response.last_name;

	  var formdata = {
				myemail:myemail,
				first_name:first_name,
				last_name:last_name
	   }

			console.log(formdata);
			$.post('http://www.contrib.com/signup/checkemailexists',
					{
						myemail:myemail
					},function(data){
						if (data.exists) {
						$('.emailadd-msg').addClass("help-block");
						$('.emailadd-msg').text('Your Email in Facebook Already Exists');
						$('input[name=emailadd]').parents('.form-group').addClass("has-error");
						console.log(formdata);
								$.session.set('email', myemail);
							$.session.set('firstname', first_name);
							$.session.set('lastname',last_name);	
						}else{
							console.log(formdata);
							$.session.set('email', myemail);
							$.session.set('firstname', first_name);
							$.session.set('lastname',last_name);	
							 window.location.href = 'signup';
						
						}
					}
					)

    });
  }

  function initializeFblogin(){
   		FB.login(function(response) {
           testAPI();
         }, {scope: 'public_profile,email'});
  	 }
</script>

<script type="text/javascript">

		var auth2 = {};
		var helper = (function() {
		  return {
		    /**
		     * Hides the sign in button and starts the post-authorization operations.
		     *
		     * @param {Object} authResult An Object which contains the access token and
		     *   other authentication information.
		     */
		    onSignInCallback: function(authResult) {
		      $('#authResult').html('Auth Result:<br/>');
		      for (var field in authResult) {
		        $('#authResult').append(' ' + field + ': ' +
		            authResult[field] + '<br/>');
		      }
		      if (authResult.isSignedIn.get()) {
		        $('#authOps').show('slow');
		        $('#gConnect').hide();
		        helper.profile();
		        
		      } else {
		          if (authResult['error'] || authResult.currentUser.get().getAuthResponse() == null) {
		            // There was an error, which means the user is not signed in.
		            // As an example, you can handle by writing to the console:
		            console.log('There was an error: ' + authResult['error']);
		          }
		          $('#authResult').append('Logged out');
		          $('#authOps').hide('slow');
		          $('#gConnect').show();
		      }
		      console.log('authResult', authResult);
		    },

		    /**
		     * Calls the OAuth2 endpoint to disconnect the app for the user.
		     */
		    disconnect: function() {
		      // Revoke the access token.
		      auth2.disconnect();
		    },
		    /**
		     * Gets and renders the currently signed in user's profile data.
		     */
		    profile: function(){
		      gapi.client.plus.people.get({
		        'userId': 'me'
		      }).then(function(res) {
		        var profile = res.result;
		        console.log(profile);
		        var name = res.result.displayName;
		        for (var i=0; i < profile.emails.length; i++){
		        	var email = profile.emails[i].value;
		        }
		        var firstname = profile.name.familyName;
		        var lastname = profile.name.givenName;
		        console.log(email);
		       	console.log(firstname);
		        console.log(lastname);

		        var formdata = {
		        	email:email,
		        	firstname:firstname,
		        	lastname:lastname
		        }

		        	$.post('http://www.contrib.com/signup/checkemailexists',
					{
						email:email
					},function(data){
						if (data.exists) {
						$('.emailadd-msg').addClass("help-block");
						$('.emailadd-msg').text('Your Email in Google Already Exists');
						$('input[name=emailadd]').parents('.form-group').addClass("has-error");
						console.log(formdata);
								$.session.set('email', email);
							$.session.set('firstname', firstname);
							$.session.set('lastname',lastname);	
						}else{
							console.log(formdata);
							$.session.set('email', email);
							$.session.set('firstname', firstname);
							$.session.set('lastname',lastname);	
							 window.location.href = 'signup';
						
						}
					}
					)



		      }, function(err) {
		        var error = err.result;
		        $('#profile').empty();
		        $('#profile').append(error.message);
		      });
		    }
		  };
		})();

		/**
		 * jQuery initialization
		 */
		// $(document).ready(function() {
		//   $('#disconnect').click(helper.disconnect);
		//   $('#loaderror').hide();
		//   if ($('meta')[0].content == '458431187548-hh7e32mu2iqs960ram2b6m0vt6pmoe9c.apps.googleusercontent.com') {
		//     alert('This sample requires your OAuth credentials (client ID) ' +
		//         'from the Google APIs console:\n' +
		//         '    https://code.google.com/apis/console/#:access\n\n' +
		//         'Find and replace CLIENT ID   with your client ID.'
		//     );
		//   }
		// });

		/**
		 * Handler for when the sign-in state changes.
		 *
		 * @param {boolean} isSignedIn The new signed in state.
		 */
		var updateSignIn = function() {
		  console.log('update sign in state');
		  if (auth2.isSignedIn.get()) {
		    console.log('signed in');
		    helper.onSignInCallback(gapi.auth2.getAuthInstance());
		  }else{
		    console.log('signed out');
		    helper.onSignInCallback(gapi.auth2.getAuthInstance());
		  }
		}
		/**
		 * This method sets up the sign-in listener after the client library loads.
		 */
		function startApp() {
		  gapi.load('auth2', function() {
		    gapi.client.load('plus','v1').then(function() {
		      gapi.signin2.render('googlelogin', 
		      {
		          scope: 'https://www.googleapis.com/auth/plus.login',
		          width: '425px',
		          theme: 'dark',
		          fetch_basic_profile: true 

		      });
		    $(".abcRioButton").css({"width": "420", "height": "36px"});
		     $(".abcRioButtonWhite").css({"width": "420", "height": "36px"});
		      gapi.auth2.init({
		           client_id: '458431187548-hh7e32mu2iqs960ram2b6m0vt6pmoe9c.apps.googleusercontent.com',
		           cookiepolicy: 'single_host_origin',
		           fetch_basic_profile: true,
		           scope:'https://www.googleapis.com/auth/plus.login'}).then(
		            function (){
		              console.log('init');
		              auth2 = gapi.auth2.getAuthInstance();
		              auth2.isSignedIn.listen(updateSignIn);
		              auth2.then(updateSignIn);
		            });
		    });
		  });
		  	    $(".abcRioButton").css({"width": "420", "height": "36px"});
		     $(".abcRioButtonWhite").css({"width": "420", "height": "36px"});
		}

		</script>
		
		<script src="https://apis.google.com/js/client:platform.js?onload=startApp"></script>

<style type="text/css">
	
	.fb {
		background-color: #3A589B;
	}
	.twitter {
		background-color: #3A589B;
	}
	.linkedin {
		background-color: #1D87BD;
	}
	.google {
		background-color: #D6492F;
	}

</style>
	<body>
		<div class="section-1">
			<div class="overlaydot"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<img class="img-responsive" src="http://d2qcctj8epnr7y.cloudfront.net/images/marvinpogi/logo-linked4.png" alt="">
					</div>
					<div class="col-md-7">
						<h1 class="fnt-600 ttle">Welcome to Linked.com</h1>
						<p class="desc">
							Linking people, skills and opportunities to create the worlds largest crowd commerce business creation system. Join us today!
						</p>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<input type="text" class="form-control input-lg" placeholder="Email Address" name="emailadd" id="emailadd" />
									<small class="emailadd-msg"></small>
								</div>
								<div class="form-group">
									<a href="#" class="btn btn-success btn-lg text-uppercase btn-block" id="next-email">get started</a>
								</div>
								<div class="form-group">
									<a  href="javascript:;" onclick="liAuth()"  class="btn btn-info btn-block btn-lg text-uppercase linkedin">Sign up via <i class="fa fa-linkedin-square"></i> LinkedIn</a>
									<a  href="javascript:;" onclick="checkLoginState()"  class="btn btn-info btn-block btn-lg text-uppercase fb">Sign up via <i class="fa fa-facebook-square"></i> Facebook</a>
<!-- 									<a  href="javascript:;" id="" class="btn btn-info btn-block btn-lg text-uppercase google">Sign up via <i class="fa fa-google-plus-square"></i>Google</a>
 -->									<div id="googlelogin" style="margin-top:5px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-2 ">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="ttle">Linked.com <strong>Opportunity</strong></h1>
						<div class="insurance-line">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="line3"></div>
							<div class="line2"></div>
							<div class="line1"></div>
						</div>
						<p class="sub-ttle">
							We envision people around the world with complementary skills, passion, time <br>and resources coworking online with targeted premium assets just like Linked.com.
						</p>
					</div>
					<div class="col-md-4 col-md-offset-1">
						<div class="tablist-container">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-justified nav-tabs-cust" role="tablist">
								<li role="presentation" class="active">
									<a href="#people" aria-controls="people" role="tab" data-toggle="tab">
										People
									</a>
								</li>
								<li role="presentation">
									<a href="#jobs" aria-controls="jobs" role="tab" data-toggle="tab">
										Jobs
									</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="people">
									<ul class="list-unstyled">
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">jamal</span>
													from
													<span class="text-capitalize fnt-600">india</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">jeiseun</span>
													from
													<span class="text-capitalize fnt-600">philippines</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">lucille</span>
													from
													<span class="text-capitalize fnt-600">jakarta</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">andrie</span>
													from
													<span class="text-capitalize fnt-600">miami</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">larry</span>
													from
													<span class="text-capitalize fnt-600">germany</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-warning text-capitalize">stephen</span>
													from
													<span class="text-capitalize fnt-600">brazil</span>
												</h4>
											</a>
										</li>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane" id="jobs">
									<ul class="list-unstyled">
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">bcontent.com</span>
													needs
													<span class="text-capitalize fnt-600">Bcontent.com Co-founder</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">matchallenge.com</span>
													needs
													<span class="text-capitalize fnt-600"> Matchchallenge.com Co-founder</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">ministryfund.com</span>
													needs
													<span class="text-capitalize fnt-600"> Ministryfund.com Co-founder</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">hedgebank.com</span>
													needs
													<span class="text-capitalize fnt-600"> Hedgebank.com Co-founder</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">vegasloft.com</span>
													needs
													<span class="text-capitalize fnt-600"> Vegasloft.com Co-founder</span>
												</h4>
											</a>
										</li>
										<li>
											<a href="" class="link-a-section2" title="">
												<h4 class="ellipsis">
													<span class="label label-danger text-capitalize">recruitchannel.com</span>
													needs
													<span class="text-capitalize fnt-600"> Hedgebank.com Co-founder</span>
												</h4>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7 media-container">
						<div class="wrap-media-bg">
							<div class="media">
								<div class="media-left">
									<a href="#">
										<img class="media-object" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/icon-50x50-contrib-market2.png" />
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading fnt-700">Contrib Marketplace</h4>
									Browse Jobs, Ideas and Micro Tasks.
								</div>
							</div>
						</div>
						<div class="wrap-media-bg">
							<div class="media">
								<div class="media-left">
									<a href="#">
										<img class="media-object" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/icon-50x50-contrib-contribute2.png" />
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading fnt-700">Contribute</h4>
									Contribute using your skills, services, apps and/or capital. 
								</div>
							</div>
						</div>
						<div class="wrap-media-bg">
							<div class="media">
								<div class="media-left">
									<a href="#">
										<img class="media-object" src="http://d2qcctj8epnr7y.cloudfront.net/images/2013/icon-50x50-contrib-money2.png" />
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading fnt-700">Earn Equity</h4>
									Get equity for your hard work and be the next success story!
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="section-3">
			<div class="overlaydot"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="ttle">Follow Linked.com and other great ventures <br> on the Contrib platform. </h1>
						<br><br>
					</div>
					<div class="col-md-12">
						<div class="owl-carousel container-feature">
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://socialid.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-socialid-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://socialid.com/">
											<h3 class="fnt-300">socialid.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-socialid.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            socialid
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://socialid.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://consultants.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-consultants-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://consultants.com/">
											<h3 class="fnt-300">consultants.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-consultants.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            consultants
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://consultants.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://talentdirect.com/">
											<img src="http://d2qcctj8epnr7y.cloudfront.net/uploads/browser-tda.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://talentdirect.com/">
											<h3 class="fnt-300">talentdirect.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-talentdirect.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            talentdirect
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://talentdirect.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://mergers.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-mergers-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://mergers.com/">
											<h3 class="fnt-300">mergers.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-mergers.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            mergers
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://mergers.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://www.referrals.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-referrals-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://www.referrals.com/">
											<h3 class="fnt-300">referrals.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-referrals.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            referrals
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://www.referrals.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://ifund.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-ifund-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://ifund.com/">
											<h3 class="fnt-300">ifund.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-ifund.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            ifund
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://ifund.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://ifund.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-handyman-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://handyman.com/">
											<h3 class="fnt-300">handyman.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-handyman.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            handyman
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://handyman.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
							<div class="item">
								<div class="thumbnail">
									<div class="guide-img">
										<a href="http://ifund.com/">
											<img src="http://d5p5ew3nz670e.cloudfront.net/uploads/browser-contrib-1.png" alt="socialid.com" class="site-pic">
											<span class="round-plus"></span>
										</a>
									</div>
									<div class="caption">
										<a class="guide-name-link" href="http://contrib.com/">
											<h3 class="fnt-300">contrib.com</h3>
										</a>
										<p>
                                            <img src="https://s3.amazonaws.com/assets.zipsite.net/images/jayson/linked/logo-contrib.png" alt="logo-socialid" class="img-circle text-left logo-site">
                                            contrib
                                        </p>
									</div>
									<div class="caption guide-meta text-uppercase">
                                        <a href="http://contrib.com/" class="btn btn-success">Visit</a>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<div class="section-3">
			<div class="overlaydot"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="ttle">Follow Linked.com and other great ventures <br> on the Contrib platform. </h1>
						<br><br>
					</div>
					<div class="col-md-12">
						<div class="owl-carousel container-feature">
							<?php foreach ($featuredsite as $featuredsite) { ?>
								   <div class="wrap-marketplace-box-item">
                            <a class="wmbi-img-logo" href="http://<?php echo $featuredsite['domain_name']; ?>">
                                <?php if(!empty($featuredsite['logo'])):?>
									<img src="<?php echo $featuredsite['logo']; ?>" class="img-responsive" alt="<?php echo $featuredsite['domain_name']; ?>">
								<?php else: ?>
									<img src="https://d2qcctj8epnr7y.cloudfront.net/contrib/logo-contrib-brand2.png" class="img-responsive">
								<?php endif; ?>
                            </a>
                            <h3 class="marg-m-ttlTop text-capitalize wmbi-ttle ellipsis">
                                <?php echo $featuredsite['domain_name']; ?>
                            </h3>
                            <p class="p-marg-btm">
                                Join our exclusive community of like minded people
                            </p>
                            <p>
                                <a target="_blank" href="http://<?php echo $featuredsite['domain_name']; ?>"><?php echo $featuredsite['domain_name']; ?></a>
                            </p>
                            <ul class="list-inline ul-wmbi-zero">
                                <li>
                                    <a class="btn btn-success btn-lg" target="_blank" href="http://<?php echo $featuredsite['domain_name']; ?>">Visit</a>
                                </li>
                                <li>
                                    <a class="btn btn-success btn-lg" target="_blank" href="https://contrib.com/brand/details/<?php echo $featuredsite['domain_name']; ?>">Details</a>
                                </li>
                            </ul>
                        </div>
							<?php }?>		
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-4">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="ttle">Linked.com <strong>Team</strong></h1>
						<div class="insurance-line">
							<div class="line1"></div>
							<div class="line2"></div>
							<div class="line3"></div>
							<div class="line2"></div>
							<div class="line1"></div>
						</div>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<p class="sub-ttle">
									Linked.com is a bit different than most startups. We are small, diverse team working remotely and<br> loving what we do.  We only cowork with others who also have this same passion.
								</p>
								<p class="sub-ttle">
									Linked.com seeks to contract and hire the best people and then trust them: it's the thinking  behind<br> the work at their own time policy. 
								</p>
								<p class="sub-ttle">
									The Linked.com team loves building things and focus on being the most productive individual, not<br> the amount of time spent in the office. We put a lot of effort into making Linked.com a fun place <br>to work for people who like getting things done. So if you're game with this then enter  your email<br> address and be a part of the global team. 
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-5">
			<div class="container">
				<div class="row">
					
					<div class="col-md-12 wrap-apply-container">
						<script type="text/javascript" src="http://tools.contrib.com/contactform?d=<?echo $info['domain']?>&f=staffing"></script>
					</div>
					<div class="col-md-12 wrap-inquire-container">
						<script type="text/javascript" src="http://tools.contrib.com/contactform?d=<?echo $info['domain']?>"></script>
					</div>
				</div>
			</div>
		</div>
<?php include 'footer.php';?>