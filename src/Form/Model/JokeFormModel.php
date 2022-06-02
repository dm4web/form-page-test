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

namespace App\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Joke form model
 */
class JokeFormModel
{
    /**
     * @var string
     *
     * @Assert\Email()
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    private $category;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email email
     *
     * @return JokeFormModel
     */
    public function setEmail(string $email): JokeFormModel
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category category
     *
     * @return JokeFormModel
     */
    public function setCategory(string $category): JokeFormModel
    {
        $this->category = $category;

        return $this;
    }
}
