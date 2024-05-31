<?php

namespace EuDiegoBorgs\CreditCardPattern\Type;

class Number
{
    private $number;

    public function __construct(string $number)
    {
        $pattern = '/^\d{16}$/';
        if (!preg_match($pattern, $number)) {
            throw new \InvalidArgumentException('Invalid number');
        }
        $this->number = $number;
    }

    public function getMasked(): string
    {
        return substr($this->number, 0, 6) . str_repeat('*', 6) . substr($this->number, 12, 4);
    }

    public function __toString()
    {
        return $this->number;
    }

    public function getBin(): Bin
    {
        return new Bin(substr($this->number, 0, 6));
    }

    public function getLastFour(): LastFour
    {
        return new LastFour(substr($this->number, 12, 4));
    }

    public function isMasked(): bool
    {
        $pattern = '/^\d{10}\*{6}$/';
        return (bool) preg_match($pattern, $this->number);
    }
}
