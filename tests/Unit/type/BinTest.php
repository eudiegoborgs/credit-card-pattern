<?php

namespace Tests\Unit\Type;

use EuDiegoBorgs\CreditCardPattern\Type\Bin;
use PHPUnit\Framework\TestCase;

class BinTest extends TestCase
{
    /**
     * @dataProvider wrongDataProvider
     *
     * @return void
     */
    public function testWrongData($wrongData)
    {
        $this->expectException(\InvalidArgumentException::class);
        new Bin($wrongData);
    }

    public static function wrongDataProvider()
    {
        return [
            ['012'],
            ['0123'],
            ['01234'],
            ['01234a'],
            ['01234!'],
            ['01234%'],
            ['01234&'],
            ['01234*'],
            ['01234('],
            ['01234)'],
            ['01234_'],
            ['01234+'],
            ['01234='],
            ['01234-'],
            ['01234['],
            ['01234]'],
            ['01234{'],
            ['01234}'],
            ['01234:'],
            ['01234;'],
            ['01234,'],
            ['01234.'],
        ];
    }
}
