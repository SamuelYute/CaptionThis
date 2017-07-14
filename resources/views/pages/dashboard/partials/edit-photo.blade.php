@component('components.modal', ['id' => 'edit-picture-modal-'.$picture->id, 'title' => 'Edit Picture Details' , 'icon' => 'fa-camera'])
    {!! Form::open(['route' => ['dashboard.pictures.update',$picture->id], 'method' => 'PUT'])!!}
    {{ csrf_field() }}

    <div class="modal-body" style="text-align:left">
        <div class="form-group w3-margin {{ $errors->has('caption') ? ' has-danger' : '' }}">
            <label for="picture-caption" class="form-control-label">Caption</label>
            <textarea id="picture-caption" name="caption" rows="3" class="form-control {{ $errors->has('picture') ? ' form-control-danger' : '' }}">{{ old('caption',$picture->caption)}}</textarea>
            @if ($errors->has('caption'))
                <div class="clear-fix">
                </div>
                <div class="form-control-feedback">{{ $errors->first('caption') }}</div>
            @endif
        </div>

        <div class="form-group w3-margin {{ $errors->has('category') ? ' has-danger' : '' }}">
            <label for="category" class="form-control-label">Category</label>
            <select id="category" name="category" class="{{ $errors->has('picture') ? ' form-control-danger' : '' }}">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('category'))
                <div class="clear-fix">
                </div>
                <div class="form-control-feedback">{{ $errors->first('category') }}</div>
            @endif
        </div>
    </div>

    <div class="modal-footer">
        <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
        <button class="btn" type="button" data-dismiss="modal"> Cancel</button>
    </div>


    {!! Form::close() !!}
@endcomponent
