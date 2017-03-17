<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SeederTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     use DatabaseTransactions;
     public function testLinksTable(){
        factory(\App\Link::class)->create([
            'title' => 'cruddco.com',
        ]);
        $this->assertDatabaseHas('links', ['title' => 'cruddco.com']);
     }
}