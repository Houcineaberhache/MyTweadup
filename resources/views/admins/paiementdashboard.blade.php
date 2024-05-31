<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tweadup | les clients</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Custom styling for the table */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .table th,
        .table td {
            padding: 0.5rem; /* Increase padding for better spacing */
            vertical-align: middle;
            border: 1px solid #dee2e6;
        }

        .table thead th {
            background-color: #343a40; /* Darken the table header background */
            color: #ffffff;
            text-align: center;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        /* Custom style for action buttons */
        .action-dots {
            display: flex;
            justify-content: space-around;
        }

        .btn {
            padding: 0.5rem 1rem;
            margin-right: 0.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #ffffff;
        }
             /* Form input container style */
             .form-input {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        /* Search input field style */
        .form-input input[type="search"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 80px 0 0 80px;
            outline: none;
            width: 250px; /* Adjust width as needed */
        }
        /* Search button style */
        .form-input .search-btn {
            padding: 10px;
            background-color: #007bff; /* Bootstrap primary color */
            border: 1px solid #007bff;
            border-radius: 0px 80px 80px 0px;
            cursor: pointer;
            color: white;
        }
        .form-input .search-btn i {
            font-size: 20px;
        }
        .form-input .search-btn:hover {
            background-color: #0056b3; /* Darker shade for hover */
            border-color: #0056b3;
        }
        /* Responsive design adjustments */
        @media (max-width: 768px) {
            .form-input {
                flex-direction: column;
                width: 100%;
            }
            .form-input input[type="search"], .form-input .search-btn {
                width: 100%;
                border-radius: 4px;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <x-master>
        <section id="content">
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Les paiements</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">paiements</a></li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li><a class="active" href="{{ route('ajouter.paiement') }}">Ajouter paiement</a></li>
                        </ul>
                    </div>
                    
                <div class="col-md-6">
                    <form method="get" action="/searchpaiement">
                        @csrf
                        <div class="form-input">
                            <input type="search" name="search" placeholder="Prenom/date/formation" value="{{ isset($search) ? $search : '' }}">
                            <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                        </div>
                    </form>
                </div>
                </div>

                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Les clients</th>
                            
                            <th scope="col">La date </th>
                            <th scope="col">Les formations</th>
                            <th scope="col">Les groupes</th>
                            <th scope="col">Prix total de formation</th>
                            <th scope="col">Somme avec remise</th>
                            <th scope="col">Le reste </th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paiements as $paiement)
                        <tr>
                            <td>{{ $paiement->id }}</td>
                            <td>{{ $paiement->etudiant->nom ?? 'sans' }} {{ $paiement->etudiant->prenom ?? 'sans'}} :  {{ $paiement->etudiant->CIN ?? 'sans' }} </td>
                            
                            <td>{{ $paiement->created_at }}</td>
                            <td>{{ $paiement->formation->titre ?? 'sans' }}</td>
                            <td>{{ $paiement->groupe->nom_groupe ?? 'sans' }}</td>
                            <td>{{ $paiement->prix_total }} DH</td>
                          
                            <td>{{ $paiement->somme - $paiement->remise }} DH</td>
                            <td>  
                            {{($paiement->prix_total)-(($paiement->somme - $paiement->remise) * 1.20) }} 
                            DH </td>
                            <td class="action-dots">
                                <a class="btn btn-warning" href="{{route('paiement.edit',$paiement->id)}}">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <form method="POST" action="{{ route('paiement.destroy', $paiement->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class='bx bxs-trash'></i>
                                    </button>
                                </form>
                                <form method="GET" action="{{ route('pdf.generate', $paiement->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class='bx bxs-cloud-download'></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $paiements -> links()}} 
            </main>
        </section>
    </x-master>

    <script>

</script>
</body>
</html>
