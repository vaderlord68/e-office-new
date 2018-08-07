<?php
namespace App\Module\Bi;
class Helper extends \Illuminate\Database\Eloquent\Model
{
    public static function test()
    {
        $folderFactory = new Folder();
        $folderCollection = $folderFactory->getCollection();
        $folderArray = [];
        $folderStructure = [];
        foreach ($folderCollection as $folder) {
            $folderArray[] = $folder;
        }
        die('xxx');
        self::prepareStructure($folderArray);
        die('xxx');
    }

    public static function prepareStructure($folderArray)
    {
        foreach ($folderArray as $folder) {

        }
        if (count($folderArray) < 0) {
            return true;
        }
        return self::prepareStructure($folderArray);
    }
}