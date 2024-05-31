<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylee.css">
    <title>My Tweadup | Ajouter Seance </title>
    
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
                            <h3 class="fs-4 mb-4 text-center">Ajouter Seance</h3>
                            <form method="POST" action="{{route('seance.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="date" class="form-control" name="date">
                                        @error('date')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Duree</label>
                                        <input type="text" class="form-control" name="duree">
                                        @error('duree')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Horaire</label>
                                        <input type="time" class="form-control" name="horaire">
                                        @error('horaire')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Salle</label>
                                        <select class="form-select form-control" name="salle">
                                            <option value="1">Salle 1</option>
                                            <option value="2">Salle 2</option>
                                            <option value="3">Salle 3</option>
                                            <option value="4">Salle 4</option>
                                            <option value="5">Salle 5</option>
                                            <option value="6">Salle 6</option>
                                            <option value="7">Salle 7</option>
                                        </select>
                                        @error('salle')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
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
                                        <label class="form-label">saisir un formateur</label>
                                            <select name="formateur_id" class="form-select form-control">
                                                <option value="">Sélectionner formateur</option>
                                                @foreach ($formateurs as $formateur)
                                                    <option value="{{ $formateur->id }}">{{ $formateur->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Ajouter seance</button>
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