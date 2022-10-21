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
            'D' => ['B'],
            'C' => ['A',],
        ];

        $this->assertTrue($bfs($Graph, 'A', 'D'));
        $this->assertFalse($bfs($Graph, 'A', 'F'));
    }
}
