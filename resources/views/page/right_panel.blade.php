<div id="right-panel" class="right-panel">
    @section("top_menu")
        @include("page.content.top_menu")
    @show
        @section("message_section")
            @include("page.content.message")
        @show
    <div class="content mt-3">
        @section("body_content")
        @show
    </div>
</div>
</div>
