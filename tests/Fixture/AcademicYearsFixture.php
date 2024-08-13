<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AcademicYearsFixture
 */
class AcademicYearsFixture extends TestFixture
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
                'year_id' => 1,
                'academic_year' => 'Lorem i',
                'student_id' => 1,
            ],
        ];
        parent::init();
    }
}
