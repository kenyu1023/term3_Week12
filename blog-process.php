
<?php
$config=parse_ini_file("config.ini");
$conn=mysqli_connect('localhost',$config["username"],$config["password"],$config["database"]);
if(!$conn){
    echo "connection failed : ".mysqli_connect_error();
}else{
    $content = mysqli_real_escape_string($conn, $_POST['blogeditor']);

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    
    $mydate=getdate(date("U"));
    $mydate=$mydate[weekday].",". $mydate[month].", ".$mydate[mday].",". $mydate[year];
    if($_GET['update']==-1){
        $query = "DELETE FROM blog_tb WHERE id=".$_GET['id'];
    }else if($_POST['update']==0){
        $query = "INSERT INTO blog_tb (date,title,content) 
            VALUES ('".$mydate."','".$title."','".$content."')";
    }else{
        $query = "UPDATE blog_tb SET
        date='" .$date."',
        title='".$title."',  content='".$content."' WHERE id=".$_POST['update'];
    }
    $result = mysqli_query($conn,$query);
    if($result){
        header('location: admin-blog.php');
    }
}