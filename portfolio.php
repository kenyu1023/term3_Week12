<?php include "partials/header.php"; ?>

<div class="portfolio-main">
    <h2>Portfolio</h2>
    <div class="demo">
        <h1>demo</h1>
    </div>

    <?php
    include "db.php";
    if (!db_connect()) {
        echo"<p>Connection Failed</p>";
    } else {
        $query = "SELECT * FROM portfolio_tb";
        $queryResult = mysqli_query(db_connect(), $query);
        $numberOfRows = mysqli_num_rows($queryResult);
        if ($numberOfRows > 0) {
            while ($row = mysqli_fetch_assoc($queryResult)) {
                $id = $row["id"];
                $title = $row["title"];
                $description = $row["description"];
                $mainImg = $row["main_img"];
                $subImg = $row["sub_img"];
                echo "<div class='portfolio-page' data-id='".$id."'>";
                echo "<div class='each-work-overlay'>";
                echo"<div class='each-works'>";
                echo "<div class='works-img'><img id='imagePort".$id."' data-main='".$mainImg."' src='" . $mainImg . "'></div>";
//                echo "<div class='works-img'><img id='imagePort".$id."' data-main='".$subImg."' src='" . $subImg . "'></div>";
                echo "<h5 id='workTitle".$id."'>$title</h5>";
                echo "<input id='workDesc".$id."' type='hidden' value='".$description."'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>There's no contents</p>";
        }
    }
    ?>


<div class="modalbox-style" id="modalBox">
    <div class="modalbox-info-style">
        <img id='portImg' src=''>
        <div class="works-para">
            <h5 id='portTitle'></h5>
            <p id='portDesc'></p>
        </div>
        <div id="closeModal">&times;</div>
    </div>
</div>
</div>


<?php include "partials/footer.php"; ?>