<?php

namespace Tests\Unit\Type;

use EuDiegoBorgs\CreditCardPattern\Type\CreditCard;
use PHPUnit\Framework\TestCase;

class CreditCardTest extends TestCase
{
    public function testCreditCard()
    {
        $creditCard = new CreditCard('Sherlock Holmes', '02/2099', '123', '0123456789012345'); 
        $this->assertEquals('Sherlock Holmes', $creditCard->getHolderName());
        $this->assertEquals('0123456789012345', (string) $creditCard->getNumber());
        $this->assertEquals('02/2099', (string) $creditCard->getValidThru());
        $this->assertEquals('123', (string) $creditCard->getCVV());
        $this->assertEquals('012345', (string) $creditCard->getBin());
        $this->assertEquals('2345', (string) $creditCard->getLastFour());
        $this->assertEquals(json_encode([
            'holderName' => 'Sherlock Holmes',
            'validThru' => '02/2099',
            'cvv' => '123',
            'number' => '0123456789012345',
            'bin' => '012345',
            'lastFour' => '2345',
        ]), $creditCard->toJson());
    }
}
