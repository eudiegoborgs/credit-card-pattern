<?php

namespace EuDiegoBorgs\CreditCardPattern\Type;

class HolderName
{
    private string $holderName;

    public function __construct($holderName)
    {
        $pattern = '/^[a-zA-Z ]{2,}$/';
        if (!preg_match($pattern, $holderName)) {
            throw new \InvalidArgumentException('Holder name must have at least 2 letters');
        }
        $this->holderName = $holderName;
    }

    public function __toString()
    {
        return $this->holderName;
    }
}
