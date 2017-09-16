@component('mail::message')

# Welcome {{$users_detail->full_name}}



Your Monthly bill has been generated. The maintenance amount is {{ $users_detail->amount }}. Your due date is {{$user_detail->due_date}}. Kindly pay your monthly installment to avoid paying extra charges.


@component('mail::button', ['url' => 'www.skandroidtech.com'])
Proceed
@endcomponent

Thanks,<br>
<!-- {{ config('app.name') }} -->
{{Auth::user()->name}}
{{Auth::user()->office_number}}
@endcomponent
