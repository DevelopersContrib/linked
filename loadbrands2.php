<?php include 'header.php';?>
		<script type="text/javascript">
				$(document).ready(function(){
		       
			        var progress = 0;
			        var side_padding = 10;
			        var bar = $('.loading-bw-container .fill');
			        var counter = $('.loading-bw-container .percents');
			        var leads_list = $('.wrap-leads-container .list-container');
			        var leads_list_scroll = 0;

		  		      function align_percents() {
		         

		            bar_width = bar.width();
		            counter_width = counter.width();
		            counter_pos = -Math.round(counter_width / 2);
		            var screen_width = $('body').width();

		            if (bar_width + counter_pos < side_padding) {
		                counter_pos = counter_pos + bar_width + counter_pos - side_padding;
		            }
		            if (bar_width - counter_pos > screen_width - side_padding) {
		                counter_pos = counter_pos + ((bar_width - counter_pos) - (screen_width - side_padding));
		            }

		            counter.css('right', counter_pos + 'px');
		        }

		        function add_progress() {
		            progress += 0.35;
		            if (progress >= 100) {
		                progress = 100;
		                clearInterval(int);
		            }
		            bar.css('width', progress + '%');
		            counter.find('span').text(Math.round(progress));
		            align_percents();
		        }				

		        function scroll_leads() {

		            var first = leads_list.find('.lead-item').first();

		                leads_list_scroll = leads_list_scroll + 1.5;
		            if (leads_list_scroll > first.height() + parseInt(first.css('margin-bottom'))) {
		                leads_list_scroll = 0;

		                first.css('margin-top', 0).appendTo(leads_list);
		                first = leads_list.find('.lead-item').first();
		            }
		            
		            first.css('margin-top', -leads_list_scroll + 'px');
		        }

				var int = setInterval(
		            function() {
		                add_progress();
		                scroll_leads();
		            },
		            30
		        );
					
				


			});
		</script>

 </head>
	<body>
		<div class="wrap-loading-container">
			<div class="wrap-leads-container" >
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="wrap-logo-img-container text-center">
								<img height="90" src="http://d2qcctj8epnr7y.cloudfront.net/images/marvinpogi/logo-linked4.png" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="list-container" id="brand_members">
				
						</div>
					</div>
				</div>
			</div>
			<div class="loading-bw-container">
				<div class="fill">
					<div class="percents">
						<span>100</span>%
					</div>
				</div>
			</div>

			<div class="found-container">
				<div class="container">
				<div class="col-md-6" id="header-pagination">
                                    
                 </div>
				
					<div class="row step6 step index2 ">
						<div class="col-md-12 text-center">
								<div class="col-md-8 col-md-offset-2 thanks-container">
										<img src="https://s3.amazonaws.com/assets.zipsite.net/icons/icon-thankyou-800x400.png" style="height:200px; margin:0 auto;">
										<h2>for signing up!</h2>
										<hr>
										<p>Thank you for signing up, Share <?php echo ucfirst($domain)?> with you friends to move up in Linking people, skills and opportunities.</p>
											<?if($additional_html != ""):?>
												<?echo base64_decode($additional_html)?>
											<?endif;?>	
										<!-- <div class="form-group col-md-4 col-md-offset-4">
											<a href="loadbrands.php" id="oppoturnity" class="btn btn-success btn-lg btn-block fnt-700">
												<i class="fa fa-check"></i>
												Browse Opportunity now !
											</a>
										</div> -->
								</div>
					  	</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<h1 class="fnt-400 ttle" id="totalresult">
							<? echo $total_results?>	Found Brands
							</h1>
						</div>
						<!--load all brand here -->
						<div class="m-brand-list col-md-12" id="m-brand-list">
            
						</div>
						 <!-- Limit the description to 50 letters -->

					</div>
				
				</div>
			</div>

				<div class="row">
	                  <div class="col-md-12 text-center" id="m-brand-pagination">
	                     
	                   </div>
	             </div>
		</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js"></script>


<script>

	$(document).ready(function() {
		var current_page = 1;
		loadPages(current_page);
   	 getMembers();

	});

function loadPages(current_page){
		
	$('#m-brand-list').html('<center><img src="https://contribupload.s3.amazonaws.com/webassets/Preloader_1.gif" alt="Loading contents.."></center>');
  	
  	var opportunities = $.session.get('selector');
  	var keyword1 = $.session.get('key1');
	var keyword2 = $.session.get('key2');
	var keyword3 = $.session.get('key3');
  
  jQuery.post('https://www.contrib.com/linked/loadbrandtotal',
  {
     keyword1:keyword1,
     keyword2:keyword2,
     keyword3:keyword3
     
  },function(data_html){
			 var total_results =data_html.count;
				getPagination(current_page,total_results);
				$.post('https://www.contrib.com/linked/loadbrands',
	        {current_page:current_page,
	         total_results:total_results,
	         keyword1:keyword1,
	         keyword2:keyword2,
	         keyword3:keyword3
	        },function(data){
					$('#m-brand-list').html(data.html);
					$('#header-pagination h4 b').html("Showing "+data.start+" to "+data.end+" of "+total_results+" results founds");
					$('#totalresult').html(total_results +" "+ "Found Brands");
					$('.selector').html(opportunities);
					 
				});
	});
  
 
			
		}

function getPagination(current_page,total_results){
		
		$.post('https://www.contrib.com/linked/loadbrandpagination',{current_page:current_page,total_results:total_results},function(data_html){
			$('#m-brand-pagination').html(data_html.html);
		});
	}
  
 function getMembers(){
      $.post('https://www.contrib.com/linked/latestusers',{},function(data_html){
			$('#brand_members').html(data_html.html);
		});
 } 

</script>			

	