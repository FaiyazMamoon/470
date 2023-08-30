<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Other;
use Illuminate\Support\Facades\Auth;
class EmployeeAddController extends Controller
{
    public function index()
    {
        return view('employee_add');
    }

    public function addEmployee(Request $request)
    {
        // Validate input here
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone_no' => 'required|string',
            'salary' => 'required|numeric',
        ], [
            'required' => 'One or more fields are empty.',
            'numeric' => 'The salary field must be a number.',
        ]);
        
        $existingEmployee = Other::where('name', $request->input('name'))
            ->where('role', 'Employee')
            ->where('address', $request->input('address'))
            ->where('phone_no', $request->input('phone_no'))
            ->first();
    
        if ($existingEmployee) {
            return redirect()->back()->with('errorExists', 'Employee with the same name, address, and phone number already exists.');
        }
    
        $employee = new Other();
        $employee->user_id = Auth::id(); 
        $employee->name = $request->input('name');
        $employee->role = 'Employee';
        $employee->specific_role = $request->input('specific_role');
        $employee->address = $request->input('address');
        $employee->phone_no = $request->input('phone_no');
        $employee->salary = $request->input('salary');
        $employee->save();

        return redirect()->back()->with('successAdd', 'Employee added successfully.');
    }

    public function updateEmployee(Request $request)
    {
        // Validate input here
        $validatedData = $request->validate([
            'updateName' => 'required|string',
            'updateSpecificRole' => 'nullable|string',
            'updateAddress' => 'nullable|string',
            'updatePhoneNo' => 'nullable|string',
            'updateSalary' => 'nullable|numeric',
        ]);

        $name = $request->input('updateName');
        $specificRole = $request->input('updateSpecificRole');
        $address = $request->input('updateAddress');
        $phoneNo = $request->input('updatePhoneNo');
        $salary = $request->input('updateSalary');

        $employee = Other::where('name', $name)
            ->where('role', 'Employee')
            ->where('user_id', Auth::id())
            ->first();

        if ($employee) {
            if ($specificRole !== null) {
                $employee->specific_role = $specificRole;
            }
            if ($address !== null) {
                $employee->address = $address;
            }
            if ($phoneNo !== null) {
                $employee->phone_no = $phoneNo;
            }
            if ($salary !== null) {
                $employee->salary = $salary;
            }
            $employee->save();
            return redirect()->back()->with('successUp', 'Employee details updated successfully.');
        }

        return redirect()->back()->with('errorMat', 'No matching employee found.');
    }

    public function deleteEmployee(Request $request)
    {
        // Validate input here
        $validatedData = $request->validate([
            'deleteName' => 'required|string',
            'deleteAddress' => 'required|string',
            'deletePhoneNo' => 'required|string',
        ], [
            'required' => 'One or more input fields are missing.',
        ]);

        $employee = Other::where('name', $request->input('deleteName'))
            ->where('role', 'Employee')
            ->where('user_id', Auth::id())
            ->where('address', $request->input('deleteAddress'))
            ->where('phone_no', $request->input('deletePhoneNo'))

            ->first();

        if ($employee) {
            $employee->delete();
            return redirect()->back()->with('success', 'Employee deleted successfully.');
        }

        return redirect()->back()->with('errorMat', 'No matching employee found.');
    }
}
