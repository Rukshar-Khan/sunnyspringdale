<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Result $result
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Result'), ['action' => 'edit', $result->result_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Result'), ['action' => 'delete', $result->result_id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->result_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Results'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Result'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="results view content">
            <h3><?= h($result->result_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Student') ?></th>
                    <td><?= $result->has('student') ? $this->Html->link($result->student->name, ['controller' => 'Students', 'action' => 'view', $result->student->student_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Academic Year') ?></th>
                    <td><?= h($result->academic_year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term1 Grade') ?></th>
                    <td><?= h($result->term1_grade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term2 Grade') ?></th>
                    <td><?= h($result->term2_grade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cumulative Grade') ?></th>
                    <td><?= h($result->cumulative_grade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Result Id') ?></th>
                    <td><?= $this->Number->format($result->result_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term1 Total Marks') ?></th>
                    <td><?= $result->term1_total_marks === null ? '' : $this->Number->format($result->term1_total_marks) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term1 Percentage') ?></th>
                    <td><?= $result->term1_percentage === null ? '' : $this->Number->format($result->term1_percentage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term2 Total Marks') ?></th>
                    <td><?= $result->term2_total_marks === null ? '' : $this->Number->format($result->term2_total_marks) ?></td>
                </tr>
                <tr>
                    <th><?= __('Term2 Percentage') ?></th>
                    <td><?= $result->term2_percentage === null ? '' : $this->Number->format($result->term2_percentage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cumulative Total Marks') ?></th>
                    <td><?= $result->cumulative_total_marks === null ? '' : $this->Number->format($result->cumulative_total_marks) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cumulative Percentage') ?></th>
                    <td><?= $result->cumulative_percentage === null ? '' : $this->Number->format($result->cumulative_percentage) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
