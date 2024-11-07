<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy("sort")->with('products')->get();
        $deleted_categories = Category::onlyTrashed()->get();
        return view("categories.index", compact("categories", 'deleted_categories'));
    }

    public function toggleEnabled(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->enabled = $request->input('enabled');
        $category->save();

        return response()->json(['success' => true]);
    }

    public function toggleFeatured(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->featured = $request->input('featured');
        $category->save();

        return response()->json(['success' => true]);
    }


    public function saveOrder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*.id' => 'required|exists:categories,id',
            'order.*.sort' => 'required|integer',
        ]);

        $order = $request->input('order');

        // Gather existing sort values
        $existingCategories = Category::withTrashed()->pluck('id', 'sort')->toArray();

        // Create an array to track used sort values
        $usedSorts = array_keys($existingCategories);

        // Loop through the incoming order
        foreach ($order as $item) {
            // Check for duplicates and adjust sort if necessary
            $newSort = $item['sort'];

            // If the new sort already exists for another category, find a unique sort value
            while (in_array($newSort, $usedSorts)) {
                $newSort++;
            }

            // Update the category with the new unique sort value
            Category::where('id', $item['id'])->update(['sort' => $newSort]);

            // Add the new sort value to used sorts
            $usedSorts[] = $newSort;
        }

        return response()->json(['success' => true]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated_data = $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'nullable|max:265',
        ]);

        // Create a new Category instance
        $category = new Category();
        $category->name = $validated_data['name'];
        $category->description = $validated_data['description'];

        // Get the max 'sort' value and increment it, handle the case where no categories exist yet
        $maxSort = Category::withTrashed()->max('sort');
        $category->sort = $maxSort ? $maxSort + 1 : 1;

        // Save the new category
        $category->save();

        // Redirect to the categories admin page
        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("categories.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Handle the update request
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $category->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);



        return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where("id", $id)->forceDelete();
        return redirect()->route("admin.categories");
    }
    public function delete(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route("admin.categories");
    }

    public function restore(string $id)
    {
        Category::where("id", $id)->restore();
        return redirect()->route("admin.categories");
    }
}
