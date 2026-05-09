@extends('admin.layouts.app')

@section('page', 'Blog')

@section('content')
<section>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="check-column">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                </th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Position</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                            <tr>
                                <td class="check-column">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                </td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                    @else
                                        <span class="text-muted small">No image</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->title }}
                                    <div class="row__action">
                                        <a href="{{ route('admin.blog.view', $item->id) }}">Edit</a>
                                        <a href="{{ route('admin.blog.view', $item->id) }}">View</a>
                                        <a href="{{ route('admin.blog.status', $item->id) }}">{{ ($item->status == 1) ? 'Active' : 'Inactive' }}</a>
                                        <a href="{{ route('admin.blog.delete', $item->id) }}" class="text-danger">Delete</a>
                                    </div>
                                </td>
                                <td><span class="small text-muted">{{ $item->slug }}</span></td>
                                <td>{{ $item->position }}</td>
                                <td>Published<br/>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                <td><span class="badge bg-{{ ($item->status == 1) ? 'success' : 'danger' }}">{{ ($item->status == 1) ? 'Active' : 'Inactive' }}</span></td>
                            </tr>
                            @empty
                            <tr><td colspan="100%" class="small text-muted">No data found</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                    @csrf
                        <h4 class="page__subtitle">Add New</h4>

                        <div class="form-group mb-3">
                            <label class="label-control">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="label-control">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="auto-generated if left empty">
                            @error('slug') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="label-control">Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="label-control">Content</label>
                            <textarea name="content" class="form-control" rows="5">{{ old('content') }}</textarea>
                            @error('content') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="label-control">Position</label>
                            <input type="number" name="position" class="form-control" value="{{ old('position', 0) }}">
                            @error('position') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-danger">Add New</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection