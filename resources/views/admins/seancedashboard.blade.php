<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tweadup | les seances</title>
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
        .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            display: block;
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
					<h1>Les seances</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">seances</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="{{route('ajouter.seance')}}">Ajouter seance</a>
						</li>
					</ul>
				</div>

                <div class="col-md-6">
                    <form method="get" action="/searchseance">
                        @csrf
                        <div class="form-input">
                            <input type="search" name="search" placeholder="date/formation" value="{{ isset($search) ? $search : '' }}">
                            <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                        </div>
                    </form>
                </div>
			</div>  
			<table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">date</th>
                    <th scope="col">horaire</th>
                    <th scope="col">duree</th>
                    <th scope="col">formateur</th>
                    <th scope="col">salle</th>
                    <th scope="col">formation</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seances as $seance)
                <tr>
                    <td>{{ $seance->id }}</td>
                    <td>{{ $seance->date }}</td>
                    <td>{{ $seance->horaire }}</td>
                    <td>{{ $seance->duree }}</td>
                    <td>{{ $seance->formateur->nom ?? 'sans'}}</td>
                    <td>{{$seance-> salle }}</td>
                    <td>{{ $seance->formation->titre ?? 'sans' }}</td>
                    <td>
                        <div class="action-dots float-end">
                            <div class="d-flex justify-content-center mx-3"> <!-- Center the buttons and add margin on the y-axis -->
                                <a class="btn btn-warning me-2" href="{{route('seance.edit',$seance->id)}}"> <!-- Add margin to the right of the button -->
                                <i class='bx bxs-edit'></i>                                </a> 
                                <form method="POST" action="{{route('seance.destroy',$seance->id)}}">
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
            
    {{ $seances -> links()}} 
        </main>
    </section>
    </x-master>
</body>
</html>