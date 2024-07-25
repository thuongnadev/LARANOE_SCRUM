<?php

namespace App\Http\Contracts;

interface Analyzable
{
    public function analyze($data);
    public function performAnalysis($data);
    public function getStatistics($data);
}