@include('form.text', [
    'name'        => 'name',
    'label'       => 'Name:*',
    'placeholder' => 'Full name',
])

@include('form.text', [
    'name'        => 'email',
    'label'       => 'Email:*',
    'placeholder' => 'Email',
])

{{-- @include('form.text', [
    'name'        => 'password',
    'label'       => 'Password:*',
    'placeholder' => 'Password',
]) --}}
