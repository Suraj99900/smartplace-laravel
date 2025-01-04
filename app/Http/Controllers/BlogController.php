<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogManage;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function fetchAllBlogs(Request $request)
    {
        $iLimit = $request->input('iLimit', 10);

        // Get all blogs from the model
        $posts = (new BlogManage)->getAllBlogs($iLimit); // Assuming the method exists in your Blog model

        // Build the response
        $response = [
            'status' => 'success',
            'message' => 'Blogs fetched successfully',
            'data' => $posts
        ];

        // Return the response as JSON
        return response()->json($response);
    }

    public function addBlogPost(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'authorName' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Extract validated data
        $sTitle = $validatedData['title'];
        $sAuthorName = $validatedData['authorName'];
        $sData = $validatedData['content'];

        // Create the blog post using BlogManage or Blog model
        $blogManage = new BlogManage();
        $result = $blogManage->addBlog($sTitle, $sAuthorName, $sData); // Assuming addBlog() is implemented in BlogManage
        // Build the response
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Blog post added successfully',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to add blog post',
            ];
        }

        // Return the response as JSON
        return response()->json($response);
    }

    public function fetchPostById(Request $request, $id)
    {


        // Retrieve the blog post ID
        $postId = $id;

        // Fetch the blog post using the BlogManage model
        $blogManage = new BlogManage();
        $post = $blogManage->getBlog($postId); // Assuming getBlog() is implemented in BlogManage

        // Build the response based on whether the post was found or not
        if ($post) {
            $response = [
                'status' => 'success',
                'message' => 'Blog fetched successfully',
                'data' => $post,
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Blog post not found',
            ];
        }

        // Return the response as JSON
        return response()->json($response);
    }

    public function updatePost(Request $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'authorName' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Extract validated data
        $sTitle = $validatedData['title'];
        $sAuthorName = $validatedData['authorName'];
        $sData = $validatedData['content'];

        // Create an instance of BlogManage
        $blogManage = new BlogManage();

        // Check if the post exists before updating
        $post = $blogManage->getBlog($id); // Assuming getBlog() retrieves a blog by ID
        if ($post) {
            // Update the blog post
            $updated = $blogManage->updateBlog($id, $sTitle, $sAuthorName, $sData); // Assuming updateBlog() is implemented in BlogManage

            if ($updated) {
                $response = [
                    'status' => 'success',
                    'message' => 'Blog post updated successfully',
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to update blog post',
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Blog post not found',
            ];
        }

        // Return the response as JSON
        return response()->json($response);
    }

    public function deletePost(Request $request, $id)
    {
        // Create an instance of BlogManage
        $blogManage = new BlogManage();

        // Check if the post exists before attempting to delete
        $post = $blogManage->getBlog($id); // Assuming getBlog() retrieves a blog by ID
        if ($post) {
            // Delete the blog post
            $deleted = $blogManage->deleteBlog($id); // Assuming deleteBlog() is implemented in BlogManage

            if ($deleted) {
                $response = [
                    'status' => 'success',
                    'message' => 'Blog post deleted successfully',
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to delete blog post',
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Blog post not found',
            ];
        }

        // Return the response as JSON
        return response()->json($response);
    }



}
