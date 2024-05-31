<?php

namespace Tests\Unit\Type;

use EuDiegoBorgs\CreditCardPattern\Type\CVV;
use PHPUnit\Framework\TestCase;

class CVVTest extends TestCase
{
    /**
     * @dataProvider wrongDataProvider
     *
     * @return void
     */
    public function testWrongData($wrongData)
    {
        $this->expectException(\InvalidArgumentException::class);
        new CVV($wrongData);
    }

    public static function wrongDataProvider()
    {
        return [
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
