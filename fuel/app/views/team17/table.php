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
            <input type="number" id="numColors" name="numColors" placeholder="1-<?=$max_colors_count?>"><br>
            <input type="submit" value="Submit"><br>
        </fieldset>
        </form>
        <!-- Display error message if user inputs invalid input-->
        <?php if (isset($val) and $val == "FALSE"): ?>
            <p class="errMessage" > Be sure to enter a number 1-26 in rows/columns and a number 1-<?=$max_colors_count?> in colors. </p>
        <?php endif; ?>
    </table>

<?php else: ?>
    <!-- Print View Logo and Header and Print View Table -->
    <?php
        // Check to see if print view button click and change style sheet
        if(isset($_POST['printview-button'])) { 
            echo Asset::css('printview.css');
            echo "<img src=\"",(Asset::get_file('printlogo.png', 'img')),"\" alt=\"Print Logo\">";
            echo "<h1> ColorPalettePro </h1>";
            // Print View Color Picking Table
            if (isset($selColors)&&isset($colChoice))
            echo "<table class=\"print-color-table\">";
                    for ($row=0; $row<$colorCnt ;$row++){
                        echo "<tr><td>$selColors[$row]</td><td>$colChoice[$row]</td></tr>";
                    }
            echo "</table>";
        }
    ?>
    
    <!-- Error Message -->
    <h2 id="error_text" class="errMessage" style="color: red; text-align: center; margin: -25px;"> <?= $error_text ?> </h2>
    

    <!-- Color Adding, Editing, Removing -->
    <table class="action-table">
        <form method="POST" class="action-buttons">
            <input type="hidden" name="numRows" value="<?php echo $rowCnt; ?>">
            <input type="hidden" name="numColors" value="<?php echo $colorCnt; ?>">
            <tr>
                <td>
                    <button type="submit" id="add" name="action" value="add"     class="pick-color-button">ADD</button>
                </td>
                <td>
                    <button type="submit" id="edit" name="action" value="edit"    class="pick-color-button">EDIT</button>
                </td>
                <td>
                    <button type="submit" id="delete" name="action" value="delete"  class="pick-color-button">DELETE</button>
                </td>
            </tr>
        </form>
        </table >
        <form method="POST">
            <table class="action-table" style="margin-top: 10px; width: 400px;">
            <input type="hidden" name="numRows" value="<?php echo $rowCnt; ?>">
            <input type="hidden" name="numColors" value="<?php echo $colorCnt; ?>">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <?php if(isset($_POST['action'])): ?>
                <?php if ($_POST['action']=="add"): ?>
                    <script> $('button[id="add"]').css('background-color', 'gray'); </script>
                    <tr>
                        <td>
                            Add Color: <input type="text" name="add-color-name" value=""/> <input type="color" name="add-color" value="#ff0000"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <button type="submit" name="add-new" value="add" class="pick-color-button"> SUBMIT </button>
                        </td>
                    </tr>
                <?php elseif ($_POST['action']=="edit"): ?>
                    <script> $('button[id="edit"]').css('background-color', 'gray'); </script>
                    <tr>
                        <td>
                            Edit Color: 
                            <select name="edit-color-id">;
                            <?php
                            // Color Drop Down Menu Column
                            foreach ($colors as $color) {
                                if($color['id'] > 40) {
                                    echo "<option value=\"",$color['id'],"\">",$color['name'],"</option>";
                                }
                            }
                            ?>
                            </select>
                            <input type="color" name="edit-color" value="#ff0000"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="edit" value="edit" class="pick-color-button"> SUBMIT </button>
                        </td>
                    </tr>
                <?php elseif ($_POST['action']=="delete"): ?>
                    <script> $('button[id="delete"]').css('background-color', 'gray'); </script>
                    <tr>
                        <td>
                            Delete Color:  
                            <select name="delete-color-id">;
                            <?php
                            // Color Drop Down Menu Column
                            foreach ($colors as $color) {
                                if($color['id'] > 40) {
                                    echo "<option value=\"",$color['id'],"\">",$color['name'],"</option>";
                                }
                            }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="delete" value="delete" class="pick-color-button"> SUBMIT </button>
                        </td>
                    </tr>
                <?php endif; ?>
            </form>
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
        $index = 0;
        foreach ($colors as $color) {
            echo "<option value=\"",$color['name'],"\" id=\"",$color['hex_value'],"\""; if($row==$index){echo "selected";} echo ">",$color['name'],"</option>";
            $index += 1;
        } $index = 0; 
        echo "</select></td>";
        
        // Color Box Slector
        $choice_num = $row;
        if ($choice_num==0){
            echo "<td class=\"select_col selected\" style=\"background-color: ",$colors[$row]['hex_value'],"\"><input type=\"hidden\" name=\"choice\" value=\"{$choice_num}choice\"></td>";
        } else {
            echo "<td class=\"select_col\" style=\"background-color: ",$colors[$row]['hex_value'],"\"><input type=\"hidden\" name=\"choice\" value=\"{$choice_num}choice\"></td>";
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

    <!-- Form Submission and Print View Button -->
    <input type="hidden" name="numRows" value="<?php echo $rowCnt; ?>">
    <input type="hidden" name="numColors" value="<?php echo $colorCnt; ?>">
    <button type="submit" name="printview-button" class="printview-button">Print View</button>
    </form>
    
<?php endif; ?>

