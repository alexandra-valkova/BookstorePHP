<?php
    include 'init.php';
    include 'check_admin.php';
    include 'views/header.php';
    include 'views/aside.php';
    
    echo
        '<section class="col-md-10">';
    
    if ($_GET && $_GET['id']) {
        $query = 'DELETE FROM Books
                  WHERE id = '.(int)$_GET['id'];
                
        $mysqli->query($query);
        
        if ($mysqli->affected_rows) {
            echo '<div class="alert alert-success" role="alert">The book was successfully deleted!</div>';
        } else {
            echo '<div class="alert alert-warning" role="alert">No books deleted!</div>';
        }
    }
    
    $query = 'SELECT Books.*, Genres.name FROM Books
              JOIN Genres ON
              Books.genre_id = Genres.id
              ORDER BY Books.id';
                  
    $result = $mysqli->query($query);
    
    if ($result->num_rows > 0) {
        echo
            '<table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>';
                while ($row = $result->fetch_assoc()) {
                        echo
                        '<tr>
                            <td>'.$row['id'].'</td>
                            <td>
                                <a href="book.php?id='.$row['id'].'">
                                    <img src="images/'.($row['cover'] ? $row['cover'] : 'default-placeholder.png').'" title="Details" class="thumbnail" height="100px">
                                </a>
                            </td>
                            <td>'.$row['title'].'</td>
                            <td>'.$row['author'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>
                                <a href="edit_book.php?id='.$row['id'].'" style="color: green;">Edit</a>
                                <a href="edit_books.php?id='.$row['id'].'" style="color: red;">Delete</a>
                            </td>
                        </tr>';
                }
                echo
                '</tbody>
            </table>
         </section>';
    }
    
    include 'views/footer.php';
?>