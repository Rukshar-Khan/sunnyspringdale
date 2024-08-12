<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MarksFixture
 */
class MarksFixture extends TestFixture
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
                'mark_id' => 1,
                'student_id' => 1,
                'academic_year' => 'Lorem i',
                'rollno' => 'Lorem ipsum dolor ',
                'class' => 'Lorem ipsum dolor sit amet',
                'term1_subject_1' => 1,
                'term1_subject_2' => 1,
                'term1_subject_3' => 1,
                'term1_subject_4' => 1,
                'term1_subject_5' => 1,
                'term1_total_marks' => 1,
                'term2_subject_1' => 1,
                'term2_subject_2' => 1,
                'term2_subject_3' => 1,
                'term2_subject_4' => 1,
                'term2_subject_5' => 1,
                'term2_total_marks' => 1,
                'cumulative_total_marks' => 1,
            ],
        ];
        parent::init();
    }
}
