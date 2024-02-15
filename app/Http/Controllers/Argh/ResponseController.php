<?php

namespace App\Http\Controllers\Argh;

use App\Http\Controllers\Controller;

class ResponseController extends Controller{
    /**
     * Calculate the circumference  of a circle with given radius
     *
     * @param float $radius
     * @return float
     */
    public function calculateCircleCircumference($radius)
    {
        return 2 * 3.14 * $radius;
    }

    /**
     * Calculate the area of a circle with given radius
     *
     * @param float $radius
     * @return float
     */
    public function calculateCircleArea($radius)
    {
        return 3.14 * $radius * $radius;
    }
}
