<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Result Entity
 *
 * @property int $result_id
 * @property int|null $student_id
 * @property string|null $academic_year
 * @property int|null $term1_total_marks
 * @property string|null $term1_percentage
 * @property string|null $term1_grade
 * @property int|null $term2_total_marks
 * @property string|null $term2_percentage
 * @property string|null $term2_grade
 * @property int|null $cumulative_total_marks
 * @property string|null $cumulative_percentage
 * @property string|null $cumulative_grade
 *
 * @property \App\Model\Entity\Student $student
 */
class Result extends Entity
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
        'student_id' => true,
        'academic_year' => true,
        'term1_total_marks' => true,
        'term1_percentage' => true,
        'term1_grade' => true,
        'term2_total_marks' => true,
        'term2_percentage' => true,
        'term2_grade' => true,
        'cumulative_total_marks' => true,
        'cumulative_percentage' => true,
        'cumulative_grade' => true,
        'student' => true,
    ];
}
