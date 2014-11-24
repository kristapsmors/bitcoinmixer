@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	
	<div class="modal-dialog">
		<form id="create-edit-form" class="form-horizontal modal-form" method="post" action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/edit') }} @else {{ URL::to('admin/users/create') }} @endif" autocomplete="off">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">{{{ $title }}}</h4>
            </div>
		
			<div class="modal-body">

			        <div class="form-group">
			            <label for="name" class="col-lg-4 control-label">{{{ Lang::get('main.user_name') }}}:</label>
			            <div class="col-lg-8">
			                <input type="text" id="name" name="name" class="form-control" placeholder="Input name" value="{{{ Input::old('name', isset($user) ? $user->name : null) }}}">
			            	{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="email" class="col-lg-4 control-label">{{{ Lang::get('main.user_email') }}}:</label>
			            <div class="col-lg-8">
			                <input type="email" id="email" name="email" class="form-control" placeholder="email@example.com" value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}">
			                {{{ $errors->first('email', '<span class="help-inline">:message</span>') }}}
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="userpassword" class="col-lg-4 control-label">{{{ Lang::get('main.password') }}}:</label>
			            <div class="col-lg-8">
			                <input type="password" name="password" id="password" class="form-control" value="">
			                {{{ $errors->first('password', '<span class="help-inline">:message</span>') }}}
			            </div>
			        </div>
			        <div class="form-group">
			            <label for="userpassword" class="col-lg-4 control-label">{{{ Lang::get('main.password_confirm') }}}:</label>
			            <div class="col-lg-8">
			                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="">
			                {{{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}}
			            </div>
			        </div>
			    
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{{ Lang::get('main.close') }}}</button>
				<button type="submit" class="btn btn-primary">{{{ Lang::get('main.save') }}}</button>
	        </div>
        </div>
        </form>
	</div>

@stop