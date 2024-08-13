<!-- 
    <div class="container-fluid align-items-center" style="background-color: #d9d4f7;">
            <div class="container-fluid h3 text-center fw-bold ">
                    Sunny's Spring Dale School
                    <div class="text-center p-3 ">
                        <img src="springdalelogo.png" alt="..." style="width: 200px; height: 200px;">
                      </div>
            </div>
        <div class="row container-fluid border border-primary border-5 rounded m-0 d-flex justify-content-between bg-primary-subtle ">
            <div class="col-4">
                <div class=" bg-primary mt-3 ms-2 p-2  rounded text-white">
                    Student Name:
                </div>
                <div class=" bg-primary m-2 p-2 text-white rounded">
                    Roll No:
                </div>
                <div class=" bg-primary m-2 p-2 text-white rounded">
                    Admission No:
                </div>
            </div>
            <div class="col-4">
                <div class=" bg-primary mt-3 me-2 p-2 text-white rounded">
                    Class:
                </div>
                <div class=" bg-primary m-2 p-2 text-white rounded">
                    Mother's Name:
                </div>
                <div class=" bg-primary me-2 p-2 text-white rounded">
                    Section:
                </div>
            </div>
        </div>



        <table class="table mt-5">
            <thead>
              <tr>
                <th class="bg-primary text-white" scope="col">Subject</th>
                <th class="bg-primary text-white" scope="col">Total Marks</th>
                <th class="bg-primary text-white" scope="col">Obtained Marks</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">English</th>
                <td>111</td>
                <td>222</td>
              </tr>
              <tr>
                <th class="bg-primary-subtle" scope="row">Math</th>
                <td class="bg-primary-subtle">333</td>
                <td class="bg-primary-subtle">444</td>
              </tr>
              <tr>
                <th scope="row">Marathi</th>
                <td>555</td>
                <td>666</td>
              </tr>
              <tr>
                <th class="bg-primary-subtle"scope="row">EVS</th>
                <td class="bg-primary-subtle">333</td>
                <td class="bg-primary-subtle">444</td>
              </tr>
              <tr>
                <th scope="row">Hindi</th>
                <td>555</td>
                <td>666</td>
              </tr>
            </tbody>
          </table>

           <div class="bg-primary text-center text-white py-1 pt-3 rounded">
           <h5>Total : 
            </div>
           <div class="bg-light text-center py-1">
            <h5>Percentage(%) : 91.3
            </div>
            <div class="bg-primary text-center text-white py-1 pt-3 rounded">
            <h5>Grade : A1
            </div>
           
            <div class="text-center">
            <a href="project.html">
            <button type="button" class="btn btn-primary m-5">Home</button></a>
           </div>
    </div> -->
<!-- 
    <div class="container-fluid align-items-center" style="background-color: #d9d4f7;">
    <div class="container-fluid h3 text-center fw-bold">
        Sunny's Spring Dale School
        <div class="text-center p-3">
            <img src="<?= $this->Url->image('springdalelogo.png') ?>" alt="Logo" style="width: 200px; height: 200px;">
        </div>
    </div>

    <div class="row container-fluid border border-primary border-5 rounded m-0 d-flex justify-content-between bg-primary-subtle">
        <div class="col-4">
            <div class="bg-primary mt-3 ms-2 p-2 rounded text-white">
                Student Name: <?= isset($student)? h($student->name):'N/A' ?>
            </div>
            <div class="bg-primary m-2 p-2 text-white rounded">
                Roll No: <?= isset($student)? h($student->rollno): 'N/A' ?>
            </div>
            <div class="bg-primary m-2 p-2 text-white rounded">
                Admission No: <?= isset($student)? h($student->admission_no): 'N/A' ?>
            </div>
        </div>
        <div class="col-4">
            <div class="bg-primary mt-3 me-2 p-2 text-white rounded">
                Class: <?= isset($student)? h($student->class): 'N/A' ?>
            </div>
            <div class="bg-primary m-2 p-2 text-white rounded">
                Mother's Name: <?= isset($student)? h($student->mother_name): 'N/A' ?>
            </div>
            <div class="bg-primary me-2 p-2 text-white rounded">
                Section: <?= isset($student)? h($student->section): 'N/A' ?>
            </div>
        </div>
    </div>
    <?php //if (isset($marks)): ?>
    <table class="table mt-5">
        <thead>
            <tr>
                <th class="bg-primary text-white" scope="col">Subject</th>
                <th class="bg-primary text-white" scope="col">Total Marks</th>
                <th class="bg-primary text-white" scope="col">Obtained Marks</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">English</th>
                <td>100</td>
                <td><?= $term == 'Term1' ? h($marks->term1_subject_1) : h($marks->term2_subject_1) ?></td>
            </tr>
            <tr>
                <th class="bg-primary-subtle" scope="row">Math</th>
                <td class="bg-primary-subtle">100</td>
                <td class="bg-primary-subtle"><?= $term == 'Term1' ? h($marks->term1_subject_2) : h($marks->term2_subject_2) ?></td>
            </tr>
            <tr>
                <th scope="row">Marathi</th>
                <td>100</td>
                <td><?= $term == 'Term1' ? h($marks->term1_subject_3) : h($marks->term2_subject_3) ?></td>
            </tr>
            <tr>
                <th class="bg-primary-subtle" scope="row">EVS</th>
                <td class="bg-primary-subtle">100</td>
                <td class="bg-primary-subtle"><?= $term == 'Term1' ? h($marks->term1_subject_4) : h($marks->term2_subject_4) ?></td>
            </tr>
            <tr>
                <th scope="row">Hindi</th>
                <td>100</td>
                <td><?= $term == 'Term1' ? h($marks->term1_subject_5) : h($marks->term2_subject_5) ?></td>
            </tr>
        </tbody>
    </table>

    <div class="bg-primary text-center text-white py-1 pt-3 rounded">
        <h5>Total: <?= $term == 'Term1' ? h($marks->term1_total_marks) : h($marks->term2_total_marks) ?></h5>
    </div>
    <div class="bg-light text-center py-1">
        <h5>Percentage(%): <?= $term == 'Term1' ? h($results->term1_percentage) : h($results->term2_percentage) ?></h5>
    </div>
    <div class="bg-primary text-center text-white py-1 pt-3 rounded">
        <h5>Grade: <?= $term == 'Term1' ? h($results->term1_grade) : h($results->term2_grade) ?></h5>
    </div>

    <div class="text-center">
        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'home']) ?>">
            <button type="button" class="btn btn-primary m-5">Home</button>
        </a>
    </div>
</div> -->

<div class="container-fluid align-items-center" style="background-color: #d9d4f7;">
    <div class="container-fluid h3 text-center fw-bold">
        Sunny's Spring Dale School
        <div class="text-center p-3">
            <?= $this->Html->image('springdalelogo.png', ['alt' => 'Logo', 'style' => 'width: 200px; height: 200px;']) ?>
        </div>
    </div>

    <div class="row container-fluid border border-primary border-5 rounded m-0 d-flex justify-content-between bg-primary-subtle">
        <div class="col-4">
            <div class="bg-primary mt-3 ms-2 p-2 rounded text-white">
                Student Name: <?= isset($student) ? h($student->name) : 'N/A' ?>
            </div>
            <div class="bg-primary m-2 p-2 text-white rounded">
                Roll No: <?= isset($student) ? h($student->rollno) : 'N/A' ?>
            </div>
            <div class="bg-primary m-2 p-2 text-white rounded">
                Admission No: <?= isset($student) ? h($student->admission_no) : 'N/A' ?>
            </div>
        </div>
        <div class="col-4">
            <div class="bg-primary mt-3 me-2 p-2 text-white rounded">
                Class: <?= isset($student) ? h($student->class) : 'N/A' ?>
            </div>
            <div class="bg-primary m-2 p-2 text-white rounded">
                Mother's Name: <?= isset($student) ? h($student->mother_name) : 'N/A' ?>
            </div>
            <div class="bg-primary me-2 p-2 text-white rounded">
                Section: <?= isset($student) ? h($student->section) : 'N/A' ?>
            </div>
        </div>
    </div>

    <?php if (isset($marks) && isset($term)): ?>
    <table class="table mt-5">
        <thead>
            <tr>
                <th class="bg-primary text-white" scope="col">Subject</th>
                <th class="bg-primary text-white" scope="col">Total Marks</th>
                <th class="bg-primary text-white" scope="col">Obtained Marks</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">English</th>
                <td>100</td>
                <td><?= $term == 'Term1' ? h($marks->term1_subject_1) : h($marks->term2_subject_1) ?></td>
            </tr>
            <tr>
                <th class="bg-primary-subtle" scope="row">Math</th>
                <td class="bg-primary-subtle">100</td>
                <td class="bg-primary-subtle"><?= $term == 'Term1' ? h($marks->term1_subject_2) : h($marks->term2_subject_2) ?></td>
            </tr>
            <tr>
                <th scope="row">Marathi</th>
                <td>100</td>
                <td><?= $term == 'Term1' ? h($marks->term1_subject_3) : h($marks->term2_subject_3) ?></td>
            </tr>
            <tr>
                <th class="bg-primary-subtle" scope="row">EVS</th>
                <td class="bg-primary-subtle">100</td>
                <td class="bg-primary-subtle"><?= $term == 'Term1' ? h($marks->term1_subject_4) : h($marks->term2_subject_4) ?></td>
            </tr>
            <tr>
                <th scope="row">Hindi</th>
                <td>100</td>
                <td><?= $term == 'Term1' ? h($marks->term1_subject_5) : h($marks->term2_subject_5) ?></td>
            </tr>
        </tbody>
    </table>

    <div class="bg-primary text-center text-white py-1 pt-3 rounded">
        <h5>Total: <?= $term == 'Term1' ? h($marks->term1_total_marks) : h($marks->term2_total_marks) ?></h5>
    </div>
    <div class="bg-light text-center py-1">
        <h5>Percentage(%): <?= $term == 'Term1' ? h($marks->term1_percentage) : h($marks->term2_percentage) ?></h5>
    </div>
    <div class="bg-primary text-center text-white py-1 pt-3 rounded">
        <h5>Grade: <?= $term == 'Term1' ? h($marks->term1_grade) : h($marks->term2_grade) ?></h5>
    </div>

    <?php else: ?>
        <p>No marks found for the selected term.</p>
    <?php endif; ?>

    <div class="text-center">
        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'home']) ?>">
            <button type="button" class="btn btn-primary m-5">Home</button>
        </a>
    </div>
</div>
