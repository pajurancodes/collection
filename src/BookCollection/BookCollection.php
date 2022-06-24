<?php

namespace PajuranCodes\Collection\BookCollection;

use function count;
use function array_pop;
use function array_shift;
use function array_unshift;
use function array_key_exists;
use PajuranCodes\Collection\BookCollection\{
    BookInterface,
    BookCollectionInterface,
};

/**
 * A collection of objects of type BookInterface.
 * 
 * This class serves as an example for creating 
 * new collections of objects of various types.
 * 
 * @author pajurancodes
 */
class BookCollection implements BookCollectionInterface {

    /**
     * A list of books.
     * 
     * @var BookInterface[]
     */
    private array $books = [];

    /**
     * @inheritDoc
     */
    public function get(int|string $key): ?BookInterface {
        return $this->exists($key) ? $this->books[$key] : null;
    }

    /**
     * @inheritDoc
     */
    public function set(int|string $key, BookInterface $book): static {
        $this->books[$key] = $book;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function push(BookInterface $book): static {
        $this->books[] = $book;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function pop(): ?BookInterface {
        return array_pop($this->books);
    }

    /**
     * @inheritDoc
     */
    public function shift(): ?BookInterface {
        return array_shift($this->books);
    }

    /**
     * @inheritDoc
     */
    public function unshift(BookInterface $book): static {
        array_unshift($this->books, $book);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function remove(int|string $key): static {
        if ($this->exists($key)) {
            unset($this->books[$key]);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function exists(int|string $key): bool {
        return array_key_exists($key, $this->books);
    }

    /**
     * @inheritDoc
     */
    public function all(): array {
        return $this->books;
    }

    /**
     * @inheritDoc
     */
    public function clear(): static {
        $this->books = [];
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
        return count($this->books);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): \Traversable {
        return new \ArrayIterator($this->books);
    }

}
