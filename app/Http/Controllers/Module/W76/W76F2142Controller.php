<?php

namespace App\Http\Controllers\Module\W76;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\News\D76T1556;
use App\Module\News\D76T2140;
use App\Module\News\D76T2141;
use App\Module\News\News;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2142Controller extends Controller
{
    private $d76T5556;
    private $d76T2140;

    public function __construct(D76T1556 $d76T5556, D76T2140 $d76T2140, D76T2141 $d76T2141)
    {
        $this->d76T5556 = $d76T5556;
        $this->d76T2140 = $d76T2140;
        $this->d76T2141 = $d76T2141;
        $this->newsHelper = new \App\Module\News\Helper();
    }

    public function index($component = '', Request $request)
    {
        //Do nguon cho ChannelList
        $channelIDList = $this->getChannelList();
        //Do nguon cho lastestNews
        $lastestNewsList = $this->getLastestNewsList();


        switch ($component) {
            case '':
            case 'channel':
                $task = $request->input('task', '');
                switch ($task) {
                    case '':
                    case 'list':
                        //Lay danh sach news cho channel
                        $channelID = $request->input('channelID', '');
                        if ($channelID == '') {
                            $channelFirst = $this->d76T5556->first();
                            if ($channelFirst != null) {
                                $channelID = $channelFirst->CodeID;
                            }
                        }
                        $newsList = $this->getNewsOfChannel($channelID);
                        return view("system/module/W76/W76F2142/W76F2142_NewsList", compact('task', 'component', 'lastestNewsList', 'channelIDList', 'newsList'));
                        break;
                    case 'detail':
                        $newsID = $request->input('newsID', '');
                        $this->updateCount($newsID);
                        $newsRow = $this->d76T2140
                            ->leftJoin("D76T1556",'D76T1556.CodeID', '=', 'D76T2140.ChannelID')
                            //->select("CodeName","D76T2140.NewsID","D76T2140.ChannelID")
                            ->where('NewsID', '=', $newsID)->first();

                        $newsID = $request->input('newsID', '');

//                        //get route current...
//                        $currentUrl = url()->full();
//                        Helper::setSession('prevUrlNews', $currentUrl);

//                        $channelName = $this->d76T2140
//                            ->leftJoin("D76T1556",'D76T1556.CodeID', '=', 'D76T2140.ChannelID')
//                            ->select("CodeName","D76T2140.NewsID","D76T2140.ChannelID")
//                            ->where("D76T2140.NewsID", '=', $newsID)
//                            ->first();

                        $newRowDetail =$this->d76T2141
                            ->leftJoin("D76T2140",'D76T2140.NewsID', '=', 'D76T2141.RelatedNewsID')
                            ->select("D76T2140.Title", "D76T2141.NewsID", "D76T2141.RelatedNewsID")
                            ->where("D76T2141.NewsID", "=", $newsID)
                            ->get();
                        return view("system/module/W76/W76F2142/W76F2142_NewsDetail", compact('channelName','newRowDetail','task', 'component', 'lastestNewsList', 'channelIDList', 'newsRow'));
                        break;
                }

                break;
            case 'lastest':
                $newsID = $request->input('newsID', '');
                $newsRow = $this->d76T2140->where('NewsID', '=', $newsID)->first();
                $this->updateCount($newsID);
                return view("system/module/W76/W76F2142/W76F2142_NewsDetail", compact('task', 'component', 'lastestNewsList', 'channelIDList', 'newsRow'));
                break;

        }
    }
    public function updateCount($id)
    {
        //C?p nh?t l??ng truy c?p news_hitcount
        $prevID = Helper::getSession('ViewCount');
        if (empty($prevID) || $prevID != $id) {
            $this->d76T2140->where('NewsID', $id)->increment('ViewCount');
            Helper::setSession('ViewCount', $id);
        }
    }   
    function getChannelList()
    {
        return $this->d76T5556->where('ListTypeID', 'NEW_CATEGORIES')->get();
    }

    function getLastestNewsList()
    {
        $lastestNewsList = $this->d76T2140->where('IsShowBestNews', 0)->get();
        foreach ($lastestNewsList as &$item) {
            $item->Image = 'data:image/jpeg;base64, ' . base64_encode($item->Image);
        }
        return $lastestNewsList;
    }

    function getNewsOfChannel($channelID)
    {
        $newsList = $this->d76T2140->where('ChannelID', '=', $channelID)->get();
        foreach ($newsList as &$item) {
            $item->Image = 'data:image/jpeg;base64, ' . base64_encode($item->Image);
        }
        return $newsList;
    }
}
