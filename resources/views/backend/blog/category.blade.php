@extends('backend.master')

@section('title', 'Blog Category')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5 border-right">
                    <fieldset>
                        <form action="{{ route('menus.store') }}" method="post">
                            @csrf
                            <div class="form-group custom-url">
                                <label class="col-md-12"> Menu Name <span class="text-danger">*</span> : </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Name" name="name">
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
                    <table class="table table-bordered table-hover" style="display: none">
                        <thead>
                            <tr>
                                <th colspan="2">Name</th>
                                <th>URL</th>
                                <th width="5%">Status</th>
                                <th class="text-center" width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody  class="row_position">
                            <tr class="bg-light">
                                <td>
                                </td>
                            </tr>
                            @foreach ($allData as $data)
                                <tr class="bg-light" id="{{$data->id}}">
                                    <td colspan="2" >{{ $data->name }}</td>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

