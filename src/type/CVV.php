<?php

namespace EuDiegoBorgs\CreditCardPattern\Type;

class CVV
{
    private $cvv;

    public function __construct(string $cvv)
    {
        $pattern = '/^\d{3,4}$/';
        if (!preg_match($pattern, $cvv)) {
            throw new \InvalidArgumentException('CVV must have 3 or 4 digits');
        }
        $this->cvv = $cvv;
    }

    public function __toString()
    {
        return $this->cvv;
    }
}
