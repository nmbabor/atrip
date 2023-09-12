@extends('backend.master')

@section('title', 'Categories')
@section('title_button')
<a href="{{ route('backend.admin.create.blog.category') }}" class="btn bg-gradient-primary" >
    <i class="fas fa-plus-circle"></i>
    Add New
</a>
@endsection
@section('content')
    <div class="card">
        <div class="card-body table-responsive p-0" id="table_data">

        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $.ajax({
                url: "{{ route('backend.admin.blog.categories.data') }}?page=" + page,
                success(response) {
                    $('#table_data').html(response);
                }
            });
        }
    </script>
@endpush
