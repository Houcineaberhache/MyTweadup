<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\employeerequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function listemp (){
        $employees  = Employee::orderBy('created_at', 'desc')->paginate(10); // bach i3iyt l ga3 lines li f DB (select * from Profile)
       return view('admins.empdashboard',compact('employees')); // ga3 l attributes 
    }
    public function destroyemp(Employee $employee){
        $employee->delete();
        return to_route('employee.dashboard')->with('success','Cet employé est supprimé avec succès');
    }
    public function editEmployee(Employee $employee){
        return view('Modify.employeeEdite',compact('employee'));
    }

    public function updateEmployee(employeerequest $employeerequest,Employee $employee){
        $formFields = $employeerequest->validated();
        //hash
        $formFields['password'] = Hash::make($employeerequest->password);

        if (!$employeerequest->filled('password')) {
            unset($formFields['password']);
        }
       
        $employee->fill($formFields)->save();
        return to_route('employee.dashboard',$employee->id)->with('success','Cet employé est modifié avec succès');
    }
    public function search(Request $request){

        $search = $request->search;

        $employees =Employee::where(function($query) use ($search){

            $query->Where('CIN','like',"%$search%")
            ->orwhere('created_at','like',"%$search%");

            })
            ->paginate(10);
             
            return view('admins.empdashboard',compact('employees','search'));

    }
}
