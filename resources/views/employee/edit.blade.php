<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
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
        .btn-primary, .btn-success {
            font-weight: bold;
            letter-spacing: 0.5px;
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
            border: 1px solid #ced4da; /* Defined border for all form controls */
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
        .form-group .alert-danger {
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Edit Employee</h2>
                    <a class="btn btn-primary" href="{{ route('employee.index') }}">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Employee Unique ID</strong><strong style="color:red;"> *</strong>
                        <input type="number" name="uid" value="{{ $employee->uid }}" class="form-control"
                            placeholder="Eg: 001">
                        @error('uid')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Employee Name</strong><strong style="color:red;"> *</strong>
                        <input type="text" name="name" value="{{ $employee->name }}" class="form-control"
                            placeholder="Eg: John Doe">
                        @error('name')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Employee E-mail</strong><strong style="color:red;"> *</strong>
                        <input type="email" name="email" value="{{ $employee->email }}" class="form-control"
                            placeholder="Eg: johndoe@gmail.com">
                        @error('email')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Employee Mobile Number</strong><strong style="color:red;"> *</strong>
                        <input type="number" name="mobile" value="{{ $employee->mobile }}" class="form-control"
                            placeholder="Eg: 1234567890">
                        @error('mobile')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Select Employee Role</strong><strong style="color:red;"> *</strong>
                        <select name="role" class="form-control">
                            <option value="{{ $employee->role }}">{{ $employee->role }}</option>
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
                        <input type="text" name="address" value="{{ $employee->address }}" class="form-control"
                            placeholder="Eg: 11, example street, example city, example state.">
                        @error('address')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
