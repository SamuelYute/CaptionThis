@component('components.modal', ['id' => 'change-password-modal', 'title' => 'Change Password' , 'icon' => 'fa-key'])
    {!! Form::open(['route' => 'dashboard.profile.change-password', 'method' => 'PUT']) !!}
      {{ csrf_field() }}
      <div class="modal-body" style="text-align:left">
        <div class="form-group w3-margin {{ $errors->has('old-password') ? ' has-danger' : '' }}">
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon ">O</div>
            <input type="password" name="old-password" class="form-control {{ $errors->has('old-password') ? ' form-control-danger' : '' }}" id="old-password" placeholder="Old Password">
          </div>
          @if ($errors->has('old-password'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('old-password') }}</div>
          @endif
        </div>

        <div class="form-group w3-margin {{ $errors->has('password') ? ' has-danger' : '' }}">
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon "><i class="fa fa-key"></i></div>
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' form-control-danger' : '' }}" id="password" placeholder="New Password">
          </div>
          @if ($errors->has('password'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('password') }}</div>
          @endif
        </div>

        <div class="form-group w3-margin">
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon "><i class="fa fa-check"></i></div>
            <input type="password" name="password_confirmation" class="form-control" id="password-confirm" placeholder="Confirm Password">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Update</button>
        <button class="btn" type="button" data-dismiss="modal"> Cancel</button>
      </div>
    {!! Form::close() !!}
@endcomponent
