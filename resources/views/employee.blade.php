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
            <h1>Employees</h1>
            <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Base Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->mobile }}</td>
                                <td>{{ $employee->base_salary }}</td>
                                <td>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
