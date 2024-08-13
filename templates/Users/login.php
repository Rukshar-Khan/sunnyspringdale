<!-- in /templates/Users/login.php -->


<div class="container align-items-center w-50 rounded border border-4 shadow-lg p-5">
    <div> 
        <h3 class="text-center ">LOG-IN</h3>
      </div>
      <div class="hr">
        
            <div class="mb-3">
            <?= $this->Form->create() ?>
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <?= $this->Form->email('email', ['class' => 'form-control', 'placeholder' => 'Email Id']); ?>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <?= $this->Form->password('password', ['class' => 'form-control', 'placeholder' => 'Password']); ?>
            </div>
            <div class="text-center">
            <?= $this->Form->submit(__('Login'),['type' => 'submit', 'class' => 'btn btn-primary m-3']); ?>
            <?= $this->Form->end() ?>

            <?= $this->Html->link("Add User", ['action' => 'add']) ?>
            
              </div>
            
      </div>
      </div>