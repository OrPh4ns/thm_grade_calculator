<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    private mixed $grades;

    public function calc(Request $request)
    {
        $jsonFilePath = public_path('grades.json');
        $jsonData = file_get_contents($jsonFilePath);
        $this->grades = json_decode($jsonData);

        $number = $request->input('num');

        if ($number < 50)
        {
            return redirect('/')->with('msg', [$number, 5, "Sie sind leider durchgefallen"]);
        } elseif ($number > 100)
        {
            return redirect('/')->with('msg', [$number, 0, "für diesen Punkt gibt es keine Note"]);
        } else
        {
            foreach ($this->grades as $grade)
            {
                if ($number <= $grade->prozentpunkte[0] && $number >= $grade->prozentpunkte[1]) {
                    return redirect('/')->with('msg', [$number, $grade->grade_number, "Bestanden. " . $grade->msg]);
                }
            }
        }

    }
}
