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

interface SymmetricDriverInterface extends DriverInterface
{
    public function getKey(): string;

    public static function generateKey(array $options = []): string;
}
