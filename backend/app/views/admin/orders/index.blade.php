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
                    <h4>Orders<small>All BitcoinMixer orders</small></h4>
                </div>
            </div>

            <div class="row filter-block">
                <div class="col-md-16 text-right">
                    <!--for filtering or something ater -->
                </div>
            </div>

            <div class="row">
                <table class="table table-hover col-md-16">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                <span class="line"></span>Amount
                            </th>
                            <th>
                                <span class="line"></span>Amount received
                            </th>
                            <th>
                                <span class="line"></span>Amount sent
                            </th>
                            <th>
                                <span class="line"></span>Receive address
                            </th>
                            <th>
                                <span class="line"></span>Send adress
                            </th>
                            <th>
                                <span class="line"></span>Transaction ID
                            </th>
                            <th>
                                <span class="line"></span>Order key
                            </th>
                            <th>
                                <span class="line"></span>Confirmed
                            </th>
                            <th>
                                <span class="line"></span>Confirmations
                            </th>
                            <th>
                                <span class="line"></span>IP
                            </th>
                            <th>
                                <span class="line"></span>Checks
                            </th>
                            <th>
                                <span class="line"></span>Created
                            </th>
                            <th>
                                <span class="line"></span>Updated
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    	 @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->amount_received }}</td>
                                <td>{{ $order->amount_sent }}</td>
                                <td>{{ $order->receive_address }}</td>
                                <td>{{ $order->send_address }}</td>
                                <td>{{ $order->transaction_id }}</td>
                                <td>{{ $order->order_key }}</td>
                                <td>{{ $order->confirmed }}</td>
                                <td>{{ $order->confirmations }}</td>
                                <td>{{ $order->ip }}</td>
                                <td>{{ $order->checks }}</td>
                                <?php 
                                $date = new DateTime($order->created_at);
                                ?>
                                <td>{{ $date->format('H:i j.m.y'); }}</td>
                                <?php 
                                $date = new DateTime($order->updated_at);
                                ?>
                                <td>{{ $date->format('H:i j.m.y'); }}</td>
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