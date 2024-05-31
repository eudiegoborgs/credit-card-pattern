<?php

namespace EuDiegoBorgs\CreditCardPattern\Type;

class CreditCard
{
    private HolderName $holderName;
    private ValidThru $validThru;
    private CVV $cvv;
    private Number $number;

    public function __construct($holderName, $validThru, $cvv, $number)
    {
        $this->cvv = new CVV($cvv);
        $this->number = new Number($number);
        $this->holderName = new HolderName($holderName);
        $this->validThru = new ValidThru($validThru);
    }

    public function getBin(): Bin
    {
        return $this->number->getBin();
    }

    public function getLastFour(): LastFour
    {
        return $this->number->getLastFour();
    }

    public function getHolderName(): HolderName
    {
        return $this->holderName;
    }

    public function getValidThru(): ValidThru
    {
        return $this->validThru;
    }

    public function isExpired(): bool
    {
        return !$this->validThru->isExpired();
    }

    public function getCVV(): CVV
    {
        return $this->cvv;
    }

    public function getNumber(): Number
    {
        return $this->number;
    }

    public function toArray(): array
    {
        return [
            'holderName' => (string) $this->holderName,
            'validThru' => (string) $this->validThru,
            'cvv' => (string) $this->cvv,
            'number' => (string) $this->number,
            'bin' => (string) $this->getBin(),
            'lastFour' => (string) $this->getLastFour(),
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
