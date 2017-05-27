<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
   <div class='admin-blog-style'>
    <h1>ADMIN BLOG PAGE</h1>

            
            <?php 
                if(isset($_GET['update'])){
                   $config=parse_ini_file("config.ini");
                   $conn=mysqli_connect('localhost',$config["username"],$config["password"],$config["database"]);
                   if(!$conn){
                       echo "connection failed : ".mysqli_connect_error();
                   }else{
                       $query = "SELECT * FROM blog_tb WHERE id=".$_GET["id"];


                       $result = mysqli_query($conn,$query);
                       while($data = mysqli_fetch_assoc($result)){
                           $uptitle=$data["title"];
                           $upcontent=$data["content"];
                       }
                      
                       mysqli_close($conn);
                    }
                }
        
            ?>
            
            <h2>New Blog</h2>
            <form action="blog-process.php" method="POST">
                <input id="updateBlog" type="hidden" value="<?php if(isset($_GET['update'])){ echo $_GET['id']; }else{ echo "0"; } ?>" name="update">
                <div class="clearfix">
                    <div class="small-12 medium-12 large-12 column text-center">
                        <h4>Title</h4>
                    </div>
                    <div class="small-12 medium-12 large-12 column">
                        <input ng-model="title" class="text-center" name="title" type="text"
                               value="<?php if(isset($_GET['update'])){echo $uptitle;} ?>">
                    </div>
                </div>
                <div class="clearfix">
                    <div class="small-12 medium-12 large-12 column text-center">
                        <h4>Content</h4>
                    </div>
                    <div class="small-12 medium-12 large-12 column remove-padding">
                        <textarea id="blogContent" name="blogeditor"><?php if(isset($_GET['update'])){echo $upcontent;} ?></textarea>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="small-12 medium-12 large-12 column text-center">
                        <input type="submit" value="POST!"><a ng-click="yosAppVar.closeBodalBox()">CLOSE</a>
                    </div>
                </div>
            </form>
    <script>
        var bloged = CKEDITOR.replace( 'blogeditor',{
            resize_enabled: 'false',
            removePlugins: 'elementspath',
            filebrowserUploadUrl: '/term3_Week12/upload.php',
            image_previewText : CKEDITOR.tools.repeat( 'Select Image', 1 ),
            toolbar: [
                [ 'Image','Bold', 'Italic', '-', 'NumberedList','BulletedList', '-', 'Link', 'Unlink' ]
            ]
        });

    </script>

</div>	