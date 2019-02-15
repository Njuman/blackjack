<?php namespace App\Entities;

class Game
{
    private $winner;

    private $players = [];

    public function __construct($players)
    {
        $this->players = $players;
    }

    public function play() {
        $leaderTotal = 0;
        $leaderCards = [];

        foreach ($this->players as $player) {
            /**
             * @var Player $player
             */
            $total = $this->calculteTotal($player->getPlayerCards());

            if ($leaderTotal < $total && $total <= 21) {
                $this->winner = $player->getName();
                $leaderTotal = $total;
                $leaderCards = $player->getPlayerCards();
            } else if ($leaderTotal == $total) {
                if ($this->calcuteRank($leaderCards, $player->getPlayerCards())) {
                    $this->winner = $player->getName();
                    $leaderTotal = $total;
                    $leaderCards = $player->getPlayerCards();
                }
            }
        }
    }

    public function calculteTotal($cards) {
        $total = 0;
        $totalAces = 0;
        $i = 0;

        foreach ($cards as $card) {
            /**
             * @var Card $card
             */
            $total += $card->getCardRank()->getValue();
            if ($card->getCard() == 'A') {
                ++$totalAces;
            }
        }

        while ($total + 10 <= 21 && $i < $totalAces) {
            $total = $total + 10;
            ++$i;
        }

        return $total;
    }

    public function calcuteRank($leaderCards, $contenderCards) {
        for ($i = 0; $i < count($leaderCards); $i++) {
            if ($leaderCards[$i]->getCardRank()->getRank() < $contenderCards[$i]->getCardRank()->getRank()) {
                return true;
            }
        }

        return false;
    }

    public function getWinner() {
        return $this->winner;
    }
}
