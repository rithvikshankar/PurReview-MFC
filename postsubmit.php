<?php
	session_start();

	$link = new mysqli("localhost", "root", "", "MFC_final");
	if($link -> connect_error) {
		die("ERROR: Could not connect. " . $link -> connect_error);
	}

	$email = $_SESSION['email'];
	$userid = $_SESSION['userid'];
	$title = $_POST['title'];
	$content = $_POST['content'];

	$target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    }
    else {
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["myfile"]["name"])). " has been uploaded.";
            $image_name = basename( $_FILES["myfile"]["name"]);
            $sql = $link -> prepare("insert into post (userid,title,content,image_name) values(?,?,?,?)");
            $sql -> bind_param('ssss',$userid,$title,$content,$image_name);
            $sql -> execute();
        }
        else {
            echo "Sorry, there was an error uploading the post.";
        }
    }

    header("Location: postlist.php");
?>
