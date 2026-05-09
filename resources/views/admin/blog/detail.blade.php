@extends('admin.layouts.app')

@section('page', 'Blog - Edit')

@section('content')
<section>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">

                    <h4 class="page__subtitle">Edit Blog</h4>

                    <form method="POST" action="{{ route('admin.blog.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group mb-3">
                            <label class="label-control">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $data->title) }}">
                            @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="label-control">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug', $data->slug) }}">
                            @error('slug') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="label-control">Image</label><br/>
                            @if ($data->image)
                                <img src="{{ asset($data->image) }}" alt="{{ $data->title }}" style="width: 120px; height: 80px; object-fit: cover; border-radius: 4px; margin-bottom: 8px; display: block;">
                            @endif
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image.</small>
                            @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="label-control">Content</label>
                            <textarea name="content" class="form-control" rows="8">{{ old('content', $data->content) }}</textarea>
                            @error('content') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="label-control">Position</label>
                            <input type="number" name="position" class="form-control" value="{{ old('position', $data->position) }}">
                            @error('position') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="label-control">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group d-flex gap-2">
                            <button type="submit" class="btn btn-sm btn-danger">Update</button>
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="page__subtitle">Blog Info</h4>
                    <table class="table table-sm">
                        <tr>
                            <td class="text-muted small">ID</td>
                            <td class="small">{{ $data->id }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted small">Status</td>
                            <td><span class="badge bg-{{ ($data->status == 1) ? 'success' : 'danger' }}">{{ ($data->status == 1) ? 'Active' : 'Inactive' }}</span></td>
                        </tr>
                        <tr>
                            <td class="text-muted small">Created</td>
                            <td class="small">{{ date('d M Y', strtotime($data->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted small">Updated</td>
                            <td class="small">{{ date('d M Y', strtotime($data->updated_at)) }}</td>
                        </tr>
                    </table>

                    <hr/>

                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('admin.blog.status', $data->id) }}" class="btn btn-sm btn-outline-warning">
                            Toggle Status ({{ ($data->status == 1) ? 'Set Inactive' : 'Set Active' }})
                        </a>
                        <a href="{{ route('admin.blog.delete', $data->id) }}" class="btn btn-sm btn-outline-danger"
                           onclick="return confirm('Are you sure you want to delete this blog?')">
                            Delete Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection