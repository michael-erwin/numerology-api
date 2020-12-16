<?php

namespace App\Library;

class Numerology
{
    // List of ajacent numbers relative to location of each cells.
    private $number_links = [
        1 => [2, 4, 5],
        2 => [1, 3, 4, 5, 6],
        3 => [2, 5, 6],
        4 => [1, 2, 5, 7, 8],
        5 => [1, 2, 3, 4, 6, 7, 8, 9],
        6 => [2, 3, 5, 8, 9],
        7 => [4, 5, 8],
        8 => [4, 5, 6, 7, 9],
        9 => [5, 6, 8]
    ];
    private $grid_lines = [369, 258, 147, 159, 357, 321, 654, 987];

    public function getCreatureNumber($day, $month, $year)
    {
        $data_array = $day.$month.$year;
        $data_array = str_split($data_array);
        $creature_number = 0;
        foreach($data_array as $number) $creature_number += $number;
        if(strlen($creature_number) == 1) $creature_number = "0".$creature_number;
        return $creature_number;
    }

    public function getDayArrow($day)
    {
        $arrow_rules = config('numerology.arrow_rules');
        $data_array = str_split((string) $day);
        $lead = $data_array[0];
        $output = "";
        if($lead == 7) $output = "b";
        else{
            foreach($arrow_rules as $direction => $members) {
                if(in_array($lead, $members['number'])) {
                    $output = $direction;
                    break;
                }
            }
        }
        return $output;
    }
    
    public function getMonthArrow(int $day, int $month)
    {
        $arrow_rules = config('numerology.arrow_rules');
        $output = "";
        $zodiac_code = $this->getZodiacCode($day, $month);
        foreach($arrow_rules as $arrow => $codes) {
            if(in_array($zodiac_code, $codes['zodiac'])) {
                $output = $arrow;
                break;
            }
        }
        return $output;
    }
    
    public function getYearArrow(int $year)
    {
        $arrow_rules = config('numerology.arrow_rules');
        $data_array = str_split($year);
        $lead = $data_array[2];
        $output = "";
        foreach($arrow_rules as $direction => $members) {
            if(in_array($lead, $members['number'])) {
                $output = $direction;
                break;
            }
        }
        return $output;
    }
    
    public function getDigitArrow($digit)
    {
        $arrow_rules = config('numerology.arrow_rules');
        $output = "";
        foreach($arrow_rules as $direction => $members) {
            if(in_array($digit, $members['number'])) {
                $output = $direction;
                break;
            }
        }
        return $output;
    }

    public function getCreatureArrow(int $number)
    {
        $arrow_rules = config('numerology.arrow_rules');
        $data_array = str_split($number);
        $lead = $data_array[0];
        $output = "";
        if($lead == 7) $output = "b";
        else{
            foreach($arrow_rules as $direction =>$members) {
                if(in_array($lead, $members['number'])) {
                    $output = $direction;
                    break;
                }
            }
        }
        return $output;
    }

    /**
    * Reduce number
    */
    public function getReducedNumber(int $number)
    {
        if(strlen($number) > 1){
            if ($number != 11 && $number != 22 && $number != 33) {
                $total = 0;
                $digits = str_split($number);
                foreach($digits as $digit) $total += $digit;
                return $this->getReducedNumber($total);
            }
            return $number;
        }
        return $number;
    }

    public function getZodiacCode(int $day, int $month)
    {
        $signs = config('numerology.zodiac_signs');
        $output = "";
    
        foreach($signs as $sign => $range) {
            $month_from = key($range);
            $day_from = current($range);
            end($range);
            $month_to = key($range);
            $day_to = current($range);

            if($month == $month_from){
                if($day >= $day_from){
                    $output = $sign;
                    break;
                }
            }
            elseif($month == $month_to){
                if($day <= $day_to){
                    $output = $sign;
                    break;
                }
            }
        }
    
        return $output;
    }

    /**
    * @return Array - 3x3 grid cells numbered from 1 to 9.
    */
    public function makeGrid(int $day, int $month, int $year, $extra = false)
    {
        $base_numbers = str_split($day.$month.$year);
        $placements = [1 => [], 2 => [], 3 => [], 4 => [], 5 => [], 6 => [], 7 => [], 8 => [], 9 => []];
        
        // Place day
        $day_array = str_split($day);
        $day_arrow = $this->getDayArrow($day);
        foreach($day_array as $number) {
            if ($number > 0) {
                $placements[$number][] = ['type' => 'main', 'arrow' => $day_arrow, 'origin' => 'day'];
            }
        }

        // Place month
        $month_array = str_split($month);
        $month_arrow = $this->getMonthArrow($day, $month);
        foreach($month_array as $number) {
            if ($number > 0) $placements[$number][] = ['type' => 'main', 'arrow' => $month_arrow, 'origin' => 'month'];
        }

        // Place year
        $year_array = str_split($year);
        $mil_arrow = $this->getDigitArrow($year_array[0]); // millennium
        $dec_arrow = $this->getYearArrow($year); // decade
        $placements[$year_array[0]][] = ["type" => "main", "arrow" => $mil_arrow, 'origin' => 'year'];
        $non_zero = $year_array[0];
        if($year_array[1] == 0) $placements[$non_zero][] = ["type" => "main", "arrow" => $mil_arrow, 'origin' => 'year'];
        else $placements[$year_array[1]][] = ["type" => "main", "arrow" => $mil_arrow, 'origin' => 'year'];
        if($year_array[2] == 0) $placements[$non_zero][] = ["type" => "main", "arrow" => $dec_arrow, 'origin' => 'year'];
        else $placements[$year_array[2]][] = ["type" => "main", "arrow" => $dec_arrow, 'origin' => 'year'];
        if($year_array[3] == 0) $placements[$non_zero][] = ["type" => "main", "arrow" => $dec_arrow, 'origin' => 'year'];
        else $placements[$year_array[3]][] = ["type" => "main", "arrow" => $dec_arrow, 'origin' => 'year'];
        
        // Derivatives
        if ($extra) {
            // Day
            $day_derived = str_split($this->getReducedNumber($day));
            foreach($day_derived as $number) {
                $placements[$number][] = ['type' => 'derived', 'arrow' => $day_arrow, 'origin' => 'day'];
            }

            // Month
            $month_derived = str_split($this->getReducedNumber($month));
            foreach($month_derived as $number) {
                $placements[$number][] = ['type' => 'derived', 'arrow' => $month_arrow, 'origin' => 'month'];
            }
            
            // 
            $year_derived = str_split($this->getReducedNumber($year));
            foreach($year_derived as $number) {
                $placements[$number][] = ['type' => 'derived', 'arrow' => $dec_arrow, 'origin' => 'year'];
            }

            // Creature
            $creature_number = $this->getCreatureNumber($day, $month, $year);
            $creature_arrow = $this->getCreatureArrow($creature_number);
            $creature_array = str_split($creature_number);
            foreach($creature_array as $number) {
                if ($number > 0) $placements[$number][] = ['type' => 'derived', 'arrow' => $month_arrow, 'origin' => 'creature'];
            }
            $placements[$this->getReducedNumber($creature_number)][] = ['type' => 'derived', 'arrow' => $dec_arrow, 'origin' => 'creature'];
        }
    
        return $placements;
    }

    public function getGridLines($grid_array)
    {
        $results = [ 'full' => [], 'empty' => [], 'isolated' => [], ];

        $full_items = \App\Models\MatrixFullLevel::get(['code', 'meaning']);
        $full_map = [];
        foreach($full_items as $item) $full_map[$item['code']] = $item['meaning'];

        $empty_items = \App\Models\MatrixEmptyLevel::get(['code', 'meaning']);
        $empty_map = [];
        foreach($empty_items as $item) $empty_map[$item['code']] = $item['meaning'];
    
        $isolated_items = \App\Models\IsolatedNumber::get(['number', 'code']);
        $isolated_map = [];
        foreach($isolated_items as $item) $isolated_map[$item['number']] = $item['code'];
        
        // Determine filled & empty cells.
        $filled_cells = [];
        $empty_cells = [];
        foreach($grid_array as $key => $cell) {
            if(count($cell) > 0) $filled_cells[] = $key;
            else $empty_cells[] = $key;
        }

        // List of ajacent numbers relative to location of each cells.
        $number_links = $this->number_links;
        // Cell combination that form complete straight lines.
        $grid_lines = $this->grid_lines;

        // Determine complete lines.
        foreach($grid_lines as $cues) {
            $cues_array = str_split($cues);
            $filled_count = 0;
            $empty_count = 0;
            # 
            foreach($cues_array as $cue) {
                if(in_array($cue, $filled_cells)) $filled_count++;
                else if(in_array($cue, $empty_cells)) $empty_count++;
            }

            if($filled_count == 3) $results['full'][] = ['key' => $cues, 'value' => $full_map[$cues]];
            if($empty_count == 3) $results['empty'][] = ['key' => $cues, 'value' => $empty_map[$cues]];
        }
        ksort($results['full']);
        ksort($results['empty']);

        // Determine isolated cells.
        foreach($filled_cells as $filled) {
            if($filled != 0){
                $neighbors = array_intersect($number_links[$filled], $filled_cells);
                if(count($neighbors) == 0) $results['isolated'][] = ['key' => $cues, 'value' => $isolated_map[$cues]];
            }
        }
        # Sort isolated matches
        ksort($results['isolated']);

        return $results;
    }

    /**
    * Extra grid lines and arrows.
    */
    public function getExtraGridLines($grid_array, $extra_grid_array, $arrow_codes, $missing_codes)
    {
        $results = [ 'full' => [], 'missing' => [], 'arrow_codes' => [] ];
        $full = []; $full_extra = []; $missing = [];

        $full_items = \App\Models\MatrixFullLevel::get(['code', 'meaning']);
        $full_map = [];
        foreach($full_items as $item) $full_map[$item['code']] = $item['meaning'];

        $empty_items = \App\Models\MatrixEmptyLevel::get(['code', 'meaning']);
        $empty_map = [];
        foreach($empty_items as $item) $empty_map[$item['code']] = $item['meaning'];
    
        $isolated_items = \App\Models\IsolatedNumber::get(['number', 'code']);
        $isolated_map = [];
        foreach($isolated_items as $item) $isolated_map[$item['number']] = $item['code'];
        
        // Determine filled & empty cells.
        $filled_cells = [];
        $empty_cells = [];
        $extra_filled_cells = [];
        $extra_empty_cells = [];

        foreach($grid_array as $key => $cell) {
            if(count($cell) > 0) $filled_cells[] = $key;
            else $empty_cells[] = $key;
        }
        foreach($extra_grid_array as $key => $cell) {
            if(count($cell) > 0) $extra_filled_cells[] = $key;
            else $extra_empty_cells[] = $key;
        }
        // List of ajacent numbers relative to location of each cells.
        $number_links = $this->number_links;
        // Cell combination that form complete straight lines.
        $grid_lines = $this->grid_lines;

        // Determine complete lines.
        foreach($grid_lines as $cues) {
            $cues_array = str_split($cues);
            $filled_count = 0;
            foreach($cues_array as $cue) if(in_array($cue, $filled_cells)) $filled_count++;

            if($filled_count == 3) $full[$cues] = $full_map[$cues];
        }
        
        //(1) Determine new full line matches formed after adding derivative numbers.
        # Go through grid lines reference
        foreach($grid_lines as $cues) {
            $cues_array = str_split($cues);
            $full_count = 0;
            foreach($cues_array as $cue) if(in_array($cue, $extra_filled_cells)) $full_count++;
            if($full_count == 3) $full_extra[$cues] = $full_map[$cues];
        }
        
        //(2) Determine code for cell number-arrow combinations.
        $input_patterns = [];
        foreach($extra_grid_array as $number => $value) {
            foreach($value as $item) $input_patterns[] = $number.$item['arrow'];
        }
        $input_patterns = array_unique($input_patterns);
        foreach($input_patterns as $input) {
            foreach($arrow_codes as $pattern) {
                if (preg_match($pattern['pattern'], $input)) {
                    $results['arrow_codes'][] = [ 'key' => $input, 'value' => $pattern['code'] ];
                }
            }
        }
        //(3) Set missing number codes.
        foreach($missing_codes as $record) {
            $number = $record['number'];
            $code = $record['code'];
            if(in_array($number, $extra_empty_cells)) $results['missing'][] = ['key' => $number, 'value' => $code];
        }

        // Set full values in array form.
        $full_result = array_diff($full_extra, $full);
        ksort($full_result);
        foreach($full_result as $key => $value) $results['full'][] = ['key' => $key, 'value' => $value];

        return $results;
    }
    
}
