<?php
$display = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['display'])) {
        $display = $_POST['display'];
    }

        //---------condition for = ---------
    if (isset($_POST['equal'])) {
        try {
            $allowed_funcs = ['sqrt'];
            $expr = $display;

            $display = eval("return " . $display . ";");
        } catch (Throwable $e) {
            $display = "error";
        }

        //---------condition to remove one number---------
    } elseif (isset($_POST['C'])) {
        $display = substr($display, 0, -1); 
        
        //---------condition to remove everything---------
    } elseif (isset($_POST['AC'])) {
        $display = ""; 

    }
        
        //---------condition to calcul %--------- 
    if (isset($_POST['percent'])) {
        $display = $display / 100;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculaiter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- --------- switch theme buttun --------- -->
        <div style="position: absolute; top:20px; right:20px; margin:20px;">
            <button type="button" onclick="document.body.classList.toggle('light'); localStorage.theme=document.body.classList.contains('light')?'light':'dark';">
                dark/light
            </button>

        </div>
    </header>
    <div class="container">
        <h1>Calculaiter</h1>

        <form method="post">
            <div class="output">
                <input type="text" name="display" value="<?php echo htmlspecialchars($display); ?>" readonly>
            </div>
            <div class="btn">
                <button type="submit" name="AC" id="AC">AC</button>
                <button type="submit" name="display" value="<?php echo $display.'('; ?>">(</button>
                <button type="submit" name="display" value="<?php echo $display.')'; ?>">)</button>
                <button type="submit" name="percent">%</button>

                <button type="submit" name="C">C</button>
                <button type="submit" name="display" value="<?php echo $display.'**'; ?>">xʸ</button>
                <button type="submit" name="display" value="<?php echo $display.'sqrt('; ?>">√</button>
                <button type="submit" name="display" value="<?php echo $display.'/'; ?>">÷</button>



                <button type="submit" name="display" value="<?php echo $display.'1'; ?>">1</button>
                <button type="submit" name="display" value="<?php echo $display.'2'; ?>">2</button>
                <button type="submit" name="display" value="<?php echo $display.'3'; ?>">3</button>
                <button type="submit" name="display" value="<?php echo $display.'+'; ?>">+</button>

                <button type="submit" name="display" value="<?php echo $display.'4'; ?>">4</button>
                <button type="submit" name="display" value="<?php echo $display.'5'; ?>">5</button>
                <button type="submit" name="display" value="<?php echo $display.'6'; ?>">6</button>
                <button type="submit" name="display" value="<?php echo $display.'-'; ?>">-</button>

                <button type="submit" name="display" value="<?php echo $display.'7'; ?>">7</button>
                <button type="submit" name="display" value="<?php echo $display.'8'; ?>">8</button>
                <button type="submit" name="display" value="<?php echo $display.'9'; ?>">9</button>
                <button type="submit" name="display" value="<?php echo $display.'*'; ?>">×</button>

                <button type="submit" name="display" value="<?php echo $display.'0'; ?>">0</button>
                <button type="submit" name="display" value="<?php echo $display.'.'; ?>">.</button>
                <button type="submit" id="equal" name="equal">=</button>
            </div>
        </form>
    </div>
    <!-- ---------Restore theme on page load--------- -->
    <script>
    if(localStorage.theme==="light")document.body.classList.add('light');</script>
    </script>
</body>
</html>