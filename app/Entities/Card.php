<?php namespace App\Entities;

class Card
{
    /**
     * @var array
     */
    private $suit;

    /**
     * @var array
     */
    private $card;

    /**
     * @var CardRank
     */
    private $cardRank;

    /**
     * Card constructor.
     * @param $suit
     * @param $card
     */
    public function __construct($suit, $card)
    {
        $this->suit = $suit;
        $this->card = $card;

        $this->setCardRank();
    }

    /**
     * @return array
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @return array
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @return CardRank
     */
    public function setCardRank()
    {
        $this->cardRank = new CardRank($this->card);
    }

    /**
     * @return CardRank
     */
    public function getCardRank()
    {
        return $this->cardRank;
    }
}