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
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="mr-3">  <input class="menu-type" type="radio" name="type" value="1" checked> Custom URL </label>
                                    <label class="mr-3">  <input class="menu-type" type="radio" name="type" value="2"> Page URL </label>
                                    <label class="mr-3">  <input class="menu-type" type="radio" name="type" value="3"> Blog Category </label>
                                </div>
                            </div>
                            <div class="form-group custom-url">
                                <label class="col-md-12"> Menu Name <span class="text-danger">*</span> : </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Name" required name="name">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group custom-url">
                                <label class="col-md-12"> Menu URL <span class="text-danger">*</span> : </label>
                                <div class="input-group">
                                    <button class="btn btn-light" type="button">
                                        {{url('/')}}/
                                    </button>

                                    <input type="text" class="form-control" name="url">

                                </div>
                            </div>
                            <div class="form-group page-url" style="display:none">
                                <label class="col-md-12"> Page <span class="text-danger">*</span> : </label>

                                <div class="col-md-12">
                                    {!! Form::select('type',$pages,'',['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group blog-category" style="display:none">
                                <label class="col-md-12"> Blog Category <span class="text-danger">*</span> : </label>

                                <div class="col-md-12">
                                    {!! Form::select('category_id',$blogCategory,'',['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
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
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th colspan="2">Name</th>
                                <th>URL</th>
                                <th width="5%">Status</th>
                                <th class="text-center" width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $data)
                                <tr class="bg-light">
                                    <td colspan="2">{{ snakeToTitle($data->name) }}</td>
                                    <td>{{ $data->url }}</td>
                                    <td>
                                        @if($data->status==1)
                                        <span class="badge badge-success" title="Active"> <i class="fa fa-check"></i> </span>
                                        @else
                                        <span class="badge badge-danger" title="Inactive"> <i class="fa fa-times"></i> </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <button class="btn btn-xs btn-secondary" title="Add New Sub Menu"  data-toggle="modal" data-target="#addSubMenu-{{ $data->id }}"><i class="fa fa-plus-circle"></i></button>
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
                                        @include('backend.settings.menu.addSubMenu')

                                        <!-- Modal -->
                                        <div class="modal fade" id="editMenu-{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                {!! Form::open(['method' => 'put', 'route' => ['menus.update', $data->id]]) !!}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fs-5" id="exampleModalLabel">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            Edit Menu
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label">Name:</label>
                                                            {!! Form::text('name', $data->name, ['class' => 'form-control', 'placeholder' => 'Name','required']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Menu URL:</label>
                                                            {!! Form::text('url', $data->url, ['class' => 'form-control', 'placeholder' => 'Url', 'required']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Status:</label>
                                                            {!! Form::select('status',[1=>'Active', 0 =>'Inactive'], $data->status, ['class' => 'form-control','required']) !!}
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
                               @include('backend.settings.menu.subMenuList')
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
