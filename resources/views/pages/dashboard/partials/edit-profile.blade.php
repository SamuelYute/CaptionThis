@component('components.modal', ['id' => 'edit-profile-modal', 'title' => 'Edit Profile' , 'icon' => 'fa-user-circle'])
    {!! Form::open(['route' => 'dashboard.profile.edit', 'method' => 'PATCH' , 'files' => 'true'])!!}
      {{ csrf_field() }}
      <div class="modal-body" style="text-align:left">
        <div class="form-group w3-margin {{ $errors->has('firstname') ? ' has-danger' : '' }}">
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon ">F</div>
            <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? ' form-control-danger' : '' }}" id="firstname" placeholder="Firstname" value="{{ old('firstname',$user->firstname) }}" >
          </div>
          @if ($errors->has('firstname'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('firstname') }}</div>
          @endif
        </div>

        <div class="form-group w3-margin {{ $errors->has('lastname') ? ' has-danger' : '' }}">
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon ">L</div>
            <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? ' form-control-danger' : '' }}" id="lastname" placeholder="Lastname" value="{{ old('lastname',$user->lastname) }}">
          </div>
          @if ($errors->has('lastname'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('lastname') }}</div>
          @endif
        </div>

        <div class="form-group w3-margin {{ $errors->has('username') ? ' has-danger' : '' }}">
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon ">@</div>
            <input type="text" name="username" class="form-control {{ $errors->has('firstname') ? ' form-control-danger' : '' }}" id="username" placeholder="Username" value="{{ old('username',$user->username) }}">
          </div>
          @if ($errors->has('username'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('username') }}</div>
          @endif
        </div>

        <div class="form-group w3-margin {{ $errors->has('email') ? ' has-danger' : '' }}">
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon "><i class="fa fa-envelope"></i></div>
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' form-control-danger' : '' }}" id="email" placeholder="Email" value="{{ old('email',$user->email) }}">
          </div>
          @if ($errors->has('email'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('email') }}</div>
          @endif
        </div>

        <div class="form-group w3-margin {{ $errors->has('avatar') ? ' has-danger' : '' }}">
          <label for="avatar">Display Picture</label>
          <input type="file" name="avatar" class="form-control {{ $errors->has('avatar') ? ' form-control-danger' : '' }}" id="avatar">
          @if ($errors->has('avatar'))
              <div class="clear-fix">
              </div>
              <div class="form-control-feedback">{{ $errors->first('avatar') }}</div>
          @endif
        </div>

      </div>

      <div class="modal-footer">
        <button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Update</button>
        <button class="btn" type="button" data-dismiss="modal"> Cancel</button>
      </div>
    {!! Form::close() !!}
@endcomponent
