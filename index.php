<?php
function calculate($numbers, $operation) {
    $filteredNumbers = array_filter($numbers, 'is_numeric');

    switch ($operation) {
        case 1:
            return array_sum($filteredNumbers);
        case 2:
            return !empty($filteredNumbers) ? array_sum($filteredNumbers) / count($filteredNumbers) : null;
        case 3:
            return !empty($filteredNumbers) ? max($filteredNumbers) : null;
        case 4:
            return !empty($filteredNumbers) ? min($filteredNumbers) : null;
        case 5:
            return !empty($filteredNumbers) ? max($filteredNumbers) - min($filteredNumbers) : null;
        case 6:
            return array_reduce($filteredNumbers, function($carry, $item) {
                return $carry * $item;
            }, 1);
        case 7:
            return !empty($filteredNumbers) ? max($filteredNumbers) / min($filteredNumbers) : null;
    }
}

if (isset($_POST['submit'])) {
    $inputNumbers = array_map('trim', explode(' ', $_POST['numbers']));
    $calculationResult = calculate($inputNumbers, $_POST['operation']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demonic Calculator</title>

    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Red+Rose&display=swap" rel="stylesheet">
    <!-- Inline CSS Styles -->
    <style>
        /* Styles for the body */
        body {
            font-family: 'Black Ops One', cursive;
            background: radial-gradient(circle, #2e0202, #000000);
            margin: 0;
            padding: 0;
            color: #ff0000;
        }
        body {
        background-image: url("https://imgs.search.brave.com/xRgK_eBedzTt8RTSfSh7mZUlfX4OdX9Jf35hCbu-L0k/rs:fit:500:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzAyLzI0LzI0LzA1/LzM2MF9GXzIyNDI0/MDU2NF9yN2RKT0lj/blk1bUNqc1FwSGps/aDZ2bHpkemt5ZUFo/TS5qcGc");
        background-repeat: no-repeat;
        background-size: cover;
    }

        /* Styles for the form */
        form {
            width: 50%;
            margin: 35px auto;
            padding: 18px;
            background: linear-gradient(-135deg, #450c0c, #1a0000, #000000);
            color: #ff0000;
            border: 2px solid #ff0000;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
            text-shadow: 1px 1px 1px #000000;
        }

        /* Styles for form headings */
        form h3 {
            font-family: 'Red Rose', cursive;
            text-align: center;
            border-bottom: 2px solid #ff0000;
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        /* Styles for form labels */
        form label {
            display: block;
            margin-bottom: 5px;
            font-size: 24px;
            font-weight: bold;
            text-shadow: 1px 1px 1px #000000;
        }

        /* Styles for text inputs */
        form input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ff0000;
            border-radius: 5px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #ff0000;
            background-color: #450c0c;
        }

        /* Styles for submit button */
        form input[type="submit"] {
            background-color: #ff0000;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 20px;
            font-weight: bold;
        }

        /* Styles for submit button hover */
        form input[type="submit"]:hover {
            background-color: #ff4d4d;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h3>Demonic Calculator</h3>
        <label for="numbers">Enter numbers (separated by space):</label>
        <input type="text" id="numbers" name="numbers" required>
        <label for="operation">Select operation:</label>
        <select id="operation" name="operation" required>
            <option value="1">AutoSum</option>
            <option value="2">Average</option>
            <option value="3">Maximum</option>
            <option value="4">Minimum</option>
            <option value="5">Subtraction (Max - Min)</option>
            <option value="6">Multiplication</option>
            <option value="7">Division (Max / Min)</option>
        </select>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php if (isset($calculationResult)): ?>
        <div class="result">
            <h3>Result: <?= $calculationResult ?></h3>
        </div>
    <?php endif; ?>
</body>
</html>
