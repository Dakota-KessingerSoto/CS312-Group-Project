<head>
    <title>Table Page</title>
    <meta name="description" content="Project: Table">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php echo Asset::js('table.js'); ?>
</head>
<!-- Initial form for user input -->
<?php if (!isset($val) or $val == "FALSE"): ?>
    <table class="initialForm">
        <form id="initialForm" name="initialForm" action="table" method="POST">
        <fieldset>
            <legend>Columns/Rows and Colors</legend>
            <label for="numRows">Enter Row/Column Number:</label>
            <input type="number" id="numRows" name="numRows" placeholder="1-26"><br>
            <label for="numColors">Enter Colors Number:</label>
            <input type="number" id="numColors" name="numColors" placeholder="1-10"><br>
            <input type="submit" value="Submit"><br>
        </fieldset>
        </form>
        <!-- Display error message if user inputs invalid input-->
        <?php if (isset($val) and $val == "FALSE"): ?>
            <p class="errMessage" > Be sure to enter a number 1-26 in rows/columns and a number 1-10 in colors. </p>
        <?php endif; ?>
    </table>

<?php else: ?>
    <!-- Print View Logo and Header -->
    <?php
        // Check to see if print view button click and change style sheet
        if(isset($_POST['printview-button'])) { 
            echo Asset::css('printview.css');
            echo "<img src=\"",(Asset::get_file('printlogo.png', 'img')),"\" alt=\"Print Logo\">";
            echo "<h1> ColorPalettePro </h1>";
        }
    ?>
    <!-- Color Picking Table -->
    <form method="POST">
    <table class="color-table">
    <?php 
    $colors_choices = array("red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal");
    echo "<tr><td> Colors </td><td> Choice </td></tr>";
    for ($row = 0; $row < $colorCnt; $row++){
        // Create drop down menu with each color
        echo "<tr><td><select name=\"colorSelect[]\" id=\"colorSelect{$row}\">";
        $index = 0;
        foreach ($colors_choices as $color) {
            echo "<option value=\"$color\""; if($row==$index){echo "selected";} echo ">$color</option>";
            $index += 1;
        } $index = 0; 
        echo "</select></td>";
        if ($row==0){
            echo "<td><input type=\"radio\" name=\"colored_cells[]\" id=\"colored_cells{$row}\" checked>";
        } else {
            echo "<td><input type=\"radio\" name=\"colored_cells[]\" id=\"colored_cells{$row}\">";
        }
        echo "</tr>";
    }
    ?>

    <!-- Print View Color Picking Table -->
    <?php if (isset($selColors)): ?>
        <table class="print-color-table">
            <?php
            for ($row=0; $row<$colorCnt ;$row++){
                echo "<tr><td>$selColors[$row]</td><td id=\"upperRight\" name=\"upperRight\">Right Column No Instructions Yet!</td></tr>";
            }
            ?>
        </table>
    <?php endif; ?>


    <!-- Main Drawing Table -->
    <table class="draw-table">
    <?php 
    $letters = array('','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    for ($row = 0; $row <= $rowCnt; $row++){
        echo "<tr>";
            for ($col = 1; $col <= $rowCnt; $col++) {
                if ($col==1) {
                    if ($row==0) {
                        echo "<td id=\"title\"></td>";
                    } else {
                        echo "<td id=\"title\">$row</td>";
                    }
                }
                if ($row == 0) {
                    echo "<td id=\"title\">$letters[$col]</td>";
                } else {
                    echo "<td id=\"$row$letters[$col]\"></td>";
                }
            }
        echo "</tr>";
    }
    ?>
    </table>
    
        <input type="hidden" name="numRows" value="<?php echo $rowCnt; ?>">
        <input type="hidden" name="numColors" value="<?php echo $colorCnt; ?>">
        <button type="submit" name="printview-button" class="printview-button">Print View</button>
    </form>
<?php endif; ?>

