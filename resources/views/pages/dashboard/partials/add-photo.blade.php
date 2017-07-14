@component('components.modal', ['id' => 'add-picture-modal', 'title' => 'Add a Picture' , 'icon' => 'fa-camera'])
    {!! Form::open(['route' => 'dashboard.pictures.add', 'method' => 'POST' , 'files' => 'true'])!!}
      {{ csrf_field() }}

      <div class="modal-body" style="text-align:left">
        <div class="form-group w3-margin {{ $errors->has('picture') ? ' has-danger' : '' }}">
          <label for="picture">Picture</label>
          <input type="file" name="picture" class="form-control {{ $errors->has('picture') ? ' form-control-danger' : '' }}" id="picture">
          @if ($errors->has('picture'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('picture') }}</div>
          @endif
        </div>

        <div class="form-group w3-margin {{ $errors->has('caption') ? ' has-danger' : '' }}">
          <label for="picture-caption" class="form-control-label">Caption</label>
          <textarea id="picture-caption" name="caption" rows="3" class="form-control {{ $errors->has('picture') ? ' form-control-danger' : '' }}">{{ old('caption')}}</textarea>
          @if ($errors->has('caption'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('caption') }}</div>
          @endif
        </div>

        <div class="form-group w3-margin {{ $errors->has('category') ? ' has-danger' : '' }}">
          <label for="category" class="form-control-label">Category</label>
          <select id="category" name="category" class="{{ $errors->has('picture') ? ' form-control-danger' : '' }}">
            <option value="" selected="selected" disabled="disabled">Choose a Category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('category'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('category') }}</div>
          @endif
        </div>

        {{--<div class="form-group w3-margin {{ $errors->has('tags') ? ' has-danger' : '' }}">
          <label for="tags" class="form-control-label">Tags</label>
          <select id="tags" name="tags[]" class="{{ $errors->has('tags') ? ' form-control-danger' : '' }}" multiple="multiple">
            <option value="" selected="selected" disabled="disabled">Select Tags</option>
            @foreach ($tags as $tag)
              <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
          </select>
          @if ($errors->has('tags'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('tags') }}</div>
          @endif
        </div>
      </div>--}}

      <div class="modal-footer">
        <button class="btn btn-success" type="submit"><i class="fa fa-cloud-upload"></i> Upload</button>
        <button class="btn" type="button" data-dismiss="modal"> Cancel</button>
      </div>
    {!! Form::close() !!}
      </div>
@endcomponent
