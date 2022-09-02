<?php
echo "
<div class='col'>
<div class='card h-100'>
<form>
  <img src='$i_mage' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$f_name</h5>
    <p class='card-text'>$f_decs.</p>
  </div>
  <div class='card-footer'>
      <h5 class='card-title'>Tk-$f_price</h5>
      <input type='button' class='btn btn-primary' value = 'buy now'>
  </div>
</form>  
</div>
</div>";
?>