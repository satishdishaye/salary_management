<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQ7o0vEXmZ+mkSBllta9sENBO9LR1LZSBbxPpGFWcMl46z4yd+g9II0H+" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            padding-top: 20px;
            color: white;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            border-bottom: 1px solid #34495e;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: left;
            padding: 12px;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <h3> <a  href="{{ route('dashboard') }}" >Dashboard</a> </h3>

            <a  href="{{ route('employees.index') }}" >Employees Management</a>
            <a href="{{ route('salaries.index') }}">Salary Management</a>
        </div>
        <div class="container">

            <a href="{{ route('salaries.create') }}" class="btn btn-primary mb-3">Add Salary</a>

            <h1>Salary List</h1>


            <table class="table">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Total Salary</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaries as $salary)
                    <tr>
                        <td>{{ $salary->employee->name }}</td>
                        <td>{{ $salary->month }}</td>
                        <td>{{ $salary->year }}</td>
                        <td>{{ $salary->total_salary_made }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            <div class="d-flex justify-content-center">
                {{ $salaries->links() }}
            </div>

        </div>
    </div>
</body>
</html>
