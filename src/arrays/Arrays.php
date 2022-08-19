<?php

namespace arrays;

class Arrays implements ArraysInterface
{
    public function repeatArrayValues(array $input): array
    {
        $result = [];
        foreach ($input as $value) {
            for ($i = 0; $i < $value; $i++) {
                array_push($result, $value);
            }
        }
        return $result;
    }

    public function getUniqueValue(array $input): int
    {
        $result = [];
        $countValues = array_count_values($input);
        foreach ($input as $value) {
            if ($countValues[$value] == 1) {
                array_push($result, $value);
            }
        }
        return count($result) ? min($result) : 0;
    }

    public function groupByTag(array $input): array
    {
        $result = [];
        foreach ($input as $value) {
            foreach ($value['tags'] as $tag) {
                $result[$tag][] = $value['name'];
                sort($result[$tag]);
            }
        }
        return $result;
    }
}
