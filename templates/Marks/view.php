<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mark $mark
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Mark'), ['action' => 'edit', $mark->mark_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Mark'), ['action' => 'delete', $mark->mark_id], ['confirm' => __('Are you sure you want to delete # {0}?', $mark->mark_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Marks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Mark'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="marks view content">
            <h3><?= h($mark->academic_year) ?></h3>
            <table>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $mark->has('student') ? $this->Html->link($mark->student->name, ['controller' => 'Students', 'action' => 'view', $mark->student->student_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Academic Year') ?></th>
                    <td><?= h($mark->academic_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rollno') ?></th>
                    <td><?= h($mark->rollno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Class') ?></th>
                    <td><?= h($mark->class) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mark Id') ?></th>
                    <td><?= $this->Number->format($mark->mark_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term1 Subject 1') ?></th>
                    <td><?= $mark->term1_subject_1 === null ? '' : $this->Number->format($mark->term1_subject_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term1 Subject 2') ?></th>
                    <td><?= $mark->term1_subject_2 === null ? '' : $this->Number->format($mark->term1_subject_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term1 Subject 3') ?></th>
                    <td><?= $mark->term1_subject_3 === null ? '' : $this->Number->format($mark->term1_subject_3) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term1 Subject 4') ?></th>
                    <td><?= $mark->term1_subject_4 === null ? '' : $this->Number->format($mark->term1_subject_4) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term1 Subject 5') ?></th>
                    <td><?= $mark->term1_subject_5 === null ? '' : $this->Number->format($mark->term1_subject_5) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term1 Total Marks') ?></th>
                    <td><?= $mark->term1_total_marks === null ? '' : $this->Number->format($mark->term1_total_marks) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term2 Subject 1') ?></th>
                    <td><?= $mark->term2_subject_1 === null ? '' : $this->Number->format($mark->term2_subject_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term2 Subject 2') ?></th>
                    <td><?= $mark->term2_subject_2 === null ? '' : $this->Number->format($mark->term2_subject_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term2 Subject 3') ?></th>
                    <td><?= $mark->term2_subject_3 === null ? '' : $this->Number->format($mark->term2_subject_3) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term2 Subject 4') ?></th>
                    <td><?= $mark->term2_subject_4 === null ? '' : $this->Number->format($mark->term2_subject_4) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term2 Subject 5') ?></th>
                    <td><?= $mark->term2_subject_5 === null ? '' : $this->Number->format($mark->term2_subject_5) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term2 Total Marks') ?></th>
                    <td><?= $mark->term2_total_marks === null ? '' : $this->Number->format($mark->term2_total_marks) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cumulative Total Marks') ?></th>
                    <td><?= $mark->cumulative_total_marks === null ? '' : $this->Number->format($mark->cumulative_total_marks) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
