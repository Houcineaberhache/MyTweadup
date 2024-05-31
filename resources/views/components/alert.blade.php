<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .custom-alert {
            position:fixed;
            top: 20px;
            right: 20px;
            width: 300px; /* Adjust width as needed */
            text-align: center; /* Center text horizontally */
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    @props(['type','text'])
    <div class="alert alert-{{$type}} custom-alert" role="alert">
        {{$slot}}
    </div>
</body>
</html>
