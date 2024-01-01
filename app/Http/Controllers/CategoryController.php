<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->back()->with('success', 'Category delete with success');
    }

    public function create(): View
    {
        $category = new Category();
        return view('admin.categories.create', compact('category'));
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.create', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($this->extractData($category, $request));
        return redirect()->route('categories.index')->with('success', 'Category updated with success');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        if (!$request->hasFile('image')) {
            return redirect()->back()->with('error', 'the image is required');
        }
        $category = new Category();
        Category::create($this->extractData($category, $request));
        return redirect()->route('categories.index')->with('success', 'Category created with success');
    }

    private function extractData(Category $category, CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['slug']);
        /** @var UploadedFile|null $image */
        $image = $request->image;
        if ($image === null || $image->getError()) {
            return $data;
        }
        /** @var $category new Category() */
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $data['image'] = $image->store('categories', 'public');
        return $data;
    }
}
