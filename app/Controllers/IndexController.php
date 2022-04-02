<?php
namespace App\Controllers;

use PDO;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User;
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
}