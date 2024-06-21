@component('mail::message')
# Invitation to Join Workspace

You have been invited to join the "{{ $workspace->name }}" workspace.

Click the button below to accept the invitation:

@component('mail::button', ['url' => route('accept.invitation', ['workspace' => $workspace->id])])
Accept Invitation
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
