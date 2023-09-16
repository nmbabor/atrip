@extends('backend.master')

@section('title', 'Menu')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5 border-right">
                    <fieldset>
                        <form action="{{ route('menus.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-12"> Menu Name <span class="text-danger">*</span> : </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Name" required name="name">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"> Menu URL <span class="text-danger">*</span> : </label>
                                <div class="input-group">
                                    <div>
                                        {!! Form::select('type',['1'=>'Custom URL','2'=>'Page URL','3'=>'Blog Category'],'1',['class'=>'form-control menu-type','required']) !!}
                                    </div>

                                    <input type="text" class="form-control custom-url" name="url">

                                    {!! Form::select('page_id',$pages,'',['class'=>'form-control page-url','style'=>'display:none']) !!}
                                    {!! Form::select('category_id',$blogCategory,'',['class'=>'form-control blog-category','style'=>'display:none']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn bg-gradient-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                    </fieldset>
                    <hr>
                </div>

                <div class="col-md-7 table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>URL</th>
                                <th class="text-center" width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $data)
                                <tr>
                                    <td>{{ snakeToTitle($data->name) }}</td>
                                    <td>{{ $data->url }}</td>
                                    <td>
                                        <div class="text-center">
                                            <!-- Button trigger modal -->
                                            <button title="Edit Menu" type="button" class="btn btn-info btn-xs"
                                                data-toggle="modal" data-target="#editMenu-{{ $data->id }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <a class="btn btn-danger btn-xs" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Menu"
                                                                href="javascript:void(0)"
                                                                onclick='resourceDelete("{{ route('menus.destroy', $data->id) }}")'>
                                                                <span class="delete-icon">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editMenu-{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                {!! Form::open(['method' => 'put', 'route' => ['menus.update', $data->id]]) !!}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fs-5" id="exampleModalLabel">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            Edit permission
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label">Name:</label>
                                                            {!! Form::text('name', $data->name, ['class' => 'form-control', 'placeholder' => 'permission Name']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-secondary"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn bg-gradient-primary">
                                                            Save changes
                                                        </button>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $('.menu-type').on('change',function(){
                let type = $(this).val();
                $('.custom-url').hide();
                $('.page-url').hide();
                $('.blog-category').hide();
                if(type==1){
                    $('.custom-url').show();
                }else if(type==2){
                    $('.page-url').show();
                }else if(type==3){
                    $('.blog-category').show();
                }
            });
        })
    </script>
@endpush
