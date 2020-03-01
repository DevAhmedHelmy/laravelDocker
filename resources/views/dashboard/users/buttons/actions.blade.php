 
<a href="{{ route('dashboard.users.edit', $slug) }}" class="btn btn-info btn-sm" data-target='tooltip' title="{{ trans('admin.edit') }}"><i class="fa fa-edit fa-sm"></i></a>

<a href="{{ route('dashboard.users.show', $slug) }}" class="btn btn-info btn-sm" data-target='tooltip' title="{{ trans('admin.show') }}"><i class="fa fa-eye fa-sm"></i></a>

<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="{{ trans('admin.delete') }}" data-target="#del_admin{{ $slug }}"><i class="fa fa-trash fa-sm"></i></button>

<!-- Modal -->
<div id="del_admin{{ $slug }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
        </div>
        {!! Form::open(['route'=>['dashboard.users.destroy',$slug],'method'=>'delete']) !!}
        <div class="modal-body">
          <h4>{{ trans('admin.delete_this') }}</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.cancel') }}</button>
          {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>