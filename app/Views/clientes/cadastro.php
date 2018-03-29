<div class="container" style="clear: both;">
    <form action="/clientes/salvar" method="post">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="empresa">Empresa:</label>
                <input type="text" class="form-control" name="empresa" id="empresa">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="descricao">Descricao:</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="reset" class="btn btn-warning">Limpar Tudo</button>
        <a href="/clientes" class="btn btn-primary">Voltar</a>
    </form>
</div>