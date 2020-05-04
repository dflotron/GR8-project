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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
        <div class="container py-3">
            <h1 class="display-3  d-none d-sm-block">BargainBooks</h1>
            <hr class="my-2">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="form-inline mt-3 " style="display: flex; justify-content: center;">
                <input id="search-input" class="form-control w-75 mr-sm-2 form-control-lg" type="text" placeholder="Search for Textbooks by Title" name="q">
                <input type="submit" value="Submit" id="search-btn" class="btn btn-outline-success my-2 my-sm-0 btn-lg"/>
            </form>
        </div>
    </div>
    <section id="search" class="container my-3" style="flex-grow:10; display: flex; flex-direction: column; width:100vw !important;">
        <div id="search-msgs" style="flex-grow: 1; display: flex; flex-direction:column; justify-content: center; text-align: center;">
            <span class="text-muted h3" id="no-search-terms">Enter Search Term to Display Results</span>
            <span class="d-none text-muted h3" id="no-results">No Results Found</span>
        </div>
        <div id="search-results" class="container my-2" style="display: flex; flex-direction: column;">
<?php

if(isset($_GET['q'])) {
  $search_query = $_GET['q'];
  //echo $search_query;
  $books = search($search_query);

  if(empty($books)) {
    echo "There are no books in the database with name: '{$search_query}'";
  } else {
    foreach($books as $book) {
      echo "{$book['title']} by {$book['author']}. ISBN: {$book['isbn']}";
    }
  }
}

?>

        </div>
    </section>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Custom JavaScript Files -->
    <script src="js/account.js"></script>
    <script src="js/search.js"></script>
</body>

</html>