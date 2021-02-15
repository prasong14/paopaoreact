<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <div style="width: 100%; overflow: hidden;">
        <div style="background-color:beige; width: 400px; float: left;">

            <?php
            // define variables and set to empty set
            $nameErr = $emailErr = $genderErr = $websiteErr = "";
            $name = $email = $gender = $comment = $website = "";
            $favsub = array();

            //This will work only it is called with POST method
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = $_POST["name"];
                }
                if (empty($_POST["website"])) {
                    $websiteErr = "Website is required";
                } else {
                    $website = $_POST["website"];
                }
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = $_POST["email"];
                }

                $comment = $_POST['comment'];
                $gender = $_POST['gender'];

                if (!empty($_POST['favsub'])) {
                    $favsub = $_POST['favsub'];
                }
            }
            ?>

            <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?><br />
            <?php echo htmlspecialchars($_SERVER["REQUEST_METHOD"]); ?><br />

            <p><span class="error">* required field</span></p>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                Name: <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="error">* <?php echo $nameErr; ?></span>
                <br><br>

                Department:
                <select name="department">
                    <option value="cs">Computer Science</option>
                    <option value="it">Information Technology</option>
                    <option value="mt">Technology Management</option>
                </select>
                <br><br>

                E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
                <span class="error">* <?php echo $emailErr; ?></span>
                <br><br>

                Website: <input type="text" name="website" value="<?php echo $website; ?>">
                <span class="error">* <?php echo $websiteErr; ?></span>
                <br><br>

                Comment: <textarea name="comment" rows="5" cols="40">
         <?php echo $comment; ?>
         </textarea>
                <br><br>

                Gender:
                <input type="radio" name="gender" value="female" <?php if ($gender == "female") echo "checked"; ?>>Female
                <input type="radio" name="gender" value="male" <?php if ($gender == "male") echo "checked"; ?>>Male
                <input type="radio" name="gender" value="other <?php if ($gender == "other") echo "checked"; ?>">Other
                <br><br>

                Favorite Subjects:
                <ul>
                    <li><input type="checkbox" name="favsub[]" value="wab" <?php if (in_array("wab", $favsub)) echo "checked"; ?>>Web App
                    <li><input type="checkbox" name="favsub[]" value="entr" <?php if (in_array("entr", $favsub)) echo "checked"; ?>>Entre
                    <li><input type="checkbox" name="favsub[]" value="oop i" <?php if (in_array("oop i", $favsub)) echo "checked"; ?>>Object Oriented Programming I
                </ul>
                <br><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
        <div style="background-color: white; margin-left: 410px">

            <?php
            $file = fopen("provinces.csv", "r");
            $counter = 0;
            $provinces = array();
            while (!feof($file)) {
                $line = fgetcsv($file);
                $counter++;

                if ($counter == 1) continue;

                //echo print_r($line).'<br/>';
                array_push($provinces, $line);
            }


            //define sorting method
            function cmp($a, $b)
            {
                return strcmp($a[2], $b[2]);
            }

            usort($provinces, "cmp");

            fclose($file);
            ?>
            <h2>Address</h2>

            Province:
            <select name="province_id">
                <?php
                foreach ($provinces as $p) {
                    echo "<option value ='{$p[0]}'>{$p[2]}</option>";
                }
                ?>
            </select>
            <br />

            <?php
            $file = fopen("districts.csv", "r");
            $counter = 0;
            $districts = array();
            while (!feof($file)) {
                $line = fgetcsv($file);
                $counter++;

                if ($counter == 1) continue;

                //echo print_r($line).'<br/>';
                array_push($districts, $line);
            }

            usort($districts, "cmp");

            fclose($file);
            ?>

            District:
            <select name="district">
                <?php
                foreach ($districts as $d) {
                    echo "<option value ='{$d[0]}'>{$d[2]}</option>";
                }
                ?>
            </select>
            <br />

            <?php
            $file = fopen("sub-districts.csv", "r");
            $counter = 0;
            $sub_districts = array();
            while (!feof($file)) {
                $line = fgetcsv($file);
                $counter++;

                if ($counter == 1) continue;

                array_push($sub_districts, $line);
            }

            usort($provinces, "cmp");

            fclose($file);
            ?>

            Subdistrict:
            <select name="sub_district">
                <?php
                foreach($sub_districts as $p) {
                    echo "<option value='{$p[0]}'>{$p[2]}</option>";
                }
                ?>
            </select>
            <br/>
        </div>

    </div>
    <hr />
    <?php
    echo print_r($_POST['favsub']) . '<br/>';
    echo $_POST['name'] . '<br/>';
    echo $_POST['department'] . '<br/>';
    echo $_POST['email'] . '<br/>';
    echo $_POST['website'] . '<br/>';
    echo $_POST['comment'] . '<br/>';
    echo $_POST['gender'] . '<br/>';
    ?>
</body>

</html>