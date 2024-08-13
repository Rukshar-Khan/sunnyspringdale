<!-- <div class="container-fluid mt-3 p-5 shadow w-75  text-center rounded" style="background-color: #d9d4f7;" >
  <h3>Sunny's Spring Dale School</h3>

  <div class="card my-2 text-center shadow ">
    <div class="card-body ">
      <h4 class="card-title">Select Year:</h4>     
      <select class="form-select" aria-label="Default select example">
        <option selected>Select Year</option>
        <option value="1">2023-2024</option>
        </select>
    </div>
    </div>

    <div class="card  text-center shadow-lg">
        <div class="card-body">
          <h4 class="card-title">Select Term:</h4>     
          <select class="form-select" aria-label="Default select example">
            <option selected>Select Term</option>
            <option value="1">Term1</option>
            <option value="1">Term2</option>
          </select>
        </div>

        <div class="card m-2 text-center shadow bg-light">
            <div class="card-body">
              <h4 class="card-title">Enter Roll No:</h4>     
              <div class=" my-4">
                <input class="form-control" type="text" placeholder="Roll No" aria-label="default input example">
              </div>
            </div>
            <div class="card m-2 text-center shadow bg-light">
                <div class="card-body">
                  <h4 class="card-title">Enter Mother's Name:</h4>     
                  <div class="my-4">
                  <input class="form-control" type="text" placeholder="Mother's Name" aria-label="default input example">
                  </div>
                </div>
                </div>
                <a href="<?= $this->Url->build(['controller' => 'Results', 'action' => 'marksheet']); ?>">
                <button type="button" class="btn btn-primary px-5 m-2">Get REsult</button></a>
            </div>
            <a href="project.html">
            <button type="button" class="btn btn-success px-5 my-2 mx-5">Back To Home</button><a>


        </div>

    
</div> -->

<div class="container-fluid mt-3 p-5 shadow w-75 text-center rounded" style="background-color: #d9d4f7;">
  <h3>Sunny's Spring Dale School</h3>

  <?= $this->Form->create(null, ['url' => ['controller' => 'Results', 'action' => 'marksheet'], 'type' => 'post']) ?>
    
    <!-- Year Selection -->
    <div class="card my-2 text-center shadow">
      <div class="card-body">
        <h4 class="card-title">Select Year:</h4>
        <?= $this->Form->control('year', [
              'type' => 'select', 
              'options' => ['2021-2022' => '2021-2022',
                            '2022-2023' => '2022-2023',
                            '2023-2024' => '2023-2024',
                            '2024-2025' => '2024-2025',], 
              'empty' => 'Select Year', 
              'label' => false,
              'class' => 'form-select'
        ]); ?>
      </div>
    </div>

    <!-- Term Selection -->
    <div class="card text-center shadow-lg">
      <div class="card-body">
        <h4 class="card-title">Select Term:</h4>
        <?= $this->Form->control('term', [
              'type' => 'select', 
              'options' => ['Term1' => 'Term1', 'Term2' => 'Term2'], 
              'empty' => 'Select Term', 
              'label' => false,
              'class' => 'form-select'
        ]); ?>
      </div>
    </div>

    <!-- Roll Number Input -->
    <div class="card m-2 text-center shadow bg-light">
      <div class="card-body">
        <h4 class="card-title">Enter Roll No:</h4>
        <div class="my-4">
          <?= $this->Form->control('roll_no', [
                'type' => 'text', 
                'placeholder' => 'Roll No', 
                'label' => false, 
                'class' => 'form-control'
          ]); ?>
        </div>
      </div>
    </div>

    <!-- Mother's Name Input -->
    <div class="card m-2 text-center shadow bg-light">
      <div class="card-body">
        <h4 class="card-title">Enter Mother's Name:</h4>
        <div class="my-4">
          <?= $this->Form->control('mother_name', [
                'type' => 'text', 
                'placeholder' => "Mother's Name", 
                'label' => false, 
                'class' => 'form-control'
          ]); ?>
        </div>
      </div>
    </div>

    <!-- Submit Button -->
    <?= $this->Form->button('Get Result', [
          'type' => 'submit', 
          'class' => 'btn btn-primary px-5 m-2'
    ]); ?>

    <!-- Back to Home Button -->
    <a href="">
      <button type="button" class="btn btn-success px-5 my-2 mx-5">Back To Home</button>
    </a>
    
  <?= $this->Form->end() ?>
</div>
