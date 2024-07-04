<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h2 {
            margin-top: 0;
            color: #333;
            font-size: 32px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn-primary {
            background-color: #0069d9;
            border-color: #0056b3;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-group strong {
            font-size: 16px;
            color: #555;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            margin-top: 5px;
        }
        button[type="submit"] {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Add Employee</h2>
                    <a class="btn btn-primary" href="{{ route('employees') }}">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Employee Unique ID</strong><strong style="color:red;"> *</strong>
                        <input type="text" name="uid" class="form-control" placeholder="Eg: 001">
                        @error('uid')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Employee Name</strong><strong style="color:red;"> *</strong>
                        <input type="text" name="name" class="form-control" placeholder="Eg: John Doe">
                        @error('name')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Employee Email</strong><strong style="color:red;"> *</strong>
                        <input type="email" name="email" class="form-control" placeholder="Eg: johndoe@gmail.com">
                        @error('email')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Employee Mobile Number</strong><strong style="color:red;"> *</strong>
                        <input type="text" name="mobile" class="form-control" placeholder="Eg: 1234567890">
                        @error('mobile')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Select Employee Role</strong><strong style="color:red;"> *</strong>
                        <select name="role" class="form-control">
                            <option value="">select</option>
                            <option value="UI Designer">UI Designer</option>
                            <option value="Developer">Developer</option>
                            <option value="Tester">Tester</option>
                        </select>
                        @error('role')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Employee Address</strong>
                        <input type="text" name="address" class="form-control" placeholder="Eg: 11, example street, example city, example state.">
                        @error('address')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
