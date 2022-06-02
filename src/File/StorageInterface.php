<?php

declare(strict_types=1);

/**
 * @author    Daniil Molchanov <sadme28@gmail.com>
 * @copyright Copyright (c) 2022, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\File;

/**
 * File saver interface
 */
interface StorageInterface
{
    /**
     * @param string $text
     * @param string $path
     * @param string $filename
     *
     * @return void
     */
    public function saveToFile(string $text, string $path, string $filename): void;
}
