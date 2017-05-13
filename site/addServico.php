<div class="form-group">
    <label >Tipo de Servico</label>
    <select class="form-control" name="tipo_servico">
        <option value="novoServico">Novo Serviço</option>
        <option value="fotografo">Fotografo</option>
        <option value="pintor">Pintor</option>
        <option value="faxineira">Faxineira</option>
    </select>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="tipoCusto">Tipos de custo do servico</label>
            <select class="form-control" id="tipo_custo" name="tipo_custo">
                <option value="">Tipos de Custo</option>
                <option value="hora">Por Hora</option>
                <option value="diaria">Por dia</option>
                <option value="projeto">Por projeto</option>

            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="custoServico">Custo do Servico</label>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="text" id="custo" name="custo" class="form-control" aria-label="">
            </div>
        </div>
    </div>
</div>
