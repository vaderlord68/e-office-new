<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use App\Mail\ShareDocumentMail;
use App\Module\Bi\D76T2004;
use App\Module\Bi\Document;
use App\Module\Bi\Folder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mockery\CountValidator\Exception;
use PhpParser\Comment\Doc;

class  ViewController extends Controller
{
    protected $biHelper;
    public function __construct()
    {
        $this->biHelper = new \App\Module\Bi\Helper();
        Helper::setSession("dashboardMenus",\App\Http\Controllers\Module\Bi\IndexController::dashboardMenus);
    }

    public function index(Request $request)
    {
        $dataPost = $request->input();
        $requestFolderId = $dataPost['FolderId'];
        $childFolders = $this->getChildFolders($requestFolderId);
        $childDocuments = $this->getChildDocuments($requestFolderId);
        $fullPath = $this->biHelper->getFullPath($requestFolderId);
        return view("system/module/bi/folderView")
            ->with("currentDirectoryPath", $fullPath)
            ->with("folderTree", $this->biHelper->getFolderTree())
            ->with("childDocuments",$childDocuments)
            ->with("childFolders",$childFolders);

    }

    public function share(Request $request) {
        $dataPost = $request->input();

        $documentId = $dataPost['documentId'];
        $documentFactory = new Document();
        $doc = $documentFactory->getDocumentById($documentId);

        $users = $this->getAllUsers();

        $shareDoc = D76T2004::where('DocID', $documentId)->first();

        if (isset($shareDoc) && !empty($shareDoc)) {
            $shareDoc->StrUserIDSharing = explode(';', $shareDoc->StrUserIDSharing);
            $shareDoc->StrUserIDInvite = explode(';', $shareDoc->StrUserIDInvite);
        }

        return view("system/module/bi/shareDocument")
            ->with("document", $doc)
            ->with("users", $users)
            ->with("share", $shareDoc);
    }

    public function shareExecute(Request $request) {
        try {
            $dataPost = $request->input();

            $docID = isset($dataPost['hdDocID']) ? $dataPost['hdDocID'] : '';
            $sharelink = isset($dataPost['txtShareLink']) ? $dataPost['txtShareLink'] : '';
            $chkSendMail = isset($dataPost['chkSendMail']) ? ($dataPost['chkSendMail'] == 'off' ? 0 : 1) : 0;
            $sharewith = isset($dataPost['txtShareWith']) ? $dataPost['txtShareWith'] : [];
            $invitepeple = isset($dataPost['txtInvitePeople']) ? $dataPost['txtInvitePeople'] : [];

            $doc = D76T2004::where('DocID', $docID)->select('ID', 'DocID')->first();

            if (isset($doc) && !empty($doc)) {
                $d76t2004 = D76T2004::find($doc->ID);
                $d76t2004->StrUserIDSharing = implode(';', $sharewith);
                $d76t2004->StrUserIDInvite = implode(';', $invitepeple);
                //save data..
                $d76t2004->save();
            } else {
                $d76t2004 = new D76T2004();
                $d76t2004->DocID = $docID;
                $d76t2004->StrUserIDSharing = implode(';', $sharewith);
                $d76t2004->StrUserIDInvite = implode(';', $invitepeple);
                //save data..
                $d76t2004->save();
            }

            if ($chkSendMail) {
                $users = User::whereIn('UserID', $sharewith)->select('UserID', 'UserNameU as UserName', 'Email')->get();
                $input = $request->all();
                foreach ($users as $user) {
                    if (!empty($user->Email)) {
                        $data = [
                            'receiver' => $user->UserName,
                            'links' => $sharelink
                        ];

                        Mail::send('system.mail', $data, function ($message) use ($user) {
                            $message->from('eoffice.system@diginet.com.vn', 'Eoffice Admin');
                            $message->to($user->Email)->subject('You have a sharing document');
                        });
                    }
                }
            }

            return 1;
        } catch (Exception $ex) {
            \Debugbar::info($ex);
            return 0;
        }
    }

    public function getChildFolders($folderId)
    {
        $folderFactory = new Folder();
        $childFolders = $folderFactory->getAllChildFolder($folderId);
        return $childFolders;
    }

    public function getChildDocuments($folderId)
    {
        $UserID = Auth::id();
//        $documentFactory = new Document();
//        $childDocuments = $documentFactory->getDocumentsWithFolderId($folderId);
        $childDocuments = \DB::select("EXEC W76P2000 '$UserID', '$folderId'");

        return $childDocuments;

    }

    public function getAllUsers() {
        $user = new User();
        $users = $user->getAllUsers();
        return $users;
    }

}