<div class="form-group">
    <label class="text-normal text-dark">Name</label>
    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $user->name }}">
</div>
<div class="form-group">
    <label class="text-normal text-dark">Email</label>
    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}">
</div>
<div class="form-group">
    <label class="text-normal text-dark">Role</label>
    <select name="role" id="role" class="form-control">
        @foreach(\App\User::ROLES as $role)
        <option value="{{ $role }}" @if($user->role === $role) selected @endif>@lang('roles.'.$role)</option>
        @endforeach
    </select>
</div>

