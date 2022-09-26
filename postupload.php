<!DOCTYPE html>
<html>
    <title>Upload Post</title>
	<head>
		<link rel="stylesheet" href="poststyle.css" />
	<body>
		<form action="postsubmit.php" method="POST" enctype="multipart/form-data">

            <div class="container">

                <div class="box1">

                    <label for="title">Post Title</label> <br>
                    <input type="text" id="title" name="title" autofocus /> <br><br>

                    <label for="desc">Description</label> <br>
                    <textarea id="desc" name="content" rows="4"></textarea> <br><br>

					<label for="myfile">Upload image</label> <br>
					<input type="file" id="myfile" name="myfile" multiple> <br><br>

                    <button type="submit">
                            POST
                    </button>
                    <br><br>
                    <a href="postlist.php">HOME</a>

                    
                </div>
            </div>
        </form>
	</body>
</html>
