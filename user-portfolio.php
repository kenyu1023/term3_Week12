<div class="user-portfolio">
    <h1>Portfolio</h1>
    <div class="user-portfolio-edit">
        <form action="user-portfolio-process.php" method="post" enctype="multipart/form-data">
            <label>Main Image</label>
            <input type="file"
                   id="mainImg"
                   name="mainImgUploaded" />

            <label>Sub Image</label>
            <input type="file"
                   id="subImg"
                   name="subImgUploaded" />

            <label>Title</label>

            <input type="text"
                   name="title"
                   id="title"
                   placeholder="Title">

            <label>Description</label>
            <textarea name="description"
                      id="description"
                      placeholder="Description"></textarea>      

            <input type="submit"
                   name="submit"
                   value="Submit" />

        </form>

        <form action="user-page.php" method="post">
            <input type="submit"  name="logout" value="Log out" /> 
        </form>
    </div>
</div>