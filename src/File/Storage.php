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

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

/**
 * File saver
 */
class Storage implements StorageInterface
{
    /**
     * @var string
     */
    private $projectDir;

    /**
     * @var string
     */
    private $publicDir;

    /**
     * @param string $projectDir
     * @param string $publicDir
     */
    public function __construct(string $projectDir, string $publicDir)
    {
        $this->projectDir = $projectDir;
        $this->publicDir = $publicDir;
    }

    /**
     * @inheritDoc
     */
    public function saveToFile(string $text, string $path, string $filename): void
    {
        $filesystem = new Filesystem();

        $dirPath = $this->projectDir . $this->publicDir . $path;

        $filesystem->mkdir($dirPath);

        $filesystem->appendToFile(implode(DIRECTORY_SEPARATOR, [$dirPath, $filename]), $text);
    }
}
