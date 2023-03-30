<!DOCTYPE html>
<html>
    <head>
        <title>Table Page</title>
        <meta name="description" content="Project: Table">
    </head>
    <body> 
        <main>
            <?php if (!isset($val)): ?>
                <table>
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
                </table>
            <?php else: ?>
                <?php if ($val == "TRUE"): ?>
                    <table id="upper" name="upper">
                    <?php 
                        for ($x=0; $x<$colorCnt;$x++){
                        echo "<tr>
                            <td id=\"upperLeft\" name=\"upperLeft\">
                            <select name=\"colorSelect\" id=\"colorSelect\">
                            <option value=\"red\""; if($x==0){echo "selected";} echo ">Red</option>
                            <option value=\"orange\""; if($x==1){echo "selected";} echo ">Orange</option>
                            <option value=\"yellow\""; if($x==2){echo "selected";} echo ">Yellow</option>
                            <option value=\"green\""; if($x==3){echo "selected";} echo ">Green</option>
                            <option value=\"blue\""; if($x==4){echo "selected";} echo ">Blue</option>
                            <option value=\"purple\""; if($x==5){echo "selected";} echo ">Purple</option>
                            <option value=\"grey\""; if($x==6){echo "selected";} echo ">Grey</option>
                            <option value=\"brown\""; if($x==7){echo "selected";} echo ">Brown</option>
                            <option value=\"black\""; if($x==8){echo "selected";} echo ">Black</option>
                            <option value=\"teal\""; if($x==9){echo "selected";} echo ">Teal</option>
                            </td>
                            <td id=\"upperRight\" name=\"upperRight\">
                            Right Column No Instructions Yet!</td>
                            </tr>";
                        }
                    ?>
                    </table>
                    <br><br>
                    <table id="lower" name="lower">
                    <?php 
                        $letters= array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                        for ($x=0; $x<=$rowCnt;$x++){
                        echo "<tr>";
                            for ($y=0; $y<=$rowCnt;$y++){
                                if($x==0 && $y==0){
                                    echo "<td></td>";
                                }
                                elseif($x==0 && $y!=0){
                                    echo "<td>", $letters[$y-1], "</td>";
                                }
                                elseif($x!=0 && $y==0){
                                    echo "<td>$x</td>";
                                }
                                else {
                                    echo "<td></td>";
                                }
                            }

                        "</tr>";
                        }
                    ?>
                    </table>
                    <a href="<?php echo ("./printview?numRows=".$rowCnt."&numColors=".$colorCnt); ?>" class="cta-button">Printable View</a>
                <?php else: ?>
                    <table>
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
                    </table>
                    <p> "Be sure to enter a number 1-26 in rows/columns and a number 1-10 in colors."; </p>
                <?php endif; ?>
            <?php endif; ?>
        </main>
    </body>
</html>