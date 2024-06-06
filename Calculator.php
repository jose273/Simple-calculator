<?php
$display = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $display = $_POST['display'] ?? '';

    if (isset($_POST['cl'])) {
        $display = '';
    } elseif (isset($_POST['op'])) {
        $op = $_POST['op'];
        if ($op === '()') {
            $display .= '()';
        } elseif ($op === '%') {
            $display .= '';
        } elseif ($op === '÷') {
            $display .= '/';
        } elseif ($op === '*') {
            $display .= '*';
        } elseif ($op === '-') {
            $display .= '-';
        } elseif ($op === '+') {
            $display .= '+';
        } elseif ($op === '.') {
            $display .= '.';
        } elseif ($op === '√') {
            $display .= 'sqrt(';
        } elseif ($op === '^') {
            $display .= '**';
        } elseif ($op === '=') {
            
            eval('$result = ' . $display . ';');
            $display = $result;
        }
    } elseif (isset($_POST['num'])) {
        $num = $_POST['num'];
        $display .= $num;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .calc {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .calc h1 {
            margin-bottom: 20px;
        }

        .calc input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            font-size: 18px;
            border: 2px solid #ddd;
            border-radius: 5px;
        }

        .calc input[type="submit"] {
            width: 23%;
            padding: 15px;
            margin: 5px 1%;
            font-size: 18px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            background-color: #f0f0f0;
            transition: background-color 0.3s ease;
        }

        .calc input[type="submit"]:hover {
            background-color: #e0e0e0;
        }

        .calc input[type="submit"].numbtn[name="op"] {
            background-color: #ffcc00;
        }

        .calc input[type="submit"].numbtn[name="cl"] {
            background-color: #ff6666;
        }

        .calc input[type="submit"].numbtn[name="op"]:hover,
        .calc input[type="submit"].numbtn[name="cl"]:hover {
            background-color: #fff29647;
        }
    </style>
</head>
<body>
<div class="calc">
        <h1>Calculator</h1>
        <form method="post" action="Calculator.php">
            <input type="text" class="maininput" name="display" value="<?php echo htmlspecialchars($display); ?>"><br>
            <input type="submit" class="numbtn" name="cl" value="c">
            <input type="submit" class="numbtn" name="op" value="()">
            <input type="submit" class="numbtn" name="op" value="%">
            <input type="submit" class="numbtn" name="op" value="÷">
            <input type="submit" class="numbtn" name="num" value="3">
            <input type="submit" class="numbtn" name="num" value="6">
            <input type="submit" class="numbtn" name="num" value="9">
            <input type="submit" class="numbtn" name="op" value="*">
            <input type="submit" class="numbtn" name="num" value="5">
            <input type="submit" class="numbtn" name="num" value="8">
            <input type="submit" class="numbtn" name="num" value="2">
            <input type="submit" class="numbtn" name="op" value="-">
            <input type="submit" class="numbtn" name="num" value="7">
            <input type="submit" class="numbtn" name="num" value="1">
            <input type="submit" class="numbtn" name="num" value="4">
            <input type="submit" class="numbtn" name="op" value="+">
            <input type="submit" class="numbtn" name="num" value="0">
            <input type="submit" class="numbtn" name="op" value=".">
            <input type="submit" class="numbtn" name="op" value="√">
            <input type="submit" class="numbtn" name="op" value="^">
            <input type="submit" class="numbtn" name="op" value="=">
        </form>
    </div>
</body>
</html>
