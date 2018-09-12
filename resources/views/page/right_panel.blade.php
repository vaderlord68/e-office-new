<div id="right-panel" class="right-panel">
    @section("top_menu")
        @include("page.content.top_menu")
    @show
    @section("message_section")
        @include("page.content.message")
        @include("page.content.alert-dismissible")
    @show
    <div class="content mt-3">
        @section("body_content")

        @show
        @include("page.loading_mask")
    </div>
</div>
</div>
