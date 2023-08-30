<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;

class WarehouseAddController extends Controller
{
    public function index()
    {
        return view('warehouse_add');
    }

    public function addWarehouse(Request $request)
    {
        // Validate input here
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'crop' => 'required|string',
            'rent' => 'required|numeric',
        ], [
            'required' => 'One or more fields are empty.',
            'numeric' => 'The rent field must be a number.',
        ]);
        $existingWarehouse = Warehouse::where('name', $request->input('name'))
            ->where('address', $request->input('address'))    
            ->first();
    
        if ($existingWarehouse) {
            return redirect()->back()->with('errorExists', 'Warehouse with the same name, and address already exists.');
        }
    
        $warehouse = new Warehouse();
        $warehouse->user_id = Auth::id(); 
        $warehouse->name = $request->input('name');      
        $warehouse->address = $request->input('address');
        $warehouse->crop = $request->input('crop');
        $warehouse->rent = $request->input('rent');
        $warehouse->save();
    
        return redirect()->back()->with('successAdd', 'Warehouse added successfully.');
    }

    public function updateWarehouse(Request $request)
    {
        // Validate input here
        $validatedData = $request->validate([
            'updateName' => 'required|string',            
            'updateAddress' => 'nullable|string',
            'updateCrop' => 'nullable|string',
            'updateRent' => 'nullable|numeric',
        ]);
    
        $name = $request->input('updateName');
        $address = $request->input('updateAddress');
        $crop = $request->input('updateCrop');
        $rent = $request->input('updateRent');
    
        $warehouse = Warehouse::where('name', $name)
            ->first();
    
        if ($warehouse) {
            
            if ($address !== null) {
                $warehouse->address = $address;
            }
            if ($crop !== null) {
                $warehouse->crop = $crop;
            }
            if ($rent !== null) {
                $warehouse->rent = $rent;
            }
            $warehouse->save();
            return redirect()->back()->with('successUp', 'Warehouse details updated successfully.');
        }
    
        return redirect()->back()->with('errorMat', 'No matching warehouse found.');
    }
}
