<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        async function handleSubmit(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData);
            console.log(data);
        }
    </script>
</head>
<body class="bg-light">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Simple Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="/simple-form" method="POST" onsubmit="handleSubmit(event)">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address:</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
