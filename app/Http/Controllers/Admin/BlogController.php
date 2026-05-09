<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\BlogInterface;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct(BlogInterface $blogRepository) 
    {
        $this->blogRepository = $blogRepository;
    }

    public function index(Request $request) 
    {
        $data = $this->blogRepository->listAll();
        return view('admin.blog.index', compact('data'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'position' => 'nullable|integer',
        ]);

        $params = $request->except('_token');

        // Handle image upload
        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $params['image'] = 'uploads/blogs/' . $filename;
        }

        $storeData = $this->blogRepository->create($params);

        if ($storeData) {
            return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully.');
        } else {
            return redirect()->route('admin.blog.index')->withInput($request->all());
        }
    }

    public function show(Request $request, $id)
    {
        $data = $this->blogRepository->listById($id);
        return view('admin.blog.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'position' => 'nullable|integer',
        ]);

        $params = $request->except('_token');

        // Handle image upload
        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $params['image'] = 'uploads/blogs/' . $filename;
        }

        $storeData = $this->blogRepository->update($id, $params);

        if ($storeData) {
            return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');
        } else {
            return redirect()->route('admin.blog.index')->withInput($request->all());
        }
    }

    public function status(Request $request, $id)
    {
        $this->blogRepository->toggle($id);
        return redirect()->route('admin.blog.index');
    }

    public function destroy(Request $request, $id) 
    {
        $this->blogRepository->delete($id);
        return redirect()->route('admin.blog.index');
    }
}