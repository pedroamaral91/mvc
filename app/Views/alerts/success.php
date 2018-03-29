
<?php if (@$this->render->success): ?>
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times</span>
        </button>
        <p><i class="glyphicon glyphicon-ok-sign"></i> <?php $this->render->success ?>
        </p>
    </div>
<?php endif; ?>