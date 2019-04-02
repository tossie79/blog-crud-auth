<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase {

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest() {
//        $this->assertTrue(true);
        //Given I have 2 records in the DB that are posts and each one is  posted a month apart
        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);
        //When I fetch the archives
        $posts = Post::archives();
       
        //Then the response should be in the proper format ( create the assertion)
//        $this->assertCount(2, $posts);
        $this->assertEquals([
            0 => [
                "year_created" => $first->created_at->format('Y'),
                "month_created" => $first->created_at->format('F'),
                "published" => 1
            ],
            1 => [
                "year_created" => $second->created_at->format('Y'),
                "month_created" => $second->created_at->format('F'),
                "published" => 1
            ]
        ],$posts);
    }

}
