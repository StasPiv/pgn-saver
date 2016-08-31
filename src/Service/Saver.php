<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 27.08.16
 * Time: 17:25
 */

namespace StasPiv\PgnSaver\Service;

/**
 * Class PgnSaver
 * @package StasPiv\PgnSaver\Service
 */
class Saver
{
    /**
     * @var ContainerInterface
     */
    private $pgnContainer;
    /**
     * @var string
     */
    private $fileDestination;

    /**
     * PgnSaver constructor.
     * @param ContainerInterface $pgnContainer
     * @param string $fileDestination
     */
    public function __construct(ContainerInterface $pgnContainer, string $fileDestination)
    {
        $this->pgnContainer = $pgnContainer;
        $this->fileDestination = $fileDestination;
    }

    public function saveToFile()
    {
        while ( !($pgn = $this->pgnContainer->getNextPgn())->isNull() ) {
            foreach ($pgn->getHeaders() as $key => $header) {
                file_put_contents($this->fileDestination, '['.$key.' "'.$header.'"]'.PHP_EOL, FILE_APPEND);
            }
            file_put_contents($this->fileDestination, PHP_EOL.$pgn->getPgnString().PHP_EOL.PHP_EOL, FILE_APPEND);
        }
    }

    /**
     * @return string
     */
    public function getString(): string
    {
        $string = '';

        while ( !($pgn = $this->pgnContainer->getNextPgn())->isNull() ) {
            foreach ($pgn->getHeaders() as $key => $header) {
                $string.='['.$key.' "'.$header.'"]'.PHP_EOL;
            }
            $string.=PHP_EOL.$pgn->getPgnString().' '.$pgn->getResult().PHP_EOL.PHP_EOL;
        }

        return $string;
    }

    function __toString()
    {
        return $this->getString();
    }
}