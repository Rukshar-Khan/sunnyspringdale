<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Result $result
 * @var \Cake\Collection\CollectionInterface|string[] $students
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Results'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="results form content">
            <?= $this->Form->create($result) ?>
            <fieldset>
                <legend><?= __('Add Result') ?></legend>
                <?php
                    echo $this->Form->control('student_id', ['options' => $students, 'empty' => true]);
                    echo $this->Form->control('academic_year');
                    echo $this->Form->control('term1_total_marks');
                    echo $this->Form->control('term1_percentage');
                    echo $this->Form->control('term1_grade');
                    echo $this->Form->control('term2_total_marks');
                    echo $this->Form->control('term2_percentage');
                    echo $this->Form->control('term2_grade');
                    echo $this->Form->control('cumulative_total_marks');
                    echo $this->Form->control('cumulative_percentage');
                    echo $this->Form->control('cumulative_grade');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
