<?php
    include 'init.php';
    include 'views/header.php';
    include 'views/aside.php';
    
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    
    $query = 'SELECT Books.id, Books.title, Books.author, Books.cover FROM Books';
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        
        echo '<section class="col-md-10">
              <div class="row">';
        while ($row = $result->fetch_assoc()) {                        
            echo
            '<div class="col-sm-6 col-md-4" style="height: 620px">
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
        '</div>
    </section>
</main>';
    }
    
    include 'views/footer.php';
?>