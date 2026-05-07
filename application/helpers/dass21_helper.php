<?php

if (!function_exists('test_result')) {
    function test_result($question_data)
    {
        // DASS-21 Question Mappings
        $depression_nos = [3, 5, 10, 13, 16, 17, 21];
        $anxiety_nos    = [2, 4, 7, 9, 15, 19, 20];
        $stress_nos     = [1, 6, 8, 11, 12, 14, 18];

        $d_questions = [];
        $a_questions = [];
        $s_questions = [];

        // Sort data into categories
        foreach ($question_data as $item) {
            $q_no = $item['question_no'];
            if (in_array($q_no, $depression_nos)) {
                $d_questions[] = $item;
            } elseif (in_array($q_no, $anxiety_nos)) {
                $a_questions[] = $item;
            } elseif (in_array($q_no, $stress_nos)) {
                $s_questions[] = $item;
            }
        }

        $d_score = calculate_test($d_questions);
        $a_score = calculate_test($a_questions);
        $s_score = calculate_test($s_questions);

        return [
            "depression" => [
                "d_score" => $d_score,
                "level"   => rule_depression_level($d_score)
            ],
            "anxiety" => [
                "a_score" => $a_score,
                "level"   => rule_anxiety_level($a_score)
            ],
            "stress" => [
                "s_score" => $s_score,
                "level"   => rule_stress_level($s_score)
            ]
        ];
    }
}

function calculate_test($category)
{
    $sum = 0;
    foreach ($category as $item) {
        $sum += $item['answer_value'];
    }
    return $sum * 2;
}

/**
 * Depression Level Rules
 * Normal: 0-9, Ringan: 10-13, Sedang: 14-20, Parah: 21-27, Sangat Parah: 28+
 */
function rule_depression_level($value)
{
    if ($value >= 0 && $value < 10) {
        return "Normal";
    } elseif ($value >= 10 && $value < 14) {
        return "Ringan";
    } elseif ($value >= 14 && $value < 21) {
        return "Sedang";
    } elseif ($value >= 21 && $value < 28) {
        return "Parah";
    } else {
        return "Sangat Parah";
    }
}

/**
 * Anxiety Level Rules
 * Normal: 0-7, Ringan: 8-9, Sedang: 10-14, Parah: 15-19, Sangat Parah: 20+
 */
function rule_anxiety_level($value)
{
    if ($value >= 0 && $value < 8) {
        return "Normal";
    } elseif ($value >= 8 && $value < 10) {
        return "Ringan";
    } elseif ($value >= 10 && $value < 15) {
        return "Sedang";
    } elseif ($value >= 15 && $value < 20) {
        return "Parah";
    } else {
        return "Sangat Parah";
    }
}

/**
 * Stress Level Rules
 * Normal: 0-14, Ringan: 15-18, Sedang: 19-25, Parah: 26-33, Sangat Parah: 34+
 */
function rule_stress_level($value)
{
    if ($value >= 0 && $value < 15) {
        return "Normal";
    } elseif ($value >= 15 && $value < 19) {
        return "Ringan";
    } elseif ($value >= 19 && $value < 26) {
        return "Sedang";
    } elseif ($value >= 26 && $value < 34) {
        return "Parah";
    } else {
        return "Sangat Parah";
    }
}

function get_bootstrap_color($level)
{
    switch ($level) {
        case "Normal":
            return "success";
        case "Ringan":
            return "info";
        case "Sedang":
            return "warning";
        case "Parah":
            return "danger";
        case "Sangat Parah":
            return "danger";
    }
}
