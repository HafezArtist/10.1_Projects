<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score Result</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <div class="table-box">
            <h2>Score Summary</h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $competencyScore = floatval($_POST['competencyScore']);
                $continuousScore = floatval($_POST['continuousScore']);
                
                // Calculate final score
                $finalScore = ($competencyScore * 5) + $continuousScore;

                // Determine pass/fail status
                $statusMessage = $finalScore < 12 ? "Student has failed the course." : "Student has passed the course.";
            ?>
            <table>
                <tr>
                    <th>Competency Score</th>
                    <th>Continuous Score</th>
                    <th>Final Score</th>
                </tr>
                <tr>
                    <td><?php echo htmlspecialchars($competencyScore); ?></td>
                    <td><?php echo htmlspecialchars($continuousScore); ?></td>
                    <td><?php echo htmlspecialchars(number_format($finalScore, 2)); ?></td>
                </tr>
            </table>
            <p class="status-message"><?php echo $statusMessage; ?></p>
            <?php
            } else {
                echo "<p>No data submitted.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>