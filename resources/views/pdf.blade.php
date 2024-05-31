<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .invoice {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .invoice-header,
        .invoice-body,
        .invoice-footer {
            margin-bottom: 20px;
        }
        .invoice-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 200px;
        }
        .invoice-details {
            font-size: 16px;
            line-height: 1.5;
        }
        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        #elements {
            text-align: right;
        }
        .table th,
        .table td {
            padding: 5px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .table th {
            background-color: #6696AF;
            text-align: center;
        }
        .total-label {
            font-weight: bold;
        }
        .total-amount {
            font-weight: bold;
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="invoice">
                    <div class="invoice-header">
                        <img src="/img/logo_tweadup_center.png" alt="Logo" class="logo">
                    </div>
                    <div class="invoice-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-details">
                                    <p><strong>Tweadup Center</strong> </br>
                                    Agadir, Agadir Souss Massa</br>
                                    80000</p></br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-details text-md-right">
                                    <p><strong>Destinataire:</strong>
                                    <strong>John Doe</strong> </br>
                                    Date de facture: January 1, 2024</br>
                                    N Recu: #: R-001</p></br>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Désignation</th>
                                    <th>Qté.</th>
                                    <th>Prix unitaire</th>
                                    <th>Тахе</th>
                                    <th>Montant HT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>Marketing Digital Service</td>
                                    <td>1</td>
                                    <td>$1000.00</td>
                                    <td>$1000.00</td>
                                    <td>$1000.00</td>
                                </tr>
                            </tbody>
                            <table class="table table-striped">
                                <tr>
                                    <td colspan="4"  class="text-right"><b>Remise</b></td>
                                    <td>-100.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><b>Total TTC</b></td>
                                    <td>900.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><b>Total payé</b></td>
                                    <td>500.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><b>Solde à payer</b></td>
                                    <td>400.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="total-label text-right">Total</td>
                                    <td class="total-amount">1000.00</td>
                                </tr>
      </table>
                        </table>
                    </div>
                    <div class="invoice-footer text-right">
                        <p><strong>Le reste à payer</strong> <span class="total-amount">1000.00</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
    font-family: Arial, sans-serif;
    padding: 20px;
    background-color: #f8f9fa;
}

.invoice {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.invoice-details {
    font-size: 16px;
    line-height: 1.5;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 5px;
    border: 1px solid #ddd;
    text-align: center;
}

.table th {
    background-color: #6696AF;
    color: #fff;
    text-align: center;
}

.total-label {
    font-weight: bold;
}

.total-amount {
    font-weight: bold;
    color: #e74c3c;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="invoice">
                    <div class="invoice-header">
                        <img src="/img/logo_tweadup_center.png" alt="Logo" class="logo">
                    </div>
                    <div class="invoice-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-details">
                                    <p><strong>Tweadup Center</strong> </br>
                                    Agadir, Agadir Souss Massa</br>
                                    80000</p></br>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="invoice-details text-md-right">
                                
                                    <p><strong>Destinataire:</strong>
                                    <strong>{{$paiement->etudiant->nom}} {{$paiement->etudiant->prenom}}</strong> </br>
                                    Date de facture: {{ $paiement->created_at}}</br>
                                    N Recu: #: R-00{{$counter++}}</p></br>
                                
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>la formation</th>
                                    <th>Groupe</th> 
                                    <th>type de paiement</th>
                                    <th>Montant HT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                
                                    <td>{{$paiement->id}}</td>
                                    <td>{{$paiement->formation->titre}}</td>
                                    <td>{{$paiement->groupe->nom_groupe}}</td>
                                    
                                    <td>{{$paiement->etudiant->type_paiement}}</td>
                                    <td>{{$paiement->prix_total}}</td>
                                </tr>
                                
                            </tbody>
                            <table class="table table-striped">
                                <tr>
                                    <td colspan="4"  class="text-right"><b>prix total de formation</b></td>
                                    <td>{{$paiement->prix_total}} MAD</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><b>la somme payé</b></td>
                                    <td>{{$paiement->somme}} MAD</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><b>remise</b></td>
                                    <td>{{$paiement->remise}} MAD</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><b>Somme à payer avec remise</b></td>
                                    <td>{{ $paiement->somme - $paiement->remise }} MAD</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="total-label text-right">Le reste à payer</td>
                                    <td class="total-amount">{{($paiement->prix_total)-($paiement->somme - $paiement->remise) }} MAD</td>
                                </tr>
      </table>
                        </table>
                    </div>
                  
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

