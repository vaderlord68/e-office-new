<?php
$currentModuleMenus = session("currentModuleMenus");
session()->remove("currentModuleMenus");
?>
{{--<div class="module-menu-toggle">--}}
    {{--<a href="#"><img src="{{ URL::asset('media/left-btn.png') }}" alt=""></a>--}}
{{--</div>--}}
<?php  if(isset($currentModuleMenus) && $currentModuleMenus) : ?>
<ul class="module-menu-sidebar">
    <?php foreach ($currentModuleMenus as $moduleMenu) : ?>
    <li>
        <a href="<?php echo $moduleMenu['url']?>"><?php echo $moduleMenu['label'] ?></a>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif;?>

<script>
    jQuery(document).ready(function () {
        jQuery(".module-menu-toggle a").click( function (e) {
            e.preventDefault();
            var moduleMenuSidebar = jQuery(".module-sidebar");
            var bodyInner = jQuery(".body-inner");
            var topProductLogo = jQuery("img#top-product-logo");
            var toggleMenuBtn = jQuery(this).children("img");
            if (moduleMenuSidebar.hasClass("hide")) {
                bodyInner.css("transition","all .5s linear");
                bodyInner.css("width","calc(100% - 200px)");
                moduleMenuSidebar.removeClass("hide");
                toggleMenuBtn.css("left","140px");
            } else {
                bodyInner.css("transition","all .5s linear");
                bodyInner.css("width","calc(100% - 50px)");
                moduleMenuSidebar.addClass("hide");
                toggleMenuBtn.css("left","0");

            }
            topProductLogo.toggle();
        });
    });
</script>