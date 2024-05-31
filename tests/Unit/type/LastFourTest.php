<?php

namespace Tests\Unit\Type;

use EuDiegoBorgs\CreditCardPattern\Type\LastFour;
use PHPUnit\Framework\TestCase;

class LastFourTest extends TestCase
{
    /**
     * @dataProvider wrongDataProvider
     *
     * @return void
     */
    public function testWrongData($wrongData)
    {
        $this->expectException(\InvalidArgumentException::class);
        new LastFour($wrongData);
    }

    public static function wrongDataProvider()
    {
        return [
            ['012'],
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
