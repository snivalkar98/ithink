<?php


if(isset($_FILES['image'])){
    // print_r($_FILES);

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $f = explode('.',$file_name);
    $fileExt= strtolower($f[1]);

    $allowedExt = array('jpg','jpeg');
    if(in_array($fileExt,$allowedExt)){
        if($file_size < 2000000){
            move_uploaded_file($file_tmp,"uploaded_img/". $file_name);
            echo "Image uploaded sucessfully..!!";
        }else{
            echo "file size exceeded";
        }
    }else{
        echo "file not supported";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>img upload</title>
    <style>
        .container{
        margin: 10px;
        background-color: antiquewhite;
        border: 3px solid black; 
        border-radius: 15px;
        height: 400px;
        width: 500px;
        }
        form{
            margin: 20px;
        }

        form input{
            margin-top:10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image"/><br>
            <input type="submit" value="submit">
        </form>
    </div>
</body>
</html>