<?php

declare(strict_types=1);
/**
 * This file is part of joyqhs/encryption.
 *
 * @link     https://github.com/qiaohengshan/encryption
 * @contact  qiaohengshan@gmail.com
 * @license  https://github.com/qiaohengshan/encryption/blob/master/LICENSE
 */
return [
    'default' => 'aes',

    'driver' => [
        'aes' => [
            'class' => \Joyqhs\Encryption\Driver\AesDriver::class,
            'options' => [
                'key' => env('AES_KEY', ''),
                'cipher' => env('AES_CIPHER', 'AES-128-CBC'),
            ],
        ],
    ],
];
