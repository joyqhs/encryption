<?php

declare(strict_types=1);
/**
 * This file is part of joyqhs/encryption.
 *
 * @link     https://github.com/qiaohengshan/encryption
 * @contact  qiaohengshan@gmail.com
 * @license  https://github.com/qiaohengshan/encryption/blob/master/LICENSE
 */
namespace Joyqhs\Encryption;

use Hyperf\Contract\ConfigInterface;
use Joyqhs\Encryption\Contract\DriverInterface;
use Joyqhs\Encryption\Contract\EncryptionInterface;
use Joyqhs\Encryption\Driver\AesDriver;
use InvalidArgumentException;

class EncryptionManager implements EncryptionInterface
{
    /**
     * The config instance.
     *
     * @var \Hyperf\Contract\ConfigInterface
     */
    protected $config;

    /**
     * The array of created "drivers".
     *
     * @var \Joyqhs\Encryption\Contract\DriverInterface[]
     */
    protected $drivers = [];

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    public function encrypt($value, bool $serialize = true): string
    {
        return $this->getDriver()->encrypt($value, $serialize);
    }

    public function decrypt(string $payload, bool $unserialize = true)
    {
        return $this->getDriver()->decrypt($payload, $unserialize);
    }

    /**
     * Get a driver instance.
     *
     * @return \Joyqhs\Encryption\Contract\AsymmetricDriverInterface|\Joyqhs\Encryption\Contract\SymmetricDriverInterface
     */
    public function getDriver(?string $name = null): DriverInterface
    {
        if (isset($this->drivers[$name]) && $this->drivers[$name] instanceof DriverInterface) {
            return $this->drivers[$name];
        }

        $name = $name ?: $this->config->get('encryption.default', 'aes');

        $config = $this->config->get("encryption.driver.{$name}");
        if (empty($config) or empty($config['class'])) {
            throw new InvalidArgumentException(sprintf('The encryption driver config %s is invalid.', $name));
        }

        $driverClass = $config['class'] ?? AesDriver::class;

        $driver = make($driverClass, ['options' => $config['options'] ?? []]);

        return $this->drivers[$name] = $driver;
    }
}
