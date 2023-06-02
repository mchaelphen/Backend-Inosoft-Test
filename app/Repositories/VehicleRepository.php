<?php
namespace App\Repositories;
use App\Models\Vehicle;

class VehicleRepository
{

    public function saveVehicle($data) 
    {
        $vehicle = new Vehicle;
        
        $vehicle->manufacturer = $data['manufacturer'];
        $vehicle->series = $data['series'];
        $vehicle->releaseYear = $data['releaseYear'];
        $vehicle->color = $data['color'];
        $vehicle->price = $data['price'];
        $vehicle->stock = $data['stock'];
        
        $vehicle->save();

        return $vehicle->fresh();
    }

    public function getVehicles()
    {
        $vehicles = Vehicle::all();

        return $vehicles;
    }

    public function getVehicle($id)
    {
        $vehicle = Vehicle::where('_id', '=', $id)->first();

        return $vehicle;
    }
}
?>