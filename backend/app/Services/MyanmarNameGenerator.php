<?php

namespace App\Services;

class MyanmarNameGenerator
{
    private array $used = [];

    // =========================
    // MALE STYLE POOLS
    // =========================
    private array $male_prefix = [
        'Aung', 'Min', 'Kyaw', 'Zaw', 'Htet', 'Soe', 'Win', 'Phyo', 'Thura', 'Nay'
    ];

    private array $male_middle = [
        'Htet', 'Min', 'Kyaw', 'Naing', 'Wai', 'Zin', 'Aung', 'Hla', 'Shine'
    ];

    private array $male_suffix = [
        'Win', 'Aung', 'Kyaw', 'Htun', 'Soe', 'Naing', 'Moe', 'Zaw', 'Thein'
    ];

    // =========================
    // FEMALE STYLE POOLS
    // =========================
    private array $female_prefix = [
        'Ei', 'Thida', 'Hnin', 'May', 'Sandar', 'Nwe', 'Phyu', 'Yadanar', 'Su', 'Khin'
    ];

    private array $female_middle = [
        'Ei', 'Thida', 'Hnin', 'May', 'Pwint', 'Sanda', 'Yee', 'Nandar', 'Hlaing'
    ];

    private array $female_suffix = [
        'May', 'Thida', 'Hnin', 'Pwint', 'Sanda', 'Yee', 'Nwe', 'Phyu', 'Khin'
    ];

    // =========================
    // PUBLIC API
    // =========================
    public function generate(string $gender, int $count = 20): array
    {
        $results = [];

        for ($i = 0; $i < $count; $i++) {

            $name = $this->generateOne($gender);

            while (isset($this->used[$name])) {
                $name = $this->generateOne($gender, true);
            }

            $this->used[$name] = true;
            $results[] = $name;
        }

        return $results;
    }

    // =========================
    // MAIN GENERATOR
    // =========================
    private function generateOne(string $gender, bool $forceShuffle = false): string
    {
        $style = rand(1, 3);

        return match ($gender) {

            // =========================
            // MALE STYLE
            // =========================
            'male' => $this->maleStyle($style, $forceShuffle),

            // =========================
            // FEMALE STYLE
            // =========================
            'female' => $this->femaleStyle($style, $forceShuffle),

            // =========================
            // FALLBACK (MIXED)
            // =========================
            default => $this->maleStyle($style, $forceShuffle),
        };
    }

    // =========================
    // MALE PATTERNS
    // =========================
    private function maleStyle(int $style, bool $force): string
    {
        if ($force) {
            shuffle($this->male_prefix);
            shuffle($this->male_suffix);
        }

        return match ($style) {

            1 => $this->pick($this->male_prefix) . ' ' . $this->pick($this->male_suffix),

            2 => $this->pick($this->male_prefix) . ' ' .
                 $this->pick($this->male_middle) . ' ' .
                 $this->pick($this->male_suffix),

            default => $this->pick($this->male_middle) . ' ' . $this->pick($this->male_suffix),
        };
    }

    // =========================
    // FEMALE PATTERNS
    // =========================
    private function femaleStyle(int $style, bool $force): string
    {
        if ($force) {
            shuffle($this->female_prefix);
            shuffle($this->female_suffix);
        }

        return match ($style) {

            1 => $this->pick($this->female_prefix) . ' ' . $this->pick($this->female_suffix),

            2 => $this->pick($this->female_prefix) . ' ' .
                 $this->pick($this->female_middle) . ' ' .
                 $this->pick($this->female_suffix),

            default => $this->pick($this->female_middle) . ' ' . $this->pick($this->female_suffix),
        };
    }

    // =========================
    // SAFE PICKER
    // =========================
    private function pick(array $arr): string
    {
        return $arr[array_rand($arr)];
    }
}