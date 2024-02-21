<?php

namespace App\Http\Controllers;

use App\Models\LocationPrueba;
use Illuminate\Http\Request;

class LocationPruebaController extends Controller
{
    //
    public function contarFilasCveZona(Request $request)
    {
        $count = LocationPrueba::where('CveZona', 12)->count();

        return response()->json(['count' => $count]);
    }

    /**
     * showLocations function
     */
    public function showLocations()
    {
        $locations = LocationPrueba::take(10)->get();

        return view('locations.index', compact('locations'));
    }

    public function obtenerCantidadRegistros(Request $request, $cantidad)
    {
        $registros = LocationPrueba::take($cantidad)->get();

        return response()->json(['registros' => $registros]);
    }
}
