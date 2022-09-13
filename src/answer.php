<?php

$in = [
    ['2nd' => 'two', 'four' => '4th'],
    'three' => '3rd',
    ['one' => '1st'],
    '10th' => 'ten',
    ['6th' => 'six'],
    '5th' => 'five',
    'seven' => '7th',
    ['fourteen' => '14th', '11th' => 'eleven'],
    ['8th' => 'eight'],
    'thirteen' => '13th',
    '12th' => 'twelve',
    'nine' => '9th',
    ['15th' => 'fifteen'],
];

$out = [];

foreach ($in as $key => $val) {
    $arr = is_array($val) ? $val : [$key => $val];

    foreach ($arr as $k => $v) {
        $out += preg_match('/^\d/', $v) === 1 ? [$v => $k] : [$k => $v];
    }
}

ksort($out, SORT_NUMERIC);

$expected = [
    '1st' => 'one',
    '2nd' => 'two',
    '3rd' => 'three',
    '4th' => 'four',
    '5th' => 'five',
    '6th' => 'six',
    '7th' => 'seven',
    '8th' => 'eight',
    '9th' => 'nine',
    '10th' => 'ten',
    '11th' => 'eleven',
    '12th' => 'twelve',
    '13th' => 'thirteen',
    '14th' => 'fourteen',
    '15th' => 'fifteen',
];

assert($expected === $out, '間違い');
