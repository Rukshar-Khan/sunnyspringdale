<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AcademicYear Entity
 *
 * @property int $year_id
 * @property string $academic_year
 * @property int|null $student_id
 *
 * @property \App\Model\Entity\Student $student
 */
class AcademicYear extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'academic_year' => true,
        'student_id' => true,
        'student' => true,
    ];
}
