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
                <h2>Easy Learning</h2>
            </td>
            <td>
                <h2>Easy School ERP</h2>
                <p>School Address</p>
                <p>Phone: 09559168806</p>
                <p>Email: support@easylearningbd.com</p>
            </td>
        </tr>
    </table>

    <table id="customers">
        <tr>
            <th width="10%">SL</th>
            <th width="45%">Student Details</th>
            <th width="45%">Student Data</th>
        </tr>
        <tr>
            <td>1</td>
            <td><strong>Student Name</strong></td>
            <td>{{ $details['student']['name'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><strong>Student ID No</strong></td>
            <td>{{ $details['student']['id_no'] }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td><strong>Student Roll</strong></td>
            <td>{{ $details->roll }}</td>
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
            <td><strong>Mobile Number</strong></td>
            <td>{{ $details['student']['mobile'] }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td><strong>Address</strong></td>
            <td>{{ $details['student']['address'] }}</td>
        </tr>
        <tr>
            <td>8</td>
            <td><strong>Gender</strong></td>
            <td>{{ $details['student']['gender'] }}</td>
        </tr>
        <tr>
            <td>9</td>
            <td><strong>Religion</strong></td>
            <td>{{ $details['student']['religion'] }}</td>
        </tr>
        <tr>
            <td>10</td>
            <td><strong>Date of Birth</strong></td>
            <td>{{ $details['student']['dob'] }}</td>
        </tr>
        <tr>
            <td>11</td>
            <td><strong>Discount</strong></td>
            <td>{{ $details['discount']['discount'] }} %</td>
        </tr>
        <tr>
            <td>12</td>
            <td><strong>Year</strong></td>
            <td>{{ $details['student_year']['name'] }}</td>
        </tr>
        <tr>
            <td>13</td>
            <td><strong>Class</strong></td>
            <td>{{ $details['student_class']['name'] }}</td>
        </tr>
        <tr>
            <td>14</td>
            <td><strong>Group</strong></td>
            <td>{{ $details['student_group']['name'] }}</td>
        </tr>
        <tr>
            <td>15</td>
            <td><strong>Shift</strong></td>
            <td>{{ $details['student_shift']['name'] }}</td>
        </tr>
    </table>
    <br><br>
    <i style="font-size: 10px; float-right;">Print Data : {{ date("d M Y") }}</i>

</body>

</html>