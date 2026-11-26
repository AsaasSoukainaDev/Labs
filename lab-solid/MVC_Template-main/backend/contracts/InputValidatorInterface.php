<?php

interface InputValidatorInterface
{
    /** @throws InvalidArgumentException */
    public function validate(array $input): void;
}
