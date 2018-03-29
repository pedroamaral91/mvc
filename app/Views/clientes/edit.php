
<script src="<?php echo $this->addJs(basename(__FILE__)) ?>"></script>
<div class="container">
    <form action="/clientes/<?php echo $this->render->cliente->id ?>/update" method="post">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $this->render->cliente->nome; ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="empresa">Empresa:</label>
                <input type="text" class="form-control" name="empresa" id="empresa" value="<?php echo $this->render->cliente->empresa; ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="descricao">Descricao:</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3"><?php echo $this->render->cliente->descricao; ?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="/clientes/<?php echo $this->render->cliente->id ?>/delete" id="delete" class="btn btn-danger">Deletar</a>
        <a href="/clientes" class="btn btn-primary">Voltar</a>
    </form>
</div>
