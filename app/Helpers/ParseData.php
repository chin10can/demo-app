<?php
namespace App\Helpers;
use JsonSchema\Validator;

class ParseData
{
    public static function parseData(array $responseSchema,array $responseData,array $requestSchema):array
    {
        $validator = new Validator();
        $validator->check($responseData, $responseSchema);
        if ($validator->isValid()) {
            return self::formatData($responseData,$requestSchema);
        } else {
            return [];
        }
    }
    public static function formatData($responsedata,$requiredFormat) 
    {
        $tempData = [];
        foreach ($requiredFormat as $key => $value) {
            $tempNames =  self::parseRule($value['rule']);
            if(count($tempNames) > 0) {
                foreach ($tempNames as $tempName) {
                   $value['rule'] = preg_replace('/{'.$tempName.'}/', $responsedata[$tempName], $value['rule']);
                }
            }
            $tempData[$key] = $value['rule'];
        }
        return $tempData;
    }
    public static function parseRule($rule) 
    {
            $length = strlen($rule);
            $stack  = [];
            $result = [];
            for($i=0; $i < $length; $i++) {
          
               if($rule[$i] == '{') {
                  $stack[] = $i;
               }
               if($rule[$i] == '}') {
                  $open = array_pop($stack);
                  $result[] = substr($rule,$open+1, $i-$open-1);
               }
            }
            return $result;
    }
}