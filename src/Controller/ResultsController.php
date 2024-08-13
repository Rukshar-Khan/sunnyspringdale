<?php

declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Results Controller
 *
 * @property \App\Model\Table\ResultsTable $Results
 * @method \App\Model\Entity\Result[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResultsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Students');
        $this->loadModel('Marks');
        $this->loadModel('Results');
        // Load other models if needed
    }

    public function marksheet()
    {
        $this->viewBuilder()->setLayout('home');

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Ensure correct field name
            $rollNo = isset($data['roll_no']) ? $data['roll_no'] : null;

            if ($rollNo) {
                // Fetch student record or perform other actions
                $student = $this->Students->find()
                    ->where(['roll_no' => $rollNo])
                    ->first();

                if ($student) {
                    // Set the student data to view
                    $this->set('student', $student);
                } else {
                    $this->Flash->error(__('Student not found.'));
                }
            } else {
                $this->Flash->error(__('Roll No is required.'));
            }
        }
    }


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('uhome');

        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'marksheet', 'rform']);
    }
    // public function marksheet()
    // {
    //     // $this->viewBuilder()->setLayout('');
        
    //     if ($this->request->is('post')) {
    //         $data = $this->request->getData();
    //         $year = $data['year'];
    //         $term = $data['term'];
    //         $rollNo = $data['rollno'];
    //         $motherName = $data['mother_name'];

    //         $studentsTable = TableRegistry::getTableLocator()->get('Students');
    //         $marksTable = TableRegistry::getTableLocator()->get('Marks');
    //         $resultsTable = TableRegistry::getTableLocator()->get('Results');

    //         try {
    //             // Fetch student details based on roll number and mother's name
    //             $student = $studentsTable->find()
    //                 ->where(['rollno' => $rollNo, 'mother_name' => $motherName])
    //                 ->firstOrFail();

    //             // Fetch marks based on student ID and academic year
    //             $marks = $marksTable->find()
    //                 ->where(['student_id' => $student->id, 'academic_year' => $year])
    //                 ->firstOrFail();

    //             // Calculate results
    //             $result = $resultsTable->find()
    //                 ->where(['student_id' => $student->id])
    //                 ->firstOrFail();

    //             $this->set(compact('student', 'marks', 'result'));
    //         } catch (\Exception $e) {
    //             $this->Flash->error(__('Student or marks not found.'));
    //             return $this->redirect(['action' => 'index']);
    //         }
    //     }
    // }

    public function rform()
    {
        $this->viewBuilder()->setLayout('home');
        }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students'],
        ];
        $results = $this->paginate($this->Results);

        $this->set(compact('results'));
    }

    /**
     * View method
     *
     * @param string|null $id Result id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $result = $this->Results->get($id, [
            'contain' => ['Students'],
        ]);

        $this->set(compact('result'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $result = $this->Results->newEmptyEntity();
        if ($this->request->is('post')) {
            $result = $this->Results->patchEntity($result, $this->request->getData());
            if ($this->Results->save($result)) {
                $this->Flash->success(__('The result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The result could not be saved. Please, try again.'));
        }
        $students = $this->Results->Students->find('list', ['limit' => 200])->all();
        $this->set(compact('result', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Result id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $result = $this->Results->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $result = $this->Results->patchEntity($result, $this->request->getData());
            if ($this->Results->save($result)) {
                $this->Flash->success(__('The result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The result could not be saved. Please, try again.'));
        }
        $students = $this->Results->Students->find('list', ['limit' => 200])->all();
        $this->set(compact('result', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Result id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $result = $this->Results->get($id);
        if ($this->Results->delete($result)) {
            $this->Flash->success(__('The result has been deleted.'));
        } else {
            $this->Flash->error(__('The result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
