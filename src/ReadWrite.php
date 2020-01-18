<?php declare(strict_types=1);

namespace WyriHaximus\React\Cache;

use React\Cache\CacheInterface;
use React\Promise\PromiseInterface;

final class ReadWrite implements CacheInterface
{
    /** @var CacheInterface */
    private $read;

    /** @var CacheInterface */
    private $write;

    public function __construct(CacheInterface $read, CacheInterface $write)
    {
        $this->read = $read;
        $this->write = $write;
    }

    /**
     * @param  string           $key
     * @param  null             $default
     * @return PromiseInterface
     */
    public function get($key, $default = null)
    {
        return $this->read->get($key, $default);
    }

    /**
     * @param  string           $key
     * @param  mixed            $value
     * @param  null             $ttl
     * @return PromiseInterface
     */
    public function set($key, $value, $ttl = null)
    {
        return $this->write->set($key, $value, $ttl);
    }

    /**
     * @param  string           $key
     * @return PromiseInterface
     */
    public function delete($key)
    {
        return $this->write->delete($key);
    }

    public function getMultiple(array $keys, $default = null)
    {
        return $this->read->getMultiple($keys, $default);
    }

    public function setMultiple(array $values, $ttl = null)
    {
        return $this->write->setMultiple($values, $ttl);
    }

    public function deleteMultiple(array $keys)
    {
        return $this->write->deleteMultiple($keys);
    }

    public function clear()
    {
        return $this->write->clear();
    }

    public function has($key)
    {
        return $this->read->has($key);
    }
}
