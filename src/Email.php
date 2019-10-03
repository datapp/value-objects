<?php

declare (strict_types=1);

namespace Datapp\Value;

class Email implements ValueInterface
{

    /** @var string */
    private $email;

    /**
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->ensureEmailIsValid($email);
        $this->email = $email;
    }

    /**
     * @param string $email
     * @throws InvalidEmailException
     */
    private function ensureEmailIsValid(string $email)
    {
        if (filter_var($email, \FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidEmailException;
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return mb_substr($this->email, strrpos($this->email, '@') + 1 ?: 0);
    }

    /**
     * @param Email $email
     * @return bool
     */
    public function equals(Email $email): bool
    {
        return $this->email === (string) $email;
    }

}
