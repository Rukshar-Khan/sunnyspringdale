<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Result> $results
 */
?>
<div class="results index content">
    <!-- <?= $this->Html->link(__('New Result'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3><?= __('Results') ?></h3>
    <div class="table-responsive ">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('result_id') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th><?= $this->Paginator->sort('academic_year') ?></th>
                    <th><?= $this->Paginator->sort('term1_total_marks') ?></th>
                    <th><?= $this->Paginator->sort('term1_percentage') ?></th>
                    <th><?= $this->Paginator->sort('term1_grade') ?></th>
                    <th><?= $this->Paginator->sort('term2_total_marks') ?></th>
                    <th><?= $this->Paginator->sort('term2_percentage') ?></th>
                    <th><?= $this->Paginator->sort('term2_grade') ?></th>
                    <th><?= $this->Paginator->sort('cumulative_total_marks') ?></th>
                    <th><?= $this->Paginator->sort('cumulative_percentage') ?></th>
                    <th><?= $this->Paginator->sort('cumulative_grade') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                <tr>
                    <td><?= $this->Number->format($result->result_id) ?></td>
                    <td><?= $result->has('student') ? $this->Html->link($result->student->name, ['controller' => 'Students', 'action' => 'view', $result->student->student_id]) : '' ?></td>
                    <td><?= h($result->academic_year) ?></td>
                    <td><?= $result->term1_total_marks === null ? '' : $this->Number->format($result->term1_total_marks) ?></td>
                    <td><?= $result->term1_percentage === null ? '' : $this->Number->format($result->term1_percentage) ?></td>
                    <td><?= h($result->term1_grade) ?></td>
                    <td><?= $result->term2_total_marks === null ? '' : $this->Number->format($result->term2_total_marks) ?></td>
                    <td><?= $result->term2_percentage === null ? '' : $this->Number->format($result->term2_percentage) ?></td>
                    <td><?= h($result->term2_grade) ?></td>
                    <td><?= $result->cumulative_total_marks === null ? '' : $this->Number->format($result->cumulative_total_marks) ?></td>
                    <td><?= $result->cumulative_percentage === null ? '' : $this->Number->format($result->cumulative_percentage) ?></td>
                    <td><?= h($result->cumulative_grade) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $result->result_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $result->result_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $result->result_id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->result_id)]) ?>
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
