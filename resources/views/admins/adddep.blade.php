<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>My Tweadup | Ajouter Depenses</title>
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
                            <h3 class="fs-4 mb-4 text-center">Ajouter Dépense</h3>
                            <form method="POST" action="{{ route('depense.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="categorie_depense">Catégorie de Dépense :</label>
                                        <select id="categorie_depense" name="categorie_depense" class="form-control" >
                                            <option value="">Sélectionner une depense</option>
                                            <option value="location">Location</option>
                                            <option value="l'eau">L'eau</option>
                                            <option value="l'eau potable">L'eau potable</option>
                                            <option value="impression">Impression</option>
                                            <option value="nettoyage">Nettoyage</option>
                                            <option value="electricite">Électricité</option>
                                            <option value="divers">Divers</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="montant_depense">Montant de dépenses</label>
                                        <input type="text" name="montant_depense" id="montant_depense" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="nature_depense">Nature de dépense</label>
                                        <input type="text" name="nature_depense" id="nature_depense" class="form-control" >
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Ajouter dépense</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<script>
    function toggleNatureDepense(selectElement) {
        var natureDepenseInput = document.getElementById('nature_depense');

        if (selectElement.value === 'divers') {
            natureDepenseInput.disabled = false;
            natureDepenseInput.setAttribute('required', 'required');
        } else {
            natureDepenseInput.disabled = true;
            natureDepenseInput.removeAttribute('required');
        }
    }
</script>

</x-master>
</body>
</html>
