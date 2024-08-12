<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Mark> $marks
 */
?>
<div class="marks index content">
    <?= $this->Html->link(__('New Mark'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Marks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('mark_id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('academic_year') ?></th>
                    <th><?= $this->Paginator->sort('rollno') ?></th>
                    <th><?= $this->Paginator->sort('class') ?></th>
                    <th><?= $this->Paginator->sort('term1_subject_1') ?></th>
                    <th><?= $this->Paginator->sort('term1_subject_2') ?></th>
                    <th><?= $this->Paginator->sort('term1_subject_3') ?></th>
                    <th><?= $this->Paginator->sort('term1_subject_4') ?></th>
                    <th><?= $this->Paginator->sort('term1_subject_5') ?></th>
                    <th><?= $this->Paginator->sort('term1_total_marks') ?></th>
                    <th><?= $this->Paginator->sort('term2_subject_1') ?></th>
                    <th><?= $this->Paginator->sort('term2_subject_2') ?></th>
                    <th><?= $this->Paginator->sort('term2_subject_3') ?></th>
                    <th><?= $this->Paginator->sort('term2_subject_4') ?></th>
                    <th><?= $this->Paginator->sort('term2_subject_5') ?></th>
                    <th><?= $this->Paginator->sort('term2_total_marks') ?></th>
                    <th><?= $this->Paginator->sort('cumulative_total_marks') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marks as $mark): ?>
                <tr>
                    <td><?= $this->Number->format($mark->mark_id) ?></td>
                    <td><?= $mark->has('student') ? $this->Html->link($mark->student->name, ['controller' => 'Students', 'action' => 'view', $mark->student->student_id]) : '' ?></td>
                    <td><?= h($mark->academic_year) ?></td>
                    <td><?= h($mark->rollno) ?></td>
                    <td><?= h($mark->class) ?></td>
                    <td><?= $mark->term1_subject_1 === null ? '' : $this->Number->format($mark->term1_subject_1) ?></td>
                    <td><?= $mark->term1_subject_2 === null ? '' : $this->Number->format($mark->term1_subject_2) ?></td>
                    <td><?= $mark->term1_subject_3 === null ? '' : $this->Number->format($mark->term1_subject_3) ?></td>
                    <td><?= $mark->term1_subject_4 === null ? '' : $this->Number->format($mark->term1_subject_4) ?></td>
                    <td><?= $mark->term1_subject_5 === null ? '' : $this->Number->format($mark->term1_subject_5) ?></td>
                    <td><?= $mark->term1_total_marks === null ? '' : $this->Number->format($mark->term1_total_marks) ?></td>
                    <td><?= $mark->term2_subject_1 === null ? '' : $this->Number->format($mark->term2_subject_1) ?></td>
                    <td><?= $mark->term2_subject_2 === null ? '' : $this->Number->format($mark->term2_subject_2) ?></td>
                    <td><?= $mark->term2_subject_3 === null ? '' : $this->Number->format($mark->term2_subject_3) ?></td>
                    <td><?= $mark->term2_subject_4 === null ? '' : $this->Number->format($mark->term2_subject_4) ?></td>
                    <td><?= $mark->term2_subject_5 === null ? '' : $this->Number->format($mark->term2_subject_5) ?></td>
                    <td><?= $mark->term2_total_marks === null ? '' : $this->Number->format($mark->term2_total_marks) ?></td>
                    <td><?= $mark->cumulative_total_marks === null ? '' : $this->Number->format($mark->cumulative_total_marks) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $mark->mark_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mark->mark_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mark->mark_id], ['confirm' => __('Are you sure you want to delete # {0}?', $mark->mark_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
