<?php
    include 'init.php';
    
    $id = (int)$_REQUEST['id'];
    
    if ($id) {
        $query = 'SELECT Books.*, Genres.name FROM Books
                  JOIN Genres ON
                  Books.genre_id = Genres.id
                  WHERE Books.id = '.$id;
                  
        $result = $mysqli->query($query);
        $row_book = $result->fetch_assoc();
    }
    
    include 'views/header.php';
    include 'views/aside.php';
    
    echo '<section class="col-md-10">
            <div class="row_animal">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                    <img src="images/'.($row_book['cover'] ? $row_book['cover'] : 'default-placeholder.png').'" alt="">
                        <div class="caption">
                            <h3>'.$row_book["title"].'</h3>
                            <h5><small>Author: </small>'.$row_book["author"].'</h5>
                            <h5><small>Genre: </small>'.$row_book["name"].'</h5>
                        </div>
                    </div>
                </div>
            </div>
         </section>
     </main>';
     
     include 'views/footer.php';
?>