<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Modern Login Page | AsmrProg</title>
    <style>
              .logo {
    width: 160px; /* Adjust the width of the logo as needed */
    height: auto; /* Maintain aspect ratio */
    margin-bottom: 0px; /* Add margin below the logo */
}
    </style>
</head>

<body>

    <div class="container" id="container"> 
        <div class="form-container sign-in">
        <form method="POST" class="form_data" action="{{ route('login') }}">
            @csrf
                <h1>Connexion</h1>
                <span>Entrez votre e-mail et le mot de passe</span>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button>Se connecter</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                <img src="/img/Tweadup-02.png" alt="Logo" class="logo">
                    <h1>Bienvenue sur</h1><br/>
                     <h1>My Tweadup</h1>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>