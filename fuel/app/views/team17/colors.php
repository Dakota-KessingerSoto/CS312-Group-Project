<!DOCTYPE html>
<html>
    <head>
        <title>Colors Page</title>
        <meta name="description" content="Project: Colors">
    </head>
    <body> 
        <main>
            <?php echo "number of colors: ", $colorCnt; ?><br>
            <?php echo "number of rows/column: ", $rowCnt; ?><br>

            <table id="upper" name="upper">
            <?php for ($x=0; $x<$colorCnt;$x++){
                echo "<tr>
                    <td style=\"width:20%\">
                    leftColumn</td>
                    <td style=\"width:80%\">
                    rightColumn</td>
                </tr>";
            }
            ?>
            </table>

            <br><br>

            <table id="lower" name="lower">
            <?php for ($x=0; $x<=$rowCnt;$x++){
                echo "<tr>";
                    for ($y=0; $y<=$rowCnt;$y++){
                        echo "<td>$x$y</td>";
                    }
                    "</tr>";
            }
            ?>
            </table>
            <br><br>
            <a href="" class="cta-button">Print View</a>
        </main>
    </body>
</html>