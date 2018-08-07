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
    <div class="content mt-3">
        @section("body_content")
            @include("page.content.message_section")
        @show
    </div>
</div>
</div>
