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
    
    /** @test **/
    public function fill_fields()
    {
        $sut = (new SampleStore)->fill([
            'name' => 'test',
            'is_active' => '1'
        ]);

        $this->assertEquals('test', $sut->name);
        $this->assertFalse($sut->antifraud_enabled);
        $this->assertTrue($sut->is_active);
    }
}
