<!DOCTYPE html>
<div id="gameboard" class="row">
    <div class="col-md-12 row">
        <div class="col-xs-2 ponto">
            <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
        </div>
        <div class="col-xs-2 ponto">
            <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
        </div>
        <div class="col-xs-2 ponto">
            <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
        </div>
        <div class="col-xs-2 ponto">
            <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
        </div>
        <div class="col-xs-2 ponto">
            <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
        </div>
    </div>
    <div class="col-md-12 row">
        <div class="col-xs-2 ponto">
            <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
        </div>
        <div class="col-xs-2 ponto">
            <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
        </div>
        <div class="col-xs-2 ponto">
            <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
        </div>
        <div class="col-xs-2 ponto">
            <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
        </div>
        <div class="col-xs-2 ponto">
            <img class="img-responsive img-circle center-block" src="/assets/images/logoFarmeria.jpg">
        </div>
    </div>
</div>


<script>
    var indexes = {{ $item->card()->first()->pontos->count() }};
    var pontos = {!! $item->pontosJson() !!};
    var operadores = {};
    function parse2dict(item, index)
    {
        operadores[item.id] = item.name;
    }
    {!! $operadores !!}.forEach(parse2dict);
    var cols = document.getElementsByClassName('ponto');
    for (var i = 0; i < indexes ; i++)
    {
        cols[i].style.fontSize = "x-small";
        cols[i].innerHTML = '<img class="img-responsive img-circle center-block" src="/assets/images/check-tick-icon-14150.png">';
        cols[i].innerHTML += "<p>Cupom fiscal:" + pontos[i].cupomfiscal + "</p><p>Data da compra: " + pontos[i].data_compra + "</p>";
    }

</script>
