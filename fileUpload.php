

<?php
include("config_files.php");
date_default_timezone_set("Europe/Amsterdam");
$date = date('Y/m/d H:i');

session_start();
    $currentDir = getcwd();
    $uploadDirectory = "/uploads/";
    $tumb = "/thumbnails/";
    $errors = []; // Store all foreseen and unforseen errors here
    $sqlSelect = "SELECT id FROM files ORDER BY id DESC LIMIT 1;";
    #$lastID = $conn->query($sqlSelect);
    
    
    if ($result = mysqli_query($conn, $sqlSelect)){
	    if(mysqli_num_rows($result) > 0){
		    $lastID = mysqli_fetch_array($result);
	            $lastID = ++$lastID['id'];
		    
	    }
    }
    

    
    
    
    $fileExtensions = ['mp4']; // Get all the file extensions

    $fileName = $_FILES['myfile']['name'];
    #echo($fileName);
    $Extension = ".mp4";
    #$Extension = shell_exec("echo 'test.test2'");
    #$Extension = shell_exec("echo $fileName");
    #$Extension = ("." . $Extension);
    #$echo($Extension);
    $fileName = ($lastID . $Extension);
    echo($fileName);
    $givenName = $_POST['givenName'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));
    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
    //$sql = "INSERT INTO `files` (`filename`) VALUES ('/uploads/upload.mp4');"; 
    if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "Only .mp4 allowed.";
        }

        if ($fileSize > 2000000000000000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

	    if ($didUpload) {
		echo($givenName);
	        echo "The file " . basename($givenName) . " has been uploaded";
		$name = shell_exec("echo $fileName | cut -d '/' -f 6");
                $name = trim($name);
		$tumb = "../thumbnails/{$lastID}.png";
	        $sql = "INSERT INTO `files` (`filename`, `name`, `tumb`) VALUES ('$uploadPath', '$givenName', '$tumb');";
		if ($conn->query($sql) === TRUE) {
		#$name = shell_exec("echo $fileName | cut -d '/' -f 6");
		#$name = trim($name);
                exec("ffmpeg -ss 00:00:5.0 -i /var/www/html/uploads/{$fileName} -vframes 1 -filter:v 'yadif,scale=400:300' /var/www/html/thumbnails/{$lastID}.png");	
		exec("cp playback.php /var/www/html/pages/{$lastID}.php");
		exec("sed -i '5i \$link = \"../uploads/{$fileName}\"; \$lastID = \"{$lastID}\"; \$givenName = \"{$givenName}\"' /var/www/html/pages/{$lastID}.php");
		$str = '<div class="col-lg-3 col-md-4 col-xs-6"> <center><h3>' . $givenName . '</h3></center> <a href="https://media.schroeff.nl/pages/' . $lastID . '.php" class="d-block mb-4 h-100"> <img class="img-fluid img-thumbnail" src="/thumbnails/' . $lastID . '.png" <h4>' . $date . '</h4> </a> </div>';
		exec("sed -i '76i " .$str. "' /var/www/html/pages/browse.php");
		echo($str);
		#echo($str . "\n\n" . $lastID);
                header("refresh:5; url=https://media.schroeff.nl/pages/browse.php");


		}
	    } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . ". These are the errors" . "\n";
            }
        }
    }


?>
