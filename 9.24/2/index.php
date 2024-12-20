<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Generator</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1>Table Configuration</h1>
            <form id="tableForm" onsubmit="event.preventDefault(); createTable();">
                <div class="form-group">
                    <label for="numRows">Number of Rows:</label>
                    <input type="number" id="numRows" name="numRows" required min="1">
                </div>
                <div class="form-group">
                    <label for="numCols">Number of Columns:</label>
                    <input type="number" id="numCols" name="numCols" required min="1">
                </div>
                <div class="form-group">
                    <label for="cellWidth">Cell Width (px):</label>
                    <input type="number" id="cellWidth" name="cellWidth" required min="1">
                </div>
                <div class="form-group">
                    <label for="cellHeight">Cell Height (px):</label>
                    <input type="number" id="cellHeight" name="cellHeight" required min="1">
                </div>
                <div class="form-group">
                    <label for="bgColor">Background Color:</label>
                    <select id="bgColor" name="bgColor" required>
                        <option value="#ffffff">White</option>
                        <option value="#f8b400">Yellow</option>
                        <option value="#ff6f61">Coral</option>
                        <option value="#6a0572">Purple</option>
                        <option value="#00b8d4">Cyan</option>
                        <option value="#8bc34a">Green</option>
                    </select>
                </div>
                <div class="button-group">
                    <button type="submit">Create Table</button>
                    <button type="button" onclick="resetForm()">Reset</button>
                </div>
            </form>
        </div>

        <div class="table-box">
            <h2>Generated Table</h2>
            <div id="tableContainer" class="table-container"></div>
        </div>
    </div>
    <script>
        function createTable() {
            const rows = document.getElementById('numRows').value;
            const cols = document.getElementById('numCols').value;
            const cellWidth = document.getElementById('cellWidth').value;
            const cellHeight = document.getElementById('cellHeight').value;
            const bgColor = document.getElementById('bgColor').value;

            const tableContainer = document.getElementById('tableContainer');
            tableContainer.innerHTML = ""; // Clear previous table

            const table = document.createElement('table');
            table.style.width = '100%';
            table.style.borderCollapse = 'collapse';
            table.style.backgroundColor = bgColor;

            for (let i = 0; i < rows; i++) {
                const row = document.createElement('tr');
                for (let j = 0; j < cols; j++) {
                    const cell = document.createElement('td');
                    cell.style.width = cellWidth + 'px';
                    cell.style.height = cellHeight + 'px';
                    cell.style.border = '1px solid #333';
                    cell.style.textAlign = 'center';
                    cell.style.verticalAlign = 'middle';
                    // Remove text from the cell
                    cell.innerText = ""; // Keep cells empty
                    row.appendChild(cell);
                }
                table.appendChild(row);
            }

            tableContainer.appendChild(table);
        }

        function resetForm() {
            document.getElementById('tableForm').reset();
            document.getElementById('tableContainer').innerHTML = ""; // Clear the table
        }
    </script>
</body>
</html>