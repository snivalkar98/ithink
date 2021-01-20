<?php
include ("connect.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSN_application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<style>
    .container_img{
        margin: 10px;
        background-color: antiquewhite;
        border: 3px solid black; 
        border-radius: 15px;
        height: 400px;
        width: 500px;
        }
    .container{
        margin: 20px;
    }
    .container input{
        margin-left: 10px;
    }
    .container input{
        margin-top:10px;
    }
</style>
<body>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>AGE</label>
                        <input type="number" class="form-control" name="age" placeholder="Enter your age">
                    </div>
                </div>
                <div class="email">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" name="email" pattern="[^ @]*@[^ @]*"
                            placeholder="name@example.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Mobile Number</label>
                    <input type="number" class="form-control" name="phone" id="Phone"  maxlength="10"  placeholder="Mobile Number" required>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Enter message</label>
                        <input type="text" class="form-control" name="message" placeholder="enter your message here">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthdate">Enter Date of Birth:</label>
                    <input type="date" name="dob"> 
                </div>
                <div class="form-group">
                    <label>Gender:</label>
                    <div><input type="radio" name="gender" value="male" />
                    Male<br>
                    <input type="radio" name="gender" value="female" />
                    Female<br></div>
                </div>
                <div class="form-group">
                <label>Enter your skills</label>
                    <input type="checkbox" name="skills[]" value="CSS">CSS<br>
                    <input type="checkbox" name="skills[]" value="HTML">HTML<br>
                    <input type="checkbox" name="skills[]" value="JS">JS<br>
                    <input type="checkbox" name="skills[]" value="PHP">PHP <br>
                    <input type="checkbox" name="skills[]" value="MYSQL">MYSQL<br>
                    <input type="checkbox" name="skills[]" value="BOOTSTRAP">Bootstrap<br>
                </div>
                <div class="container_img">                
                    <input type="file" name="image"/><br>
                </div>
                <div>
                <center>
                <button type="submit" value="submit" name="submit" class="btn btn-dark">make entry</button>
                </center>
            </div>
    </form>
    </div>
</body>
</html>

<?php  
    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO `candidates` (name, age, email, phone, message, dob, gender) VALUES ('$name', '$age', '$email', '$phone', '$message', '$dob','$gender')";
        
            // if(isset($_REQUEST['submit'])){
            //     $skills = $_REQUEST["skills"];
            //     $skill_res = implode(",", $skills);
            //     echo $skill_res;
            //     echo "inserted";
            // }
        
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
                    $img_res=0;
                    echo "Image uploaded sucessfully..!!";
                }else{
                    echo "file size exceeded";
                }
            }
            else{
                echo "file not supported";
            }
             if($con->query($sql) == true){
                $insert = true;
                ?>
                <div class="alert alert-success" role="alert">
                    Data Inserted sucessfully!
                </div>
                <?php
            }
            else{
                echo "ERROR: $sql <br> $con->error";
            }   
    }  
?>