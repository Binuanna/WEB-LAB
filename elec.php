<?php
function calculateElectricityBill($units) {
    // Define tariff rates and thresholds
    $rateFirstTier = 0.2; // Rate for the first tier
    $rateSecondTier = 0.3; // Rate for the second tier
    $rateAboveSecondTier = 0.5; // Rate for units above the second tier

    $firstTierUnits = 100; // Units for the first tier
    $secondTierUnits = 200; // Units for the second tier

    // Calculate bill based on the tiered structure
    if ($units <= $firstTierUnits) {
        $totalBill = $units * $rateFirstTier;
    } elseif ($units <= $secondTierUnits) {
        $totalBill = $firstTierUnits * $rateFirstTier + ($units - $firstTierUnits) * $rateSecondTier;
    } else {
        $totalBill = $firstTierUnits * $rateFirstTier + ($secondTierUnits - $firstTierUnits) * $rateSecondTier + ($units - $secondTierUnits) * $rateAboveSecondTier;
    }

    return $totalBill;
}

// Simulated consumer data
$consumerData = [
    "123" => "Anna",
    "456" => "Binu",
    "789" => "emy",
    "1011" => "rani"
];

// Initialize variables
$billAmount = ""; // Initialize $billAmount here
$consumerNumber = "";
$consumerName = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $unitsUsed = $_POST["units"];
    $consumerNumber = isset($_POST["userNumber"]) ? $_POST["userNumber"] : "";

    // Validate input to ensure it's valid
    if (
        is_numeric($unitsUsed) && $unitsUsed >= 0 && floor($unitsUsed) == $unitsUsed &&
        array_key_exists($consumerNumber, $consumerData)
    ) {
        $consumerName = $consumerData[$consumerNumber];
        $billAmount = calculateElectricityBill($unitsUsed);
    } else {
        $billAmount = "Please enter valid details.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="submit"] {
            padding: 8px;
            margin-bottom: 30px;
            border-radius: 3px;
            border: 1px solid #ccc;
            width: 40%;
        }
        input[type="submit"] {
            background-color: red;
            color: white;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Electricity Bill Generator</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label>Enter consumer number:</label>
            <input type="text" name="userNumber" required>
            <br>
            <label>Enter the units consumed:</label>
            <input type="text" name="units" required>
            <br>
            <input type="submit" value="Calculate">
        </form>

        <?php if ($billAmount !== ""): ?>
            <div class="result">
                <?php
                    if (is_numeric($billAmount)) {
                        echo "Consumer Number: " . $consumerNumber . "<br>";
                        echo "Consumer Name: " . $consumerName . "<br>";
                        echo "Electricity bill for " . $_POST["units"] . " units: ₹" . number_format($billAmount, 2);
                    } else {
                        echo $billAmount;
                    }
                ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>


