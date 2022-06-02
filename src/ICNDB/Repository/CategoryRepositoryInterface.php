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

namespace App\ICNDB\Repository;

/**
 * Categories repository interface
 */
interface CategoryRepositoryInterface
{
    /**
     * @return array
     */
    public function getCategories(): array;
}
