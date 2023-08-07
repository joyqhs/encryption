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

use Joyqhs\Encryption\Command\GenKeyCommand;
use Joyqhs\Encryption\Contract\EncryptionInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                EncryptionInterface::class => EncryptionManager::class,
            ],
            'commands' => [
                GenKeyCommand::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for joyqhs/encryption.',
                    'source' => __DIR__ . '/../publish/encryption.php',
                    'destination' => BASE_PATH . '/config/autoload/encryption.php',
                ],
            ],
        ];
    }
}
