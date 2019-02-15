<?php

namespace App\Entities;


class Player
{
    /**
     * @var
     */
    private $name;

    /**
     * @var array
     */
    private $playerCards = [];

    /**
     * @var int
     */
    private $playerTotal;

    /**
     * Player constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addToPlayerCards(Card $card){
        $this->playerCards[] = $card;
    }

    public function getName() {
        return $this->name;
    }

    public function getPlayerCards() {
        return $this->playerCards;
    }
}
