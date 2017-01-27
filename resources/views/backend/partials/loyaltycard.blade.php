<!DOCTYPE html>
<div id="gameboard">
  <h2>*Consulte o regulamento em nossa loja</h2>
  <div class="col-md-12">
    <div class="col-md-2 ponto">
      <img class="img-responsive" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive" src="/assets/images/logoFarmeria.jpg">
    </div>
  </div>
  <div class="col-md-12">
    <div class="col-md-2 ponto">
      <img class="img-responsive" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive" src="/assets/images/logoFarmeria.jpg">
    </div>
    <div class="col-md-2 ponto">
      <img class="img-responsive" src="/assets/images/logoFarmeria.jpg">
    </div>
  </div>
</div>
<div class="icone pessoa">
  <img src="/assets/images/IconePessoaFarmeria.jpg">
</div>

<div class="icone telefone">
  <img src="/assets/images/IconeTelefoneFarmeria.jpg">
</div>

<script>
  var indexes = {{ $item->card()->first()->pontos->count() }};
  var cols = document.getElementsByClassName('ponto');
  for (var i = 0; i < indexes; i++)
  {
    cols[i].style.backgroundColor = "blue";
  }
</script>
