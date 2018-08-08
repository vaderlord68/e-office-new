<div id="right-panel" class="right-panel">
    @section("top_menu")
        @include("page.content.top_menu")
    @show
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
        @section("message_section")
            @include("page.content.message")
        @show
    <div class="content mt-3">
        @section("body_content")

        @show
    </div>
</div>
</div>
