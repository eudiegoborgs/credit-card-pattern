<?php

namespace Tests\Unit\Type;

use DateTime;
use EuDiegoBorgs\CreditCardPattern\Type\ValidThru;
use PHPUnit\Framework\TestCase;

class ValidThruTest extends TestCase
{
    /**
     * @dataProvider formatProvider
     */
    public function testValidThru($validThru, $expected, $completeDate)
    {
        $validThru = new ValidThru($validThru);
        $this->assertEquals($expected, (string) $validThru);
        $this->assertFalse($validThru->isExpired());
        $this->assertInstanceOf(DateTime::class, $validThru->toDateTime());
        $this->assertEquals($completeDate, $validThru->toDateTime()->format('d/m/Y'));
    }

    public static function formatProvider()
    {
        return [
            ['02/2099', '02/2099', '28/02/2099'],
            ['02/33', '02/2033', '28/02/2033'],
            ['2099-02', '02/2099', '28/02/2099'],
            ['33-02', '02/2033', '28/02/2033'],
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
        $this->expectExceptionMessage('Invalid valid thru format, use MM/YYYY, MM/YY, YYYY-MM, YY-MM.');
        new ValidThru($wrongData);
    }

    public static function wrongDataProvider()
    {
        return [
            ['02/999'],
            ['2/2099'],
            ['02/209'],
            ['02/20999'],
            ['02/2099a'],
            ['02/2099!'],
            ['02/2099%'],
            ['02/2099&'],
            ['02/2099*'],
            ['02/2099('],
            ['02/2099)'],
            ['02/2099_'],
            ['02/2099+'],
            ['02/2099='],
            ['02/2099-'],
            ['02/2099['],
            ['02/2099]'],
            ['02/2099{'],
            ['02/2099}'],
            ['02/2099:'],
            ['02/2099;'],
            ['02/2099,'],
            ['02/2099.'],
        ];
    }
}
