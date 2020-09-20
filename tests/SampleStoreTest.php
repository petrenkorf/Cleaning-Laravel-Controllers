<?php

namespace Studies;

use PHPUnit\Framework\TestCase;

class SampleStoreTest extends TestCase
{
    /** @test **/
    public function check_fill()
    {
        $sut = (new SampleStore)->fill(['name' => 'test']);

        $this->assertEquals('test', $sut->name);
    }

    /** @test **/
    public function fill_without_checkbox_presence()
    {
        $sut = (new SampleStore)->fill([]);

        $this->assertFalse($sut->is_active);
    }
}
