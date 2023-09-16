<table class="table table-hover table-striped text-nowrap text-center">
    <thead>
        <tr>
            <th>Sl</th>
            <th>Category Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key => $data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->title }}</td>
                <td>{{ $data->description }}</td>
                <td>
                    @if ($data->status == 1)
                        <span class="badge badge-pill badge-success">Active</span>
                    @else
                        <span class="badge badge-pill badge-danger">Inative</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-xs btn-info" href="{{ route('backend.admin.edit.blog.category', $data->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-xs btn-danger" onclick="confirmDelete('{{ route('backend.admin.delete.blog.category', $data->id) }}')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="col-md-12">
    {{ $categories->links() }}
</div>
