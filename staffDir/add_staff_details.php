<html>
    <body>
        <h2> Add Staff </h2>
        <?php

        /*
         * Following code will add a new staff
         * All satff details are read from the HTTP Post Request
         */

         // check for required fields from the html form
         if (isset($_POST['name']) && isset($_POST['dept']) && isset($_POST['tel'])) {

            // retrieve the values from html form
            $name = $_POST['name'];
            $dept = $_POST['dept'];
            $tel = $_POST['tel'];

            // include db connect class
            require_once __DIR__.'/db_connect.php';
            // connectign to db
            $myConnection = new DB_CONNECT();
            $myConnection->connect();

            // if update button is clicked in form submission
            $sqlCommand = "INSERT INTO `staffdir` (`name`, `dept`, `tel`) VALUES ('$name', '$dept', '$tel')";

            // execute the sql command
            $result = mysqli_query($myConnection->myconn, "$sqlCommand");

            // check the result
            if ($result) {
                echo "Product successfully created.";
            }
            else {
                // failed to add to db
                echo "Oops! An error occurred";
            }

            $myConnection->close($myConnection->myconn);
            echo "<br><br><a href = 'main.html'>Home</a>";
            } 

            else {
                echo "Error occurs";
            }
            
        ?>
    </body>
</html>