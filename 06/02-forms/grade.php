<!DOCTYPE html>
<html lang = "en">
    <body>        
        <?php
        
        $score = $_GET['score'];
        
        if ($score >= 80) {
        $grade = "A";
        } elseif ($score >= 70) {
        $grade = "B";
        } elseif ($score >= 60) {
        $grade = "C";
        } elseif ($score >= 50) {
        $grade = "D";
        } else {
        $grade = "F";
        }
    //echo "Grade: $grade\n";
    //echo "Score: $score<br>";
        ?>
        <table>
            <tr>
                <td><b>Score</b></td>
                <td><?php echo $grade; ?></td>
            </tr>
            <tr>
                <td><b>Grade</b></td>
                <td><?php echo $grade; ?></td>
            </tr>
        </table>
        </body>
        </html>

