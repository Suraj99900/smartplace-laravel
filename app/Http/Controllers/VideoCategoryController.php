<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class VideoCategoryController extends Controller
{
    public function index()
    {
        return view('category-management'); // Create this Blade file in resources/views/
    }

    public function addCategory(Request $request)
    {
        try {
            $oValidator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($oValidator->fails()) {
                return response()->json(['error' => $oValidator->errors()], 400);
            }

            $oResult = VideoCategory::addCategory($request->input('name'), $request->input('desc'));

            if ($oResult) {
                return response()->json([
                    'message' => "Category added successfully",
                    'body' => $oResult,
                    'status' => 200,
                ], 200);
            } else {
                return response()->json([
                    'message' => "Error while inserting category",
                    'status' => 500,
                ], 500);
            }

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while processing your request.',
                'message' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // Get all categories
    public function getAllCategories()
    {
        try {
            $categories = VideoCategory::fetchAllCategories();
            return response()->json([
                'message' => "Categories fetched successfully",
                'body' => $categories,
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while fetching categories.',
                'message' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // Get a single category by ID
    public function getCategoryById($id)
    {
        try {
            $category = VideoCategory::fetchCategoryById($id);
            if ($category) {
                return response()->json([
                    'message' => "Category fetched successfully",
                    'body' => $category,
                    'status' => 200,
                ], 200);
            } else {
                return response()->json([
                    'message' => "Category not found",
                    'status' => 404,
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while fetching the category.',
                'message' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // Update a category by ID
    public function updateCategory(Request $request, $id)
    {
        try {
            $oValidator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($oValidator->fails()) {
                return response()->json(['error' => $oValidator->errors()], 400);
            }

            $oResult = VideoCategory::updateCategoryById($id, $request->all());

            if ($oResult) {
                return response()->json([
                    'message' => "Category updated successfully",
                    'body' => $oResult,
                    'status' => 200,
                ], 200);
            } else {
                return response()->json([
                    'message' => "Error while updating category",
                    'status' => 500,
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while updating the category.',
                'message' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // Delete a category by ID
    public function deleteCategory($id)
    {
        try {
            $oResult = VideoCategory::deleteCategoryById($id);

            if ($oResult) {
                return response()->json([
                    'message' => "Category deleted successfully",
                    'status' => 200,
                ], 200);
            } else {
                return response()->json([
                    'message' => "Error while deleting category",
                    'status' => 500,
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while deleting the category.',
                'message' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    /**
     * Fetch user category access by user ID
     */
    public function getUserCategoryAccess($userId)
    {
        try {
            $categories = VideoCategory::fetchUserCategoryAccessByUserId($userId);

            if ($categories->isEmpty()) {
                return response()->json([
                    'message' => "No categories found for this user",
                    'status' => 404,
                ], 404);
            }

            return response()->json([
                'message' => "User category access fetched successfully",
                'body' => $categories,
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while fetching user category access.',
                'message' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}
