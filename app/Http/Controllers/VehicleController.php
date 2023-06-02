<?php

namespace App\Http\Controllers;
use App\Services\VehicleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class VehicleController extends Controller
{
    protected $vehicleService;

    public function __construct(VehicleService $vehicleService) 
    {
        $this->vehicleService = $vehicleService;
    }

    public function getVehicle()
    {
        $result = ['status' => 200, 'message' => 'Get vehicles success'];
        try {
            $result['data'] = $this->vehicleService->getAllVehicle();
        } catch (RequestException $ex) {
            return response()->json([
                'status' => 401,
                'message' => 'Bad request',
            ]);
        }
        return response()->json($result, $result['status']);
    }

    public function getVehicleById($id)
    {
        $result = ['status' => 200, 'message' => 'Get vehicle success'];
        try {
            $result['data'] = $this->vehicleService->getVehicle($id);
        } catch (RequestException $ex) {
            return response()->json([
                'status' => 401,
                'message' => 'Bad request'
            ]);
        }
        return response()->json($result, $result['status']);
    }

    public function createVehicle(Request $request, Response $response) 
    {
        $result = ['status' => 201, 'message' => 'Vehicle created successfully'];
        $data = $request->only([
            'manufacturer',
            'series',
            'releaseYear',
            'color',
            'price',
            'stock'
        ]);

        try {
            $result['data'] = $this->vehicleService->saveVehicleData($data);
        } catch (Exception $e) {
            $result = ['status' => 401, 'message' => 'Bad request'];
            
            return response()->json([
                'status' => 401,
                'message' => 'Bad request',
            ], $result['status']);
        }

        return response()->json($result, $result['status']);
    }
}