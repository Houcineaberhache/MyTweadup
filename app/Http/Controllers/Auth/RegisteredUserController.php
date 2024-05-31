<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\clientrequest;
use App\Http\Requests\formateurrequest;
use App\Http\Requests\employeerequest;
use App\Models\Employee;
use App\Models\Formateur;
use App\Models\Groupe;
use App\Models\Etudiant;
use App\Models\Formation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request)
    {
        $view = $request->input('view'); // Assuming the parameter name is 'view'

        if ($view === 'etudiant') {
            $groupes = Groupe::all();
            $formations = Formation::all();
            return view('admins.addetd', ['groupes' => $groupes,'formations'=>$formations]);
        } elseif ($view === 'employee') {
            return view('admin.addemp');
        } elseif ($view === 'formateur') {
            $formations = Formation::all();
            return view('admin.addfrm',['formations'=>$formations]);
        }
    }
    
    public function storeEtudiant(clientrequest $request)
    {
        // Validate the form data
        $validatedData = $request->validated();
    
        // Create a new Candidat instance and assign values
        $etudiant = new Etudiant();
        $etudiant->fill($validatedData);
        $etudiant->password = Hash::make($validatedData['password']); // Hash the password
    
        // Handle image upload if present
       
    
        // Save the Candidat to the database
        $etudiant->save();
    
        // Authenticate the Candidat
        Auth::login($etudiant);
    
        // Fire the Registered event
        event(new Registered($etudiant));
    
        // Redirect with a success message
        if (auth()->guard('admin')->check()) {
            return redirect()->route('etudiant.dashboard')->with('success', 'nouvel étudiant ajouté avec succès');
        } 
    }
    public function storeEmployee(employeerequest $request)
    {
        // Validate the form data
        $validatedData = $request->validated([
            'nom'=>'required|min:3|max:20',
            'prenom'=>'required|min:3|max:20',
            'CIN'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:9|max:30|confirmed',
            'adresse'=>'required',
            'profession'=>'required',
          
        
    ]);
    
        // Create a new Employee instance and assign values
        $employee = Employee::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'profession' => $request->input('profession'),
            'CIN' => $request->input('CIN'),
            'adresse' => $request->input('adresse'),
            'password' => Hash::make($request->input('password')),
        ]);
        

        // Check if password exists in $validatedData and is not null
if (isset($validatedData['password']) && $validatedData['password'] !== null) {
    $employee->password = Hash::make($validatedData['password']);
}
 // Hash the password
    
        // Handle image upload if present
  
        // Save the Employee to the database
        $employee->save();
    
        // Authenticate the Employee
        Auth::login($employee);
    
        // Fire the Registered event
        event(new Registered($employee));
    
        // Redirect with a success message
        return to_route('employee.dashboard')->with('success', 'Nouvel employé ajouté avec succès.');
    }
    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function storeFormateur(formateurrequest $request)
    {
        // Validate the form data
        $validatedData = $request->validated([
            'nom'=>'required|min:3|max:20',
            'prenom'=>'required|min:3|max:20',
            'CIN'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:9|max:30|confirmed',
            'adresse'=>'required',
           
           
    ]);

    
    // Pass the formations to the view
 
        // Create a new Employee instance and assign values
        $formateur = Formateur::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'formation_id'=>$request->input('formation_id'),
            'CIN' => $request->input('CIN'),
            'adresse' => $request->input('adresse'),
            'password' => Hash::make($request->input('password')),
        
        ]);
        

        // Check if password exists in $validatedData and is not null
        if (isset($validatedData['password']) && $validatedData['password'] !== null) {
             $formateur->password = Hash::make($validatedData['password']);
            }
        // Save the Employee to the database
        $formateur->save();
    
        // Authenticate the Employee
        Auth::login($formateur);
    
        // Fire the Registered event
        event(new Registered($formateur));
    
        // Redirect with a success message
        return redirect()->route('formateur.dashboard')->with('success', 'Nouvel formateur ajouté avec succès.');
    }
    
   

 

}
