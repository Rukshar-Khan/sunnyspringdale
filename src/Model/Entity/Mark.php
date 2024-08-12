<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mark Entity
 *
 * @property int $mark_id
 * @property int|null $student_id
 * @property string $academic_year
 * @property string $rollno
 * @property string $class
 * @property int|null $term1_subject_1
 * @property int|null $term1_subject_2
 * @property int|null $term1_subject_3
 * @property int|null $term1_subject_4
 * @property int|null $term1_subject_5
 * @property int|null $term1_total_marks
 * @property int|null $term2_subject_1
 * @property int|null $term2_subject_2
 * @property int|null $term2_subject_3
 * @property int|null $term2_subject_4
 * @property int|null $term2_subject_5
 * @property int|null $term2_total_marks
 * @property int|null $cumulative_total_marks
 *
 * @property \App\Model\Entity\Student $student
 */
class Mark extends Entity
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
        'rollno' => true,
        'class' => true,
        'term1_subject_1' => true,
        'term1_subject_2' => true,
        'term1_subject_3' => true,
        'term1_subject_4' => true,
        'term1_subject_5' => true,
        'term1_total_marks' => true,
        'term2_subject_1' => true,
        'term2_subject_2' => true,
        'term2_subject_3' => true,
        'term2_subject_4' => true,
        'term2_subject_5' => true,
        'term2_total_marks' => true,
        'cumulative_total_marks' => true,
        'student' => true,
    ];
}
