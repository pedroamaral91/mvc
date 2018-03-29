<script src="<?php echo $this->addJs(basename(__FILE__)); ?>"></script>
<div class="container clientes" style="clear: both;">
    <?php $this->renderView('alerts/success') ?>
    <?php foreach($this->render->clientes as $cliente): ?>
        <div class="row">
            <div class="col-md-9">
                <a href="/clientes/<?php echo $cliente->id; ?>/show"><h1><?php echo $cliente->nome; ?></h1></a>
                <h3><?php echo $cliente->empresa; ?></h2>
                <p class="text-right">
                    <a href="/clientes/<?php echo $cliente->id; ?>/editar" class="btn btn-warning btn-xs">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="/clientes/<?php echo $cliente->id; ?>/delete" class="btn btn-danger btn-xs delete">
                        <i class="glyphicon glyphicon-remove-sign"></i>
                    </a>
                </p>
                <hr>
            </div>
        </div>
    <?php endforeach; ?>
</div>