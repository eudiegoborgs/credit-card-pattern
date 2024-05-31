<?php

namespace Tests\Unit\Type;

use EuDiegoBorgs\CreditCardPattern\Type\HolderName;
use PHPUnit\Framework\TestCase;

class HolderNameTest extends TestCase
{
    /**
     * @dataProvider correctlyDataProvider
     *
     * @return void
     */
    public function testCorrectlyData($correctlyData)
    {
        $c = new HolderName($correctlyData);
        $this->assertEquals($correctlyData, (string) $c);
    }

    public static function correctlyDataProvider()
    {
        return [
            ['Diego B Ferreira'],
            ['Su Kim'],
            ['Mr Egg'],
            ['Tales Beirado'],
        ];
    }

    /**
     * @dataProvider wrongDataProvider
     *
     * @return void
     */
    public function testWrongData($wrongData)
    {
        $this->expectException(\InvalidArgumentException::class);
        new HolderName($wrongData);
    }

    public static function wrongDataProvider()
    {
        return [
            ['A'],
            ['1'],
            ['A1'],
            ['A1A'],
        ];
    }
}
