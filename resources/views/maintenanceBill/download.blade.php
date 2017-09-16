<!DOCTYPE html>
<html>
<head>
    <title></title>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
     <table class="table">
                            <thead>

                                <tr>
                                    <th>Society Name</th>
                                    <td>
                                        {{Auth::user()->society_method->society_name}}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Flat No</th>
                                    <td>
                                    {{ $maintenanceBills->flats_method->flat_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bill Number</th>
                                    <td>
                                    {{ $maintenanceBills->bill_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>
                                    {{ $maintenanceBills->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Extra Charge</th>
                                    <td>
                                    {{ $maintenanceBills->extra_charge }}
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th>Flat No</th>
                                    <th>Bill Number</th>
                                    <th>Amount</th>
                                    <th>Extra Charge</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                @if($maintenanceBills->flats_method !=null)
                                {{ $maintenanceBills->flats_method->flat_no }}
                                @endif
                                </td>

                                <td>
                                    {{ $maintenanceBills->bill_number }}
                                </td>
                                <td>
                                    {{ $maintenanceBills->amount }}
                                </td>

                                <td>
                                    {{ $maintenanceBills->extra_charge }}
                                </td>

                            </tr>
                                                            
                            </tbody> -->
                        </table>
</body>
</html>
