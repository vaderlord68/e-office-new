<?php

namespace App\Http\Controllers\Module\News;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Document;
use App\Module\Bi\Folder;
use App\Module\News\D76T1556;
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
        $task = "edit";
        $d76T1556 = new D76T1556();
        $channelIDList = $d76T1556->getList('NEW_CATEGORIES');
        $news = News::find($news_id);

        return view("system/module/news/create", compact('news', 'task','channelIDList'));
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
            $news->ChannelID = $dataPost['channelIDW76F2141'];
            $news->Title = $dataPost['titleW76F2141'];
            $news->Content = $dataPost['contentW76F2141'];
            $news->Remark = $dataPost['remarkW76F2141'];
            $news->Keywords = $dataPost['keywordW76F2141'];
            $news->OrderNo = $dataPost['orderNoW76F2141'];
            $news->IsHotNews = Input::get('is_hotnewsW76F2141', 'off')=='off'?0:1;
            $news->IsShowBestNews = Input::get('is_ShowBestNewsW76F2141', 'off')=='off'?0:1;
            $news->ReleaseDate = $dataPost['releaseDateW76F2141'];
             $news->StatusID = Input::get('status_idW76F2141', 'off')=='off'?0:1;
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