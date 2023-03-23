<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */


    public function test_that_true_is_true()
    {
        $response= $this->call('post','/login',[
          'email'=>'venkata@gmail.com',
          'password'=>'venkata@5',
        ]);
         $response=$this->call('post','/employees/store',[
            'employeeID' => '50',
            'first_name' => 'Manju',
            'last_name' => 'Dhara',
            'start_date' => '2023-02-27',
            'skills' => 'php developer',
        ]);
         dd($response);
         $this->assertTrue(true); 
        /* $response->assertStatus($response->status(),302);*/
    }
}

