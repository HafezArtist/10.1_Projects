<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Score Input</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1>Score Input</h1>
            <form id="scoreForm" action="index2.php" method="POST" onsubmit="return validateForm();">
                <div class="form-group">
                    <label for="competencyScore">Merit Score (1-3):</label>
                    <input type="number" id="competencyScore" name="competencyScore" required min="0" max="5" step="0.1">
                </div>
                <div class="form-group">
                    <label for="continuousScore">Semester Score (0-5):</label>
                    <input type="number" id="continuousScore" name="continuousScore" required min="0" max="5" step="0.1">
                </div>
                <div class="button-group">
                    <button type="submit">Calculate Score</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            const competencyScore = parseFloat(document.getElementById('competencyScore').value);
            const continuousScore = parseFloat(document.getElementById('continuousScore').value);
            let errorMessage = "";

            // Validate inputs
            if (isNaN(competencyScore) || isNaN(continuousScore)) {
                errorMessage += "Please enter valid scores.\n";
            } else if (competencyScore < 0 || continuousScore < 0 || continuousScore > 5) {
                errorMessage += "Competency score must be >= 0 and continuous score must be between 0 and 5.\n";
            }

            if (errorMessage) {
                alert(errorMessage);
                return false;
            }
            return true;
        }
    </script>
</body>
</html>