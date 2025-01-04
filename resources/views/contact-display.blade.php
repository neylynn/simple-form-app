<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Load data from local storage
        function loadFormData() {
            const savedData = JSON.parse(localStorage.getItem('formData'));
            if (savedData) {
                document.getElementById('displayName').innerText = savedData.name || 'N/A';
                document.getElementById('displayEmail').innerText = savedData.email || 'N/A';
                document.getElementById('displayMessage').innerText = savedData.message || 'N/A';
            }
        }
        // Load data on page load
        window.onload = loadFormData;
    </script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0">Form Data</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> <span id="displayName">N/A</span></p>
                        <p><strong>Email Address:</strong> <span id="displayEmail">N/A</span></p>
                        <p><strong>Message:</strong> <span id="displayMessage">N/A</span></p>
                        <div class="mt-3">
                            <a href="/complete-form" class="btn btn-secondary">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
