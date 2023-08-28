<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Models\Other; // Assuming 'Other' is your model for customer data

class CustomerInfoController extends Controller
{
    public function index()
    {
        // Fetch customers with the logged-in user's user_id and role 'Customer'
        $userCustomers = Other::where('role', 'Customer')
            ->where('user_id', Auth::id()) // Filter by user_id using Auth facade
            ->get();

        return view('customer_info', ['customers' => $userCustomers]);
    }

    public function search(Request $request)
    {
        $searchName = $request->input('customerName');
        $matchingCustomers = [];

        if ($searchName) {
            // Search for customers with a name similar to the input, considering user_id
            $matchingCustomers = Other::where('role', 'Customer')
                ->where('user_id', Auth::id()) // Filter by user_id using Auth facade
                ->where(function ($query) use ($searchName) {
                    $query->where('name', 'LIKE', "%$searchName%")
                          ->orWhere('name', 'LIKE', substr($searchName, 0, 4) . '%')
                          ->orWhere('name', 'LIKE', '%' . substr($searchName, -4));
                })
                ->get();

            if ($matchingCustomers->isEmpty()) {
                return view('customer_info', ['noMatch' => true]);
            }
        }

        return view('customer_info', ['matchingCustomers' => $matchingCustomers]);
    }
}
