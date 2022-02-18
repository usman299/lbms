<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin: auto;
            border: 2px solid #0446aa;
        }

        .customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .customers tr:hover {
            background-color: #ddd;
        }

        .customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0446aa;
            color: white;
        }
    </style>
</head>
<body style="background-color: #e4e4e4">

<h1 style="text-align: center"><img src="{{asset('img_2.png')}}" alt=""></h1>

<table class="customers">
    <tr>
        <th colspan="4" style="text-align: center">COVID-19 PCR TEST/FIT TO FLY CERTIFICATE</th>
    </tr>
    <tr>
        <td>First Name</td>
        <td>{{$user->fname}}</td>
        <td>Sample Type</td>
        <td>Swab</td>
    </tr>
    <tr>
        <td>Surname</td>
        <td>{{$user->lname}}</td>
        <td>Sample Date</td>
        <td>{{$user->swab_date->format('d/m/Y')}}</td>
    </tr>
    <tr>
        <td>DOB</td>
        <td>{{$user->dob->format('d/m/Y')}}</td>
        <td>Sample Time</td>
        <td>{{$user->swab_time}}</td>
    </tr>
    <tr>
        <td>Passport Number</td>
        <td>{{$user->passport}}</td>
        <td>Test Date and Time</td>
        @php
        $testdate = \App\Batch::where('patient_id', $user->id)->first();
        @endphp
        <td>{{$testdate->test_date->format('d/m/Y')}} {{$testdate->test_time}}</td>
    </tr>
    <tr>
        <td>Sample Barcode ID</td>
        <td>{{$user->u_r_num}}</td>
        <td>Dated Result Issued</td>
        <td>{{$user->result_date->format('d/m/Y')}}</td>
    </tr>
</table>
<br>
<table class="customers">
    <tr>
        <td>Assay</td>
        <td>Result</td>
    </tr>
    <tr>
        <td>SARS-CoV-2 RT-PCR screen for active infection</td>
        @if($user->status ==1)
        <td>Positive</td>
        @elseif($user->status ==2)
            <td>Negative</td>
        @elseif($user->status ==3)
        <td>Inconclusive</td>
        @endif
    </tr>
</table>

<br>
<table class="customers">
    <tr>
        <td>Result Interpretation</td>
    </tr>
    <tr>
        @if($user->status ==1)
            <td></td>
        @elseif($user->status ==2)
            <td>Not detected: No evidence of SARS-CoV-2 RNA in this sample. This indicates that, at the time ofsampling, the
                patient is unlikely to have an active SARS-CoV2 infection
            </td>
        @elseif($user->status ==3)
            <td></td>
        @endif
    </tr>
</table>

<br>
<table class="customers">
    <tr>
        <td>Analysis Notes</td>
    </tr>
    <tr>
            <td>It should be noted that all results provide a momentary view and that an individual’s health statusmay have
                changed since the sample specimen was taken. Screening is provided on a bestendeavours policy based on the
                sample specimen supplied and does not provide a guarantee tothe health status of individuals.If your health
                status has changed since the sample specimen wastaken, or you have symptoms, or your condition worsens,
                please contact your GP or NHS111.Ensure you follow current government guidelines.The above tests are carried
                out via CE-IVDcertified testing kits using validated methods by Expert Doctors Labs in-line with ISO15189,
                MedicalLaboratories – Requirements for quality and competence.
            </td>
    </tr>
</table>

<br>
<table class="customers">
    <tr>
        <td>Comments (if applicable)</td>
    </tr>
    <tr>
        <td>
        </td>
    </tr>
</table>

<br>
<table class="customers">
    <tr>
        <td>
            Medical Practitioner
        </td>
        <td>
            DR Waheed Hussain MBCHB MRCGP
        </td>
    </tr>
</table>

<br>
<table style="width: 100%; text-align: center; margin: auto">
    <tr>
        <td>
           <p style="font-size: 20px">Contact in any instance where it is required to cross-validate on 0333 772 1118 </p>
                <p style="font-size: 20px; color: #0446aa">Expert Doctors is a trading name for Expert Doctors Limited <br>   UKAS Number: 23260 LAB UKAS Number: 306801 0333 772 1118   info@expertdoctors.com   www.expertdoctors.com   </p>
        </td>
        <td>
            <img src="{{asset('img_1.png')}}" alt="">
        </td>
    </tr>
</table>

</body>
</html>
