<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees - IT Asset Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        header h2 {
            margin: 0;
        }
        .add-employees-btn {
            margin-bottom: 20px;
        }
        .add-employees-btn a {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-decoration: none;
            font-size: 16px;
        }
        .add-employees-btn a:hover {
            background-color: #218838;
        }
        .category-card {
            background-color: #007bff; /* Fallback color */
            background: linear-gradient(45deg, #004b91, #005ea8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 20px;
            transition: transform 0.2s;
            cursor: pointer;
            color: #fff;
        }
        .category-card:hover {
            transform: scale(1.05);
        }
        .category-icon {
            font-size: 50px;
            margin-bottom: 15px;
            color: #fff;
        }
        .category-info {
            font-size: 1.1em;
            color: #fff;
        }
    </style>

    <script>
        function loademployee() {
            window.location.href = "{{ route('employee.index') }}";
        }
        function loaddevelopers() {
            window.location.href = "{{ route('employee.developers') }}";
        }
        function design() {
            window.location.href = "{{ route('employee.designers') }}";
        }
        function test() {
            window.location.href = "{{ route('employee.testers') }}";
        }
    </script>

</head>
<body>
    <div class="container">
        <header>
            <h2>Employees</h2>
        </header>
        <div class="add-employees-btn text-right">
            <a class="btn btn-success" href="{{ route('employee.create') }}">Add Employees</a>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="category-card" onclick="loademployee()">
                    <div class="category-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>All Employees</h4>
                    <p class="category-info">Total: {{ $totalEmployees }}</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="category-card" onclick="loaddevelopers()">
                    <div class="category-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h4>Developers</h4>
                    <p class="category-info">Total: {{ $totalDevelopers }}</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="category-card" onclick="design()">
                    <div class="category-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h4>UI Designers</h4>
                    <p class="category-info">Total: {{ $totalDesigners }}</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="category-card" onclick="test()">
                    <div class="category-icon">
                        <i class="fas fa-bug"></i>
                    </div>
                    <h4>Testers</h4>
                    <p class="category-info">Total: {{ $totalTesters }}</p>
                </div>
            </div>
            <!-- Add more categories as needed -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
