<div class="col-md-3">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Mi perfil</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="<?php if($page2=='perfil'){echo 'active';}?>"><a href="cliente_perfil.php"><i class="fa fa-street-view"></i> Perfil</a></li>
                <li class="<?php if($page2=='edt_perfil'){echo 'active';}?>"><a href="cliente_perfil_update.php"><i class="fa fa-user-o"></i> Editar Perfil</a></li>

                <li class="<?php if($page2=='mail_write'){echo 'active';}?>"><a href="cliente_mail_write.php"><i class="fa fa-envelope-o"></i> Escribir Mensaje
                    </a>
                </li>
                <li class="<?php if($page2=='delete_account'){echo 'active';}?>"><a href="cliente_delete.php"><i class="fa fa-user-times"></i> Eliminar cuenta</a></li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /. box -->
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Historial</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="<?php if($page2=='pedidos'){echo 'active';}?>"><a href="cliente_historial_pedidos.php">
                    <i class="fa fa-shopping-cart"></i> Mis pedidos</a>
                </li>
                <li class="<?php if($page2=='pedidos_en_proceso'){echo 'active';}?>"><a href="cliente_historial_pedidos-proceso.php">
                    <i class="fa fa-spinner"></i> Compras en proceso</a>
                </li>
                <li class="<?php if($page2=='compras'){echo 'active';}?>"><a href="cliente_historial_pagados.php">
                    <i class="fa fa-shopping-bag text-yellow"></i> Compras finalizadas</a>
                </li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>