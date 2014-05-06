<?php

use CodingDojo\GameOfLife;

class GameOfLifeTest extends PHPUnit_Framework_TestCase {

    public function provideCellStateAndNeighbours()
    {
        return array(
            array(GameOfLife::CELL_ALIVE, 0, GameOfLife::CELL_DEAD),
            array(GameOfLife::CELL_ALIVE, 1, GameOfLife::CELL_DEAD),
            array(GameOfLife::CELL_ALIVE, 2, GameOfLife::CELL_ALIVE),
            array(GameOfLife::CELL_ALIVE, 3, GameOfLife::CELL_ALIVE),
            array(GameOfLife::CELL_ALIVE, 4, GameOfLife::CELL_DEAD),
            array(GameOfLife::CELL_DEAD, 3, GameOfLife::CELL_ALIVE),
            array(GameOfLife::CELL_DEAD, 2, GameOfLife::CELL_DEAD),
            array(GameOfLife::CELL_DEAD, 4, GameOfLife::CELL_DEAD),
        );
    }

    /**
     * @param $state
     * @param $numberOfAliveNeighbours
     * @param $expectedResult
     * @dataProvider provideCellStateAndNeighbours
     */
    public function testGetCellStatusForNextGeneration($state, $numberOfAliveNeighbours, $expectedResult)
    {
        $game = new GameOfLife(array());
        $result = $game->getCellStatusForNextGeneration($state, $numberOfAliveNeighbours);

        $this->assertSame($expectedResult, $result);
    }

    public function provideBoardData()
    {
        return array(
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, 0
            ),
            array(
                [
                    [1, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, 1
            ),
        );
    }

    /**
     * @param $board
     * @param $x
     * @param $y
     * @param $expected
     * @dataProvider provideBoardData
     */
    public function testGetNumberOfAliveNeighbours($board, $x, $y, $expected)
    {
        $game = new GameOfLife($board);
        $numberOfAliveNeighbours = $game->getNumberOfAliveNeighbours($x, $y);

        $this->assertSame($expected, $numberOfAliveNeighbours);
    }


    public function provideBoardDataLeftUpperNeighbour()
    {
        return array(
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, false
            ),
            array(
                [
                    [1, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, true
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 0, 0, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 0, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 0, 1, false
            ),
        );
    }

    /**
     * @param $board
     * @param $x
     * @param $y
     * @param $expected
     * @dataProvider provideBoardDataLeftUpperNeighbour
     */
    public function testIsLeftUpperNeighbourAlive($board, $x, $y, $expected)
    {
        $game = new GameOfLife($board);
        $result = $game->isLeftUpperNeighbourAlive($x, $y);

        $this->assertSame($expected, $result);
    }


    public function provideBoardDataUpperNeighbour()
    {
        return array(
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, false
            ),
            array(
                [
                    [0, 1, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, true
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 0, 0, false
            ),
        );
    }

    /**
     * @param $board
     * @param $x
     * @param $y
     * @param $expected
     * @dataProvider provideBoardDataUpperNeighbour
     */
    public function testIsUpperNeighbourAlive($board, $x, $y, $expected)
    {
        $game = new GameOfLife($board);
        $result = $game->isUpperNeighbourAlive($x, $y);

        $this->assertSame($expected, $result);
    }


    public function provideBoardDataRightUpperNeighbour()
    {
        return array(
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, false
            ),
            array(
                [
                    [0, 0, 1],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, true
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 0, 2, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 2, 1, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 0, 1, false
            ),
        );
    }

    /**
     * @param $board
     * @param $x
     * @param $y
     * @param $expected
     * @dataProvider provideBoardDataRightUpperNeighbour
     */
    public function testIsRightUpperNeighbourAlive($board, $x, $y, $expected)
    {
        $game = new GameOfLife($board);
        $result = $game->isRightUpperNeighbourAlive($x, $y);

        $this->assertSame($expected, $result);
    }


    public function provideBoardDataRightNeighbour()
    {
        return array(
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 1],
                    [0, 0, 0]
                ], 1, 1, true
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 2, 1, false
            ),
        );
    }

    /**
     * @param $board
     * @param $x
     * @param $y
     * @param $expected
     * @dataProvider provideBoardDataRightNeighbour
     */
    public function testIsRightNeighbourAlive($board, $x, $y, $expected)
    {
        $game = new GameOfLife($board);
        $result = $game->isRightNeighbourAlive($x, $y);

        $this->assertSame($expected, $result);
    }


    public function provideBoardDataRightLowerNeighbour()
    {
        return array(
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 1]
                ], 1, 1, true
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 2, 2, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 0, 2, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 2, 0, false
            ),
        );
    }

    /**
     * @param $board
     * @param $x
     * @param $y
     * @param $expected
     * @dataProvider provideBoardDataRightLowerNeighbour
     */
    public function testIsRightLowerNeighbourAlive($board, $x, $y, $expected)
    {
        $game = new GameOfLife($board);
        $result = $game->isRightLowerNeighbourAlive($x, $y);

        $this->assertSame($expected, $result);
    }



    public function provideBoardDataLowerNeighbour()
    {
        return array(
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 1, 0]
                ], 1, 1, true
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 2, false
            ),
        );
    }

    /**
     * @param $board
     * @param $x
     * @param $y
     * @param $expected
     * @dataProvider provideBoardDataLowerNeighbour
     */
    public function testIsLowerNeighbourAlive($board, $x, $y, $expected)
    {
        $game = new GameOfLife($board);
        $result = $game->isLowerNeighbourAlive($x, $y);

        $this->assertSame($expected, $result);
    }


    public function provideBoardDataLeftLowerNeighbour()
    {
        return array(
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [1, 0, 0]
                ], 1, 1, true
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 0, 2, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 0, 0, false
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 2, 2, false
            ),
        );
    }

    /**
     * @param $board
     * @param $x
     * @param $y
     * @param $expected
     * @dataProvider provideBoardDataLeftLowerNeighbour
     */
    public function testIsLeftLowerNeighbourAlive($board, $x, $y, $expected)
    {
        $game = new GameOfLife($board);
        $result = $game->isLeftLowerNeighbourAlive($x, $y);

        $this->assertSame($expected, $result);
    }



    public function provideBoardDataLeftNeighbour()
    {
        return array(
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 1, 1, false
            ),
            array(
                [
                    [0, 0, 0],
                    [1, 0, 0],
                    [0, 0, 0]
                ], 1, 1, true
            ),
            array(
                [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0]
                ], 0, 0, false
            ),
        );
    }

    /**
     * @param $board
     * @param $x
     * @param $y
     * @param $expected
     * @dataProvider provideBoardDataLeftNeighbour
     */
    public function testIsLeftNeighbourAlive($board, $x, $y, $expected)
    {
        $game = new GameOfLife($board);
        $result = $game->isLeftNeighbourAlive($x, $y);

        $this->assertSame($expected, $result);
    }

}
