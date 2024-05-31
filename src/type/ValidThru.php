<?php

namespace EuDiegoBorgs\CreditCardPattern\Type;

class ValidThru
{
    private $validThru;
    private const DEFAULT_FORMAT = 'm/Y';
    private $format = self::DEFAULT_FORMAT;

    public function __construct($validThru)
    {
        if (! $this->isValidFormat($validThru)) {
            throw new \InvalidArgumentException('Invalid valid thru format, use MM/YYYY, MM/YY, YYYY-MM, YY-MM.');
        }
        $this->validThru = $validThru;
    }

    public function __toString()
    {
        return $this->toDateTime()->format(self::DEFAULT_FORMAT);
    }

    public function isExpired(): bool
    {
        $now = new \DateTime();
        return $now->format('Ym') > $this->toDateTime()->format('Ym');
    }

    public function toDateTime()
    {
        return \DateTime::createFromFormat('!' . $this->format, $this->validThru)
            ->modify('last day of this month');
    }

    private function isValidFormat($validThru)
    {
        $patternsAndFormats = [
            '/^(0[1-9]|1[0-2])\/\d{4}$/' => 'm/Y',
            '/^(0[1-9]|1[0-2])\/\d{2}$/' => 'm/y',
            '/^\d{4}-(0[1-9]|1[0-2])$/' => 'Y-m',
            '/^\d{2}-(0[1-9]|1[0-2])$/' => 'y-m',
        ];

        foreach ($patternsAndFormats as $pattern => $format) {
            if (preg_match($pattern, $validThru)) {
                $this->format = $format;
                return true;
            }
        }

        return false; // or throw an exception if no match is found
    }
}
