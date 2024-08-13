<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AcademicYear $academicYear
 * @var string[]|\Cake\Collection\CollectionInterface $students
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $academicYear->year_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $academicYear->year_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Academic Years'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="academicYears form content">
            <?= $this->Form->create($academicYear) ?>
            <fieldset>
                <legend><?= __('Edit Academic Year') ?></legend>
                <?php
                    echo $this->Form->control('academic_year');
                    echo $this->Form->control('student_id', ['options' => $students, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
