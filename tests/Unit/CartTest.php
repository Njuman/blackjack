<?php namespace Tests\Unit;

use App\Entities\Card;
use App\Entities\Game;
use App\Entities\Player;
use Tests\TestCase;

class CardTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testCardValue()
    {
        $file = file_get_contents('../tests.json');

        $testCases = json_decode($file, true);

        foreach ($testCases as $testCase) {
            $result = $testCase['playerAWins'];
            unset($testCase['playerAWins']);

            $players = [];

            foreach ($testCase as $key => $cards) {
                $player = new Player($key);

                foreach ($cards as $cardSuit) {
                    list($card, $suit) = (strlen($cardSuit) == 3) ? str_split($cardSuit, 2) : str_split($cardSuit);
                    $player->addToPlayerCards(new Card($suit, $card));
                }

                $players[] = $player;
            }

            $game = new Game($players);
            $game->play();

            $isPlayerAWinner = ($game->getWinner() == 'playerA') ? true : false;

            $this->assertTrue($isPlayerAWinner == $result);
        }
    }
}
