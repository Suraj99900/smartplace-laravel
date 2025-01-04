<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogManage extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'blog_manage';

    // Fillable fields
    protected $fillable = [
        'title',
        'author_name',
        'blog_data',
        'added_on',
        'status',
        'deleted',
    ];

    /**
     * Add a new blog.
     */
    public static function addBlog($title, $authorName, $data)
    {
        
        try {
            $aData = self::create([
                'title' => $title,
                'author_name' => $authorName,
                'blog_data' => $data,
                'added_on' => date('Y-m-d H:i:s'),
            ]);

            return $aData;
        } catch (\Exception $e){
            $e->getMessage();
            return false;
        }
    }

    /**
     * Update an existing blog.
     */
    public static function updateBlog($id, $title, $authorName, $data)
    {
        return self::where('id', $id)->update([
            'title' => $title,
            'author_name' => $authorName,
            'blog_data' => $data,
        ]);
    }

    /**
     * Soft delete a blog (mark as deleted).
     */
    public static function deleteBlog($id)
    {
        return self::where('id', $id)->update([
            'deleted' => 1,
        ]);
    }

    /**
     * Get a blog by ID.
     */
    public static function getBlog($id)
    {
        return self::where('id', $id)->where('deleted', 0)->first();
    }

    /**
     * Get all blogs.
     */
    public static function getAllBlogs($limit = null)
    {
        $query = self::where('status', 1)
            ->where('deleted', 0)
            ->orderBy('id', 'DESC');

        if ($limit) {
            $query->limit($limit);
        }

        return $query->get();
    }
}
