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
    <!-- Print View Color Picking Table -->
    <?php if (isset($selColors)&&isset($colChoice)): ?>
        <table class="print-color-table">
            <?php
            for ($row=0; $row<$colorCnt ;$row++){
                echo "<tr><td>$selColors[$row]</td><td>$colChoice[$row]</td></tr>";
            }
            ?>
        </table>
    <?php endif; ?>


    <!-- Color Picking Table -->
    <form method="POST">
    <table class="color-table">
    <?php 
    echo "<tr><td> Colors </td><td> Choice </td><td> Coordinates </tr>";
    for ($row = 0; $row < $colorCnt; $row++){
        // Create drop down menu with each color
        // Color Drop Down Menu Column
        echo "<tr><td><select name=\"colorSelect[]\" id=\"colorSelect{$row}\">";
        $colors_name_choices = array_column($colors, 'name');
        $colors_hex_choices = array_column($colors, 'hex_value');
        $index = 0;
        foreach ($colors_name_choices as $color) {
            echo "<option value=\"$color\""; if($row==$index){echo "selected";} echo ">$color</option>";
            $index += 1;
        } $index = 0; 
        echo "</select></td>";
        
        // Color Box Slector
        $choice_num = $row;
        if ($choice_num==0){
            echo "<td class=\"select_col selected\" style=\"background-color: ",$colors_hex_choices[$row],"\"><input type=\"hidden\" name=\"choice\" value=\"{$choice_num}choice\"></td>";
        } else {
            echo "<td class=\"select_col\" style=\"background-color: ",$colors_hex_choices[$row],"\"><input type=\"hidden\" name=\"choice\" value=\"{$choice_num}choice\"></td>";
        }

        // Color Codinates
        echo "<td class=\"cords\"><input type=\"hidden\" name=\"colorChoice[]\" value=\"\"><label></label></td>";
        echo "</tr>";
    }
    ?>

    
    <!-- Main Drawing Table -->
    <table class="draw-table">
    <?php 
    $letters = array('','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    for ($row = 0; $row <= $rowCnt; $row++){
        echo "<tr>";
            for ($col = 1; $col <= $rowCnt; $col++) {
                // Print labels for table
                if ($col==1) { if ($row==0) { echo "<td id=\"title\"></td>"; } else { echo "<td id=\"title\">$row</td>"; } }
                if ($row == 0) { echo "<td id=\"title\">$letters[$col]</td>"; } else {
                    // Create empty cells with identifiable cell id
                    echo "<td id=\"$row$letters[$col]\"></td>";
                } }
        echo "</tr>";}
    ?>
    </table>
        <input type="hidden" name="numRows" value="<?php echo $rowCnt; ?>">
        <input type="hidden" name="numColors" value="<?php echo $colorCnt; ?>">
        <button type="submit" name="printview-button" class="printview-button">Print View</button>
    </form>
    
<?php endif; ?>

