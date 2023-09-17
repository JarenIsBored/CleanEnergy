<?php

/**
 * Following code will retrieve the staff based on pid
 */

 // embed html in php
 $htmlDisplay = "<h1> Search Results: </h1>";
 // add table to html page
 $htmlDisplay = $htmlDisplay."<table border = '1'>";

 // check that user has entered pid inn html form submission
 if (isset($_POST["pid"])) {

    // get the pid from htpp post
    $pid = $_POST['pid'];

    // include db connect class
    require_once __DIR__.'/db_connect.php';
    // connecting to db
    $db = new DB_CONNECT();
    $db->connect();

    // get the product from products table with given pid
    $sqlCommand = "SELECT * FROM staffdir WHERE pid = $pid";
    $result = mysqli_query($db->myconn, "$sqlCommand");

    // printing html table headers
    $htmlDisplay = $htmlDisplay."<th> Pid </th> <th> Name </th> <th> Dept </th> <th> Tel </th>";

    // check for empty result
    if (mysqli_num_rows($result) > 0) {

        // looping thru all results and display evert product in each row of the table.
        foreach($result as $row)
        {
            $htmlDisplay = $htmlDisplay ."<tr> <td>".$row["pid"]. "</td>";
            $htmlDisplay = $htmlDisplay ."<td>".$row["name"]. "</td>";
            $htmlDisplay = $htmlDisplay ."<td>".$row["dept"]. "</td>";
            $htmlDisplay = $htmlDisplay ."<td>".$row["tel"]. "</td></tr>";
        }

        $htmlDisplay =$htmlDisplay."</table>";
        //provide a url link to return to home page
        $htmlDisplay = $htmlDisplay."<br> <a href='main.html'> Home </a>";
        //echo and display on user's web browser 
        echo $htmlDisplay;
        }

        else {
        // no products found
        echo "<h1> Not found </h1>";
        echo "<br> <a href='main.html'> Home </a>";
        }
        //close database connection
        $db->close($db->myconn);
        
        }
        ?>
        
    </body>
</html>
