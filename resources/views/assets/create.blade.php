<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Asset</title>
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
                    <h2>Add Asset</h2>
                    <a class="btn btn-primary" href="{{ route('assets.index') }}">Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Asset Type</strong><strong style="color:red;"> *</strong>
                        <input type="text" name="type" class="form-control" placeholder="Eg: Laptop">
                        @error('type')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Asset Unique ID</strong><strong style="color:red;"> *</strong>
                        <input type="text" name="uid" class="form-control" placeholder="Eg: 001">
                        @error('uid')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Asset Brand</strong><strong style="color:red;"> *</strong>
                        <input type="text" name="brand" class="form-control" placeholder="Eg: Dell">
                        @error('brand')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Asset Model</strong>
                        <input type="text" name="model" class="form-control" placeholder="Eg: Ideapad Slim 3">
                        @error('model')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Asset Image (Eg: Barcode)</strong>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Specification 1</strong>
                        <input type="text" name="specification1" class="form-control" placeholder="Eg: 8GB RAM">
                        @error('specification1')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Specification 2</strong>
                        <input type="text" name="specification2" class="form-control" placeholder="Eg: 512GB SSD">
                        @error('specification2')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Specification 3</strong>
                        <input type="text" name="specification3" class="form-control" placeholder="Eg: Intel i5 10th Gen">
                        @error('specification3')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Specification 4</strong>
                        <input type="text" name="specification4" class="form-control" placeholder="Eg: NVIDIA GTX 1650">
                        @error('specification4')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Date of Purchase</strong><strong style="color:red;"> *</strong>
                        <input type="date" name="dop" class="form-control" placeholder="Eg: 20/05/2020">
                        @error('dop')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Cost (in rupees)</strong><strong style="color:red;"> *</strong>
                        <input type="text" name="cost" class="form-control" placeholder="Eg: 5000">
                        @error('cost')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Warranty End Date</strong>
                        <input type="date" name="warranty" class="form-control">
                        @error('warranty')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Asset Condition</strong><strong style="color:red;"> *</strong>
                        <select name="condition" class="form-control">
                            <option value="">select</option>
                            <option value="New">New</option>
                            <option value="Good">Good</option>
                            <option value="Damaged">Damaged</option>
                            <!-- Add more options as needed -->
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
