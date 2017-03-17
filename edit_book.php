<?php
    include 'init.php';
    include 'check_admin.php';
    include 'views/header.php';
    include 'views/aside.php';
    
    $operation = 'Add';
    $infoMessage = '';
    
    $title = '';
    $author = '';
    $genre_id = '';
    
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    if ($_POST && $_POST['submit']) {
        $operation = 'Edit';
        
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre_id = $_POST['genre_id'];
        
        if ($id > 0) { // Edit
            $query = 'UPDATE Books SET
                      title = "'.$title.'", author = "'.$author.'", genre_id = '.$genre_id.'
                      WHERE id = '.$id;
                      
            $operation = 'Edit';
        
        } else { // Add
            $query = 'INSERT INTO Books (title, author, genre_id) VALUES
                      ("'.$title.'", "'.$author.'", '.$genre_id.')';
                      
            $operation = 'Add';
        }
        
        $mysqli->query($query);
        
        $id = $id?$id:$mysqli->insert_id;
        
        $infoMessage = 'Book successfully ' . ($operation == 'Edit' ? 'edited' : 'added') . '!';
         
    } else if ($id) {
        $query = 'SELECT * FROM Books WHERE id = '.$id;
        $result = $mysqli->query($query);
        
        if ($row = $result->fetch_assoc()) {
            $operation = 'Edit';
            
            $title = $row['title'];
            $author = $row['author'];
            $genre_id = $row['genre_id'];
        }
    }
    
    echo
    '<section class="col-md-10">
        <form action="edit_book.php" method="post" class="form-horizontal">
            <input type="hidden" name="id" value="'.$id.'">
            <fieldset>
                <legend>'.$operation.' Book</legend>';
                if($infoMessage) {
                    echo '<div class="alert alert-success" role="alert">'.$infoMessage.'</div>';
                }
                echo
                '<div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-8">
                        <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="'.$title.'">
                    </div>
                </div>
                <div class="form-group">
                    <label for="author" class="col-sm-2 control-label">Author</label>
                    <div class="col-sm-8">
                        <input type="text" name="author" id="author" placeholder="Author" class="form-control" value="'.$author.'">
                    </div>
                </div>
                <div class="form-group">
                    <label for="genre_id" class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-8">
                        <select name="genre_id" id="genre_id" class="form-control">';                        
                            $query = 'SELECT * FROM Genres ORDER BY name';
                            $result = $mysqli->query($query);
                            while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?=$row['id']?>" <?=($row['id'] == $genre_id ? 'selected' : '')?> ><?=$row['name']?></option>
                           <?php }
                        echo
                        '</select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" name="submit" value="'.$operation.'" class="btn btn-primary">
                    </div>
                </div>
            </fielset>
        </form>
    </section>';
    
    include 'views/footer.php';
?>