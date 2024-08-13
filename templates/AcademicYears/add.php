<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AcademicYear $academicYear
 * @var \Cake\Collection\CollectionInterface|string[] $students
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Academic Years'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="academicYears form content">
            <?= $this->Form->create($academicYear) ?>
            <fieldset>
                <legend><?= __('Add Academic Year') ?></legend>
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
