 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    
    <ul class="nav navbar-nav side-nav">
        <li class="<?= $this->data['id'] == 1 ? 'active' : '' ?>">
            <a href="<?php echo BASE_URL?>home"><i class="fa fa-fw fa-home"></i> Inicio </a>
        <li class="<?= $this->data['id'] == 2 ? 'active' : '' ?>">
            <a href="<?php echo BASE_URL?>ventas"><i class="fa fa-fw fa-desktop"></i> Ventas</a>
        </li>
        <li class="<?= $this->data['id'] == 3 ? 'active' : '' ?>">
            <a href="<?php echo BASE_URL?>productos"><i class="fa fa-fw fa-table"></i> Productos</a>
        </li>
        <li class="<?= $this->data['id'] == 4 ? 'active' : '' ?>">
            <a href="<?php echo BASE_URL?>clientes"><i class="fa fa-fw fa-users"></i> Clientes</a>
        </li>
        <li class="<?= $this->data['id'] == 5 ? 'active' : '' ?>">
            <a href="<?php echo BASE_URL?>categoria"><i class="fa fa-fw fa-list-alt"></i> Categorias</a>
        </li>
        <?php if($_SESSION['usuario']['rol'] == 'admin'){?>
            <li class="<?= $this->data['id'] == 6 ? 'active' : '' ?>">
                <a href="<?php echo BASE_URL?>usuarios"><i class="fa fa-fw fa-user"></i> Usuarios</a>
            </li>
        <?php } ?>
        <li class="<?= $this->data['id'] == 7 ? 'active' : '' ?>">
            <a href="<?php echo BASE_URL?>reportes"><i class="fa fa-fw fa-bar-chart-o"></i> Reportes</a>
        </li>

        <!--<li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="#">Dropdown Item</a>
                </li>
                <li>
                    <a href="#">Dropdown Item</a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
        </li>-->
    </ul>
</div>
<!-- /.navbar-collapse -->