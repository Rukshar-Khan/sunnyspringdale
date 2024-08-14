<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Marks Model
 *
 * @property \App\Model\Table\StudentsTable&\Cake\ORM\Association\BelongsTo $Students
 *
 * @method \App\Model\Entity\Mark newEmptyEntity()
 * @method \App\Model\Entity\Mark newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Mark[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mark get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mark findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Mark patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mark[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mark|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mark saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mark[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mark[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mark[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mark[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MarksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('marks');
        $this->setDisplayField('academic_year');
        $this->setPrimaryKey('mark_id');

       // Associations
       $this->belongsTo('Students', [
        'foreignKey' => 'student_id',
        'joinType' => 'INNER',
    ]);

    $this->hasMany('Results', [
        'foreignKey' => 'student_id',
        'joinType' => 'INNER',
    ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('student_id')
            ->allowEmptyString('student_id');

        $validator
            ->scalar('academic_year')
            ->maxLength('academic_year', 9)
            ->requirePresence('academic_year', 'create')
            ->notEmptyString('academic_year');

        $validator
            ->scalar('rollno')
            ->maxLength('rollno', 20)
            ->requirePresence('rollno', 'create')
            ->notEmptyString('rollno');

        $validator
            ->scalar('class')
            ->maxLength('class', 50)
            ->requirePresence('class', 'create')
            ->notEmptyString('class');

        $validator
            ->integer('term1_subject_1')
            ->allowEmptyString('term1_subject_1');

        $validator
            ->integer('term1_subject_2')
            ->allowEmptyString('term1_subject_2');

        $validator
            ->integer('term1_subject_3')
            ->allowEmptyString('term1_subject_3');

        $validator
            ->integer('term1_subject_4')
            ->allowEmptyString('term1_subject_4');

        $validator
            ->integer('term1_subject_5')
            ->allowEmptyString('term1_subject_5');

        $validator
            ->integer('term1_total_marks')
            ->allowEmptyString('term1_total_marks');

        $validator
            ->integer('term2_subject_1')
            ->allowEmptyString('term2_subject_1');

        $validator
            ->integer('term2_subject_2')
            ->allowEmptyString('term2_subject_2');

        $validator
            ->integer('term2_subject_3')
            ->allowEmptyString('term2_subject_3');

        $validator
            ->integer('term2_subject_4')
            ->allowEmptyString('term2_subject_4');

        $validator
            ->integer('term2_subject_5')
            ->allowEmptyString('term2_subject_5');

        $validator
            ->integer('term2_total_marks')
            ->allowEmptyString('term2_total_marks');

        $validator
            ->integer('cumulative_total_marks')
            ->allowEmptyString('cumulative_total_marks');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('student_id', 'Students'), ['errorField' => 'student_id']);

        return $rules;
    }
}
