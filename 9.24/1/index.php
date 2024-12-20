<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Status Form</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <div class="result-box">
            <h2>Academic Status</h2>
            <p id="resultText">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $firstName = htmlspecialchars($_POST['firstName']);
                    $lastName = htmlspecialchars($_POST['lastName']);
                    $average = htmlspecialchars($_POST['average']);

                    // Check if fields are empty
                    if (empty($firstName) || empty($lastName) || empty($average)) {
                        echo "Please fill in all fields.";
                    } elseif (!is_numeric($average) || $average < 0 || $average > 20) {
                        echo "Average must be a number between 0 and 20.";
                    } else {
                        // Determine status
                        $status = ($average < 12) ? "not satisfactory" : "satisfactory";
                        echo "The average of the student named $firstName and the last name $lastName is $average. The academic status of the student is: $status.";
                    }
                } else {
                    echo "Please enter the form information.";
                }
                ?>
            </p>
        </div>

        <div class="form-box">
            <h1>Student Status Form</h1>
            <form id="studentForm" action="" method="POST" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName">
                </div>
                <div class="form-group">
                    <label for="average">Average:</label>
                    <input type="number" id="average" name="average" step="0.01">
                </div>
                <button type="submit">Check Student Status</button>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const average = document.getElementById('average').value;
            let errorMessage = "";

            // Check if fields are empty
            if (!firstName || !lastName || !average) {
                errorMessage += "Please fill in all fields.\n";
            }

            // Check if average is a number and within range
            if (isNaN(average) || average < 0 || average > 20) {
                errorMessage += "Average must be a number between 0 and 20.\n";
            }

            // If there are error messages, show them in an alert
            if (errorMessage) {
                alert(errorMessage);
                return false; // Prevent form submission
            }

            return true; // Form is valid
        }
    </script>
</body>
</html>