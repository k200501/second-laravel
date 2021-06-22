<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileContorller extends Controller
{
    // 要在別的 class 呼叫 function 該 function 必須是 static
    public static function imageUpload($file)
    {
        // 如果上傳檔案的資料夾不存在
        if(!is_dir('upload/')) {
            // 創造一個上傳檔案的資料夾
            mkdir('upload/');
        }

        // 取得圖片副檔名
        $extenstion = $file->getClientOriginalExtension();
        // 亂數重新命名圖片
        $fliename = md5(uniqid(rand())) . '.' . $extenstion;
        // 設定圖片儲存路徑
        $path = '/upload/' . $fliename;

        // 上傳檔案並移動到對應位置
        move_uploaded_file($file, public_path() . $path);

        // function 執行完，將路徑回傳
        return $path;
    }
}
