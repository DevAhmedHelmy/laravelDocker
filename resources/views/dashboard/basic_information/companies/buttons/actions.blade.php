
@if (\Auth::check() && auth()->user()->hasPermission('update_companies'))
    <a href="{{ route('dashboard.companies.edit', $slug) }}" class="btn btn-info btn-sm" data-target='tooltip' title="{{ trans('admin.edit') }}"><i class="fa fa-edit fa-sm"></i></a>
@endif
@if (\Auth::check() && auth()->user()->hasPermission('read_companies'))
    <a href="{{ route('dashboard.companies.show', $slug) }}" class="btn btn-info btn-sm" data-target='tooltip' title="{{ trans('admin.show') }}"><i class="fa fa-eye fa-sm"></i></a>
@endif
@if (\Auth::check() && auth()->user()->hasPermission('delete_companies'))
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" title="{{ trans('admin.delete') }}" data-target="#del_admin{{ $slug }}"><i class="fa fa-trash fa-sm"></i></button>
@endif
<!-- Modal -->
<div id="del_admin{{ $slug }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header d-block">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
        </div>
        <form method="post" action="{{route('dashboard.companies.destroy',$slug)}}">
          @csrf
          @method('delete')
          <div class="modal-body">
            <h4>{{ trans('admin.delete_this',['name'=>$name]) }}</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.cancel') }}</button>
            <button type="submit" class="btn btn-danger">{{ trans('admin.yes') }}</button>

          </div>
        </form>
      </div>
    </div>
</div>
