<html>
    <body>

        <?php

        // include db connect class
        require_once __DIR__.'/db_connect.php';
        // connecting to db
        $db = new DB_CONNECT();
        $db->connect();

        // get all products from products table
        $sqlCommand = "SELECT * FROM staffdir";
        $result = mysqli_query($db->myconn, "$sqlCommand");

        /*
        * Following code will list all the products
        */

        // embed html codes in php
        $htmlDisplay = "<h1> Search Results: </h1>";
        // add table to html page
        $htmlDisplay = $htmlDisplay."<table border = '1'>";

        // printing html table headers
        $htmlDisplay = $htmlDisplay."<th> Pid </th><th> Name </th> <th> Dept </th> <th> Tel </th>";
        
        // if database query returns non-zero results
        if (mysqli_num_rows($result) > 0) {

            // looping through all results and displat every staff in each row of the table
            foreach ($result as $row) {
                $htmlDisplay = $htmlDisplay."<tr> <td>".$row["pid"]."</td>";
                $htmlDisplay = $htmlDisplay."<td>".$row["name"]."</td>";
                $htmlDisplay = $htmlDisplay."<td>".$row["dept"]."</td>";
                $htmlDisplay = $htmlDisplay."<td>".$row["tel"]."</td> </tr>";
            }
            
            $htmlDisplay = $htmlDisplay."</table>";
            // provide a url link to return to home page
            $htmlDisplay = $htmlDisplay."<br> <a href='main.html'> Home </a>";
            // echo and display on user's web browser the complete html codes
            echo $htmlDisplay;

        } else {
                // no products found
                echo "<h1> Not found </h1>";
                echo "<br> <a href='main.html'> Home </a>";
            }
            
            $db->close($db->myconn);
            
            ?>
        </body>
    </html>