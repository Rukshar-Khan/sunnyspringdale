<div class="container-fluid p-0">
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
 <div class="">
 <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon bg-light"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link mx-5 text-white fw-bold" href="<?= $this->Url->build(['controller'=>'pages','action'=>'landing']);?>">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-5 text-white fw-bold" href="#">Admission</a>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link mx-5 text-white fw-bold " href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Academics
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="getresult.html">1st -4th std final Result</a></li>
              <li><a class="dropdown-item" href="#">5th std final Result</a></li>
              <li><a class="dropdown-item" href="#">6th -8th std final Result</a></li>
            </ul>
          </li>
        <li class="nav-item">
          <a class="nav-link mx-5 text-white fw-bold" href="#">Photo Gallery</a>
        </li>
      </ul>
    </div>

    <a href="<?= $this->Url->build(['controller'=>'users','action'=>'login']);?>">
      <button type="button" class="btn btn-transparent fw-bold text-white border border-white px-3 my-2 mx-5" >Log-In</button></a>


  </div>
</nav>

 </div>
</div>