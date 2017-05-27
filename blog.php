<?php include "partials/header.php"; ?>
<div class="blog-main">
<h3>My Blog</h3>
<?php

include "db.php";
if (!db_connect()) {
    echo"<p>Connection Failed</p>";
} 
else {

    $query = "SELECT * FROM blog_tb ORDER BY id desc";
    $queryResult = mysqli_query(db_connect(), $query);
    $numberOfRows = mysqli_num_rows($queryResult);
    if ($numberOfRows > 0) {
        while ($row = mysqli_fetch_assoc($queryResult)){
            
            $id = $row["id"];
            $date = $row["date"];
            $title = $row["title"];
            $content = $row["content"];
            echo "<div class='blog-page'>";
            echo "<div class='blog-post'>";
            echo"<div class='each-post'>";
            echo "<h5>" . $date . "</h5>"; 
            echo "<h4>" . $title . "</h4>";
//            echo "<p>" . $content . "</p>";
            echo "<a href='blog-detail.php?id=" . $id . "'>Read More</a>";
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
</div>
<?php include "partials/footer.php"; ?>