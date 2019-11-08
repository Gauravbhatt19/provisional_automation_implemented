	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style='margin-top:-8px;'>
  <a class="navbar-brand" href="#">Provisional Application Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)" onclick='exit();'>Exit</a>
      </li>
      </ul>
  </div>
</nav>
<br>
<script>
  function exit(){
   var txt;
var r = confirm("Are you sure to discard your Provisional Application !");
if (r == true) {
  window.location.href='./index.php';
  }
  }
</script>
