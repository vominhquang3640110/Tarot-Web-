<?php

namespace App\Http\Controllers;

use App\Services\Singleton;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;
use App\Http\Controllers\LoginController;
use App\Models\User;
use Kreait\Firebase\Auth;

class GameController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getResultData(Request $request)
    {
        //Firebaseのidを取得する
        $id = $request->input('id');
        //Firebaseに接続
        $firebase = (new Factory())
        ->withServiceAccount(resource_path('credentials/firebase_credentials.json'))
        ->withDatabaseUri('https://gameweb-7fa39-default-rtdb.firebaseio.com');
        //データベースを生成
        $database = $firebase->createDatabase();
        //送信する。ここでgetを使ってデータベースに保存したデータを取得する
        $myDatas = $database->getReference('result/'.$id)->getValue();
        
        return view('resultData',[
            'title'=>'My Data',
            'myDatas'=>$myDatas     //データベースから取得したデータはMyDataページに送信する
        ]);
    }

    public function setResultData(Request $request)
    {
        //Unityからjsonデータを取得し配列にする
        $array = $request->json()->all();
        //Firebaseに接続
        $firebase = (new Factory())
        ->withServiceAccount(resource_path('credentials/firebase_credentials.json'))
        ->withDatabaseUri('https://gameweb-7fa39-default-rtdb.firebaseio.com');
        //データベースを生成
        $database = $firebase->createDatabase();
        //送信する。ここでsetを使って、firebaseにデータを保存する
        $newPost = $database
        ->getReference('result/'.$array['id'].'/'.$array['dateTime'])
        ->set([

                'question' => $array['question'],
                'cardName1' => $array['cardName1'],
                'cardName2' => $array['cardName2'],
                'cardName3' => $array['cardName3'],
                'cardForward1' => $array['cardForward1'],
                'cardForward2' => $array['cardForward2'],
                'cardForward3' => $array['cardForward3'],
                'content1' => $array['content1'],
                'content2' => $array['content2'],
                'content3' => $array['content3']
            ]);
        echo '<pre>';
        print_r($newPost->getValue());      //Unityのコンソールで確認できる
    }
}
