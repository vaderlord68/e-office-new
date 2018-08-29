<?php



class News extends Eloquent
{
    /**
     * Table name = D76T2140
     * Table description: Module News: Entity News
     */
    protected $table = 'D76T2140';
    protected $primaryKey = 'NewsID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public $incrementing = false;

    public function getCollection()
    {
        $collection = DB::table($this->table)->where('Deleted', 0)->orderByDesc('LastModifyDate')
            ->get();
        return $collection;
    }

//    public function find($newsID){
//        return self::find($newsID);
//    }

    public function getNewsByRelativeTitle($title)
    {
        $collection = DB::table($this->table)
            ->where("Title","LIKE","%$title%")
            ->get();
        return $collection;
    }

}