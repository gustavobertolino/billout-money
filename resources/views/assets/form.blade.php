
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($asset)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('owner_id') ? 'has-error' : '' }}">
    <label for="owner_id" class="col-md-2 control-label">Owner</label>
    <div class="col-md-10">
        <select class="form-control" id="owner_id" name="owner_id">
        	    <option value="" style="display: none;" {{ old('owner_id', optional($asset)->owner_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select owner</option>
        	@foreach ($owners as $key => $owner)
			    <option value="{{ $key }}" {{ old('owner_id', optional($asset)->owner_id) == $key ? 'selected' : '' }}>
			    	{{ $owner }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('owner_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($asset)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    <label for="is_active" class="col-md-2 control-label">Is Active</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_active_1">
            	<input id="is_active_1" class="" name="is_active" type="checkbox" value="1" {{ old('is_active', optional($asset)->is_active) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
    <label for="value" class="col-md-2 control-label">Value</label>
    <div class="col-md-10">
        <input class="form-control" name="value" type="text" id="value" value="{{ old('value', optional($asset)->value) }}" minlength="1" placeholder="Enter value here...">
        {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('currency') ? 'has-error' : '' }}">
    <label for="currency" class="col-md-2 control-label">Currency</label>
    <div class="col-md-10">
        <input class="form-control" name="currency" type="text" id="currency" value="{{ old('currency', optional($asset)->currency) }}" minlength="1" placeholder="Enter currency here...">
        {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
    </div>
</div>

