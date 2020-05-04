 <?php
 require_once "functions.php";
 ?>
<!doctype html>
<html lang="en">

<head>
    <title>Textbook Resale Marketplace</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/theme.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="index.php">BargainBooks</a>
        <button class="navbar-toggler hidden-lg-up " type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addbook.php">Add Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="testUserPage.html">My Account</a>
            </ul>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="user-greeting" class="my-0 mr-2 h5"></span>
                <button id="login-logout" class="btn btn-outline-success my-2 my-sm-0" type="button"></button>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid mb-0 pb-4">
        <div class="container">
            <h1 class="display-4 pt-2 d-none d-sm-block">Add a Book</h1>
            <hr class="my-2">
        </div>
    </div>
    <section class="container py-3">
<?php

if($_SERVER ["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $isbn = $_POST['isbn'];

  $result = add_book($title, $author, $isbn);
  if($result > 0) {
    echo "Book successfully added";
  }
}

?>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="form-group" style="display: flex; flex-direction: column;">
                <label for="title">Title</label>
                <input type="text" name="title" id="title-input" class="form-control-lg" placeholder="Enter Book Title" aria-describedby="helpId">

            </div>
            <div class="form-group" style="display: flex; flex-direction: column;">
                <label for="author">Author</label>
                <input type="text" name="author" id="author-input" class="form-control-lg" placeholder="Enter Author(s)" aria-describedby="helpId">

            </div>
            <div class="form-group" style="display: flex; flex-direction: column;">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn-input" class="form-control-lg" placeholder="XXX-XX-XXXXX-XX-X" aria-describedby="helpId">
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>

    </section>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Custom JavaScript Files -->
    <script src="js/account.js"></script>
</body>

</html>