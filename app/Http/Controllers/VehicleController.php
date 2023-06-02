<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    public function getVehicle()
    {
        try {
            $vehicles = Vehicle::all();

            return response()->json([
                'status' => 200,
                'data' => $vehicles,
                'message' => 'Fetch all vehicles',
                'success' => true
            ]);
        } catch (RequestException $ex) {
            return response()->json([
                'status' => 401,
                'message' => 'Bad request',
                'success' => false
            ]);
        }
    }

    public function createVehicle(Request $request, Response $response) {
        $validator = Validator::make($request->all(), [
            'manufacturer'=>'required',
            'series'=>'required',
            'releaseYear'=>'required',
            'color'=>'required',
            'price'=>'required',
            'stock'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => $validator->messages()->first(),
                'success' => false
            ]);
       }

        $vehicle = new Vehicle;
        
        $vehicle->manufacturer = $request->manufacturer;
        $vehicle->series = $request->series;
        $vehicle->releaseYear = $request->releaseYear;
        $vehicle->color = $request->color;
        $vehicle->price = $request->price;
        $vehicle->stock = $request->stock;

        try {
            $vehicle->save();
            return response()->json([
                'status' => 201,
                'message' => 'Vehicle created successfully',
                'success' => true
            ], 201);
        } catch (RequestException $ex) {
            return response()->json([
                'status' => 401,
                'message' => 'Bad request',
                'success' => false
            ], 401);
        }
    //    return Product::create($request->all());
    }
}