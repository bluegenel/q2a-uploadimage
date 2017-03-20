<?php

class q2a_uploadimage {

    function allow_template($template) {
        $allow = false;

        switch ($template) {
            case 'account':
            case'activity':
            case'admin':
            case'ask' :
            case'categories' :
            case'custom' :
            case'favorites':
            case'feedback' :
            case'hot' :
            case'ip' :
            case'login':
            case'message':
            case'qa' :
            case'question':
            case'questions':
            case'register' :
            case'search' :
            case'tag' :
            case'tags' :
            case'unanswered':
            case'updates' :
            case'user' :
            case'users' :
                $allow = true;
                break;
        }

        return $allow;
    }

    function allow_region($region) {
        return true;
    }
    function output_widget() {
$fromhandle = qa_get_logged_in_handle();
$fromhandlehandles = array('user1', 'user2');
if ( qa_get_logged_in_level() >= QA_USER_LEVEL_EXPERT || in_array($fromhandle, $fromhandlehandles) ) {
echo "<form action='/qa-uploads/upload.php' target='_blank' method='post' enctype='multipart/form-data'>";
echo "Select image to upload:";
echo "<input type='file' name='fileToUpload' id='fileToUpload'>";
echo "<input type='submit' value='Upload Image' name='submit'>";
echo "<br><br>";
echo "File size limit is 2MB.";
echo "<br><br>";
echo "Only .jpg, .jpeg, .png , .gif, .JPG, .JPEG, .PNG & .GIF files are allowed.";
echo "<br><br><hr><br>";
echo "</form>";
echo "Uploaded images - Click on a link below:<br><br>";
$dir = "qa-uploads/uploads/";
$exclude = array( ".","..","error_log","_notes" );
if (is_dir($dir)) {
    $files = scandir($dir);
	natcasesort($files);
	$filecount = count( $files );
    echo "Number of images uploaded: $filecount in alphabetical order below<br><br>";
    foreach($files as $file){
        if(!in_array($file,$exclude)){
		echo "<a href='/qa-uploads/uploads/$file' target='_blank'>$file</a><br>";
        }
}
		echo "<br><br><hr><br>";
		}
}
    }
}
