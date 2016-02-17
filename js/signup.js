	$(document).ready(function(){

			$('.type-choices').click(function(){
					if($('.type-choices').hasClass("has-error")){
						$('.type-choices').removeClass("has-error");
						$(this).addClass("selected");
						
					}else if($('.type-choices')){
						$('.type-choices').removeClass("selected");
						$(this).addClass("selected");
							var email = document.cookie;
							$('#emailadd').val(email);
					}else{
						return false;
					}
			
			});

			// partner and brands with validation
			function checkstar(){
				
					var choose = document.getElementById('choose').value;
					var opportunity;
					
					if(document.getElementById('leads').checked)
					 	{
							opportunity = document.getElementById('leads').value; 
							//swal(opportunity);
					 	}
					else if (document.getElementById('emp').checked)
						{
							opportunity = document.getElementById('emp').value;
							//swal(opportunity);
						}
					else if (document.getElementById('man').checked)
						{
							opportunity = document.getElementById('man').value;
							//swal(opportunity);
						}

						return opportunity;

			}

			// firstname and lastname validation
			function checkstep1(){

					flag = false;
					flagEmail = false;
					flagFname = false;
					flagLname = false;
					flagCpass = false;
					flagCpass1 = false;

					var sEmail = $('input[name=emailadd]').val();
					var fname = $('input[name=fname]').val();
					var lname = $('input[name=lname]').val();
					var cpass = $('input[name=cpass]').val();
					
					//Email
					if($.trim(sEmail).length == 0){
						$('.emailadd-msg').addClass("help-block");
						$('.emailadd-msg').text('Please enter your email address.');
						$( '.emailadd-msg').effect( "bounce", "slow" );
						$('input[name=emailadd]').parents('.form-group').removeClass("success").addClass("has-error");
						
					}else if(validateEmail(sEmail)) {
						$('.emailadd-msg').removeClass("help-block");
						$('.emailadd-msg').text('');
						$('input[name=emailadd]').parents('.form-group').removeClass("has-error").addClass("success");
						flagEmail = true;
					}else{
						$('.emailadd-msg').addClass("help-block");
						$('.emailadd-msg').text('Please enter valid email address.');
						$( '.emailadd-msg').effect( "bounce", "slow" );
						$('input[name=emailadd]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					//First Name
					if(!$('input[name=fname]').val()==""){
						$('.fname-msg').removeClass("help-block");
						$('.fname-msg').text('');
						$('input[name=fname]').parents('.form-group').removeClass("has-error").addClass("success");
						flagFname = true;
					}else{
						$('.fname-msg').addClass("help-block");
						$('.fname-msg').text('Please enter your first name.');
						$('input[name=fname]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					//Last Name
					if(!$('input[name=lname]').val()==""){
						$('.lname-msg').removeClass("help-block");
						$('.lname-msg').text('');
						$('input[name=lname]').parents('.form-group').removeClass("has-error").addClass("success");
						flagLname = true;
					}else{
						$('.lname-msg').addClass("help-block");
						$('.lname-msg').text('Please enter your last name.');
						$('input[name=lname]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					//Create password
					var pass = $('input[name=cpass]').val();
					if($('input[name=cpass]').val()==""){
						$('.cpass-msg').addClass("help-block");
						$('.cpass-msg').text('Please Enter your Password.');
						$('input[name=cpass]').parents('.form-group').removeClass("success").addClass("has-error");
						
					}else if (pass.length < 5){	
						$('.cpass-msg').addClass("help-block");
						$('.cpass-msg').text('Password should have more than 5 characters.');
						$('input[name=cpass]').parents('.form-group').removeClass("success").addClass("has-error");
					}else{
						$('.cpass-msg').removeClass("help-block");
						$('.cpass-msg').text('');
						$('input[name=cpass]').parents('.form-group').removeClass("has-error").addClass("success");
						flagCpass = true;
					}

				if(flagEmail == true && flagFname==true && flagLname==true && flagCpass==true){
						$('.step2').hide( 360 );
						$('.step3').show( -360 );
						flag = true;		
					//	swal( fname + lname + cpass + sEmail);			
					}

			} // end of the check step 1

			// country and city validations
			function checkstep2(){

				var country_id = $('select[name=scountry]').val();
				var country = $('#country_id option:selected').text();
				var city = $('input[name=city]').val();
				var phone = $('input[name=phone]').val();
				var website = $('input[name=website]').val();


				flagScountry = false;
				flagCity = false;

					//Country
					if(!$('select[name=scountry]').val()==""){
						$('.scountry-msg').removeClass("help-block");
						$('.scountry-msg').text('');
						$('select[name=scountry]').parents('.form-group').removeClass("has-error").addClass("success");
						flagScountry = true;
					}else{
						$('.scountry-msg').addClass("help-block");
						$('.scountry-msg').text('Please select your country.');
						$('select[name=scountry]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					//City
					if(!$('input[name=city]').val()==""){
						$('.city-msg').removeClass("help-block");
						$('.city-msg').text('');
						$('input[name=city]').parents('.form-group').removeClass("has-error").addClass("success");
						flagCity = true;
					}else{
						$('.city-msg').addClass("help-block");
						$('.city-msg').text('Please enter your city.');
						$('input[name=city]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					if(flagScountry==true && flagCity==true){
						$('.step3').hide(360);
						$('.step4').show(-360);
						//swal(country + country_id + city + phone + website);
						
					}

					return false;
					
			}// end of the check step 2

			// industry and expertise validations ..
			function checkstep3(){

					flagexpertise = false;
					flagindustry = false;

					var role_id = $('select[name=expertise]').val();
					var role = $('#role_ids option:selected').text();
					var IndustryId = $('select[name=industry]').val();
					var industry = $('#IndustryIds option:selected').text();

					//Expertise
					
					if(!$('select[name=expertise]').val()==""){
						$('.expertise-msg').removeClass("help-block");
						$('.expertise-msg').text('');
						$('select[name=expertise]').parents('.form-group').removeClass("has-error").addClass("success");
						flagexpertise = true;
					}else{
						$('.expertise-msg').addClass("help-block");
						$('.expertise-msg').text('Please select your expertise.');
						$('select[name=expertise]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					//industry
					if(!$('select[name=industry]').val()==""){
						$('.industry-msg').removeClass("help-block");
						$('.industry-msg').text('');
						$('select[name=industry]').parents('.form-group').removeClass("has-error").addClass("success");
						flagindustry = true;
					}else{
						$('.industry-msg').addClass("help-block");
						$('.industry-msg').text('Please select your industry.');
						$('select[name=industry]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					if(flagexpertise==true && flagindustry==true){
						$('.step4').hide(360);
						$('.step4-2').show(-360);
						//swal(IndustryId +' '+ role_id + industry + role);
						//swal('unsa kuno');
					}

					return false;

			}// end of the check step3

			//joining team validatoins
			function checkstep4(){

					flagjoingteam = false;
					var joiningteam = $('#joiningteam option:selected').text();

					if(!$('select[name=joingteam]').val()==""){
						$('.joingteam-msg').removeClass("help-block");
						$('.joingteam-msg').text('');
						$('select[name=joingteam]').parents('.form-group').removeClass("has-error").addClass("success");
						flagjoingteam = true;
					}else{
						$('.joingteam-msg').addClass("help-block");
						$('.joingteam-msg').text('Please select your joining team.');
						$('select[name=joingteam]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					if(flagjoingteam==true){
						$('.step4-2').hide(360);
						$('.step4-3').show(-360);
						//swal(joiningteam);
						
					}
			
			}// end of the check step4

			// keywords validations
			function checkstep5(){

					flagkeywrd1 = false;
					flagkeywrd2 = false;
					flagkeywrd3 = false;
				
					var keywrd1 = $('input[name=keywrd1]').val();
					var keywrd2 = $('input[name=keywrd2]').val();
					var keywrd3 = $('input[name=keywrd3]').val();

					//keywrd1
					if(!$('input[name=keywrd1]').val()==""){
						$('.keywrd1-msg').removeClass("help-block");
						$('.keywrd1-msg').text('');
						$('input[name=keywrd1]').parents('.form-group').removeClass("has-error").addClass("success");
						flagkeywrd1 = true;
					}else{
						$('.keywrd1-msg').addClass("help-block");
						$('.keywrd1-msg').text('Please enter your keyword.');
						$('input[name=keywrd1]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					//keywrd2
					if(!$('input[name=keywrd2]').val()==""){
						$('.keywrd2-msg').removeClass("help-block");
						$('.keywrd2-msg').text('');
						$('input[name=keywrd2]').parents('.form-group').removeClass("has-error").addClass("success");
						flagkeywrd2 = true;
					}else{
						$('.keywrd2-msg').addClass("help-block");
						$('.keywrd2-msg').text('Please enter your keyword.');
						$('input[name=keywrd2]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					//keywrd3
					if(!$('input[name=keywrd3]').val()==""){
						$('.keywrd3-msg').removeClass("help-block");
						$('.keywrd3-msg').text('');
						$('input[name=keywrd3]').parents('.form-group').removeClass("has-error").addClass("success");
						flagkeywrd3 = true;
					}else{
						$('.keywrd3-msg').addClass("help-block");
						$('.keywrd3-msg').text('Please enter your keyword.');
						$('input[name=keywrd3]').parents('.form-group').removeClass("success").addClass("has-error");
					}

					if(flagkeywrd1==true && flagkeywrd2==true && flagkeywrd3==true){
						//swal(keywrd1 + keywrd2 + keywrd3);
						registeruser();						
						
					}

			}//end of the check step5

			//hide show with validations radio buttons 

				$('.btn-step1').click(function(){
					if(!$('.type-choices').hasClass("selected")){
						$('.type-choices').addClass("has-error");
					}
					else{
						checkstar();
						$('.step1').hide( 360 );
						$('.step2').show( -360 );
					}
					return false;
				});

					//calling all functions ..
				
					// button for create account name,email etc ...
				$('.btn-step2').click(function(){
						checkstep1();
						return false;
				});
					// button for create acount with  country,city etc...
				$('.btn-step3').click(function(){
						checkstep2();
						return false;
				});

					// button for expersite and industry and etc ...
				$('.btn-step4').click(function(){
						checkstep3();
						return false;
				});
				
					// button for joining team and etc ..
				$('.btn-step4-2').click(function(){
						checkstep4();
						return false;
				});

					//button for photo and etc ...
				$('.btn-step4-3').click(function(){
					$('.step4-3').hide(360);
					$('.step5').show(-360);
					return false;
				});
				
					//button for keyword and etc
				$('.btn-step5').click(function(){
					checkstep5();
					return false;
				});

			// email validation	

				function validateEmail(sEmail) {
				    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
				    if (filter.test(sEmail)) {
				        return true;
				    }
				    else {
				        return false;
				    }
				}

			// phone input validation 
				
			$("input[name=phone]").keydown(function (e) {
					// Allow: backspace, delete, tab, escape, enter and .
					if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
					     // Allow: Ctrl+A, Command+A
					    (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
					     // Allow: home, end, left, right, down, up
					    (e.keyCode >= 35 && e.keyCode <= 40)) {
					         // let it happen, don't do anything
					         return;
					}
					// Ensure that it is a number and stop the keypress
					if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
					    e.preventDefault();
					}
				
			});

			// back buttons

				$('.btn-step2-back').click(function(){
					$('.step2').hide(-360);
					$('.step1').show(360);
					return false;
				});

				$('.btn-step3-back').click(function(){
					$('.step3').hide(-360);
					$('.step2').show(360);
					return false;
				});

				$('.btn-step4-back').click(function(){
					$('.step4').hide(-360);
					$('.step3').show(360);
					return false;
				});

				$('.btn-step4-2-back').click(function(){
					$('.step4-2').hide(-360);
					$('.step4').show(360);
					return false;
				});

				$('.btn-step4-3-back').click(function(){
					$('.step4-3').hide(-360);
					$('.step4-2').show(360);
					return false;
				});

				$('.btn-step5-back').click(function(){
					$('.step5').hide(-360);
					$('.step4-3').show(360);
					return false;
				});

				//http://www.contrib.com/linked/saveall2
				//top domains http://www.contrib.com/linked/topdomains parameter keywords limits

				function registeruser(){

					var opportunity = opportunity;
					var rating = "";


					$('.ratetable .ratetr .ratetd .rateinput').each(function() {
					 	var id = $(this).attr('id');
					 	experience  = id.replace('rate_','');  
					 	rating += $(this).val()+";;";
					 	experiences += experience + ",";
					 });
					
				
					var formdata = 

					{

					'email': $('input[name=emailadd]').val(),
					'firstname': $('input[name=fname]').val(),
					'lastname':  $('input[name=lname]').val(),
					'password':  $('input[name=cpass]').val(),
					'country_id': $('select[name=scountry]').val(),
					'country': $('#country_id option:selected').text(),
					'city': $('input[name=city]').val(),
					'phone': $('input[name=phone]').val(),
					'website': $('input[name=website]').val(),
					'role_id': $('select[name=expertise]').val(),
					'intention': $('#joiningteam option:selected').text(),
					'role': $('#role_ids option:selected').text(),
					'industry_id': $('select[name=industry]').val(),
					'industry_name': $('#IndustryIds option:selected').text(),
					'pic': $('#pic_url').val(),
					'rating': rating,
					'keywrd1': $('input[name=keywrd1]').val(),
					'keywrd2':$('input[name=keywrd2]').val(),
					'keywrd3':$('input[name=keywrd3]').val()

					}

					$.ajax(
					{

					type: 'POST',
           			url:  "http://www.contrib.com/linked/saveall2",
          			data: formdata,
          			success: function(data)
					{
	               		if (data.status===true){
							swal("You are now a Member ","Sucessfully Saved!", "success");
		               		window.location.href = 'loadbrands.php';
						}
						else{
							swal("Email Already Taken!","Not Save!", "error");	
						}
	               		
	               	},
				 	error: function(data)
					{
						swal("Unfortunately Not Save!","Not Save!", "error");	
						return false;
				 	}
				})
			}
	});