	<?php
		if(isset($_FILES["file"]["type"])){

			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temporary);
			$file_extension = end($temporary);

			if ((($_FILES["file"]["type"] == "image/png") ||
				 ($_FILES["file"]["type"] == "image/jpg") ||
				 ($_FILES["file"]["type"] == "image/jpeg")) &&
				 ($_FILES["file"]["size"] < 1000000000000) &&

				  in_array($file_extension, $validextensions)){

				if ($_FILES["file"]["error"] > 0){
						echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
					}else{
						
						move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $newfilename);
						$pic='http://linked.com/beta/beta-1/upload/'.$newfilename ;						
						echo $pic;
				
					}
					
				}

		}// end of the first iff
	?>