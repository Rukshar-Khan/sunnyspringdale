<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResultsFixture
 */
class ResultsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'result_id' => 1,
                'student_id' => 1,
                'academic_year' => 'Lorem i',
                'term1_total_marks' => 1,
                'term1_percentage' => 1.5,
                'term1_grade' => 'Lo',
                'term2_total_marks' => 1,
                'term2_percentage' => 1.5,
                'term2_grade' => 'Lo',
                'cumulative_total_marks' => 1,
                'cumulative_percentage' => 1.5,
                'cumulative_grade' => 'Lo',
            ],
        ];
        parent::init();
    }
}
