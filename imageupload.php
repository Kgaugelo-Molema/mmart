<?php
    $album = isset($_GET["album"]) ? $_GET["album"] : "Photos";
   // if ($_SERVER['REQUEST_METHOD'] == 'POST')
   // {
       // if (!isset($_POST["env"])) {
            // $msg = "Only image files can be uploaded [*.jpg;*.jpeg;*.png;*.gif]";
            // echo '<span style="color:red;">'.$msg.'</span>';
            // exit;
       // }
       // $env = $_POST["env"];
   // }

	$msg = "";
	$notify = "";

	$uniqueId = "Null";
	if (isset($_GET["id"])) {   
		$uniqueId = $_GET["id"];
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// 
		//$uniqueId = $_POST["uniqueid"];
		$randkey = rand(1000,100000);
		//$guidkey = bin2hex((string)$randkey);
		$guidkey = bin2hex(openssl_random_pseudo_bytes(16));
		$targetfilename = rand(1000,100000)."-".$_FILES['file-6']['name'];
		$file_loc = $_FILES['file-6']['tmp_name'];
		$file_size = $_FILES['file-6']['size'];
		$file_type = $_FILES['file-6']['type'];


	$folder = "gallery/";			
	 move_uploaded_file($file_loc,$folder.$targetfilename);

	 // Valid file extensions
	 $extensions_arr = array("image/jpg","image/jpeg","image/png","image/gif");
         if( !in_array($file_type,$extensions_arr) ) {
            $msg = "Only image files can be uploaded [*.jpg;*.jpeg;*.png;*.gif]";
         }
	 // Check extension
	 if( in_array($file_type,$extensions_arr) ){

                    $notify = "Image uploaded successfully.";
                    header("Location:./res/photo/");
	 } 
	}
	 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Custom File Inputs | Codrops</title>
		<meta name="description" content="Demo for the tutorial: Styling and Customizing File Inputs the Smart Way" />
		<meta name="keywords" content="cutom file input, styling, label, cross-browser, accessible, input type file" />
		<meta name="author" content="Osvaldas Valutis for Codrops" />
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/templatemo-style.css" />		
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- remove this if you use Modernizr -->
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="box">
					<form method="post" action="<?php echo basename(__FILE__); ?>" enctype='multipart/form-data'>
						<input type="file" name="file-6" id="file-6" class="inputfile inputfile-5" data-multiple-caption="{count} files selected" />
						<label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span></span></label>
						<br><input class="tm-intro-link tm-light-blue-bordered-btn" type='submit' value='Save File' name='upload'>
					</form>
				</div>
			</div>
			<!-- Related demos -->
		</div><!-- /container -->
    <div class="tm-intro tm-detail modalForm">
        <section id="tm-section-1">
            <div class="tm-container text-xs-center tm-section-1-inner">
                <span style="color:red;"><?php echo $msg; ?></span>
                <span style="color:green;"><?php echo $notify; ?></span>
                <form method="post" action="<?php echo basename(__FILE__); ?>" enctype='multipart/form-data'>
                    <input name="uniqueid" type="hidden" value="<?php echo $uniqueId ?>">
                    <input class="tm-intro-link tm-light-blue-bordered-btn" type='submit' value='Save File' name='upload'>
                    <?php $env = isset($_GET["env"]) ? $_GET["env"] : "" ?>
                    <input name="env" type="hidden" value="<?php echo $env ?>">
                </form>
            </div>
        </section>
    </div>

		<script src="js/custom-file-input.js"></script>

		<!-- // If you'd like to use jQuery, check out js/jquery.custom-file-input.js
		<script src="js/jquery-v1.min.js"></script>
		<script src="js/jquery.custom-file-input.js"></script>
		-->

	</body>
</html>
