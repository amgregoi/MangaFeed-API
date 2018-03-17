<?php
/**
 * Created by PhpStorm.
 * User: Andy Gregoire
 * Date: 3/15/2018
 * Time: 7:13 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /***
     * This function registers a new user
     *
     * @Get("user")
     * @Request({"email" : "test@gmail.com", "name" : "John Smith"})
     * @Response(200, body={"User" : {"id" : "#", "name" : "John Smith", "email": "test@gmail.com"}}}
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCreateUser(Request $request)
    {
        if (!is_null($request->input('email')))
        {
            $validator = Validator::make($request->all(), ["name" => "required", "email" => "required"]);
            if ($validator->fails())
            {
                return response($validator->errors(),400);
            }

            $lEmail = $request->input('email');
            $lName = $request->input('name');

            $lUser = User::where(['email' => $lEmail])->first();
            if ($lUser)
            {
                return response()->json(['user' => json_encode($lUser)], 200);
            }

            $lUser = User::create([
                'name' => $lName,
                'email' => $lEmail,
            ]);


            if ($lUser)
            {
                return response()->json(['user' => json_encode($lUser)], 200);
            }

            return response()->json(['message' => "Failed to create user"], 404);
        }

        abort(401, "Invalid email");
    }

    /***
     * This function retrieves a User by their email address.
     *
     * @Get("user")
     * @Request({"email" : "test@gmail.com"})
     * @Response(200, body={"User" : {"id" : "#", "name" : "John Smith", "email": "test@gmail.com"}}}
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserByEmail(Request $request)
    {
        $validator = Validator::make($request->all(), ["email" => "required"]);
        if ($validator->fails())
        {
            return response($validator->errors(),400);
        }

        $lEmail = $request->input('email');
        $lUser = User::where(['email' => $lEmail])->first();

        if ($lUser)
        {
            return response()->json(['user' => json_encode($lUser)], 200);
        }

        return response()->json(['message' => "Failed to find user"], 404);
    }

    /***
     * This function retrieves a User by their email address.
     *
     * @Get("user/{id}")
     * @Request()
     * @Response(200, body={"User" : {"id" : "#", "name" : "John Smith", "email": "test@gmail.com"}}}
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserById(Request $request, $id)
    {
        $lUser = User::where(['id' => $id])->first();

        if ($lUser)
        {
            return response()->json(['user' => json_encode($lUser)], 200);
        }

        return response()->json(['message' => "Failed to find user"], 404);
    }
}