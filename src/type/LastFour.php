<?php

namespace EuDiegoBorgs\CreditCardPattern\Type;

class LastFour
{
    private string $lastFour;

    public function __construct(string $lastFour)
    {
        $pattern = '/^\d{4}$/';
        if (!preg_match($pattern, $lastFour)) {
            throw new \InvalidArgumentException('Last four must have 4 digits');
        }
        $this->lastFour = $lastFour;
    }

    public function __toString()
    {
        return $this->lastFour;
    }
}
