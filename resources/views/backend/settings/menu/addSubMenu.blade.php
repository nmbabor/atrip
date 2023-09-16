
<div class="modal fade" id="addSubMenu-{{ $data->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {!! Form::open(['method' => 'post', 'route' => 'sub-menus.store']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">
                    <i class="fas fa-pencil-alt"></i>
                    Add Sub Menu
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Menu Name: <b>{{$data->name}}</b></label>
                    <input name="menu_id" value="{{$data->id}}" type="hidden">
                </div>
                <div class="form-group">
                    <label class="control-label">Name:</label>
                    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name','required']) !!}
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary"
                    data-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn bg-gradient-primary">
                    Submit
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>