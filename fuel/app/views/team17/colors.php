<!DOCTYPE html>
<html>
    <head>
        <title>Colors Page</title>
        <meta name="description" content="Project: Colors">
        <script>
        function toggleTheme() {
            var theme = document.getElementsByTagName('link')[0];
            var img = document.getElementsByTagName('img')[0];
            var style = '<?php echo Asset::get_file('style.css', 'css');?>';
            var printview = '<?php echo Asset::get_file('printview.css', 'css');?>';
            var normalImg = '<?php echo Asset::get_file('navlogo.png', 'img');?>';
            var printviewImg = '<?php echo Asset::get_file('printviewlogo.png', 'img');?>';
            
            if (theme.getAttribute('href') != printview ) {
                theme.setAttribute('href', style);
                img.setAttribute('src', normalImg);
            }         
  
            if (theme.getAttribute('href') == style) {
                theme.setAttribute('href', printview);
                img.setAttribute('src', printviewImg);
            } else {
                theme.setAttribute('href', style);
                img.setAttribute('src', normalImg);
            }
        }
        </script>
    </head>
    <body> 
        <main>
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
            <br><br>
            <section class="cta">
                <button onclick="toggleTheme()" href class="cta-button">Print View</button>
            </section>
        </main>
    </body>
</html>