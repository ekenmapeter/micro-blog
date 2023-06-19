 <?php include '../connections/auth.php'; ?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard - MicroBlog</title>
        <link rel="stylesheet" type="text/css" href="../css/navbar.css" />
        <link rel="stylesheet" type="text/css" href="../css/footer.css" />
        <link rel="stylesheet" type="text/css" href="../css/blog.css" />
        <link rel="stylesheet" type="text/css" href="../css/auth.css" />
        <link rel="stylesheet" type="text/css" href="../css/user.css" />
        <link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
        <link rel="stylesheet" type="text/css" href="../css/blogform.css" />
        <script type="text/javascript" src="../js/blogform.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
		  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    </head>
    <body>
        <?php include '../components/admin-navbar.php'; ?>
        <div class="space-up">
          <div class="container">
            <h2 style="margin-bottom: 6px;">Admin Create new post</h2>
           
            <form action="../connections/submit_post.php" method="POST">
			    <label for="title">Title:</label>
			    <input type="text" id="title" name="title" required>

			    <label for="category">Category:</label>
			    <select id="category" name="category" required>
			      <option value="">Select a category</option>
			      <option value="Entertainment">Entertainment</option>
			      <option value="Business">Business</option>
			      <option value="Sport News">Sport News</option>
			      <option value="World News">World News</option>
			    </select>
			    
			    <label for="description">Description:</label>
			    <input type="text" id="description" name="description" required>
			    
			    <label for="url">URL:</label>
			    <input type="text" id="url" name="url" required>
			    
			    <label for="image">Image Link:</label>
			    <input type="text" id="image" name="image" required>
			    
			    <label for="content">Content:</label>
				    <div id="editor" style="height: 200px;"></div>
				    <input type="hidden" id="content" name="content" required>
			    <input type="submit" value="Submit">
			  </form>
          </div>

          
        <?php include '../components/footer.php'; ?>
        <script>
    var quill = new Quill('#editor', {
      theme: 'snow'
    });

    var form = document.querySelector('form');
    form.onsubmit = function() {
      var content = document.querySelector('input#content');
      content.value = quill.root.innerHTML;
    };
  </script>
    </body>
</html>

