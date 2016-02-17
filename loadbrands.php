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

					var domains = $('#domain');

					$.ajax({
						type: 'GET',
						url:'http://www.contrib.com/linked/topdomains',
						dataType:'json',
						success: function(data) {

							// $.each(data, function(index, item){
							// 	$.each(item, function(key, value){
							// 		$('.marg-m-ttlTop').append(value + '<br />')
							// 	})	
							// })

								$('.m-brand-list').html(data.html);

							// $('#loadcontributors'+data).append(data.html);
		     //    			 $('#domains').masonry({
		     //                     columnWidth: '.col-md-4',
		     //                     itemSelector : '.item'
		     //                 });
						}

						// $htmlContent = "";

						// foreach($limit as $domain)
						// {
						// $htmlCOntent .= '<div class="domains">'.$domain.'</div>';
						// }

						// $data = array():

					});

					// var mediaItemContainer = $('#domain');
					// mediaItemContainer.masonry( {
					//     columnWidth:  'col-md-4',
					//     itemSelector: '.item'
					// });

					// $( mediaItemContainer ).prepend( '<div class="item"> </div>' );
					// $( mediaItemContainer ).masonry( 'reloadItems' );
					// $( mediaItemContainer ).masonry( 'layout' );

					// $(document).ready(function(){
		   //      	    $('#domains').masonry({
		   //                  columnWidth: '.col-md-4',
		   //                  itemSelector : '.item'
		   //              });
		   //      	});

		   //      	function loadcontributors(keywords,limit){
		   //      		$.post('http://www.contrib.com/linked/topdomains',{keywords:keywords,limit:limit},function(data){
		   //      			$('#loadcontributors'+domains).append(data.html);
		   //      			 $('#domains').masonry({
		   //                       columnWidth: '.col-md-4',
		   //                       itemSelector : '.item'
		   //                   });
		   //      		});
		   //      	}
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
						<div class="list-container">
							<div class="lead-item">
								<img width="100" height="100" alt="" src="https://d2qcctj8epnr7y.cloudfront.net/images/jayson/contrib/people/clifford%20romero.jpg" class="img-circle img-responsive ">
								<div class="info-container">
									<h3 class="text-capitalize">Andrie Cipriano</h3>
									Hiring For: Information Technology - Business Development
								</div>
							</div>
							<div class="lead-item">
								<img width="100" height="100" alt="" src="https://d2qcctj8epnr7y.cloudfront.net/images/jayson/contrib/people/joel%20gilbert.jpg" class="img-circle img-responsive ">
								<div class="info-container">
									<h3 class="text-capitalize">jeiseun slow</h3>
									Hiring For: Information Technology - Business Development
								</div>
							</div>
							<div class="lead-item">
								<img width="100" height="100" alt="" src="https://d2qcctj8epnr7y.cloudfront.net/images/jayson/contrib/people/jenny%20kelley.jpg" class="img-circle img-responsive ">
								<div class="info-container">
									<h3 class="text-capitalize">kenly giner</h3>
									Hiring For: Information Technology - Business Development
								</div>
							</div>
							<div class="lead-item">
								<img width="100" height="100" alt="" src="https://d2qcctj8epnr7y.cloudfront.net/images/jayson/contrib/people/candice%20fuller.jpg" class="img-circle img-responsive ">
								<div class="info-container">
									<h3 class="text-capitalize">lucille conde</h3>
									Hiring For: Information Technology - Business Development
								</div>
							</div>
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
					<div class="row">
						<div class="col-md-12">
							<h1 class="fnt-400 ttle">
								Found Leads
							</h1>
						</div>
						<!--load all brand here -->
						<div class="m-brand-list" id="m-brand-list">
						</div>
						
						 <!-- Limit the description to 50 letters -->
						

					</div>
				</div>
			</div>
		</div>
	</body>
</html>