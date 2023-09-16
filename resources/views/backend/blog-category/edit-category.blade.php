@extends('backend.master')

@section('title', 'Edit Blog Category')

@section('content')
    <div class="card">
        <!-- form start -->
        <form action="{{ route('backend.admin.edit.blog.category', $category->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-6 mb-3">
                        <div class="form-group">
                            <label for="title" class="form-label">Category Title <span class="text-danger">*</span> : </label>
                            <input type="text" class="form-control" required autocomplete="off" name="title"
                                placeholder="Enter title" value="{{ $category->title }}">
                        </div>
                    </div>
            
                    <div class="col-6 mb-3">
                        <div class="form-group">
                            <label for="name" class="form-label">Slug<span class="text-danger">*</span> : </label>
                            <input type="text" class="form-control" required autocomplete="off" name="slug"
                                placeholder="Enter slug" value="{{ $category->slug }}">
                        </div>
                    </div>
                </div>
                {{-- description --}}
                <div class="form-group">
                    <label for="description">
                        Description
                    </label>
                    <textarea class="form-control" placeholder="Enter description" name="description" cols="30"
                        rows="4">{{ $category->description }}</textarea>
                </div>
                <div class="col-4">
                    <p></p>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="publish" name="status"
                                {{ $category->status ? 'checked' : '' }}>
                            <label class="custom-control-label" for="publish">
                                Publish
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-block bg-gradient-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
@push('script')
 <script>
    function getSlugFromString(str) {
    return str
        .toLowerCase()
        .replace(/[^a-z0-9-]/g, "-")
        .replace(/-+/g, "-")
        .replace(/^-|-$/g, "");
    }

    $("[name='title']").keyup(function () {
    $("[name='slug']").val(getSlugFromString(this.value));
    });
 </script>
@endpush