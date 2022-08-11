<?php

declare(strict_types=1);

namespace WyriHaximus\React\Cache;

use React\Cache\CacheInterface;

final class ReadWrite implements CacheInterface
{
    public function __construct(
        private readonly CacheInterface $read,
        private readonly CacheInterface $write,
    ) {
    }

    /**
     * @inheritDoc
     * @phpstan-ignore-next-line
     */
    public function get($key, $default = null)
    {
        /**
         * @psalm-suppress TooManyTemplateParams
         */
        return $this->read->get($key, $default);
    }

    /**
     * @inheritDoc
     * @phpstan-ignore-next-line
     */
    public function set($key, $value, $ttl = null)
    {
        /**
         * @psalm-suppress TooManyTemplateParams
         */
        return $this->write->set($key, $value, $ttl);
    }

    /**
     * @inheritDoc
     */
    public function delete($key)
    {
        /**
         * @psalm-suppress TooManyTemplateParams
         */
        return $this->write->delete($key);
    }

    /**
     * @inheritDoc
     * @phpstan-ignore-next-line
     */
    public function getMultiple(array $keys, $default = null)
    {
        /**
         * @psalm-suppress TooManyTemplateParams
         */
        return $this->read->getMultiple($keys, $default);
    }

    /**
     * @inheritDoc
     * @phpstan-ignore-next-line
     */
    public function setMultiple(array $values, $ttl = null)
    {
        /**
         * @psalm-suppress TooManyTemplateParams
         */
        return $this->write->setMultiple($values, $ttl);
    }

    /**
     * @inheritDoc
     */
    public function deleteMultiple(array $keys)
    {
        /**
         * @psalm-suppress TooManyTemplateParams
         */
        return $this->write->deleteMultiple($keys);
    }

    /**
     * @inheritDoc
     */
    public function clear()
    {
        /**
         * @psalm-suppress TooManyTemplateParams
         */
        return $this->write->clear();
    }

    /**
     * @inheritDoc
     */
    public function has($key)
    {
        /**
         * @psalm-suppress TooManyTemplateParams
         */
        return $this->read->has($key);
    }
}
