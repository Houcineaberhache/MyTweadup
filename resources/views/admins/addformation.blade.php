<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylee.css">
    <title>My Tweadup | Ajouter Formation</title>
</head>
<style>
    .fc-event {
    border-color: transparent; /* Hide default borders */
}

.fc-event-dot {
    border-color: transparent; /* Hide default dot borders */
}

.fc-event-inner {
    background-color: inherit; /* Use event color as background */
    color: #fff; /* Text color */
    font-weight: bold;
    border-radius: 5px;
}

</style>
<body>
<x-master>
<section id="content">
    <main>
        <div class="container mt-1">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-4 text-center">Ajouter Formation</h3>
                            <form method="POST" action="{{ route('formation.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="event_name">Titre</label>
                                        <input type="text" name="titre" id="event_name" class="form-control" placeholder="Titre de formation">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Durée</label>
                                        <input type="text" class="form-control" name="duree">
                                        @error('duree')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Prix</label>
                                            <input type="text" class="form-control" name="prix">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                            <label class="form-label">Choisir une Couleur:</label>
                                            <select type="text" id="eventColor" class="form-control" name="couleur">
                                                <option value="">saisir la couleur</option>
                                                <option value="rouge">rouge</option>
                                                <option value="vert">vert</option>
                                                <option value="cyan">cyan</option>
                                                <option value="bleu">bleu</option>
                                                <option value="violet">violet</option>
                                                <option value="orange">orange</option>
                                                <option value="jaune">jaune</option>
                                            </select>
                                            @error('couleur')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-5">  
                                            <div class="form-group">
                                                <label for="event_start_date">Date début </label>
                                                <input type="date" name="date_debut" id="event_end_date" class="form-control" placeholder="Date de fin">
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">  
                                            <div class="form-group">
                                                <label for="event_end_date">Date fin </label>
                                                <input type="date" name="date_fin" id="event_end_date" class="form-control" placeholder="Date de fin">
                                            </div>
                                        </div>
                                       
                                       
                                    </div>  
                                </div>      
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Ajouter formation</button>
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
