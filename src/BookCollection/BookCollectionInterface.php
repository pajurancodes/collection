<?php

namespace PajuranCodes\Collection\BookCollection;

use PajuranCodes\Collection\BookCollection\BookInterface;

/**
 * An interface to a collection of objects of type BookInterface.
 *
 * @author pajurancodes
 */
interface BookCollectionInterface extends \Countable, \IteratorAggregate {

    /**
     * Get a book from the collection.
     * 
     * @param int|string $key A key.
     * @return BookInterface|null The found book or null.
     */
    public function get(int|string $key): ?BookInterface;

    /**
     * Set a book in the collection.
     * 
     * @param int|string $key A key.
     * @param BookInterface $book A book.
     * @return static
     */
    public function set(int|string $key, BookInterface $book): static;

    /**
     * Push a book onto the end of the collection.
     * 
     * @param BookInterface $book A book.
     * @return static
     */
    public function push(BookInterface $book): static;

    /**
     * Pop and return the last book in the collection.
     * 
     * The collection will be shortened by one element.
     * 
     * @return BookInterface|null The last book, or null if the collection is empty.
     */
    public function pop(): ?BookInterface;

    /**
     * Shift a book off the beginning of the collection.
     * 
     * @return BookInterface|null The shifted book, or null if the collection is empty.
     */
    public function shift(): ?BookInterface;

    /**
     * Prepend a book to the beginning of the collection.
     * 
     * @param BookInterface $book A book.
     * @return static
     */
    public function unshift(BookInterface $book): static;

    /**
     * Remove a book from the collection.
     * 
     * @param int|string $key A key.
     * @return static
     */
    public function remove(int|string $key): static;

    /**
     * Check if a book exists in the collection.
     * 
     * @param int|string $key A key.
     * @return bool True if the specified key exists, or false otherwise.
     */
    public function exists(int|string $key): bool;

    /**
     * Get all books from the collection.
     * 
     * @return BookInterface[] All books in the collection.
     */
    public function all(): array;

    /**
     * Remove all books from the collection.
     * 
     * @return static
     */
    public function clear(): static;

    /**
     * Check if the collection is empty.
     * 
     * @return bool True if the collection is empty, or false otherwise.
     */
    public function isEmpty(): bool;

    /**
     * Count the books in the collection.
     *
     * @return int Number of books in the collection.
     */
    public function count(): int;

    /**
     * Get an iterator to iterate through the collection.
     *
     * @return \Traversable The books iterator.
     */
    public function getIterator(): \Traversable;
}
