<div class="col-sm-6">
    <div class="float-right">
    	@php
    		$is_deleted = false;
    	@endphp
    	@if(!empty($user))
    		@if($user->status == 3)
    			@php
    				$is_deleted = true;
    			@endphp
    		@endif	
    	@endif
        @if(!$is_deleted)
	        <button class="btn btn-success" type="submit">
	            <i aria-hidden="true" class="fa fa-check">
	            </i>
	            Save
	        </button>
	        <a class="btn btn-warning" href="{{ URL::previous() }}	">
	            <i aria-hidden="true" class="fa fa-th-list">
	            </i>
	            Back To List
	        </a>
	        <!--<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button> -->
        @else
	        <p style="color:red">
	            Deleted User
	        </p>
	        <a class="btn btn-warning show_btn" href="{{ URL::previous() }}	">
	            <i aria-hidden="true" class="fa fa-th-list ">
	            </i>
	            Back To List
	        </a>
        @endif
    </div>
</div>