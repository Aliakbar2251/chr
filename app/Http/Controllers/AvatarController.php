<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Models\Avatar;
use App\Models\Contractor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function upload($request): JsonResponse
    {
        $file = $request->file('avatar');
        $ext = $file->getClientOriginalExtension();
        $fileName = $request->contractor_id . "-" . date('YmdHis') . '.' . $ext;

        $folder = 'images';
        Storage::disk('public')->putFileAs($folder, $file, $fileName);

        $avatar = Avatar::create([
            'contractor_id' => $request->contractor_id,
            'image_path'    => "$folder\\$fileName"
        ]);
        return response()->json($avatar);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(AvatarRequest $request): JsonResponse
    {
        $contractor = Contractor::findOrFail($request->contractor_id);

        if ($contractor->avatar) {
            $contractor->avatar()->delete();

            Storage::delete('public\\' . $contractor->avatar->image_path);

            $avatar = AvatarController::upload($request);
        } else {
            $avatar = AvatarController::upload($request);
        }
        return response()->json($avatar, 201);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($contractor_id): JsonResponse
    {
        $contractor = Contractor::findOrFail($contractor_id);

        if ($contractor->avatar) {

            $contractor->avatar()->delete();

            Storage::delete('public\\' . $contractor->avatar->image_path);
        } else {
            return response()->json('Avatar Doesnt exist');
        }
        return response()->json('Avatar Deleted');

    }
}
