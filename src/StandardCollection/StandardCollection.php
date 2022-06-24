<?php

namespace PajuranCodes\Collection\StandardCollection;

use function count;
use function array_pop;
use function array_shift;
use function array_unshift;
use function array_key_exists;
use PajuranCodes\Collection\StandardCollection\StandardCollectionInterface;

/**
 * A collection of values of type string|int|float|bool|null|object|array.
 * 
 * This class serves as an example for creating 
 * new collections of values of various types.
 * 
 * @author pajurancodes
 */
class StandardCollection implements StandardCollectionInterface {

    /**
     * A list of values.
     * 
     * @var (string|int|float|bool|null|object|array)[]
     */
    private array $data = [];

    /**
     * @inheritDoc
     */
    public function get(int|string $key, mixed $default = null): mixed {
        return $this->exists($key) ? $this->data[$key] : $default;
    }

    /**
     * @inheritDoc
     */
    public function set(int|string $key, string|int|float|bool|null|object|array $value): static {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function push(string|int|float|bool|null|object|array $value): static {
        $this->data[] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function pop(): string|int|float|bool|null|object|array {
        return array_pop($this->data);
    }

    /**
     * @inheritDoc
     */
    public function shift(): string|int|float|bool|null|object|array {
        return array_shift($this->data);
    }

    /**
     * @inheritDoc
     */
    public function unshift(string|int|float|bool|null|object|array $value): static {
        array_unshift($this->data, $value);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function remove(int|string $key): static {
        if ($this->exists($key)) {
            unset($this->data[$key]);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function exists(int|string $key): bool {
        return array_key_exists($key, $this->data);
    }

    /**
     * @inheritDoc
     */
    public function all(): array {
        return $this->data;
    }

    /**
     * @inheritDoc
     */
    public function clear(): static {
        $this->data = [];
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function isEmpty(): bool {
        return !($this->count() > 0);
    }

    /**
     * @inheritDoc
     */
    public function count(): int {
        return count($this->data);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): \Traversable {
        return new \ArrayIterator($this->data);
    }

}
