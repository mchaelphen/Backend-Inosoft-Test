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
        $vehicle->numOfTires = $data['numOfTires'];
        $vehicle->machine = $data['machine'];
        $vehicle->transmissionType = $data['transmissionType'];
        $vehicle->passengerSeat = $data['passengerSeat'];
        $vehicle->color = $data['color'];
        $vehicle->price = $data['price'];
        $vehicle->stock = $data['stock'];
        $vehicle->save();

        return $vehicle->fresh();
    }
    
    public function getVehicle($id)
    {
        $vehicle = Vehicle::where('_id', '=', $id)->first();

        return $vehicle;
    }

    public function getVehicles()
    {
        $vehicles = Vehicle::all();

        return $vehicles;
    }

    public function getVehiclesWithStock($numOfTires)
    {
        $vehicle = Vehicle::all()->where('stock', '>', 0);
        
        if ($numOfTires != '') {
            $vehicle = $vehicle->where('numOfTires', '=', $numOfTires);
        }
        
        return $vehicle;
    }
}
?>