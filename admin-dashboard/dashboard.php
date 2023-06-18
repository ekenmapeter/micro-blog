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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
    <body>
        <?php include '../components/user-navbar.php'; ?>
       
  

        <div class="space-up">
  <header style="background-color: red;">
    <h1>Admin Dashboard</h1>
  </header>
  <section>



  </section>

<div class="table-wrapper">
  <h2>Blog Posts</h2>
    <table class="fl-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Date / Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Content 1</td>
            <td><button>Published</button></td>
            <td></td>
            <td><button>Approved</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Content 2</td>
            <td><button>Published</button></td>
            <td></td>
            <td><button>Approved</button></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Content 3</td>
            <td><button>Published</button></td>
            <td></td>
            <td><button>Approved</button></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Content 4</td>
            <td><button>Published</button></td>
            <td></td>
            <td><button>Approved</button></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Content 5</td>
            <td><button>Published</button></td>
            <td></td>
            <td><button>Approved</button></td>
        </tr>
        <tbody>
    </table>
</div>

        <?php include '../components/footer.php'; ?>
    </body>
</html>