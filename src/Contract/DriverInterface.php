<?php

declare(strict_types=1);
/**
 * This file is part of joyqhs/encryption.
 *
 * @link     https://github.com/qiaohengshan/encryption
 * @contact  qiaohengshan@gmail.com
 * @license  https://github.com/qiaohengshan/encryption/blob/master/LICENSE
 */
namespace Joyqhs\Encryption\Contract;

interface DriverInterface
{
    /**
     * Encrypt the given value.
     *
     * @param mixed $value
     *
     * @throws \Joyqhs\Encryption\Exception\EncryptException
     */
    public function encrypt($value, bool $serialize = true): string;

    /**
     * Decrypt the given value.
     *
     * @throws \Joyqhs\Encryption\Exception\DecryptException
     * @return mixed
     */
    public function decrypt(string $payload, bool $unserialize = true);
}
