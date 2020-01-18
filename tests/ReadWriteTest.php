<?php declare(strict_types=1);

namespace WyriHaximus\Tests\React\Cache;

use React\Cache\CacheInterface;
use function React\Promise\resolve;
use WyriHaximus\AsyncTestUtilities\AsyncTestCase;
use WyriHaximus\React\Cache\ReadWrite;

/**
 * @internal
 */
final class KeyPrefixTest extends AsyncTestCase
{
    /**
     * @test
     */
    public function readWrite(): void
    {
        $key = 'sleutel';
        $value = 'gat';
        $default = 'standaard';
        $ttl = 666;

        $read = $this->prophesize(CacheInterface::class);
        $read->get($key, $default)->shouldBeCalled()->willReturn(resolve(true));
        $read->getMultiple([$key], $default)->shouldBeCalled()->willReturn(resolve(true));
        $read->set($key, $value, $ttl)->shouldNotBeCalled();
        $read->setMultiple([$key => $value], $ttl)->shouldNotBeCalled();
        $read->has($key)->shouldBeCalled()->willReturn(resolve(true));
        $read->delete($key)->shouldNotBeCalled();
        $read->deleteMultiple([$key])->shouldNotBeCalled();
        $read->clear()->shouldNotBeCalled();

        $write = $this->prophesize(CacheInterface::class);
        $write->get($key, $default)->shouldNotBeCalled();
        $write->getMultiple([$key], $default)->shouldNotBeCalled();
        $write->set($key, $value, $ttl)->shouldBeCalled()->willReturn(resolve(true));
        $write->setMultiple([$key => $value], $ttl)->shouldBeCalled()->willReturn(resolve(true));
        $write->has($key)->shouldNotBeCalled();
        $write->delete($key)->shouldBeCalled()->willReturn(resolve(true));
        $write->deleteMultiple([$key])->shouldBeCalled()->willReturn(resolve(true));
        $write->clear()->shouldBeCalled()->willReturn(resolve(true));

        $readWrite = new ReadWrite($read->reveal(), $write->reveal());
        $readWrite->get($key, $default);
        $readWrite->getMultiple([$key], $default);
        $readWrite->set($key, $value, $ttl);
        $readWrite->setMultiple([$key => $value], $ttl);
        $readWrite->has($key);
        $readWrite->delete($key);
        $readWrite->deleteMultiple([$key]);
        $readWrite->clear();
    }
}
