<!DOCTYPE html>
<html>
<head>
    <title></title>
     <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->
    <style type="text/css">
        body{
    background-color: white;
    color: black;
}
.contain{
        width: 100%;
    }
    
.col-md-2{
    padding-right: 1px;
    padding-left:1px;
}
.col-md-10 {
    background-color: white;
}

.panel{
    box-shadow: none;
    
}
.panel-default{
    border: none;
}
.avatar{
        border-radius: 100%;
        max-width: 80px;
}
 tr.spaceUnder >td{
    padding-bottom: 10px;
    padding-right: 15px;
    padding-left: 15px;
    font-size: 15px;
    border: 1px solid #3097D1;
    /*border-top: 1px solid #3097D1;*/
}
tr.spaceUnder >th {
     padding-bottom: 10px;
    padding-right: 15px;
    padding-left: 15px;
    font-size: 15px;
    padding-top: 15px;
    color: #3097D1;
    border: 1px solid #3097D1;
}

ul.custom-class{
    font-size: 15px
}

.panel-body{
    height: 500px;
}
.nav-bg{
        background-color: #222d32;
        height: 100%;
}
.list-group{
    height: 900px;
}

.list-group-item{
    background-color: #222d32;
    border: none;
    color: white;
    padding:15px 15px;
    border-bottom: 1px solid #222d32;
}
.list-group-item a{
    color: #b8c7ce;
}

.list-group-item-custom{
    background-color: #1a2226;
    border: none;
    color: white;
    font-size: 20px;
    font-weight: 700;
    height: 100px;
    padding: 35px 15px;
  font-family: "FontAwesome";
}

.wrapper a:hover{
    color: white;
}

.fileContainer [type=file] {
    cursor: inherit;
    display: block;
    font-size: 999px;
    filter: alpha(opacity=0);
    min-height: 100%;
    min-width: 100%;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: right;
    top: 0;
}
table{
    width: 100%;
    border-collapse: collapse;
    border:1px solid black;
}
th{
    height: 80px;
}
th, td{
    /*border:1px solid;*/
    padding-left: 5px;
    text-align: left;
}
.custom-header{
    font-size: 50px;
    text-align: left;
    height: 150px;
    background-color: #87bdd8;
}
tr:nth-child(even) {background-color: #f2f2f2}
    </style>

</head>
<body>
     <table class="table">
                            <thead>
                             @foreach($maintenanceBills as $maintenanceBill)
                                <tr>
                                    <th class="custom-header">
                                        {{Auth::user()->society_method->society_name}}
                                    </th>
                                     <td>Due Date</td>
                                    <td>
                                        {{ $maintenanceBill->due_date.'-'.$maintenanceBill->month_year }}
                                    </td>
                                </tr>
                                <tr>
                                <th style="background-color: #87bdd8;">{{ $maintenanceBill->address}}</th>
                                    <td height="20px">Bill Number</td>
                                    <td>{{ $maintenanceBill->bill_number }}</td>
                                </tr>
                                <tr>
                                    <th style="background-color: #87bdd8;">
                                    Office Number - 
                                    {{ $maintenanceBill->office_number}}
                                    </th>
                                    <td height="20px">Amount</td>
                                    <td>{{ $maintenanceBill->amount }}</td>
                                </tr>

                                <tr>
                                    <th>Amount In Words</th>
                                    <td style="padding-right: 0">
                                    {{ title_case($numberTransformer->toWords($maintenanceBill->amount)) }}
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Full Name</th>
                                    <td>
                                    {{ $maintenanceBill->full_name }}
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Flat No</th>
                                    <td>
                                    {{ $maintenanceBill->flat_no }}
                                    </td>
                                    <td></td>
                                </tr>

                                 <tr>
                                    <th>Rented</th>
                                    <td>
                                    {{ $maintenanceBill->rented }}
                                    </td>
                                    <td></td>
                                </tr>
                                
                                
                                <tr>
                                    <th>Extra Charge</th>
                                    <td>
                                    {{ $maintenanceBill->extra_charge }}
                                    </td>
                                    <td></td>
                                </tr>
                                
                                <tr>
                                    <th>Extra Charge Amount</th>
                                    @if($maintenanceBill->extra_charge == "Yes")
                                    <td>
                                    {{ $maintenanceBill->charge_amount }}
                                    </td>
                                    @else
                                    <td>{{ "NULL" }}</td>
                                    @endif
                                    <td></td>
                                </tr>
                                @endforeach
                                
                        </table>
</body>
</html>
