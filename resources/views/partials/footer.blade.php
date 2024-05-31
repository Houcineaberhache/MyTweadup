<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Add your CSS links here -->
    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            margin: 0;
            padding-bottom: 100px; /* Height of the footer */
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px; /* Height of the footer */
            background-color: #343a40; /* Your desired background color */
        }
        .footer-content {
            color: white;
            text-align: center;
            padding-top: 20px; /* Adjust as needed */
        }
    </style>
</head>
<body>
    <!-- Your page content goes here -->
    
    <footer class="bg-dark py-3 bg-3">
        <div class="container footer-content">
            <p class="text-center text-white pt-3 fw-bold fs-6">© 2023 xyz company, all rights reserved</p>
        </div>
    </footer>
</body>
</html>