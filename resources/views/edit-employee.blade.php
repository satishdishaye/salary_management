<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQ7o0vEXmZ+mkSBllta9sENBO9LR1LZSBbxPpGFWcMl46z4yd+g9II0H+" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
            color: white;
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-bottom: 1px solid #495057;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .container {
            flex: 1;
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
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
            <h1>Edit Employee</h1>
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $employee->name }}" required>

                    @error('name')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror


                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $employee->email }}" required>
                    @error('email')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" name="mobile" class="form-control" id="mobile" value="{{ $employee->mobile }}" required>
                    @error('mobile')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control" id="address" required>{{ $employee->address }}</textarea>
                    @error('address')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="base_salary" class="form-label">Base Salary</label>
                    <input type="number" name="base_salary" class="form-control" id="base_salary" value="{{ $employee->base_salary }}" required>
                    @error('base_salary')
                    <div class="alert alert-danger" >{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA3haVKCmYFf6x6Mf6i3yyQe4RGAEVTe4/6R5bBOsAkp2k" crossorigin="anonymous"></script>
</body>
</html>
