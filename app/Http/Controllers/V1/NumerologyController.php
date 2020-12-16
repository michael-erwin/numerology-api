<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Library\Numerology;
use App\Models\InnerPsyche;
use App\Models\OuterPsyche;
use App\Models\CellPattern;
use App\Models\MissingNumber;

class NumerologyController extends Controller
{
    public function analyze(Request $request)
    {
        $numerology = app(Numerology::class);
        // Validate input
        $validation = Validator::make(
            $request->all(), [
            'day' => 'required|numeric',
            'month' => 'required|numeric',
            'year' => 'required|numeric'
        ]);
        if ($validation->fails()) $response = $validation->messages();
        else {
            // Analyze input.
            $day = $request->input('day');
            $month = $request->input('month');
            $year = $request->input('year');
            $creature = $numerology->getCreatureNumber($day, $month, $year);

            $grid_1 = $numerology->makeGrid($day, $month, $year);
            $grid_2 = $numerology->makeGrid($day, $month, $year, true);

            $day_arrow = $numerology->getDayArrow($day);
            $month_arrow = $numerology->getMonthArrow($day, $month);
            $year_arrow = $numerology->getYearArrow($year);
            $creature_arrow = $numerology->getCreatureArrow($creature);

            $arrow_codes = CellPattern::all();
            $missing_codes = MissingNumber::all();
            $response = [
                'birth_input' => [
                    'day' => $day,
                    'month' => $month,
                    'year' => $year,
                ],
                'life_number' => $numerology->getReducedNumber($creature),
                'birth_sums' => [
                    'day' => $numerology->getReducedNumber($day),
                    'month' => $numerology->getReducedNumber($month),
                    'year' => $numerology->getReducedNumber($year),
                    'creature' => $creature,
                ],
                'directions' => [
                    'day' => $day_arrow,
                    'month' => $month_arrow,
                    'year' => $year_arrow,
                    'creature' => $creature_arrow,
                ],
                'zodiac_sign' => $numerology->getZodiacCode($day, $month),
                'inner_psyche' => InnerPsyche::where('signs', $month_arrow.$year_arrow)->first(['id', 'signs', 'meaning']),
                'outer_psyche' => OuterPsyche::where('signs', $month_arrow.$year_arrow)->first(['id', 'signs', 'meaning']),
                'grid_1' => ['grid' => $grid_1, 'results' => $numerology->getGridLines($grid_1)],
                'grid_2' => [
                    'grid' => $grid_2,
                    'results' => $numerology->getExtraGridLines($grid_1, $grid_2, $arrow_codes, $missing_codes)
                ],
            ];
        }
        return response()->json($response);
    }
}
