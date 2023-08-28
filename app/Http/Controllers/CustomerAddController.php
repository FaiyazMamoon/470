<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Models\Other;

class CustomerAddController extends Controller
{
    public function index()
    {
        return view('customer_add');
    }

    public function addCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone_no' => 'required|string',
        ], [
            'required' => 'One or more fields are empty.',
        ]);

        $existingCustomer = Other::where('name', $request->input('name'))
            ->where('role', 'Customer')
            ->where('address', $request->input('address'))
            ->where('phone_no', $request->input('phone_no'))
            ->first();

        if ($existingCustomer) {
            return redirect()->back()->with('errorExists', 'Customer already exists.');
        }

        $customer = new Other();
        $customer->name = $request->input('name');
        $customer->role = 'Customer';
        $customer->specific_role = $request->input('specific_role');
        $customer->address = $request->input('address');
        $customer->phone_no = $request->input('phone_no');
        $customer->user_id = Auth::id(); 
        $customer->save();

        return redirect()->back()->with('successAdd', 'Customer added successfully.');
    }

    public function updateCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'updateName' => 'required|string',
        ], [
            'required' => 'One or more fields are empty.',
        ]);

        $name = $request->input('updateName');
        $specificRole = $request->input('updateSpecificRole');
        $address = $request->input('updateAddress');
        $phoneNo = $request->input('updatePhoneNo');

        $customer = Other::where('name', $name)
            ->where('role', 'Customer')
            ->where('user_id', Auth::id()) 
            ->first();

        if ($customer) {
            if ($specificRole !== null) {
                $customer->specific_role = $specificRole;
            }
            if ($address !== null) {
                $customer->address = $address;
            }
            if ($phoneNo !== null) {
                $customer->phone_no = $phoneNo;
            }
            $customer->save();

            return redirect()->route('customer.add')->with('successUp', 'Customer details updated successfully.');
        }

        return redirect()->route('customer.add')->with('errorMat', 'No matching customer found.');
    }

    public function deleteCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'deleteName' => 'required|string',
        ], [
            'required' => 'One or more fields are empty.',
        ]);

        $name = $request->input('deleteName');

        $customer = Other::where('name', $name)
            ->where('role', 'Customer')
            ->where('user_id', Auth::id()) 
            ->first();

        if ($customer) {
            $customer->delete();
            return redirect()->route('customer.add')->with('successDel', 'Customer deleted successfully.');
        }

        return redirect()->route('customer.add')->with('errorMat', 'No matching customer found.');
    }
}

