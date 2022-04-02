<?php
namespace App\Listeners;

use App\Events\NewUserCreatedEvent;
use League\Event\Listener;

/**
 * [When a new user is created, NewUserCreatedEvent will be triggered, to which this listener is subscribed to and in turn it will be invoed]
 */
class NewUserCreatedListener implements Listener
{
   /**
    * @param object $event
    * 
    * @return void
    */
   public function __invoke(object  $event):void
   {
       //All the jobs here can be queued, sent to a queue, sent to a service, etc.
       echo $event->testString;
   }
}