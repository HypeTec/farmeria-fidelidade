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
    console.log(indexes);
    var pontos = {!! $item->pontosJson() !!};
    console.log(pontos);
    var operadores = {};
    function parse2dict(item, index)
    {
        operadores[item.id] = item.name;
    }
    {!! $operadores !!}.forEach(parse2dict);
    console.log(operadores);
    var cols = document.getElementsByClassName('ponto');
    for (var i = 0; i < indexes ; i++)
    {
        cols[i].style.fontSize = "x-small";
        cols[i].innerHTML = '<img class="img-responsive img-circle center-block" src="/assets/images/check-tick-icon-14150.png">';
        cols[i].innerHTML += "<p>Cupom fiscal:" + pontos[i].cupomfiscal + "</p><p>Data da compra: " + pontos[i].data_compra + "</p>";
    }

</script>
