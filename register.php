<?php
require_once "header.php";
require_once "connection.php";
if(!empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $image = "";
    if(!empty($_FILES['image']['name'])){
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        if(move_uploaded_file($imageTmpName, "uploads/".$imageName)){
            $image .= "uploads/".$imageName;
        }else{
            echo "Error in uploading image";
        }
    }

    $sql = "INSERT INTO  users (name,email,password) VALUES('$name','$email','$password')";
    $res= mysqli_query($conn,$sql);
    if($res){
        echo "User registered successfully";
    }else{
        echo "Error:" .$sql . "<br>" .mysqli_error($conn);
    }
}
?>
<div class="row">
    <div class="col-md-12 mt-4 mb-4">
        <h3>Register</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="name">Name</label>
                <input type="text" name="name" required id="name" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" required id="email" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" required id="password" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="image">Profile Picture</label>
                <input type="file" name="image" required id="image" class="form-control">
            </div>
            <div class="form-group mb-2">
                <button class="btn btn-success">Register</button>
            </div>

            
        </form>
    </div>
</div>

<?php
require_once "footer.php"

?>