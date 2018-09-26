@extends('layouts.layout')
@section('content')
    @parent
    <div class="module-bi">
        <div class="row">
            <div class="folder-sidebar col-sm-3">
                @section("folderTree")
                    @include("modules.W82.folderTree", ["folderTree" => $folderTree])
                @show
            </div>
            <div class="folder-content col-sm-9">
                @section("folderView")
                @show
            </div>
        </div>
    </div>
@section("deletePopup")
    @include("modules.W82.deletePopup")
@show
@stop