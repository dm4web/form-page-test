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

use App\ICNDB\Client\ICNDBClientInterface;

/**
 * Categories repository
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    private const CATEGORIES_URI = '/categories';

    /**
     * @var \App\ICNDB\Client\ICNDBClientInterface
     */
    private $client;

    /**
     * @param \App\ICNDB\Client\ICNDBClientInterface $client
     */
    public function __construct(ICNDBClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritDoc}
     */
    public function getCategories(): array
    {
        return $this->client->send('GET', self::CATEGORIES_URI, []);
    }
}
