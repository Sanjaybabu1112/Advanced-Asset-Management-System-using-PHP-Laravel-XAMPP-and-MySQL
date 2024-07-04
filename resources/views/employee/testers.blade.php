<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Designers - Asset Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 90%;
            margin: auto;
            margin-top: 20px;
        }
        h2 {
            color: #333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            font-weight: bold;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .table-container {
            max-height: 70vh;
            overflow-y: auto;
            margin-top: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto; /* Let the table adjust based on content */
        }
        .table th, .table td {
            padding: 12px; /* Adjusted padding */
            text-align: center;
            border: 1px solid #dee2e6;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .table thead th {
            position: sticky;
            top: 0;
            background-color: #343a40;
            color: #ffffff;
            z-index: 100;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-primary, .btn-danger {
            margin-right: 5px;
            padding: 8px 16px; /* Adjusted button padding */
            font-size: 14px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .toast-success {
            background-color: #28a745 !important;
        }
        .d-flex.justify-content-center {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Designers</h2>
        </div>
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Mobile</th>
                        <th>Department</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees->sortBy('uid') as $employee)
                        @if ($employee->role === "Tester")
                            <tr>
                                <td>{{ $employee->uid }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->mobile }}</td>
                                <td>{{ $employee->role }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-primary btn-sm mr-1" href="{{ route('employee.edit', $employee->id) }}">Edit</a>
                                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this asset?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if ($message = Session::get('success'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ $message }}");
        });
    </script>
    @endif
</body>
</html>
