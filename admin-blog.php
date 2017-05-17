
<?php
$config=parse_ini_file("config.ini");
echo $config["username"];
$conn=mysqli_connect('localhost',$config["username"],$config["password"],$config["database"]);
if(!$conn){
    echo "connection failed : ".mysqli_connect_error();
}else{
        $query = "SELECT * FROM blog_tb";
        

    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
    if($row > 0){
        while($data = mysqli_fetch_assoc($result)){
            echo "<h1>" . $data["title"] . "</h1>";
            echo "<p>" . $data["date"] . "</p>";
            echo "<div>" . $data["content"] . "</div>";
            echo "<div><a href='blog.php?update=1&id=".$data["id"]."'>Update</a></div>";
            echo "<div><a href='blog-process.php?update=-1&id=".$data["id"]."'>Delete</a></div>";
        }
    }
    mysqli_close($conn);
}
