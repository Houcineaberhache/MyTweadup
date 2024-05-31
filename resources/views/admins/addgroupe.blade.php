<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/stylee.css">
    <title>Document</title>
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
                            <h3 class="fs-4 mb-4 text-center">Ajouter Groupe</h3>
                                        <form action="{{ route('groupe.store') }}" method="POST">
                                            @csrf
                                        <div class="row">
                                        <div class="col-md-6 mb-3">
                                        <label class="form-label">Nom de groupe</label>
                                        <input type="text" class="form-control" name="nom_groupe">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                        <label class="form-label" for="formateur_id">Formateur:</label>
                                            <select class="form-select form-control" id="formateur_id" name="formateur_id" required>
                                                <option value="">Select Formateur</option>
                                                @foreach($formateurs as $formateur)
                                                    <option value="{{ $formateur->id }}">{{ $formateur->nom }} {{ $formateur->prenom }}</option>
                                                @endforeach
                                            </select>

                                        <label class="form-label" for="formation_id">Formation:</label>
                                        <select   class="form-select form-control" id="formation_id" name="formation_id" required>
                                            <option value="">Select Formation</option>
                                        </select>
                                    </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Créer groupe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       
    </main>
</section>
</x-mster>
<script>
    $(document).ready(function() {
        $('#formateur_id').change(function() {
            var formateurId = $(this).val();
            if (formateurId) {
                $.ajax({
                    url: '/formateurs/' + formateurId + '/formations',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data); // Log the response to the console
                        $('#formation_id').empty();
                        $('#formation_id').append('<option value="">Select Formation</option>');
                        $.each(data, function(key, formation) {
                            $('#formation_id').append('<option value="' + formation.id + '">' + formation.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + status + ' - ' + error);
                    }
                });
            } else {
                $('#formation_id').empty();
                $('#formation_id').append('<option value="">Select Formation</option>');
            }
        });
    });
</script>

</body>
</html>