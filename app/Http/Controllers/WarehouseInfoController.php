<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;

class WarehouseInfoController extends Controller
{
    public function index()
    {        
        // Fetch employees with the logged-in user's user_id and role 'Employee'
        $userWarehouses = Warehouse::all()
            ->where('user_id', Auth::id()); // Filter by user_id using Auth facade
            
    
        return view('warehouse_info', ['warehouse' => $userWarehouses]);
    }
    
    public function search(Request $request)
{
    $searchName = $request->input('warehouseName');
    $matchingWarehouses = [];

    if ($searchName) {
        // Search for warehouses with a name similar to the input
        $matchingWarehouses = Warehouse::where(function ($query) use ($searchName) {
            $query->where('name', 'LIKE', "%$searchName%")
                  ->orWhere('name', 'LIKE', substr($searchName, 0, 4) . '%')
                  ->orWhere('name', 'LIKE', '%' . substr($searchName, -4));
        })->get(); // Use 'get()' to retrieve the results

        if ($matchingWarehouses->isEmpty()) {
            return view('warehouse_info', ['noMatch' => true]);
        }
    }

    return view('warehouse_info', ['matchingWarehouses' => $matchingWarehouses]);
}
    
}


