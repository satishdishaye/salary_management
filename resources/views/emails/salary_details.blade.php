<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 10px;
        }
        .salary-details {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 10px 0;
        }
        h3 {
            color: #333;
        }
    </style>
</head>
<body>
    <h3>Salary Details for {{ $salary->employee->name }}</h3>
    <div class="salary-details">
        <p><strong>Employee Name:</strong> {{ $salary->employee->name }}</p>
        <p><strong>Base Salary:</strong> {{ $salary->employee->base_salary }}</p>
        <p><strong>Total Salary:</strong> {{ number_format($salary->total_salary_made, 2) }}</p>
        <p><strong>Leaves Taken:</strong> {{ $salary->leaves_taken }}</p>
        <p><strong>Overtime Hours:</strong> {{ $salary->overtime }} hours</p>
        <p><strong>Month:</strong> {{ $salary->month }}</p>
        <p><strong>Year:</strong> {{ $salary->year }}</p>
    </div>
    <p>If you have any questions, please feel free to contact HR.</p>
    <footer>
        <p>Thank you,</p>
        <p>The HR Team</p>
    </footer>
</body>
</html>
