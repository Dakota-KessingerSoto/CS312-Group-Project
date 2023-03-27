<!DOCTYPE html>
<html>
    <head>
        <title>Colors Page</title>
        <meta name="description" content="Project: Colors">
    </head>
    <body> 
        <main>
            <form id="initialForm" name="initialForm" action="table" method="get">
                <fieldset>
                    <legend>Columns/Rows and Colors</legend>
                    <label for="numRows">Enter Row/Column Number:</label>
                    <input type="number" id="numRows" name="numRows" placeholder="1-26"><br>
                    <label for="numColors">Enter Colors Number:</label>
                    <input type="number" id="numColors" name="numColors" placeholder="1-10"><br>
                    <input type="submit" value="Submit"><br>
                </fieldset>
            </form>
            <p id="errMessage" name="errMessage">
            <?php
            if(isset($val)){
                if($val == "FALSE"){
                    echo "Be sure to enter a number 1-26 in rows/columns and a number 1-10 in colors.";
                }
                else {
                    echo "Good input. Just testing!";
                }
            }
            ?>
            </p>
        </main>
    </body>
</html>