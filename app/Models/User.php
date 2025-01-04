<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'app_user';

    protected $fillable = [
        'name',
        'password',
        'user_type',
        'added_on',
        'status',
        'deleted',
    ];

    /**
     * Fetch user details by ID.
     */
    public function fetchById($id)
    {
        return self::where('id', $id)->where('status', 1)->first();
    }

    /**
     * Add a new user.
     */
    public function addUser($data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['added_on'] = now();
        return self::create($data);
    }

    /**
     * Update user details.
     */
    public function updateUser($id, $data)
    {
        $user = self::find($id);

        if ($user) {
            if (isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }

            $user->update($data);
            return $user;
        }

        return null;
    }

    /**
     * Delete a user (soft delete).
     */
    public function deleteUser($id)
    {
        $user = self::find($id);

        if ($user) {
            $user->update(['deleted' => 1]);
            return true;
        }

        return false;
    }

    /**
     * Fetch all users with `status = 1`.
     */
    public function fetchAll()
    {
        return self::where('status', 1)->where('deleted', 0)->get();
    }

    /**
     * User login function.
     */
    public function login($name, $password)
    {
        $user = self::where('name', $name)->where('status', 1)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return false;
    }
}
