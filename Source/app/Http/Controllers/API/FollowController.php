<?php
/**
 * Created by PhpStorm.
 * User: Andy Gregoire
 * Date: 3/16/2018
 * Time: 12:15 AM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Manga;
use App\User;
use Illuminate\Http\Request;

use App\Models\Follow;
use App\Models\LibraryItem;
use Illuminate\Support\Facades\Validator;

class FollowController extends Controller
{

    /***
     * This function updates or adds a follow item.
     *
     * @post("follow/{id}/update")
     * @Request({"email" : "test@gmail.com", "image", "http://.."})
     * @Response({"result":"success"}}
     *
     * @param Request $request
     * @param $id
     * @return string
     */
    public function postUpdateFollow(Request $request, $id)
    {

        $validator = Validator::make($request->all(), ["url" => "required", "followStatus" => "required", "image" => "required"]);
        if ($validator->fails())
        {
            return response($validator->errors(),400);
        }

        $lUser = User::getUserById($id);
        if(!$lUser)
        {
           return response()->json(['result' => "invalid user id"], 401);
        }

        $lMangaUrl = $request->input('url');
        $lFollowStatus = $request->input('followStatus');
        $lMangaImage = $request->input('image');

        $lManga = Manga::firstOrCreate(['url' => $lMangaUrl]);
        $lManga->update(['image' => $lMangaImage]);

        if ($lManga)
        {
            $lFollowUpdated = Follow::firstOrNew(['userId' => $id, 'mangaId' => $lManga->id]);

            $lFollowUpdated->followType = $lFollowStatus;
            $lFollowUpdated->save();

            if ($lFollowStatus == 0)
            {
                $lFollowUpdated->delete();
            }

            if ($lFollowUpdated)
            {

                return response()->json(['result' => json_encode($lFollowUpdated)], 200);
            }
        }

        return response()->json(['message' => "failed to update manga"], 404);
    }

    /***
     * This function retrieves a users followed list.
     *
     * @Get("follow/{id}/library")
     * @Request({})
     * @Response(200, body={{"library" : [{"url" : "http://...", "image" : "http://...", "followType" : "1"}, {...}, .. ])
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserLibrary(Request $request, $id)
    {
        $lFollows = Follow::getFollowedItems($id);

        $lLibrary = array();
        foreach ($lFollows as $item)
        {
            $lManga = Manga::getMangaById($item->mangaId);

            array_push($lLibrary, new LibraryItem([
                'url' => $lManga->url,
                'image' => $lManga->image,
                'followType' => $item->followType
            ]));
        }

        return response()->json(['library' => json_encode($lLibrary)], 200);
    }
}