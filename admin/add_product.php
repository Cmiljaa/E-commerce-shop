<?php 

require_once 'admin_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = $_POST['name'];

    $price = $_POST['price'];

    $size = $_POST['size'];

    $image = $_POST['image'];

    $product -> create($name, $price, $size, $image);

    $response -> redirect("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <title>Create Product</title>
</head>

<body>

    <div class="container" style="margin-top: 60px;">
        <h1>Add product</h1>
        <form action="" method="POST">
            <div class="form-group mb-3">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group mb-3">
                <label for="price">Product Price</label>
                <input type="text" class="form-control" name="price" step="0.01" id="price">
            </div>
            <div class="form-group mb-3">
                <label for="size">Product Size</label>
                <input type="text" class="form-control" name="size" id="size">
            </div>
            <input type="hidden" name="image" id="photoPathInput">
            <div id="dropzone-upload" class="dropzone"></div>
            <div class="form-group mb-3" style="margin-top: 15px;">
                <input type="submit" class="btn btn-primary" value="Add Product">
            </div>
            
        </form>
        <div>
            <a href="index.php"><button class="btn btn-primary">Homepage</button></a>
        </div>
    </div>
</body>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

<script>
   Dropzone.options.dropzoneUpload = {
        url: "upload_photo.php",
        paramName: "photo",
        maxFilesize: 20,
        acceptedFiles: "image/*",
        init: function () {
          this.on("success", function (file, response) {
            const jsonResponse = JSON.parse(response);
            if (jsonResponse.success) {
              document.getElementById('photoPathInput').value = jsonResponse.photo_path;
            } else{
              console.error(jsonResponse.error);
            }
          });
        }
      }
</script>
</body>

</html>