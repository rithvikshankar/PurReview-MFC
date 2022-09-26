<?php
      $comment = $_GET['content'];
      $pid = $_GET['pid'];
      $uid = $_GET['uid'];

      $link = new mysqli("localhost", "root", "", "MFC_final");

      if ($link -> connect_error) {
            die("ERROR: Could not connect. " . $link -> connect_error);
      }

      // $stmt = $link->prepare("INSERT INTO post_comments (userid, postid, comment) values (?, ?, ?);");

      // $stmt -> bind_param("iis", $userid, $postid, $comment);

      // $execval = $stmt->execute();
      // echo $execval;

      $sql2 = "INSERT INTO post_comments (userid, postid, comment) values (".$uid.", ".$pid.", '".$comment."');";
	$result2 = mysqli_query($link, $sql2);
      // $stmt->close();
      // $link->close();
      header('Location: singlepost.php?id='.$pid);
?>
