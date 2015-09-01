<?php
$matrix = [[0, 1, 2, 3], [1, 2, 3, 4], [0, 5, 4, 5], [9, 8, 7, 6]];

function printMatrix($matrix) {
    $matrixSize = count($matrix);
    for ($row = 0; $row < $matrixSize; $row++) {
        for ($column = 0; $column < $matrixSize; $column++) {
            printValue($matrix, $row, $column);
        }
        echo "<br>";
    }
}

function printMatrixBySpiralClockwise($matrix) {
    $matrixSize = count($matrix);
    $top = $left = 0;
    $bottom = $right = $matrixSize - 1;
    $direction = 0;
    while ($top <= $bottom && $left <= $right) {
        if ($direction === 0) {
            // From left to right
            for ($column = $left; $column <= $right; $column++) {
                printValue($matrix, $top, $column);
            }
            $top++;
        } else if ($direction == 1) {
            // From top to bottom
            for ($row = $top; $row <= $bottom; $row++) {
                printValue($matrix, $row, $right);
            }
            $right--;
        } else if ($direction == 2) {
            // From right to left
            for ($column = $right; $column >= $left; $column--) {
                printValue($matrix, $bottom, $column);
            }
            $bottom--;
        } else if ($direction == 3) {
            // From bottom top top
            for ($row = $bottom; $row >= $top; $row--) {
                printValue($matrix, $row, $left);
            }
            $left++;
        }
        $direction = (++$direction % 4); // 0,1,2,3,0,...
    }
}

function printMatrixBySpiralCounterClockwise($matrix) {
    $matrixSize = count($matrix);
    $top = $left = 0;
    $bottom = $right = $matrixSize - 1;
    $direction = 0;
    while ($top <= $bottom && $left <= $right) {
        if ($direction === 0) {
            // From right to left
            for ($column = $right; $column >= $left; $column--) {
                printValue($matrix, $top, $column);
            }
            $top++;
        } else if ($direction == 1) {
            // From top to bottom
            for ($row = $top; $row <= $bottom; $row++) {
                printValue($matrix, $row, $left);
            }
            $left++;
        } else if ($direction === 2) {
            // From left to right
            for ($column = $left; $column <= $right; $column++) {
                printValue($matrix, $bottom, $column);
            }
            $bottom--;
        } else if ($direction == 3) {
            // From bottom to top
            for ($row = $bottom; $row >= $top; $row--) {
                printValue($matrix, $row, $right);
            }
            $right--;
        }
        $direction = (++$direction % 4); // 0,1,2,3,0,...
    }
}

function printValue($matrix, $row, $column) {
    echo $matrix[$row][$column] . "\t";
}

echo 'Matrix:<br>';
printMatrix($matrix);
echo "<br> Matrix clockwise:<br>";
printMatrixBySpiralClockwise($matrix);
echo "<br><br> Matrix counterclockwise:<br>";
printMatrixBySpiralCounterClockwise($matrix);
