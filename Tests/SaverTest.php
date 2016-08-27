<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 27.08.16
 * Time: 17:31
 */

namespace StasPiv\PgnSaver\Tests;

use PHPUnit\Framework\TestCase;
use StasPiv\PgnSaver\Service\ArrayContainer;
use StasPiv\PgnSaver\Service\Saver;

class SaverTest extends TestCase
{
    /**
     * @var array
     */
    private $testPgnArray = [
        [
            'pgnString' => 'Some fake pgn',
            'headers' => [
                'Event' => 'Some event',
                'White' => 'Some white player',
                'Black' => 'Some black player'
            ]
        ],
        [
            'pgnString' => 'Some fake pgn2',
            'headers' => [
                'Event' => 'Some event2',
                'White' => 'Some white player2',
                'Black' => 'Some black player2'
            ]
        ]
    ];

    public function testSaveToFile()
    {
        $fileDestination = '/tmp/pgn-saver-test.pgn';

        if (file_exists($fileDestination)) {
            unlink($fileDestination);
        }

        $saver = new Saver(new ArrayContainer($this->testPgnArray), $fileDestination);
        $saver->saveToFile();

        self::assertFileExists($fileDestination);
        $expectedContent = '[Event "Some event"]'.PHP_EOL.
                           '[White "Some white player"]'.PHP_EOL.
                           '[Black "Some black player"]'.PHP_EOL.PHP_EOL.'Some fake pgn'.PHP_EOL.PHP_EOL.
                           '[Event "Some event2"]'.PHP_EOL.
                           '[White "Some white player2"]'.PHP_EOL.
                           '[Black "Some black player2"]'.PHP_EOL.PHP_EOL.'Some fake pgn2'.PHP_EOL.PHP_EOL;
        self::assertEquals($expectedContent, file_get_contents($fileDestination));
    }

    public function testToString()
    {
        $fileDestination = '/tmp/pgn-saver-test.pgn';

        $saver = new Saver(new ArrayContainer($this->testPgnArray), $fileDestination);

        $expectedContent = '[Event "Some event"]'.PHP_EOL.
                           '[White "Some white player"]'.PHP_EOL.
                           '[Black "Some black player"]'.PHP_EOL.PHP_EOL.'Some fake pgn'.PHP_EOL.PHP_EOL.
                           '[Event "Some event2"]'.PHP_EOL.
                           '[White "Some white player2"]'.PHP_EOL.
                           '[Black "Some black player2"]'.PHP_EOL.PHP_EOL.'Some fake pgn2'.PHP_EOL.PHP_EOL;

        self::assertEquals($expectedContent, $saver);
    }
}