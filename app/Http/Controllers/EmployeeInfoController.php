<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Models\Other;

class EmployeeInfoController extends Controller
{
    public function index()
    {
        // Fetch employees with the logged-in user's user_id and role 'Employee'
        $userEmployees = Other::where('role', 'Employee')
            ->where('user_id', Auth::id()) // Filter by user_id using Auth facade
            ->get();
    
        return view('employee_info', ['employees' => $userEmployees]);
    }
    
    public function search(Request $request)
    {
        $searchName = $request->input('employeeName');
        $matchingEmployees = [];

        if ($searchName) {
            // Search for employees with a name similar to the input, considering user_id
            $matchingEmployees = Other::where('role', 'Employee')
                ->where('user_id', Auth::id()) // Filter by user_id using Auth facade
                ->where(function ($query) use ($searchName) {
                    $query->where('name', 'LIKE', "%$searchName%")
                          ->orWhere('name', 'LIKE', substr($searchName, 0, 4) . '%')
                          ->orWhere('name', 'LIKE', '%' . substr($searchName, -4));
                })
                ->get();

            if ($matchingEmployees->isEmpty()) {
                return view('employee_info', ['matchingEmployees' => $matchingEmployees, 'noMatch' => true]);
            }
        }

        return view('employee_info', ['matchingEmployees' => $matchingEmployees]);
    }
}



