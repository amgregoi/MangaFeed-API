<?php
/**
 * Created by PhpStorm.
 * User: Andy Gregoire
 * Date: 3/15/2018
 * Time: 10:25 PM
 */

namespace App\Http\Controllers\API;

use App\Manga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MangaController extends Controller
{

    /***
     * This function retrieves a Manga by its url.
     *
     * @param Request $request
     * @return string
     */
    public function getManga(Request $request)
    {
        $validator = Validator::make($request->all(), ["url" => "required"]);
        if ($validator->fails())
        {
            return response($validator->errors(),400);
        }

        $lUrl = $request->input('url');
        $lManga = Manga::getMangaByUrl($lUrl);

        if ($lManga)
        {
            return response()->json(['manga' => json_encode($lManga)], 200);
        }

        return response()->json(['message' => "Failed to retrieve manga"], 404);
    }


}