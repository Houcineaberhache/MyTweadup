<?php

namespace App\Http\Controllers;
use App\Models\Paiementss;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        // Retrieve the specific payment based on the ID
        $paiement = Paiementss::findOrFail($id);
        $path = public_path().'/img/logo_tweadup_center.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $counter= 1;
        $image = 'data:image/'. $type .';base64,'.base64_encode($data);
        // Prepare data for the PDF view
        $data = [
            'title' => '',
            'date' => date('m/d/Y'),
            'paiement' => $paiement,
            'counter' =>  $counter, // Assuming you want to reset the counter for each individual payment
            'image' => $image
        ];

        // Load the PDF view with the specific payment data
        $pdf = PDF::loadView('pdf.paiementPdf', $data);

        // Generate and download the PDF with a custom filename
        return $pdf->download('Facture_paiement_' . $paiement->id . '_' . $paiement->etudiant->nom . $paiement->etudiant->prenom. '.pdf');
    }
}
