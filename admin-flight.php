<?php
    include('dbconnect.php');
    if(isset($_POST['flights'])) {
        $fcode = $_POST['flight'];
        $airId = $_POST['airId'];
        $source = $_POST['src'];
        $destination = $_POST['dest'];
        $cost = $_POST['cost'];
        $nos = $_POST['nos'];
        $t = $_POST['t'];
        $d = $_POST['d'];

        $q="SELECT * FROM flight WHERE airplane_id='$airId' && fdate='$d'";
        $result=mysqli_query($con,$q);
        $num = mysqli_num_rows($result);
        $sq = "SELECT * FROM flight WHERE fcode='$fcode'";
        $r=mysqli_query($con,$sq);
        $number = mysqli_num_rows($r);
        $q1 = "SELECT max_capacity FROM aircraft_type, airplane WHERE aircraft_type_name=aircraft_type AND airplane_id='$airId'";
        $res=mysqli_query($con,$q1);
        $val = mysqli_fetch_array($res);
        $max = $val['max_capacity'];

        if($num != 0) {
            echo "<script>alert('Airplane is Not Available!')</script>";
            echo "<script>window.open('admin.php','_self')</script>";
        } else if($number != 0) {
            echo "<script>alert('Flight Code already Exists!')</script>";
            echo "<script>window.open('admin.php','_self')</script>";
        } else if($nos > $max) {
            echo "<script>alert('Number of Seats Greater Than Aircraft Capacity')</script>";
            echo "<script>window.open('admin.php','_self')</script>";
        } else {
            $sql="INSERT INTO flight (fcode,airplane_id,source,destination,cost,no_of_seats,ftime,fdate) VALUES ('$fcode','$airId','$source','$destination','$cost','$nos','$t','$d')";
            $query=mysqli_query($con,$sql);
            if($query) {
                echo "<script>alert('Data added Successfully')</script>";
                echo" <script>window.open('admin.php','_self')</script>";
            } else {
                echo "<script>alert('Wrong Data')</script>";
                echo"<script>window.open('admin.php','_self')</script>";
            }
        }
    }
    if(isset($_POST['airplane'])) {
        $airId = $_POST['airId'];
        $airtype = $_POST['type'];
        $year = $_POST['year'];
        $sq = "SELECT * FROM aircraft_type WHERE aircraft_type_name ='$airtype'";
        $r=mysqli_query($con,$sq);
        $number = mysqli_num_rows($r);
        if($number == 0) {
            echo "<script>alert('Aircraft Type Does Not Exits')</script>";
            echo"<script>window.open('air-info.php','_self')</script>";
        } else {
            $sql="INSERT INTO airplane (airplane_id,aircraft_type,year_of_commission) VALUES ('$airId','$airtype','$year')";
            $query=mysqli_query($con,$sql);
            if($query) {
                echo "<script>alert('Data added Successfully')</script>";
                echo"<script>window.open('air-info.php','_self')</script>";
            } else {
                echo "<script>alert('Airplane Id Already Exits')</script>";
                echo"<script>window.open('air-info.php','_self')</script>";
            }
        }
    }
    if(isset($_POST['airplane-type'])) {
        $airType = $_POST['airtype'];
        $man = $_POST['manu'];
        $cap = $_POST['cap'];
    
        $sql="INSERT INTO aircraft_type (aircraft_type_name,manufacturer,max_capacity) VALUES ('$airType','$man','$cap')";
        $query=mysqli_query($con,$sql);
        if($query) {
            echo "<script>alert('Data added Successfully')</script>";
            echo"<script>window.open('type-info.php','_self')</script>";
        } else {
            echo "<script>alert('Aircraft Type Already Exits')</script>";
            echo"<script>window.open('type-info.php','_self')</script>";
        }
    }
    if(isset($_POST['update-cost'])) {
        $fcode = $_POST['fcode'];
        $cost = $_POST['cost'];
        $check="SELECT * FROM flight WHERE fcode = '$fcode'";
        $cquery=mysqli_query($con,$check);
        $number = mysqli_num_rows($cquery);
        if($number == 0) {
            echo "<script>alert('Flight Code Does Not Exists!')</script>";
            echo "<script>window.open('info.php','_self')</script>";
        } else {
            $sql="UPDATE flight SET cost = '$cost' WHERE fcode = '$fcode'";
            $query=mysqli_query($con,$sql);
            if($query) {
                echo "<script>alert('Updated Successfully')</script>";
                echo"<script>window.open('info.php','_self')</script>";
            } else {
                echo "<script>alert('Updation unsuccessfully')</script>";
                echo"<script>window.open('info.php','_self')</script>";
            }
        }
    }
?>