<?php

namespace EuDiegoBorgs\CreditCardPattern\Type;

class Bin
{
    private string $bin;

    public function __construct(string $bin)
    {
        $pattern = '/^\d{6}$/';
        if (!preg_match($pattern, $bin)) {
            throw new \InvalidArgumentException('Bin must have 6 digits');
        }
        $this->bin = $bin;
    }

    public function __toString()
    {
        return $this->bin;
    }
}
