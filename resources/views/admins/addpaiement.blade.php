<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Ajouter Paiement</title>
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
                                    <h3 class="fs-4 mb-4 text-center">Ajouter Paiement</h3>
                                    <form action="{{ route('paiement.store') }}" method="POST" id="paymentForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Sélectionner l'étudiant</label>
                                                <select name="etudiant_id" class="form-select form-control">
                                                    <option value="">Sélectionner un client</option>
                                                    @foreach ($etudiants as $etudiant)
                                                        <option value="{{ $etudiant->id }}">{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Sélectionner la formation</label>
                                                <select name="formation_id" class="form-select form-control">
                                                    <option value="">Sélectionner une formation</option>
                                                    @foreach ($formations as $formation)
                                                        <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Sélectionner le groupe</label>
                                                <select name="groupe_id" class="form-select form-control">
                                                    <option value="">Sélectionner le groupe</option>
                                                    @foreach ($groupes as $groupe)
                                                        <option value="{{ $groupe->id }}">{{ $groupe->nom_groupe }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Le prix total (DH)</label>
                                                <input type="number" class="form-control" name="prix_total" id="prix_total" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">La somme payée (DH)</label>
                                                <input type="number" class="form-control" name="somme" id="somme" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">La remise (DH)</label>
                                                <input type="number" class="form-control" name="remise" id="remise" required>
                                            </div>
                                          
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Confirmer</button>
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

    <script>
        // Function to calculate and update the remaining payment
        function calculateReste() {
            const prix_total = parseFloat(document.getElementById('prix_total').value);
            const somme = parseFloat(document.getElementById('somme').value);

            // Calculate the remaining amount
            const reste = prix_total - somme;

            // Update the value of the 'reste' input field
            document.getElementById('reste').value = reste.toFixed(2);
        }

        // Attach the 'calculateReste' function to the 'input' events of 'prix_total' and 'somme'
        document.getElementById('prix_total').addEventListener('input', calculateReste);
        document.getElementById('somme').addEventListener('input', calculateReste);
    </script>
</body>
</html>
