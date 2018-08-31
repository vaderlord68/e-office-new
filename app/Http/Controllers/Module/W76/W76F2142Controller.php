<?php

namespace App\Http\Controllers\Module\W76;

use App\Http\Controllers\Controller;
use App\Module\News\D76T1556;
use App\Module\News\D76T2140;
use App\Module\News\D76T2141;
use App\Module\News\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2142Controller extends Controller
{
    private $d76T5556;
    private $d76T2140;

    public function __construct(D76T1556 $d76T5556, D76T2140 $d76T2140)
    {
        $this->d76T5556 = $d76T5556;
        $this->d76T2140 = $d76T2140;
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
                        $newsRow = $this->d76T2140->where('NewsID', '=', $newsID)->first();
                        return view("system/module/W76/W76F2142/W76F2142_NewsDetail", compact('task', 'component', 'lastestNewsList', 'channelIDList', 'newsRow'));
                        break;
                }

                break;
            case 'lastest':
                $newsID = $request->input('newsID', '');
                $newsRow = $this->d76T2140->where('NewsID', '=', $newsID)->first();
                return view("system/module/W76/W76F2142/W76F2142_NewsDetail", compact('task', 'component', 'lastestNewsList', 'channelIDList', 'newsRow'));
                break;

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
