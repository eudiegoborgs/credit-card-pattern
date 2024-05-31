<?php

namespace Tests\Unit\Type;

use DateTime;
use EuDiegoBorgs\CreditCardPattern\Type\Bin;
use EuDiegoBorgs\CreditCardPattern\Type\LastFour;
use EuDiegoBorgs\CreditCardPattern\Type\Number;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    public function testNumber()
    {
        $number = new Number('0123456789012345');
        $this->assertEquals('0123456789012345', (string) $number);
        $this->assertInstanceOf(Bin::class, $number->getBin());
        $this->assertEquals('012345', (string) $number->getBin());
        $this->assertInstanceOf(LastFour::class, $number->getLastFour());
        $this->assertEquals('2345', (string) $number->getLastFour());
        $this->assertFalse($number->isMasked());
        $this->assertEquals('012345******2345', $number->getMasked());   
    }

    /**
     * @dataProvider wrongDataProvider
     *
     * @return void
     */
    public function testWrongCardNumberData($wrongData)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid number');
        new Number($wrongData);
    }

    public static function wrongDataProvider()
    {
        return [
            ['012345678901234'],
            ['01234567890123456'],
            ['012345678901234a'],
            ['012345678901234!'],
            ['012345678901234%'],
            ['012345678901234&'],
            ['012345678901234*'],
            ['012345678901234('],
            ['012345678901234)'],
            ['012345678901234_'],
            ['012345678901234+'],
            ['012345678901234='],
            ['012345678901234-'],
            ['012345678901234['],
            ['012345678901234]'],
            ['012345678901234{'],
            ['012345678901234}'],
            ['012345678901234:'],
            ['012345678901234;'],
            ['012345678901234,'],
            ['012345678901234.'],
            ['012345678901234<'],
            ['012345678901234>'],
            ['012345678901234?'],
            ['012345678901234/'],
            ['012345678901234\\'],
            ['012345678901234|'],
            ['012345678901234`'],
            ['012345678901234~'],
            ['012345678901234@'],
            ['012345678901234#'],
            ['012345678901234$'],
            ['012345678901234^'],
        ];
    }
}
