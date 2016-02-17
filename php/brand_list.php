<script type="text/javascript">

        	$(document).ready(function()
        	{
        	    $('.newbrands').masonry({
                    columnWidth: '.col-md-4',
                    itemSelector : '.item'
                });
        	});

        	function loadcontributors(domain)
        	{
        		$.post('/linked/topdomains',{domain:domain,},function(data){
        			$('#loadcontributors'+keywords).append(data.html);
        			 $('.newbrands').masonry({
                         columnWidth: '.col-md-4',
                         itemSelector : '.item'
                     });
        		});
        	}
</script>

<div class="row newbrands" id="m-brand-list" style="position: relative; height: 879.4px;">
	<?php if ($query->num_rows() > 0):?>
		<?php foreach ($query->result() as $row):?>

   			 <div class="col-md-4 item">
                        <div class="wrap-marketplace-box-item" id="loadcontributors<?=$row->domain?>">
	                            <a class="wmbi-img-logo" href="">
	                                <?php if (($row->Logo == null) || ($row->Logo == "")): ?>
	                                	<img src="https://d2qcctj8epnr7y.cloudfront.net/contrib/logo-contrib-brand2.png" class="img-responsive">
	                                	<?php else:?>
	                                	<img src="<?php echo $row->Logo?>" class="img-responsive">
	                                <?php endif?>
	                            </a>
	                            <h3 class="marg-m-ttlTop text-capitalize wmbi-ttle ellipsis">
	                                <?php echo $row->domain?>
	                            </h3>
	                            <p class="p-marg-btm">
	                                Join our exclusive community of like minded people on <span><?php echo $row->domain ?></span>
	                            </p>
	                            <p>
	                                <a href="http://<?php echo $row->domain?>"><?php echo $row->domain?></a>
	                            </p>
	                            
	                            <ul class="list-inline ul-wmbi-zero">
	                                <li>
	                                    <a class="btn btn-success btn-lg" href="http://<?php echo $row->domain?>">Visit</a>
	                                </li>
	                                <li>
	                                    <a class="btn btn-success btn-lg" href="/brand/details/<?php echo $row->domain?>">Details</a>
	                                </li>
	                            </ul>
	                    </div>
                        
                        <script>
						$(function(){
							loadcontributors('<?php echo $row->domain?>',<?php echo $row->domain?>);
						
						});
					  </script>
	                           
	</div>
	<?php endforeach;?>
<?php endif;?>                    
 </div>                   
                    
                    