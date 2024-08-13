<div class="container row d-flex align-items-center me-5">
  <div class="col-2 ps-5 pe-2 ">  
    <!-- <img src="springdalelogo.png" width="150px " > -->
    <?php echo $this->Html->image('springdalelogo.png', [array('class'=>'shadow mb-3', 'style'=>'height="100px" width="100px"','alt'=>'Spring dale')]); ?>

    </div>
    <div class="col-2 p-3"></div>
    <div class="col-8 ">
   <h1 class="ms-3" style=" font-family: Cooper Black;">Sunny's Spring Dale School</h1>
  </div>
 </div>
<!-- Sidebar -->
     <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar" style ="height: 695px;">
                <div class="position-sticky pt-3">
                    <h3 class="mb-3 text-white">SSDSB</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="<?= $this->Url->build(['controller'=>'users','action'=>'dashboard']);?>">
                                <i class="fas fa-tachometer-alt text-white"></i> Dashboard
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-graduation-cap text-white"></i> Student Classes
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-book text-white"></i> Subjects
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= $this->Url->build(['controller'=>'students','action'=>'index']);?>">
                                <i class="fas fa-users text-white"></i> Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= $this->Url->build(['controller'=>'marks','action'=>'index']);?>">
                                <i class="fas fa-book text-white"></i> Marks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= $this->Url->build(['controller'=>'results','action'=>'index']);?>">
                                <i class="fas fa-chart-bar text-white"></i> Result
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= $this->Url->build(['controller'=>'users','action'=>'add']);?>">
                                <i class="fas fa-chart-bar text-white"></i> Add Users
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-bell text-white"></i> Notices
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-key text-white"></i> Admin Change Password
                            </a>
                        </li> -->
                    </ul>
                </div>
            </nav>

            

