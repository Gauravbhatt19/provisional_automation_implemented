<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style='margin-top:-8px;'>
  <a class="navbar-brand" href="./index.php" >Provisional Application Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0  text-center">
      <li class="nav-item">
        <a class="nav-link" href="./requestedp.php">Requested Provisional</a>
      </li> 
           <li class="nav-item">
        <a class="nav-link" href="./genrejp.php">Generated/Rejected Provisional</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="./reftb.php">Reference Table</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="./chngepss.php">Change Password</a>
      </li>   
        <a class="nav-link" href="javascript:void(0)" onclick="logout()"> Logout</a>
                 <script type="text/javascript">
          function logout(){
            var test= window.confirm("Are you sure, You want to logout !");
            if(test == true)
              window.location='./_logout.php';
          }
        </script>
      </li>
      </ul>
  </div>
</nav>