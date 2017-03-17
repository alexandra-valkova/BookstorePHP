<?php
    include 'init.php';
    include 'views/header.php';
    include 'views/aside.php';
    
    $link_text = 'All books';
    
    $genre = (int)$_REQUEST['genre']; //genre_id
    
    if ($genre) {
        $query = 'SELECT * FROM Genres WHERE id='.$genre;
        
        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();
        $link_text = $row['name'];
    }
    
     echo '<section class="col-md-10">
           <h1>'.$link_text.'</h1>';
        
    $query = 'SELECT Books.*, Genres.name FROM Books 
              JOIN Genres ON
              Books.genre_id = Genres.id '
              .($genre?'WHERE Books.genre_id = '.$genre:'').' ORDER BY Books.title';
              
    $result = $mysqli->query($query);
    
    if ($result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {                        
            echo '<div class="col-sm-6 col-md-4" style="height: 620px">
                    <div class="thumbnail">
                        <a href="book.php?id='.$row['id'].'">
                            <img src="images/'.($row['cover'] ? $row['cover'] : 'default-placeholder.png').'" alt="">
                        </a>
                        <div class="caption">
                            <h3>'.$row["title"].'</h3>
                            <h5>'.$row["author"].'</h5>             
                            <p><a href="book.php?id='.$row['id'].'" class="btn btn-primary" role="button">Details</a></p>
                        </div>
                    </div>
                </div>';
        }
        echo
            '   </div>
            </section>
        </main>';
    }

    include 'views/footer.php';
?>