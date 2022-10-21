<?php

namespace Tests\Unit;


use PHPUnit\Framework\TestCase;

class BFSTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testBFS()
    {
        $bfs =  $this->action('GET','ProfileController@getShortestPath');

        $Graph = [
            'A' => ['B', 'C'],
            'B' => ['A', 'D'],
            'D' => ['B', 'E'],
            'C' => ['A', 'E'],
            'E' => ['C', 'B', 'D'],
        ];

        $this->assertEquals($bfs($Graph, 'A', 'D'), ['A', 'B', 'D']);
        $this->assertEquals($bfs($Graph, 'A', 'E'), ['A', 'C', 'E']);
        $this->assertFalse($bfs($Graph, 'A', 'F'));
    }
}
