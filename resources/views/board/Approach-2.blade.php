@extends('layouts.app')

@section('content')
@section('styles')
<link href="{{asset('css/custom-style.css')}}" />
@stop
<div class="container-fluid">
<div class="row mb-4 ">
        <div class="col-7 ">
            <h1 class="text-right  pageHeading">
                <?php echo request()->route()->getName(); ?>
            </h1>
        </div>
        <div class="col-5 text-right">
            <p>Your preferred colour is <b><?php echo $user->colour ?></b> </p>
        </div>
    </div>
    <div class="row pl-2">
        <!-- chess board area -->
        <div class="col-12 col-sm-12 col-lg-6">
            <div style='border:2px solid black;  '>
                <!-- chess board table -->
                <?php
                /*
                --------------------------------------------------------------
                User Selection for Color
                --------------------------------------------------------------
                If user choose the color BLACK then we need to load the image 
                from the location.
                */
                if ($user->colour == 'Black') {
                ?>
                    <img src="{{asset('img/board-black.png')}}" alt="" width="100%" height="800px">
                <?php
                /*
                --------------------------------------------------------------
                User Selection for Color
                --------------------------------------------------------------
                If user choose the color WHITE then we need to load another image 
                from the location.
                */
                } else {
                ?>
                    <img src="{{asset('img/board-white.png')}}" alt="" width="100%" height="800px">

                <?php
                }

                ?>
                <!--end of chess board table -->
            </div>
        </div>
        <!-- /chess board area -->

        <!-- Decription area -->
        <div class="col-12 col-sm-12 col-lg-6 p-4 pageText " style='border:2px solid black'>
            <div class="row p-4">
                <div class="col text-center decription ">
                    <h2>Decription</h2>
                    <p class="decription-text text-justify">Approach 2 states that we shall displayed images for the chess board. According to the user preference.</p>
                    <p class="decription-text text-justify">In this approach we have two images of the chess board and load those image according to the color prefrence.</p>
                    <p class="decription-text text-justify">When user color selection is black then suitable image with black parameters will be loaded and shown. Same goes to white color preference, suitable image will be shown.</p>
                    <p class="decription-text text-justify">It is not my prefrable way to make a online chess game because in this case, future coding will be very complex because we need every block cloding for making it playable. The images are static and thus it will be blurred or shrink with the screen size or so. </p>
                </div>

            </div>

        </div>
        <!--end of Approach Description area -->
    </div>
    <?php if ($user->colour == 'Black') {

$ques = ' Want to change your colour to White ?';
} else {
$ques = ' Want to change your colour to Black ?';
}

?>
 <br/>
<div class="clr_btn">
<a href="{{ url('/edit-colour') }}" class='btn btn-primary text-right'><?php echo  $ques; ?> </a>
</div>
</div>
@endsection