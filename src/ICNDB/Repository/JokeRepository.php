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
use App\ICNDB\DTO\JokeDTO;

/**
 * Joke Repository
 */
class JokeRepository implements JokeRepositoryInterface
{
    private const JOKES_URI = '/jokes/random';

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
    public function getJoke(array $params = []): JokeDTO
    {
        $joke = $this->client->send('GET', self::JOKES_URI, $params);

        return new JokeDTO($joke['id'], $joke['joke'], implode(',', $joke['categories']));
    }
}
