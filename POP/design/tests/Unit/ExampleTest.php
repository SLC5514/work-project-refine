<?php

namespace Tests\Unit;

use App\Models\News;
use Carbon\Carbon;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $news = News::findOrFail(1);
        $data = $news->toArray();
        dd($news->content());
        $data['content'] = $news->content['content'];
        $a = News::with('content')->findOrFail(1)->toArray();
        dd($a);

        $this->assertTrue(true);
    }
}
