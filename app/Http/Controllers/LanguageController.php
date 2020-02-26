<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class LanguageController extends Controller {

    public function Import(Request $req) {
        $req->validate(array(
            'file' => 'required'
        ));
        $path = $req->file;
        $content = json_decode(file_get_contents($path), true);
        if ($content) {
            foreach ($content as $value) {
                $lang = new Language;
                $lang->name = $value['name'];
                $lang->save();
            }
            return response()->json(array('status' => 1));
        } else {
            return response()->json(array('status' => 1));
        }
    }

}
