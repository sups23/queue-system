
@extends('users.layouts.main')

@section('content')
    
<div class="herosection  bg-slate-200 " style="height:auto; width:100%;">
    <h1 style="font-weight:bold; text-align:center; font-size:70px;padding-top:20px;">Welcome to MedQue System</h1>
    
<h2 class="text-center" style="font-size:20px;">
    Make life easier with the medicare,by taking the service 
</h2>
<br><br>
</div> 
<br>


<div class="gallerysec" style="width:100%;height:auto; display:flex; flex-wrap:wrap;justify-content:center">
    <div class="div1" style="width:250px;height:250px;text-align:center;background-color:rgb(109, 176, 236);"><br>1
        
    <br><br>
    <h2 class="text-white font-bold" style="font-size:30px;">Heart Rate</h2>
<br>
<h3 class="text-white px-5">Check your heart and be an healty</h3>

    </div>
    <div class="div1"  style="width:250px;height:250px; text-align:center;background-color:rgb(124, 184, 236);"><br>2
    <br><br>
    <h2 class="text-white font-bold " style="font-size:30px;">Lab test</h2>
    <br>
<h3 class="text-white px-5">Test the blood and see you are fine or not</h3>

    </div>
    <div class="div1" style="width:250px;height:250px;text-align:center;background-color:rgb(109, 176, 236);"><br>3
        <br><br>
        <h2 class="text-white font-bold"style="font-size:30px;">OPD</h2>
        <br>
<h3 class="text-white px-5">Check your heart and be an healty</h3>
    </div>
    <div class="div1" style="width:250px;height:250px;text-align:center; background-color:rgb(124, 184, 236);"><br>4
        <br><br>
        <h2 class="text-white font-bold"style="font-size:30px;">Symptoms</h2>
        <br>
<h3 class="text-white px-5">See the symptoms and cure </h3>
    </div>

</div>

{{-- images and desc// third section --}}
<br><br>
<div class="imgtext " style="width:100%;height:500px; display:flex; justify-content:center;">
    <div class="img" style="width:450px ;height:400px; overflow:hidden;">
        <img src="/images/doctor.jpg" style="width:100%; height:60vh;" style="background-size:cover;">
    </div>
    <div class="text" style="width:450px ;height:450px;">
        <h1 style="font-size:40px;font-weight:bold;">Why to Choose Us?</h1>
        It is the fast and reliable ways for quick medical cure. Be aware and be healthy !
        <br><br>
        <div class="buttext " >
            <button style="background-color:rgb(0, 78, 202);border:none; padding:8px; color:white; font-size:20px;margin-left:10px;">+</button>
            &nbsp&nbsp&nbsp&nbsp<h1 style="display: inline-block;font-weight:bold;font-size:20px;">Faster</h1>
            <br><br>
            <button style="background-color:rgb(0, 78, 202);border:none; padding:8px; color:white; font-size:20px;margin-left:10px;">+</button>
            &nbsp&nbsp&nbsp&nbsp<h1 style="display: inline-block;font-weight:bold;font-size:20px;">Reliable</h1>
            <br><br>
            <button style="background-color:rgb(0, 78, 202);border:none; padding:8px; color:white; font-size:20px;margin-left:10px;">+</button>
            &nbsp&nbsp&nbsp&nbsp<h1 style="display: inline-block;font-weight:bold;font-size:20px;">Best Service</h1>
            <br><br>
            <button style="background-color:rgb(0, 78, 202);border:none; padding:8px; color:white; font-size:20px;margin-left:10px;">+</button>
            &nbsp&nbsp&nbsp&nbsp<h1 style="display: inline-block;font-weight:bold;font-size:20px;">Easy</h1>
        </div>
    </div>
</div>
@endsection