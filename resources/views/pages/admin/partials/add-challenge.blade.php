@component('components.modal', ['id' => 'add-challenge-modal', 'title' => 'Add a Challenge' , 'icon' => 'fa-trophy'])
{!! Form::open(['route' => 'admin.challenges.add', 'method' => 'POST' , 'files' => 'true'])!!}
{{ csrf_field() }}

<div class="modal-body" style="text-align:left">
    <div class="form-group w3-margin {{ $errors->has('title') ? ' has-danger' : '' }}">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' form-control-danger' : '' }}" id="title" value="{{ old('title') }}">
        @if ($errors->has('title'))
            <div class="clear-fix">
            </div>
            <div class="form-control-feedback">{{ $errors->first('title') }}</div>
        @endif
    </div>

    <div class="form-group w3-margin {{ $errors->has('description') ? ' has-danger' : '' }}">
        <label for="description" class="form-control-label">Description</label>
        <textarea id="description" name="description" rows="3" class="form-control {{ $errors->has('description') ? ' form-control-danger' : '' }}">{{ old('description')}}</textarea>
        @if ($errors->has('description'))
            <div class="clear-fix">
            </div>
            <div class="form-control-feedback">{{ $errors->first('description') }}</div>
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

    <div class="form-group w3-margin {{ $errors->has('start_date') ? ' has-danger' : '' }}">
        <label for="start_date" class="form-control-label">Start Date</label>
        <input id="start_date" type="date" name="start_date" class="form-control {{ $errors->has('start_date') ? ' form-control-danger' : '' }}" value="{{ old('start_date') }}">

        @if ($errors->has('start_date'))
            <div class="clear-fix">
            </div>
            <div class="form-control-feedback">{{ $errors->first('start_date') }}</div>
        @endif
    </div>

    <div class="form-group w3-margin {{ $errors->has('end_date') ? ' has-danger' : '' }}">
        <label for="end_date" class="form-control-label">End Date</label>
        <input id="end_date" type="date" name="end_date" class="form-control {{ $errors->has('end_date') ? ' form-control-danger' : '' }}" value="{{ old('end_date') }}">

        @if ($errors->has('end_date'))
            <div class="clear-fix">
            </div>
            <div class="form-control-feedback">{{ $errors->first('end_date') }}</div>
        @endif
    </div>

    <div class="form-group w3-margin {{ $errors->has('sponsor') ? ' has-danger' : '' }}">
        <label for="sponsor" class="form-control-label">Sponsor</label>
        <input id="sponsor" type="text" name="sponsor" class="form-control {{ $errors->has('sponsor') ? ' form-control-danger' : '' }}" value="{{ old('sponsor') }}">

        @if ($errors->has('sponsor'))
            <div class="clear-fix">
            </div>
            <div class="form-control-feedback">{{ $errors->first('sponsor') }}</div>
        @endif
    </div>
</div>

<div class="modal-footer">
    <button class="btn w3-green w3-hover-shadow" type="submit"><i class="fa fa-save"></i> Save</button>
    <button class="btn" type="button" data-dismiss="modal"> Cancel</button>
</div>
{!! Form::close() !!}
@endcomponent
