<!-- Left Panel -->
<?php
$dashboardMenus = \App\Eoffice\Helper::getSession("dashboardMenus");
\App\Eoffice\Helper::removeSessionByKey("dashboardMenus");
?>
<?php if (isset($dashboardMenus) && $dashboardMenus) :?>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <button class="navbar-toggler nav-mainmenu" type="button" data-toggle="collapse" data-target="#right-menu" aria-controls="right-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/"><img src="{{ asset('media/logo.png') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <h3 class="menu-title">Quản lý tài liệu</h3>
                <?php foreach ($dashboardMenus as $menu): ?>
                <li class="menu-item-has-children dropdown">
                    <a href="<?php echo $menu['url']?>" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i><?php echo $menu['title']?></a>
                </li>
                <?php endforeach;?>

            </ul>
        </div>

    </nav>
</aside>
<?php else:?>
<style>
    #menuToggle {
        display: none;
    }
</style>
<?php endif;?>
