<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AcademicYear $academicYear
 */
?>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Academic Year'), ['action' => 'edit', $academicYear->year_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Academic Year'), ['action' => 'delete', $academicYear->year_id], ['confirm' => __('Are you sure you want to delete # {0}?', $academicYear->year_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Academic Years'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Academic Year'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column-responsive column-80">
        <div class="academicYears view content">
            <h3><?= h($academicYear->academic_year) ?></h3>
            <table>
                <tr>
                    <th><?= __('Academic Year') ?></th>
                    <td><?= h($academicYear->academic_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $academicYear->has('student') ? $this->Html->link($academicYear->student->name, ['controller' => 'Students', 'action' => 'view', $academicYear->student->student_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Year Id') ?></th>
                    <td><?= $this->Number->format($academicYear->year_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
