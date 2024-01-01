<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(): View
    {
        $attributes = Attribute::paginate(5);
        return view('admin.attributes.index', compact('attributes'));
    }

    public function create(): View
    {
        return view('admin.attributes.create');
    }

    public function edit(Attribute $attribute)
    {
        return view('admin.attributes.edit', compact('attribute'));
    }

    public function destroy(Attribute $attribute): RedirectResponse
    {
        $attribute->delete();
        return redirect()->back()->with('success', 'attribute remove with success');
    }
}
