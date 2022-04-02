<?php
//unit test for user controller that

namespace App\Tests\Unit;
use Tests\TestCase;
use App\Controllers\IndexController;
use App\Models\User;
class UserUnitTest extends TestCase
{
    
    /**
     *[Test to get all the users]
     */
    public function testGetAll()
    {
        $app = $this->getAppInstance();
        $controller = new IndexController();
        $users = $controller->getAll();
        $this->assertEquals(['users' => User::all()->toJson()], $users['data']);
        
    }
    /**
     * [Test to get one user]
     */
    public function testGetOne()
    {
        $controller = new IndexController();
        $user = $controller->getOne(1);
        $this->assertEquals(['user' => User::find(1)->toJson()], $user['data']);
    }
    /**
     *[Test to check the shipemnts of user are retrieved correctly]
     */
    public function testShipmentOfUser()
    {
        $controller = new IndexController();
        $userId = 1;
        $user = $controller->getUserWithShipments($userId);
        $this->assertEquals(12, json_decode($user['data'],true)['shipments'][0]['weight']);
    }
}