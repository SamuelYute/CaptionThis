@component('components.modal', ['id' => 'add-category-modal', 'title' => 'Add a Category' , 'icon' => 'fa-bookmark'])
{!! Form::open(['route' => 'admin.categories.add', 'method' => 'POST' , 'files' => 'true'])!!}
{{ csrf_field() }}

<div class="modal-body" style="text-align:left">
    <div class="form-group w3-margin {{ $errors->has('name') ? ' has-danger' : '' }}">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' form-control-danger' : '' }}" id="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <div class="clear-fix">
            </div>
            <div class="form-control-feedback">{{ $errors->first('name') }}</div>
        @endif
    </div>

    <div class="form-group w3-margin {{ $errors->has('display_picture') ? ' has-danger' : '' }}">
        <label for="display_picture">Display Picture</label>
        <input type="file" name="display_picture" class="form-control {{ $errors->has('display_picture') ? ' form-control-danger' : '' }}" id="display_picture">
        @if ($errors->has('display_picture'))
            <div class="clear-fix">
            </div>
            <div class="form-control-feedback">{{ $errors->first('display_picture') }}</div>
        @endif
    </div>
</div>

<div class="modal-footer">
    <button class="btn w3-green w3-hover-shadow" type="submit"><i class="fa fa-save"></i> Save</button>
    <button class="btn" type="button" data-dismiss="modal"> Cancel</button>
</div>
{!! Form::close() !!}
@endcomponent
