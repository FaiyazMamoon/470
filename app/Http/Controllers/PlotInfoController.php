<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plot;

class PlotInfoController extends Controller
{
    public function index()
    {
        return view('plot_info');
    }

    public function search(Request $request)
    {
        $plotNumber = $request->input('plotNumber');
        $location = $request->input('location');
        
        $query = Plot::query();
        $query->where('user_id', auth()->id());

        if ($plotNumber) {
            $query->where('plot_number', $plotNumber);
        }

        if ($location) {
            $query->where('location', 'LIKE', "%$location%");
        }

        $matchingPlots = $query->get();

        if ($matchingPlots->isEmpty()) {
            return view('plot_info', ['noMatch' => true]);
        }

        return view('plot_info', ['matchingPlots' => $matchingPlots]);
    }
}
