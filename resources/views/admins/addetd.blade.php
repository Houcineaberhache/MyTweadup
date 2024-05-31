<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylee.css">
    <title>My Tweadup | Ajouter Etudiant</title>
    <style>
         .fieldset-border {
            border: 1px solid #007bff; /* Blue border */
            border-top: 1px solid #007bff; /* Blue border at the top */
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .legend-border {
            border-bottom: 1px solid #007bff; /* Blue border for legend */
            padding-bottom: 5px; /* Adjust padding for space */
            margin-bottom: 10px; /* Adjust margin for space */
        }
    </style>
</head>
<body>
<x-master>
<section id="content">
    <main>
        <div class="container mt-1">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-4 text-center">Ajouter étudiant</h3>
                            <form method="POST" action="{{ route('etudiant.registration.store') }}" enctype="multipart/form-data">
                                @csrf
                                <fieldset class="fieldset-border">
                                    <legend class="legend-border">Données personnelles:</legend>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Nom</label>
                                            <input type="text" class="form-control" name="nom">
                                            @error('nom')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Prénom</label>
                                            <input type="text" class="form-control" name="prenom">
                                            @error('prenom')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">CIN</label>
                                            <input type="text" class="form-control" name="CIN">
                                            @error('CIN')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email">
                                            @error('email')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Mot de passe</label>
                                            <input type="password" class="form-control" name="password">
                                            @error('password')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Confirmation de MDP</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                            @error('password_confirmation')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Adresse</label>
                                            <textarea name="adresse" class="form-control"></textarea>
                                            @error('adresse')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="fieldset-border">
                                    <legend class="legend-border">Inscription :</legend>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Saisir une formation</label>
                                            <select name="formation_id" class="form-select form-control">
                                                <option value="">Sélectionner une formation</option>
                                                @foreach ($formations as $formation)
                                                    <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Saisir un groupe</label>
                                            <select name="groupe_id" class="form-select form-control">
                                                <option value="">Sélectionner un groupe</option>
                                                @foreach ($groupes as $groupe)
                                                    <option value="{{ $groupe->id }}">{{ $groupe->nom_groupe }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                      
                                       
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Type de paiement</label>
                                            <select class="form-select form-control" name="type_paiement">
                                                <option value="total">Total</option>
                                                <option value="partiel">Partiel</option>
                                                <option value="cheque">Mensuel</option>
                                            </select>
                                            @error('type_paiement')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Créer compte</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
</x-master>
</body>
</html>
