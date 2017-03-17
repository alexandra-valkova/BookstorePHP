<?php
    include 'init.php';
    include 'views/header.php';
    include 'views/aside.php';
    
    $errorMessage = '';
    
    if ($_POST) {
        $_POST['username'] = $mysqli->escape_string(trim($_POST['username']));
        $_POST['password'] = $mysqli->escape_string(trim($_POST['password']));
        
        $query = 'SELECT * FROM Users
                  WHERE username = "'.$_POST['username'].'"
                  AND password = "'.$_POST['password'].'"';
                  
        $result = $mysqli->query($query);
        
        if ($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['type'] = $row['type'];
            
            header('Location: index.php');
            exit;
            
        } else {
            $errorMessage = 'Invalid username or password!';
        }
    }
    
    echo '<section class="col-md-10">';
    include 'views/login.php';
    echo '</section>';
    
    include 'views/footer.php';
?>