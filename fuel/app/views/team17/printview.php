<!DOCTYPE html>
<html>
    <head>
        <title>Printable View Page</title>
        <meta name="description" content="Project: Print Views">
    <body> 
        <main>
        <img src="<?php echo Asset::get_file('printlogo.png', 'img'); ?>" alt="Print Logo">
        <h1> ColorPalettePro </h1>
        <table id="upper" name="upper">
            <?php for ($x=0; $x<$colorCnt;$x++){
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
        </main>
    </body>
</html>