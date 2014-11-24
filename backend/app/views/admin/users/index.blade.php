@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div id="pad-wrapper">

        <!-- campaign table sample -->
        <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
        <div class="table-products">
            <div class="row head">
                <div class="col-md-16">
                    <h4> {{{ Lang::get('main.users') }}} <small>{{{ Lang::get('main.all_users') }}}</small></h4>
                </div>
            </div>

            <div class="row filter-block">
                <div class="col-md-16 text-right">
                    <a class="btn-flat new-product" data-toggle="modal" data-target="#modalForm" href="{{{ URL::to('admin/users/create') }}}">+ {{{ Lang::get('main.add_user') }}}</a>
                </div>
            </div>

            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-3">
                                @lang('main.name')
                            </th>
                            <th class="col-md-3">
                                <span class="line"></span> {{{ Lang::get('main.email') }}}
                            </th>
                            <th class="col-md-3">
                                <span class="line"></span> {{{ Lang::get('main.website') }}}
                            </th>
                            <th class="col-md-3">
                                <span class="line"></span> {{{ Lang::get('main.status') }}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($users as $user)
                    		<tr>
                    			<td>{{ $user->name }}</td>
                    			<td>{{ $user->email }}</td>
                    			<td></td>
                    			<td>
	                                <div class="slider-frame {{ $user->status == 1 ? 'maxtraffic' : '' }}">
	                                    <span data-user-id="{{ $user->id }}" data-on-text="{{{ Lang::get('main.on') }}}" data-off-text="{{{ Lang::get('main.off') }}}" class="slider-button {{ $user->status == 1 ? 'on' : 'off' }}">{{ $user->status == 1 ? Lang::get('main.on') : Lang::get('main.off') }}</span>
	                                </div>
	                                <ul class="actions">
                                        @if($user->admin == 0)
	                                       <li><a href="{{{ URL::to('admin/users/login/' . $user->id ) }}}"><i class="icon-exchange"></i></a></li>
                                        @endif
	                                    <li><i data-toggle="modal" href="{{{ URL::to('admin/users/' . $user->id . '/edit' ) }}}" data-target="#modalForm" class="table-edit"></i></li>
	                                </ul>
	                            </td>
						    </tr>
						@endforeach  
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end table -->
    </div>
    <div class="modal fade in" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;"></div>
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
	    $(function () {

	    	// jQuery Knobs
            $(".knob").knob();

			// Switch slide buttons
		    $('.slider-button').click(function() {
		    	var userId =  $(this).data("user-id");
		        if ($(this).hasClass("on")) {
		        	changeStatus(userId, 0);
		            $(this).removeClass('on').html($(this).data("off-text"));   
		            $(this).parent().addClass('delay').delay(1500).removeClass('delay').removeClass('maxtraffic');
		        } else {
		        	changeStatus(userId, 1);
		            $(this).addClass('on').html($(this).data("on-text"));
		            $(this).parent().addClass('maxtraffic');
		        }
		    });


		    function changeStatus(user, status) {
		    	$.get( "{{{ URL::to('admin/users/status') }}}/" + user + "/" + status);
		    }

		    $('body').on('hidden.bs.modal', '.modal', function () {
			    $(this).removeData('bs.modal');
			});


            $(document).on('submit', '.modal-form', function(e) {
                var url = $(this).attr('action');
                var id = $(this).attr('id');
                $.ajax({
                   type: "POST",
                   url: url,
                   data: $(this).serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                       if(data['ok']) {
                            location.reload(); 
                       } else {
                            $('#'+id+' .modal-body .alert').remove();
                            $.each( data['error'], function( key, value ) {                 
                                $('#'+id+' .modal-body').append('<div class="alert alert-danger">' + value + '</div>');
                            });            
                       }
                   }
                });

                e.preventDefault();     
            });

	    });
    </script>
@stop