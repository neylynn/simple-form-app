<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Contact Us</h5>
                    </div>
                    <div class="card-body">
 
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="/contact-form" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" >
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address:</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message:</label>
                                <textarea id="message" name="message" class="form-control" rows="4" placeholder="Enter your message">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
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
