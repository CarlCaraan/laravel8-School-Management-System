<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <table id="customers">
        <tr>
            <td>
                <h2>
                    <?php $image_path = '/upload/easyschool.png'; ?>
                    <img src="{{ public_path(). $image_path }}" width="200" height="100" alt="">
                </h2>
            </td>
            <td>
                <h2>Easy School ERP</h2>
                <p>School Address</p>
                <p>Phone: 09559168806</p>
                <p>Email: support@easylearningbd.com</p>
                <p><strong>Student Registration Fee</strong></p>
            </td>
        </tr>
    </table>
    @php
    $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id', '1')->where('class_id', $details->class_id)->first();
    $originalfee = $registrationfee->amount;
    $discount = $details['discount']['discount'];
    $discounttablefee = $discount / 100 * $originalfee;
    $finalfee = (float)$originalfee - (float)$discounttablefee;
    @endphp
    <table id="customers">
        <tr>
            <th width="10%">SL</th>
            <th width="45%">Student Details</th>
            <th width="45%">Student Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><strong>Student ID No</strong></td>
            <td>{{ $details['student']['id_no'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><strong>Roll No</strong></td>
            <td>{{ $details->roll }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><strong>Student Name</strong></td>
            <td>{{ $details['student']['name'] }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><strong>Father's Name</strong></td>
            <td>{{ $details['student']['father_name'] }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><strong>Mother's Name</strong></td>
            <td>{{ $details['student']['mother_name'] }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><strong>Student Year</strong></td>
            <td>{{ $details['student_year']['name'] }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><strong>Class</strong></td>
            <td>{{ $details['student_class']['name'] }}</td>
        </tr>
        <tr>
            <td>8</td>
            <td><strong>Registration Fee</strong></td>
            <td>{{ $originalfee }} $</td>
        </tr>
        <tr>
            <td>9</td>
            <td><strong>Discount Fee</strong></td>
            <td>{{ $discount }} %</td>
        </tr>
        <tr>
            <td>10</td>
            <td><strong>Fee For this Student</strong></td>
            <td>{{ $finalfee }} $</td>
        </tr>
    </table>
    <br><br>
    <i style="font-size: 10px; float-right;">Print Data : {{ date("d M Y") }}</i>

    <hr style="border: dashed 2px; width:95%; color: #000000; margin-bottom: 50px">

    <table id="customers">
        <tr>
            <th width="10%">SL</th>
            <th width="45%">Student Details</th>
            <th width="45%">Student Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><strong>Student ID No</strong></td>
            <td>{{ $details['student']['id_no'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><strong>Roll No</strong></td>
            <td>{{ $details->roll }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><strong>Student Name</strong></td>
            <td>{{ $details['student']['name'] }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><strong>Father's Name</strong></td>
            <td>{{ $details['student']['father_name'] }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><strong>Mother's Name</strong></td>
            <td>{{ $details['student']['mother_name'] }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><strong>Student Year</strong></td>
            <td>{{ $details['student_year']['name'] }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><strong>Class</strong></td>
            <td>{{ $details['student_class']['name'] }}</td>
        </tr>
        <tr>
            <td>8</td>
            <td><strong>Registration Fee</strong></td>
            <td>{{ $originalfee }} $</td>
        </tr>
        <tr>
            <td>9</td>
            <td><strong>Discount Fee</strong></td>
            <td>{{ $discount }} %</td>
        </tr>
        <tr>
            <td>10</td>
            <td><strong>Fee For this Student</strong></td>
            <td>{{ $finalfee }} $</td>
        </tr>
    </table>
</body>

</html>