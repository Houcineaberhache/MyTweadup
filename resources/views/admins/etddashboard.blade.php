<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tweadup | les clients</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<style>
      
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
  
        .table {
            width: 300px;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
            border-spacing: 0;
        }
       

        .table th,
        .table td {
            padding: 0.25rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .table-borderless th,
        .table-borderless td,
        .table-borderless thead th,
        .table-borderless tbody+tbody {
            border: 0;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-hover tbody tr:hover {
            color: #212529;
            background-color: rgba(0, 0, 0, 0.075);
        }

        /* Custom style for the first column */
        .table th:first-child,
        .table td:first-child {
            font-weight: bold;
            text-align: center; /* Align text in the first column */
        }
        /* CSS */
.button-3 {
  appearance: none;
  background-color: #2ea44f;
  border: 1px solid rgba(27, 31, 35, .15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
  font-size: 14px;
  font-weight: 600;
  line-height: 20px;
  padding: 6px 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
}

.button-3:focus:not(:focus-visible):not(.focus-visible) {
  box-shadow: none;
  outline: none;
}

.button-3:hover {
  background-color: #2c974b;
}

.button-3:focus {
  box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
  outline: none;
}

.button-3:disabled {
  background-color: #94d3a2;
  border-color: rgba(27, 31, 35, .1);
  color: rgba(255, 255, 255, .8);
  cursor: default;
}

.button-3:active {
  background-color: #298e46;
  box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
}
.button-container {
  display: flex;
  justify-content: flex-end; /* Align items to the end of the container */
}
    </style>
</head>
<body>
    <x-master>
    <section id="content">
        <main>
			<div class="head-title">
				<div class="left">
					<h1>Les etudiants</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">etudiant</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="{{route('etudiant.registration')}}">Ajouter etudiant</a>
						</li>
					</ul>
				</div>
                <div class="col-md-6">
                    <form method="get" action="/searchetudiant">
                        @csrf
                        <div class="form-input">
                            <input type="search" name="search" placeholder="Search..." value="{{ isset($search) ? $search : '' }}">
                            <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                        </div>
                    </form>
                </div>
			</div>  
			<table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom Complet</th>
                    <th scope="col">CIN</th>
                    <th scope="col">Email</th>
                    <th scope="col">formation</th>
                    <th scope="col">groupe</th>
                    <th scope="col">La date creation</th>
					<th scope="col">type de paeiment</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->nom }} {{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->CIN }}</td>
                    <td>{{ $etudiant->email }}</td>
					<td>{{ $etudiant->formation->titre ?? 'sans' }}</td>
                    <td>{{ $etudiant->groupe->nom_groupe ?? 'sans' }}</td>
                    <td>{{ $etudiant->created_at }}</td>
					<td>{{ $etudiant->type_paiement }}</td>
                    <td>
                        <div class="action-dots float-end">
                            <div class="d-flex justify-content-center mx-3"> <!-- Center the buttons and add margin on the y-axis -->
                                <a class="btn btn-warning me-2" href="{{ route('etudiant.edit',$etudiant->id) }}"> <!-- Add margin to the right of the button -->
                                <i class='bx bxs-edit'></i>                                </a> 
                                <form method="POST" action="{{ route('etudiant.destroy', $etudiant->id) }}">
                                    @csrf
                                    @method('DELETE')  
                                    <button type="submit" class="btn btn-danger">
                                    <i class='bx bxs-trash'></i>                                    </button>
                                </form>                                                                             
                                </div>  
                            </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    {{ $etudiants -> links()}}      
   
        </main>
    </section>
   
    </x-master>
</body>
</html>