<?php

namespace App\Http\Controllers\Module\News;


use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\News\D76T1556;
use App\Module\News\News;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class  CreateNewsController extends Controller
{
    protected $newsHelper;

    public function __construct()
    {
        $this->newsHelper = new \App\Module\News\Helper();
    }

    public function index()
    {
        $task = "add";
        $d76T1556 = new D76T1556();
        $channelIDList = $d76T1556->getList('NEW_CATEGORIES');
        //var_dump($channelIDList);die;
        $CreateUserID = session("current_user");
        return view("system/module/news/create", compact('channelIDList', 'CreateUserID', 'task'));
    }

    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input(); //get all inputs
            $uploadedFile = $request->file('image');
            $fileName = "";
            if ($uploadedFile) {
                $fileName = $this->newsHelper->uploadFile($uploadedFile);
            }
            //get input
            $newID = DB::Raw('NEWID()');
            $channelIDW76F2141 = \Helpers::sqlstring($request->input('channelIDW76F2141', '')) ;
            $titleW76F2141 = \Helpers::sqlstring($request->input('titleW76F2141', ''));
            $contentW76F2141 = \Helpers::sqlstring($request->input('contentW76F2141', ''));
            $remarkW76F2141 = \Helpers::sqlstring($request->input('remarkW76F2141', ''));
            $keywordW76F2141 = \Helpers::sqlstring($request->input('keywordW76F2141', ''));
            $orderNoW76F2141 = \Helpers::sqlNumber($request->input('orderNoW76F2141', 1));
            $is_hotnewsW76F2141 =  \Helpers::sqlNumber($request->input('is_hotnewsW76F2141', 0));
            $is_ShowBestNewsW76F2141 =  \Helpers::sqlNumber($request->input('is_ShowBestNewsW76F2141', 0));
            $releaseDateW76F2141 = \Helpers::createDateTime($request->input('releaseDateW76F2141', ''));
            $status_idW76F2141 = \Helpers::sqlNumber($request->input('status_idW76F2141', 0));
            $userID = Auth::user()->UserID;
            $dateNow = Carbon::now();


            //\Debugbar::info($request->input('is_ShowBestNewsW76F2141', 0));
            $news = new News();
            $news->setAttribute("NewsID", $newID);
            $news->setAttribute("ChannelID", $channelIDW76F2141);
            $news->setAttribute("Title", $titleW76F2141);
            $news->setAttribute("Content", $contentW76F2141);
            $news->setAttribute("Remark", $remarkW76F2141);
            $news->setAttribute("Keywords", $keywordW76F2141);
            $news->setAttribute("OrderNo", $orderNoW76F2141);
            $news->setAttribute("IsHotNews", $is_hotnewsW76F2141);
            $news->setAttribute("IsShowBestNews", $is_ShowBestNewsW76F2141);
            //$news->setAttribute("Image", $fileName);

            $news->setAttribute("ReleaseDate", $releaseDateW76F2141);
            $news->setAttribute("StatusID", $status_idW76F2141);
            $news->setAttribute("Author", $userID);
            $news->setAttribute("CreateUserID", $userID);
            $news->setAttribute("CreateDate", $dateNow);
            $news->setAttribute("LastModifyUserID", $userID);
            $news->setAttribute("LastModifyDate", $dateNow);

            $news->save();

            \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
            \Helpers::setSession('lastNewsModified', $news->NewsID);
            return json_encode(['status'=>'SUCC', 'message'=> \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong')]);
        } catch (\Exception $ex) {
            \Helpers::log($ex->getMessage());
            return json_encode(['status'=>'ERROR']);
        }

    }
}
