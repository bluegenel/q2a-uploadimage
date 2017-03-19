<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//check if file was selected
echo "<img src='../logopng.png' alt='logo' style='width:490px;height:50px;'>";
if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_NO_FILE) {
        echo "<p style='font:Arial; font-size:20px;'>No file was selected.</p>";
		    echo "<p style='font:Arial; font-size:20px;'>Sorry, your file was not uploaded.</p>";
		$uploadOk = 0;
		break;
}
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "" . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<p style='font:Arial; font-size:20px;'>File is not an image.</p>";
		    echo "<p style='font:Arial; font-size:20px;'>Sorry, your file was not uploaded.</p>";
        $uploadOk = 0;
		break;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<p style='font:Arial; font-size:20px;'>Sorry, file already exists.</p>";
	    echo "<p style='font:Arial; font-size:20px;'>Sorry, your file was not uploaded.</p>";
    $uploadOk = 0;
	break;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "<p style='font:Arial; font-size:20px;'>Sorry, your file is too large.</p>";
	    echo "<p style='font:Arial; font-size:20px;'>Sorry, your file was not uploaded.</p>";
    $uploadOk = 0;
	break;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "JPG" &&$imageFileType != "png" &&$imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "gif" && $imageFileType != "GIF" ) {
    echo "<p style='font:Arial; font-size:20px;'>Sorry, only jpg, jpeg, png , gif, JPG, JPEG, PNG & GIF files are allowed.</p>";
        echo "<p style='font:Arial; font-size:20px;'>Sorry, your file was not uploaded.</p>";
	$uploadOk = 0;
	break;
}
// Check if $uploadOk is set to 0 by an error
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		header("Location: /qa-uploads/uploads/". basename( $_FILES["fileToUpload"]["name"]). "");
    } else {
        echo "<p style='font:Arial; font-size:20px;'>Sorry, there was an error uploading your file.</p>";
}
?>