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
            <h1>Enter Salary for Employee</h1>
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Employee</label>
                    <select name="employee_id" class="form-control" required>
                        <option value="">Select Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>

                    @error('employee_id')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror

                </div>
                <div class="mb-3">
                    <label for="month" class="form-label">Month</label>
                    <input type="number" name="month" class="form-control" value="{{old('month')}}" required min="1" max="12">

                    @error('month')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror

                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" name="year"  value="{{old('year')}}" class="form-control" required min="1900" max="2100">
                    @error('year')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="total_working_days" class="form-label">Total Working Days</label>
                    <input type="number" name="total_working_days"  value="{{old('total_working_days')}}" class="form-control" required min="1">
                    @error('total_working_days')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="total_leave_taken" class="form-label">Total Leave Taken</label>
                    <input type="number" name="total_leave_taken"  value="{{old('total_leave_taken')}}" class="form-control" required min="0">
                    @error('total_leave_taken')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="overtime" class="form-label">Overtime (hours)</label>
                    <input type="number" name="overtime"  value="{{old('overtime')}}" class="form-control" required min="0">
                    @error('overtime')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save Salary</button>
            </form>
        </div>
    </div>
</body>
</html>
