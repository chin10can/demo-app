<?php
namespace App\Handlers;

use App\Helpers\ParseData;
use JsonSchema\Validator;
 use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class DataHandler
{
    public function dataHandler(Request $request, Response $response):Response
    { 
        //sample json schema
        $responseschema = [
            'type' => 'array',
            'properties' => [
                'name' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'maxLength' => 255
                ],
                'email' => [
                    'type' => 'string',
                    'format' => 'email'
                ],
                'password' => [
                    'type' => 'string',
                    'minLength' => 6,
                    'maxLength' => 255
                ],
                'phone' => [
                    'type' => 'string',
                    'minLength' => 10,
                    'maxLength' => 10
                ],
                'address1' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'maxLength' => 255
                ],
                'address2' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'maxLength' => 255
                ],
                'city' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'maxLength' => 255
                ],
            ],
            'required' => ['name', 'email', 'password', 'phone', 'address1','address2', 'city']
        ];
        //sample response data from sales channel
        $responsedata = [
            'name' => 'Chintan',
            'email' => 'chintan@gmail.com',
            'password' => '123456',
            'phone' => '1234567890',
            'address1' => '123 Main St',
            'address2' => 'Apt. 2',
            'city' => 'Regina'
        ];
        //convert response data to shipfusion format
        $requiredFormat = [
            'name' =>[
                'type' => 'string',
                'rule' => 'Mr. '.'{name}'
            ],
            'email' => [
                'type' => 'string',
                'rule' => '{email}'
            ],
            'password' => [
                'type' => 'string',
                'rule' => '{password}'
            ],
            'phone' => [
                'type' => 'string',
                'rule' => '{phone}'
            ],
            'address' => [
                'type' => 'string',
                'rule' => '{address1}'.', {address2}'
            ],
            'city' => [
                'type' => 'string',
                'rule' => '{city}'
            ],
        ];
        $responseData = ParseData::parseData($responseschema,$responsedata,$requiredFormat);
        $response->getBody()->write(json_encode($responseData));
        return $response;
    }
}