<?php
namespace App\Services;
use App\Models\Vehicle;
use App\Repositories\VehicleRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;
use InvalidArgumentException;

class VehicleService
{
    protected $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository) 
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function saveVehicleData($data) 
    {
        $validator = Validator::make($data, [
            'manufacturer'=>'required',
            'series'=>'required',
            'releaseYear'=>'required',
            'numOfTires'=>'required',
            'machine'=>'required',
            'transmissionType'=>'required',
            'color'=>'required',
            'price'=>'required',
            'stock'=>'required',
        ]);
        
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
       
        $result = $this->vehicleRepository->saveVehicle($data);

        return $result;
    }
    
    public function getVehicle($id)
    {
        $result = $this->vehicleRepository->getVehicle($id);

        return $result;
    }

    public function getVehicles()
    {
        $result = $this->vehicleRepository->getVehicles();

        return $result;
    }


    public function getVehiclesWithStock($numOfTires)
    {
        
        if ($numOfTires != Vehicle::MOTORCYCLE && $numOfTires != Vehicle::CAR) {
            $numOfTires = '';
        }

        $result = $this->vehicleRepository->getVehiclesWithStock($numOfTires);

        return $result;
    }
}
?>