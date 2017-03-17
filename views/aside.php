<aside class="col-md-2">
    <ul class="nav nav-pills nav-stacked">
        <?php $result = $mysqli->query('SELECT * FROM genres');
            while ($row = $result->fetch_assoc()) {
            echo
            '<li>
                <a href="books.php?genre='.$row["id"].'">'.$row["name"].'</a>
            </li>';
            } ?>
    </ul>
</aside>