<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->student_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->student_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="students view content">
            <h3><?= h($student->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($student->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section') ?></th>
                    <td><?= h($student->section) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mother Name') ?></th>
                    <td><?= h($student->mother_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Admission Year') ?></th>
                    <td><?= h($student->admission_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pass Year') ?></th>
                    <td><?= h($student->pass_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Student Id') ?></th>
                    <td><?= $this->Number->format($student->student_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
