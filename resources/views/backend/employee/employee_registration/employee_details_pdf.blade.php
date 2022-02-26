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
                <p><strong>Employee Registration Page</strong></p>
            </td>
        </tr>
    </table>

    <table id="customers">
        <tr>
            <th width="10%">SL</th>
            <th width="45%">Employee Details</th>
            <th width="45%">Employee Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><strong>Employee Name</strong></td>
            <td>{{ $details->name }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><strong>Employee ID No</strong></td>
            <td>{{ $details->id_no }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><strong>Father's Name</strong></td>
            <td>{{ $details->father_name }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td><strong>Mother's Name</strong></td>
            <td>{{ $details->mother_name }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><strong>Mobile Number</strong></td>
            <td>{{ $details->mobile }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td><strong>Address</strong></td>
            <td>{{ $details->address }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><strong>Gender</strong></td>
            <td>{{ $details->gender }}</td>
        </tr>
        <tr>
            <td>8</td>
            <td><strong>Religion</strong></td>
            <td>{{ $details->religion }}</td>
        </tr>
        <tr>
            <td>9</td>
            <td><strong>Date of Birth</strong></td>
            <td>{{ date('d-m-Y', strtotime($details->dob)) }}</td>
        </tr>
        <tr>
            <td>10</td>
            <td><strong>Designation</strong></td>
            <td>{{ $details['designation']['name'] }}</td>
        </tr>
        <tr>
            <td>11</td>
            <td><strong>Join Date</strong></td>
            <td>{{ date('d-m-Y', strtotime($details->join_date)) }}</td>
        </tr>
        <tr>
            <td>12</td>
            <td><strong>Employee Salary</strong></td>
            <td>{{ $details->salary }}</td>
        </tr>
    </table>
    <br><br>
    <i style="font-size: 10px; float-right;">Print Data : {{ date("d M Y") }}</i>

</body>

</html>