<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Hadis Hafez">
    <title>Calculator</title>
    <style>
        body {
            font-family: sans-serif;
            color: #001A6E;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .calculator {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
        input[type="text"], select {
            width: 25%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #0A97B0;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0A97FF;
        }
    </style>
</head>
<body>

<div class="calculator">


    <h2>Calculator</h2>


    <form method="post">
        <input type="text" name="num1" required placeholder="Enter first number" pattern="-?[0-9]*" title="Please enter a valid number">
        <input type="text" name="num2" required placeholder="Enter second number" pattern="-?[0-9]*" title="Please enter a valid number">

        <select name="operation" required>


            <option value="">Select operation</option>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>


        </select>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = '';


        $num1 = floatval($num1);
        $num2 = floatval($num2);

        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Cannot divide by zero";
                }
                break;
            default:
                $result = "Invalid operation";
                break;
        }

        echo "<h3>Result: $result</h3>";
    }
    ?>
</div>

</body>
</html>