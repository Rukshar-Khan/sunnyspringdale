<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AcademicYear> $academicYears
 */
?>
<div class="academicYears index content">
    <?= $this->Html->link(__('New Academic Year'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Academic Years') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('year_id') ?></th>
                    <th><?= $this->Paginator->sort('academic_year') ?></th>
                    <th><?= $this->Paginator->sort('student_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($academicYears as $academicYear): ?>
                <tr>
                    <td><?= $this->Number->format($academicYear->year_id) ?></td>
                    <td><?= h($academicYear->academic_year) ?></td>
                    <td><?= $academicYear->has('student') ? $this->Html->link($academicYear->student->name, ['controller' => 'Students', 'action' => 'view', $academicYear->student->student_id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $academicYear->year_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $academicYear->year_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $academicYear->year_id], ['confirm' => __('Are you sure you want to delete # {0}?', $academicYear->year_id)]) ?>
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
