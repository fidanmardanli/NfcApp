<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            $users = DB::table('users')->get();

            if ($users->isEmpty()) {
                return response()->json(['success' => false, 'message' => 'No users found!'], 404);
            }

            return response()->json(['success' => true, 'data' => $users]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function getUserDatasById($id)
    {
        try {
            $user = DB::table('users')->where('id', $id)->first();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not found!'], 404);
            }

            return response()->json(['success' => true, 'data' => $user]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function getUserDatasByUid($uid)
    {
        try {
            $user = DB::table('users')->where('uid', $uid)->first();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not found!'], 404);
            }

            return response()->json(['success' => true, 'data' => $user]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $userId = DB::table('users')->insertGetId([
                'fullname' => $request->fullname,
                'uid' => $request->uid,
                'passport_number' => $request->passport_id,
                'birthdate' => $request->birthdate,
                'gender' => $request->gender,
                'image' => $request->profile_image,
                'created_at' => now(),
            ]);

            return response()->json(['success' => true, 'user_id' => $userId]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function deleteById($id)
    {
        try {
            $deleted = DB::table('users')->where('id', $id)->delete();

            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'User deleted successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'User not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function updateById(Request $request, $id)
    {
        try {
            $updated = DB::table('users')
                ->where('id', $id)
                ->update([
                    'fullname' => $request->fullname,
                    'uid' => $request->uid,
                    'passport_number' => $request->passport_number,
                    'birthdate' => $request->birthdate,
                    'gender' => $request->gender,
                    'image' => $request->profile_image,
                    'updated_at' => now(),
                ]);

            if ($updated) {
                return response()->json(['success' => true, 'message' => 'User updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'User not found or no changes were made'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
