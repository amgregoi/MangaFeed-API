<?php
/**
 * Created by PhpStorm.
 * User: Andy Gregoire
 * Date: 3/15/2018
 * Time: 7:13 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
{

    /***
     *
     * @Get("version/android")
     * @Request()
     * @Response(200, body={"version":"{\"id\":3,\"type\":\"android\",\"version\":\"1.0.2\"}"}
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAndroidVersion(Request $request)
    {
        $lVersion = Version::where(['type' => 'android'])->orderBy('id', 'desc')->first();

        if($lVersion)
        {
            return response()->json(['version' => json_encode($lVersion)], 200);
        }

        abort(404, "Failed to retrieve version");
    }
}