<!DOCTYPE html>
<div id="gameboard">
  <div class="col-md-12">
    <div class="col-md-2 ponto">
      <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
    </div>
  </div>
  <div class="col-md-12">
    <div class="col-md-2 ponto">
      <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
    </div>
  </div>
</div>


<script>
  var indexes = {{ $item->card()->first()->pontos->count() }};
  var cols = document.getElementsByClassName('ponto');
  for (var i = 0; i < indexes ; i++)
  {
    cols[i].style.backgroundColor = "#99ff66";
  }
</script>
