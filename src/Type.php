<?php

declare(strict_types=1);

namespace StdLibrary\TypeGuard;

use TypeError;

/**
 * @internal
 *
 * @template TVariable
 */
final readonly class Type
{
    /**
     * Create a new type instance.
     *
     * @param  TVariable  $variable
     */
    public function __construct(private mixed $variable)
    {
        //
    }

    /**
     * Asserts and narrow down the type to the given type.
     *
     * @template TAs of object
     *
     * @phpstan-assert-if-true TAs $this->variable
     *
     * @param  class-string<TAs>  $type
     * @return TAs
     */
    public function as(string $type): mixed
    {
        if (! is_object($this->variable) || ! $this->variable instanceof $type) {
            throw new TypeError('Variable is not a '.$type.'.');
        }

        return $this->variable;
    }

    /**
     * Asserts and narrow down the type to string.
     *
     * @phpstan-assert-if-true string $this->variable
     */
    public function asString(): string
    {
        if (! is_string($this->variable)) {
            throw new TypeError('Variable is not a string.');
        }

        return $this->variable;
    }

    /**
     * Asserts and narrow down the type to integer.
     *
     * @phpstan-assert-if-true int $this->variable
     */
    public function asInt(): int
    {
        if (! is_int($this->variable)) {
            throw new TypeError('Variable is not an integer.');
        }

        return $this->variable;
    }
}
