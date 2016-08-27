<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 27.08.16
 * Time: 18:24
 */

namespace StasPiv\PgnSaver\Service;

use StasPiv\PgnSaver\Model\Pgn;

class ArrayContainer implements ContainerInterface
{
    /**
     * @var array
     */
    private $pgnArray = [];

    /**
     * ArrayContainer constructor.
     * @param array $pgnArray
     */
    public function __construct(array $pgnArray)
    {
        $this->pgnArray = $pgnArray;
    }

    /**
     * @return Pgn
     */
    public function getNextPgn(): Pgn
    {
        $pgnContext = current($this->pgnArray);

        if (!$pgnContext) {
            return (new Pgn())->setNull(true);
        }

        next($this->pgnArray);

        return (new Pgn())->setPgnString($pgnContext['pgnString'])->setHeaders($pgnContext['headers']);
    }
}