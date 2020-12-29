<?php

namespace Tests\Unit;

use App\Models\News;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     *
     *
     */
    public function testExample()
    {
        dd(News::all());
        $this->assertTrue(true);
    }
}
