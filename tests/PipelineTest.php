<?php

use Gnumast\CallablePipe;
use Gnumast\Pipeline;

/**
 * Class PipelineTest
 */
class PipelineTest extends PHPUnit_Framework_TestCase
{

    public function testWithExtendingClasses()
    {
        $pipeline = new Pipeline(
            new MakeCapitals(),
            new RemoveSpaces()
        );

        $result = $pipeline->execute("a b c d e f g");
        $this->assertEquals("ABCDEFG", $result);
    }

    public function testWithCallable()
    {
        $pipeline = new Pipeline(
            new CallablePipe(function ($data) {
                return $data * 10;
            }),
            new CallablePipe(function ($data) {
                return $data + 50;
            })
        );

        $result = $pipeline->execute(10);
        $this->assertEquals(150, $result);
    }

}