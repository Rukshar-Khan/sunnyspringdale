<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mark $mark
 * @var \Cake\Collection\CollectionInterface|string[] $students
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Marks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="marks form content">
            <?= $this->Form->create($mark) ?>
            <fieldset>
                <legend><?= __('Add Mark') ?></legend>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students, 'empty' => true]);
                    echo $this->Form->control('academic_year');
                    echo $this->Form->control('rollno');
                    echo $this->Form->control('class');
                    echo $this->Form->control('term1_subject_1');
                    echo $this->Form->control('term1_subject_2');
                    echo $this->Form->control('term1_subject_3');
                    echo $this->Form->control('term1_subject_4');
                    echo $this->Form->control('term1_subject_5');
                    echo $this->Form->control('term1_total_marks');
                    echo $this->Form->control('term2_subject_1');
                    echo $this->Form->control('term2_subject_2');
                    echo $this->Form->control('term2_subject_3');
                    echo $this->Form->control('term2_subject_4');
                    echo $this->Form->control('term2_subject_5');
                    echo $this->Form->control('term2_total_marks');
                    echo $this->Form->control('cumulative_total_marks');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
