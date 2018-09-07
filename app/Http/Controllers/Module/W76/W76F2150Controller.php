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

class  W76F2150Controller extends Controller
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

    public function index(Request $request, $type = '')
    {
        //Do nguon cho ChannelList
        $channelIDList = $this->getChannelList();
        //Do nguon cho lastestNews
        $lastestNewsList = $this->getLastestNewsList();


        switch ($type) {
            case '':
                return view("system/module/W76/W76F2150/W76F2150", compact('type'));
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
