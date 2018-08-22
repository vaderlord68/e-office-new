<?php

namespace App\Http\Controllers\Module\News;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Document;
use App\Module\Bi\Folder;
use App\Module\News\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class  EditNewsController extends Controller
{
//    protected $biHelper;
//    public function __construct()
//    {
//        $this->biHelper = new \App\Module\News\Helper();
//        Helper::setSession("dashboardMenus",\App\Http\Controllers\Module\News\IndexController::dashboardMenus);
//    }

    public function index(Request $request, $news_id = 0)
    {
//        $dataPost = $request->input();
//        $documentID = $dataPost['documentID'];
//        $document = Document::find($documentID);
        $news = News::find($news_id);

        return view("system/module/news/edit", compact('news'));
//            ->with("currentDocument", $document)
//            ->with("folderTree", $this->biHelper->getFolderTree());
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $news = News::find($dataPost['hdNewsID']);
            $news->ChannelID = $dataPost['channelID'];
            $news->Title = $dataPost['title'];
            $news->Content = $dataPost['content'];
            $news->Remark = $dataPost['remark'];
            $news->Keywords = $dataPost['keyword'];
            $news->OrderNo = $dataPost['orderNo'];
            $news->IsHotNews = Input::get('is_hotnews', 'off')=='off'?0:1;
            $news->IsShowBestNews = Input::get('is_ShowBestNews', 'off')=='off'?0:1;
            $news->ReleaseDate = $dataPost['releaseDate'];
             $news->StatusID = Input::get('status_id', 'off')=='off'?0:1;
            $news->Author = $dataPost['author'];
            $news->LastModifyUserID = Helper::getSession('current_user');
            $news->LastModifyDate = date('Y-m-d H:i:s');
            $news->save();
            Helper::setSession('successMessage',"Lưu thành công!");
            Helper::setSession('lastNewsModified',$news->NewsID);
            return redirect('/news/manage');
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
    }

}