<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 27.08.16
 * Time: 17:26
 */

namespace StasPiv\PgnSaver\Service;

use StasPiv\PgnSaver\Model\Pgn;

interface ContainerInterface
{
    /**
     * @return Pgn
     */
    public function getNextPgn(): Pgn;
}