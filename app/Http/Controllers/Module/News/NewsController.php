<?php

namespace App\Http\Controllers\Module\News;


use App\Http\Controllers\Controller;
use App\Module\News\D76T1556;
use App\Module\News\D76T2140;
use Illuminate\Http\Request;


class  NewsController extends Controller
{
    private $d76T5556;
    private $d76T2140;

    public function __construct(D76T1556 $d76T5556, D76T2140 $d76T2140)
    {
        $this->d76T5556 = $d76T5556;
        $this->d76T2140 = $d76T2140;
        $this->newsHelper = new \App\Module\News\Helper();
    }

    public function index($task = '', Request $request)
    {

        switch ($task) {
            case '':
            case 'list':
                $data = [];
                $data['channelIDList'] = $this->d76T5556->where('ListTypeID', 'NEW_CATEGORIES')->get();
                $IsShowBestNews = $this->d76T2140->where('IsShowBestNews', 0)->get();
                //get image and process image....
                foreach ($IsShowBestNews as &$item) {
                    //$image = str_replace('0x', '', $item->Image);
                    $item->Image = 'data:image/jpeg;base64, ' . base64_encode($item->Image);
                }
                $data['IsShowBestNews'] = $IsShowBestNews;
                $CreateUserID = session("current_user");

                $channelID = $request->input('channelID', '');
                if ($channelID == ''){
                    $channelFirst = $this->d76T5556->first();
                    if ($channelFirst != null){
                        $channelID = $channelFirst->CodeID;
                    }
                }
                $newsList = $this->d76T2140->where('ChannelID', '=', $channelID)->get();
                foreach ($newsList as &$item) {
                    //$image = str_replace('0x', '', $item->Image);
                    $item->Image = 'data:image/jpeg;base64, ' . base64_encode($item->Image);
                }
                return view("system/module/news", compact('data', 'CreateUserID', 'task', 'newsList'));
                break;
            case 'detail':
                $newsID = $request->input('newsID', '');
                $newsRow = $this->d76T2140->where('NewsID', '=', $newsID)->first();

                break;

        }
    }

    private function getNewsFilter($channelIDshowNews)
    {
        $result = $this->d76T2140->where('ChannelID', '=', $channelIDshowNews)->get();
        return $result;
    }
}
