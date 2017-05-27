<?php include "partials/header.php"; ?>
<div class="blog-detail-main">
    <?php

    include "db.php";
    if (!db_connect()) {
        echo"<p>Connection Failed</p>";
    } 
    else {

        $query = "SELECT * FROM blog_tb WHERE id=" . $_GET["id"];
        $queryResult = mysqli_query(db_connect(), $query);
        $numberOfRows = mysqli_num_rows($queryResult);
        if ($numberOfRows > 0) {
            while ($row = mysqli_fetch_assoc($queryResult)){

                $id = $row["id"];
                $date = $row["date"];
                $title = $row["title"];
                $content = $row["content"];
                echo "<div class='blog-detail-page'>";
                echo "<div class='blog-detail-post'>";
                echo"<div class='each-detail-post'>";
                echo "<h4>" . $date . "</h4>"; 
                echo "<h3>" . $title . "</h3>";
                echo "<p>" . $content . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
        else{
            echo "<p>There's no contents</p>";
        }
    }
    ?>
    <a href="blog.php">Back to Blog</a>
</div>
<?php include "partials/footer.php"; ?>