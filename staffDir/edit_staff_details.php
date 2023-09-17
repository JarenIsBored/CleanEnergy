<html>
<body>

<?php
    // check that value for pid is set in the html form
if (isset($_POST["pid"])) {
    $pid = $_POST['pid'];

    //include db connect class
    require_once __DIR__.'/db_connect.php';
    //connecting to db
    $db = new DB_CONNECT();
    $db->connect();

// get the selected product based on pid
    $sqlCommand = "SELECT * FROM staffdir where pid = $pid";
    $result = mysqli_query($db->myconn, "$sqlCommand");

    if(mysqli_num_rows($result) > 0) {
        foreach($result as $row)
        { // retrieve the values of the product details
            $name = $row["name"];
            $dept = $row["dept"];
            $tel = $row["tel"];
        }
    } else {
        //no products found
        echo "<h1> Not found </h1>";
        echo "<br><a href = 'main.html'>Home </a>";
        return;
    }
    $db->close($db->myconn);
}
?>
<h2>Edit Selected Product Here</h2>
<form action="update_staff_details.php" method="post">
Name: <br> <input type="text" name="name" size=50 value="<?php echo
$name ?>" readonly> <br> <br>
Dept: <br> <input type="text" name="dept" size =20 value="<?php echo
$dept ?>" > <br> <br>
Telephone Number: <br> <input type="text" name="tel" size=50 value="<?php echo $tel ?>" > <br> <br>
<input hidden type='text' name='pid' value="<?php echo $pid ?>" >
<input type="submit" name = "submit" value="Submit">
</form>
    

</body>
</html>