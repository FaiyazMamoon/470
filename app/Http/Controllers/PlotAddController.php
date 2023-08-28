<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;
use App\Models\Crop;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
class PlotAddController extends Controller
{
    public function index(Request $request)
    {
        $selectedAction = $request->input('selectedAction', 'add'); // Default to 'add' action
        $plotNumbers = Plot::where('user_id', auth()->user()->id)->pluck('plot_number', 'id');
        
        // Fetch crop names based on authenticated user and selected plot number
        $selectedPlotNumber = $request->input('updatePlotNumber');
        $cropNames = [];
        if ($selectedPlotNumber) {
            $cropNames = Crop::where('plot_id', $selectedPlotNumber)
                ->whereHas('plot', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                })
                ->pluck('name', 'id');
        }

        return view('plot_add', compact('selectedAction', 'plotNumbers', 'cropNames'));
    }

    
    public function addPlot(Request $request)
    {
        $validatedData = $request->validate([
            'plotNumber' => 'required|string|unique:plots,plot_number,NULL,id,user_id,' . auth()->user()->id,
            'location' => 'required|string',
            'numCrops' => 'required|integer|min:1', // Validate that at least one crop is added
        ], [
            'required' => 'One or more fields are missing.',
            'unique' => 'Plot number already exists!',
            'numCrops.min' => 'At least one crop detail is required.',
        ]);
    
        $plot = new Plot();
        $plot->user_id = auth()->user()->id;
        $plot->plot_number = $request->input('plotNumber');
        $plot->location = $request->input('location');
        $plot->save();
    
        $numCrops = intval($request->input('numCrops'));
    
        for ($i = 1; $i <= $numCrops; $i++) {
            $crop = new Crop();
            $crop->plot_id = $plot->id;
            $crop->name = $request->input("cropName$i");
            $crop->plantation_date = $request->input("plantationDate$i");
            $crop->harvest_date = $request->input("harvestDate$i");
            $crop->save();
        }
    
        return redirect()->back()->with('successAdd', 'Plot and crop details added successfully.');
    }
    public function getCropsForPlot($plotNumber)
    {
        $user = auth()->user();

        $plot = Plot::where('user_id', $user->id)
            ->where('plot_number', $plotNumber)
            ->first();

        if ($plot) {
            $crops = Crop::where('plot_id', $plot->id)->get();
            return new JsonResponse($crops);
        }

        return new JsonResponse([]); 
    }
    public function updatePlot(Request $request)
    {
        $validatedData = $request->validate([
            'updatePlotNumber' => 'required|string',
            'updateLocation' => 'required|string',
            'updateCrop' => 'nullable|exists:crops,id',
        ], [
            'required' => 'One or more fields are missing.',
            'updateCrop.exists' => 'Selected crop does not exist.',
        ]);
    
        $user = auth()->user();
        $plotNumber = $request->input('updatePlotNumber');
        $location = $request->input('updateLocation');
        $plot = Plot::where('user_id', $user->id)
            ->where('plot_number', $plotNumber)
            ->first();
    
        if ($plot) {
            $plot->plot_number = $request->input('updatePlotNumber');
            $plot->location = $request->input('updateLocation');
            $plot->save();
            $cropId = $request->input('updateCrop');
            $crop = Crop::find($cropId);
    
            if ($crop && $crop->plot_id === $plot->id) {
                Log::info('Updating crop: ' . $crop->id . ' - ' . $crop->name); // Add this line
                if ($request->filled('updateCropName')) {
                    $crop->name = $request->input('updateCropName');
                }
                if ($request->filled('updatePlantationDate')) {
                    $crop->plantation_date = $request->input('updatePlantationDate');
                }
                if ($request->filled('updateHarvestDate')) {
                    $crop->harvest_date = $request->input('updateHarvestDate');
                }
                $crop->save();
            }
    
            return redirect()->back()->with('successUp', 'Plot details updated successfully.');
        }
    
        return redirect()->back()->with('errorMat', 'No matching plot found.');
    }
    

    public function deletePlot(Request $request)
    {
        $validatedData = $request->validate([
            'deleteOption' => 'required|string',
        ], [
            'required' => 'Please select a delete option.',
        ]);

        $user = auth()->user();

        if ($request->input('deleteOption') === 'whole') {
            $plotNumber = $request->input('deletePlotNumber');

            $plot = Plot::where('user_id', $user->id)
                ->where('plot_number', $plotNumber)
                ->first();

            if ($plot) {
                Crop::where('plot_id', $plot->id)->delete();
                $plot->delete();
                return redirect()->back()->with('successPlt', 'Plot and associated crops deleted successfully.');
            } else {
                return redirect()->back()->with('errorPlt', 'No matching plot found.');
            }
        } elseif ($request->input('deleteOption') === 'crop') {
            $plotNumber = $request->input('deletePlotNumberCrop');
            $cropName = $request->input('deleteCropName');
    
            $plot = Plot::where('user_id', $user->id)
                ->where('plot_number', $plotNumber)
                ->first();
    
            if ($plot) {
                $crop = Crop::where('plot_id', $plot->id)
                    ->where('name', $cropName)
                    ->first();
    
                if ($crop) {
                    $crop->delete();
                    return redirect()->back()->with('successCrp', 'Crop information deleted successfully.');
                } else {
                    return redirect()->back()->with('errorCrp', 'No matching crop found.');
                }
            } else {
                return redirect()->back()->with('errorPlt', 'No matching plot found.');
            }
        }

        return redirect()->back()->with('errorMat', 'Invalid delete option.');
    }

}
