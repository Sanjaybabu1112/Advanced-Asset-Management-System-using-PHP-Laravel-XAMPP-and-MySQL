<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Assign Asset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .btn-success {
            background-color: #28a745;
            border-color: #218838;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
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
        .text-center button {
            width: 100%;
        }
        .current-image {
            max-width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Assign Asset</h2>
                    <a class="btn btn-primary" href="{{ route('assigns.index') }}">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('assigns.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Select Asset</strong><strong style="color:red;"> *</strong>
                        <select name="asset" class="form-control">
                            <option value="">select</option>
                            @foreach ($options as $option)
                                <option value="{{ $option->uid }},  {{ $option->type }},  {{ $option->brand }},  {{ $option->model }}">{{ $option->uid }},  {{ $option->type }},  {{ $option->brand }},  {{ $option->model }}</option>
                            @endforeach
                            <!-- Add more options as needed -->
                        </select>
                        @error('asset')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Select Employee</strong><strong style="color:red;"> *</strong>
                        <select name="employee" class="form-control">
                            <option value="">select</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->uid }},  {{ $employee->name }},  {{ $employee->role }}">{{ $employee->uid }},  {{ $employee->name }},  {{ $employee->role }}</option>
                            @endforeach
                            <!-- Add more options as needed -->
                        </select>
                        @error('asset')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Assigned Date</strong><strong style="color:red;"> *</strong>
                        <input type="date" name="date" class="form-control">
                        @error('date')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Deadline Date</strong><strong style="color:red;"> *</strong>
                        <input type="date" name="deadline" class="form-control">
                        @error('deadline')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Asset Condition</strong><strong style="color:red;"> *</strong>
                        <select name="condition" class="form-control">
                            <option value="New">New</option>
                            <option value="Good">Good</option>
                            <option value="Damaged">Damaged</option>
                        </select>
                        @error('condition')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-block mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
