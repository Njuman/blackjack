<?php namespace App\Entities;

class CardRank
{
    /**
     * @var int
     */
    private $rank;

    /**
     * @var int
     */
    private $value;

    /**
     * @var array
     */
    private $rankings = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

    /**
     * CardRank constructor.
     * @param $card
     */
    public function __construct($card) {
        $index = array_search($card, $this->rankings);

        $this->rank = $index;
        $this->value = ($index == 12) ? 1 : (($index >= 8) ? 10 : $index + 2);
    }

    /**
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
}