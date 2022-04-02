<?php
namespace App\Controllers;

use PDO;
use App\Models\Shipments;
class ShipmentController
{   
    public function getAll()
    {
        return [
            'status' => 'success',
            'message' => 'Here are all the shipments',
            'data' => ['shipments' => Shipments::all()->toJson()]
        ];
    }
    public function getUserForShipment($id)
    {
        $shipment = Shipments::find($id);
        if ($shipment) {
            return [
                'status' => 'success',
                'message' => 'Here is the shipment',
                'data' => ['user' => $shipment->users()->first()->toJson()] //models relationship
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Shipment not found',
                'data' => []
            ];
        }
    }
}