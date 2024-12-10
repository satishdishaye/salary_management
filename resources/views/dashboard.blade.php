<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Login Page */
        .login-container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Dashboard Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
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

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        .dashboard-info {
            margin-bottom: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .dashboard-info h2 {
            margin-bottom: 10px;
        }

        .dashboard-info p {
            margin: 5px 0;
        }

    </style>
</head>
<body>

   

    <!-- Dashboard Page -->
    <div class="dashboard-container" id="dashboardPage" >
        <!-- Sidebar -->
        <div class="sidebar">
            <h3> <a  href="{{ route('dashboard') }}" >Dashboard</a> </h3>

            <a  href="{{ route('employees.index') }}" >Employees Management</a>
            <a href="{{ route('salaries.index') }}">Salary Management</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="dashboard-info">
                <h2>Total Employees: {{$total_employee}}</h2>
                <p>This Month's Attendance: {{$this_month_attendance}}%</p>
                <p>Last Month's Attendance:  {{$last_month_attendance}}%</p>
            </div>
        </div>
    </div>



</body>
</html>
