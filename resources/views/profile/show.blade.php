@extends('layouts.main')

@push('title')
<title> Show Profile | Certivel </title>
@endpush

@push('css')
<!-- Bootstrap Validator -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <h1>
    Your Profile
  </h1>
</section>

<!-- page content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      @if(Session::has('message'))
      <div class="box box-solid box-danger box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Information</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          {{Session::get('message')}}
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      @endif

      <div class="box box-info">
        <div class="box-body">
          <form data-toggle="validator" role="form">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" value="{{ $profile->name }}" disabled>
            </div>
            <div class="form-group">
              <label>E-mail Address</label>
              <input type="email" class="form-control" value="{{ $profile->email }}" disabled>
            </div>
            <div class="form-group">
              <label>Joined Certivel at</label>
              <input type="text" class="form-control" value="{{ $profile->created_at }}" disabled>
            </div>
            <div class="box-footer">
              <a class="btn btn-warning" aria-label="Center Align" title="Edit" href="{{ route('profile.edit', $profile->id) }}">Edit Profile</a>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal-{{ $profile->id }}" aria-label="Center Align" title="Delete">Leave Certivel</button>
            </div>
          </form>
      <!-- Modal -->
      <div class="modal fade" id="deletemodal-{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="deletemodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deletemodal-{{ $profile->id }}">Leave Certivel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure to leave Certivel? We will miss you so much!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'profile.destroy', $profile->id ] ]) }}
                  {{ Form::hidden('id', $profile->id) }}
                  {{ Form::submit('Yes, I want to leave.', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal -->
      </div>
    </div>
  </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@push('js')
<!-- Bootstrap Validator -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
@endpush

@push('script')
<script>
function goBack() {
    window.history.back();
}
</script>
@endpush
