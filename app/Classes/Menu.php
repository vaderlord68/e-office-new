<?php
class Menu{
    public $id;
    public $menuID;
    public $menuName;
    public $icon;
    public $parentMenuID;
    public $childrend;
    public function __construct($id, $menuID, $menuName , $icon, $parentMenuID, $childrend)
    {
        $this->id = $id;
        $this->menuID = $menuID;
        $this->menuName = $menuName;
        $this->icon = $icon;
        $this->parentMenuID = $parentMenuID;
        $this->childrend = $childrend;
    }
}