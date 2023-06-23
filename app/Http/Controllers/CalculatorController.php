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

        if($number<50)
        {
            $result = [];
            return redirect('/')->with('msg',[$number,5, "Sie sind leider durchgefallen"]);
        }
        else
        {
            foreach ($this->grades as $grade)
            {
                if($number<=$grade->prozentpunkte[0] && $number>=$grade->prozentpunkte[1])
                {
                    return redirect('/')->with('msg',[$number,$grade->grade_number, "Bestanden. ".$grade->msg]);
                }
            }
        }
//        return json_encode(['Numer'=>$number]);

    }
}
