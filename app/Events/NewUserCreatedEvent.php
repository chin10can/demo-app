<?php

namespace App\Events;

/**
 * [Event will be triggered when a new user is created]
 */
class NewUserCreatedEvent
{
    public $testString;
   public function __construct(string $testString)
   {
       $this->testString = $testString;
   }

    
}