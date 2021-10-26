<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Models\Avatar;
use App\Models\Contractor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class AvatarController extends Controller
{
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
            if (Storage::disk('public')->exists($contractor->avatar->image_path))
                Storage::disk('public')->delete($contractor->avatar->image_path);

                $contractor->avatar()->delete();
        }

        $file = $request->file('avatar');
        $ext = $file->getClientOriginalExtension();
        $fileName = $request->contractor_id . "-" . date('YmdHis') . '.' . $ext;

        $folder = 'images';
        Storage::disk('public')->putFileAs($folder, $file, $fileName);

        $img = Image::make(public_path('storage/images/' . $fileName))->resize(800, 800,
            function ($constraint) {
                    $constraint->aspectRatio();
            });
        $img->save();

        $avatar = Avatar::create([
            'contractor_id' => $request->contractor_id,
            'image_path'    => "$folder\\$fileName"
        ]);
        return response()->json($avatar, '201');


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($contractor_id): JsonResponse
    {
        $contractor = Contractor::has('avatar')->findOrFail($contractor_id);

        if ($contractor->avatar) {
            Storage::disk('public')->exists($contractor->avatar->image_path);
            Storage::disk('public')->delete($contractor->avatar->image_path);

            $contractor->avatar()->delete();
        } else {
            return response()->json('Avatar Doesnt exist');
        }
        return response()->json('Avatar Deleted');

    }
}
