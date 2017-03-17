<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bookstore</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <header>
                <div class="jumbotron">
                    <h1>Bookstore</h1>
                    <p>
                        <a class="btn btn-primary btn-lg" href="index.php" role="button">Home</a>
                    </p>
                </div>
                <nav class="navbar navbar-default">
                    <ul class="nav navbar-nav">
                        <li role="presentation" class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <?php if(!isset($_SESSION['type'])) {
                            echo
                            '<li role="presentation">
                                <a href="login.php">Log in</a>
                            </li>';
                        } else if($_SESSION['type'] == 1) {
                            echo
                            '<li role="presentation">
                                <a href="edit_books.php">Books</a>
                            </li>
                            <li role="presentation">
                                <a href="edit_book.php">New book</a>
                            </li>
                            <li role="presentation">
                                <a href="logout.php">Log out</a>
                            </li>';
                        } ?>
                    </ul>
                </nav>
            </header>
            <main>