<?php

namespace App\Http\Controllers\Module\News;


use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\News\D76T1556;
use App\Module\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class  CreateNewsController extends Controller
{
    protected $newsHelper;

    public function __construct()
    {
        $this->newsHelper = new \App\Module\News\Helper();
    }

    public function index()
    {
        $d76T1556 = new D76T1556();
        $channelIDList = $d76T1556->getList('NEW_CATEGORIES');
        //var_dump($channelIDList);die;
        $CreateUserID = session("current_user");
        return view("system/module/news/create", compact('channelIDList', 'CreateUserID'));

    }

    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $uploadedFile = $request->file('image');
            $fileName = "";
            if ($uploadedFile) {
                $fileName = $this->newsHelper->uploadFile($uploadedFile);
            }

            $news = new News();
            $news->setAttribute("NewsID", DB::Raw('NEWID()'));
            $news->setAttribute("ChannelID", $dataPost['channelID']);
            $news->setAttribute("Title", $dataPost['title']);
            $news->setAttribute("Content", $dataPost['content']);
            $news->setAttribute("Remark", $dataPost['remark']);
            $news->setAttribute("Keywords", $dataPost['keyword']);
            $news->setAttribute("OrderNo", $dataPost['orderNo']);
            $news->setAttribute("IsHotNews", isset($dataPost['is_hotnews']) ? true : false);
            $news->setAttribute("IsShowBestNews", isset($dataPost['is_ShowBestNews']) ? true : false);
            //$news->setAttribute("Image", $fileName);
            $news->setAttribute("ReleaseDate", $dataPost['releaseDate']);
            $news->setAttribute("StatusID", isset($dataPost['status_id']) ? true : false);
            $news->setAttribute("Author", '');
            $news->setAttribute("CreateUserID", session("current_user"));
            $news->save();
            Helper::setSession('successMessage', "Tạo bản tin mới thành công");
            Helper::setSession('lastNewsModified', $news->NewsID);
            return redirect("news/manage");
        } catch (\Exception $exception) {
            Helper::setSession('errorMessage', $exception->getMessage());
            return redirect("news/create");
        }

    }
}
