<?php
namespace App\Controllers;

use PDO;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class IndexController
{
   
    /**
     * @return array
     */
    public function getAll():array
    {
        return [
            'status' => 'success',
            'message' => 'Here are all the users',
            'data' => ['users' => User::all()->toJson()]
        ];
    }
    /**
     * @param mixed $id
     * 
     * @return array
     */
    public function getOne($id):array
    {
        $user = User::find($id);
        if ($user) {
            return [
                'status' => 'success',
                'message' => 'Here is the user',
                'data' => ['user' => $user->toJson()]
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'User not found',
                'data' => []
            ];
        }
    }

    /**
     * @param mixed $id
     * 
     * @return array
     */
    public function getUserWithShipments($id):array
    {
        $user = User::with('shipments')->find($id); // models relationships with joins without foreign keys in the table
        if ($user) {
            return [
                'status' => 'success',
                'message' => 'Here is the user with shipments',
                'data' => $user->toJson()
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'User not found',
                'data' => []
            ];
        }
    }
    public function create($data):array
    {
        DB::beginTransaction();
        try{
            $user = User::create($data);
            DB::commit();
            return [
                'status' => 'success',
                'message' => 'User created',
                'data' => ['user' => $user->toJson()]
            ];
        }catch(\Exception $e){
            DB::rollBack();
            return [
                'status' => 'error',
                'message' => 'User not created',
                'data' => []
            ];
        }
    }
    public function update($id, $data):array
    {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            return [
                'status' => 'success',
                'message' => 'User updated',
                'data' => ['user' => $user->toJson()]
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'User not found',
                'data' => []
            ];
        }
    }
    //create user with shipment
    public function createUserWithShipment($userData,$shipmentData):array
    {
        $userData = [
            'name' => 'chintan',
            'email' => 'chintan@gmail.com',
            'password' => '123456'
        ];

        $user = User::create($userData);
        $shipment = $user->shipments()->create($shipmentData);
        if ($user && $shipment) {
            return [
                'status' => 'success',
                'message' => 'User created',
                'data' => ['user' => $user->toJson(),'shipment' => $shipment->toJson()]
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Something went wrong',
                'data' => []
            ];
        }
    }
    public function delete($id):array
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return [
                'status' => 'success',
                'message' => 'User deleted',
                'data' => []
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'User not found',
                'data' => []
            ];
        }
    }
}