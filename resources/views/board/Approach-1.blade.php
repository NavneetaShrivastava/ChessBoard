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
                If user choose the color black then we need to load the image 
                from the location. Which is a default for the game.
                */
                if ($user->colour == 'Black') {
                ?>

                    <img src="{{asset('img/board-black.png')}}" alt="" width="100%" height="800px">
                <?php
                    /*
                --------------------------------------------------------------
                User Selection for Color
                --------------------------------------------------------------
                If user choose the color White then we need to load the image 
                from the location. but we shall flip the board image so that it
                serves for White Player Preference as business rule.
                */

                } else {
                    //Image Path
                    $filename =  public_path() . "/img/board-black.png";

                    //Loading the image to create resource.
                    $source = imagecreatefrompng($filename);
                    //Rotating the image to 180 degree
                    $degrees = 180;
                    $rotate_image = imagerotate($source, $degrees, 0);

                    //server-side buffer until we are ready to display it
                    ob_start();
                    imagepng($rotate_image);
                    //removes the buffer (without printing it), and returns its content to  $imgData
                    $imgData = ob_get_clean();
                ?>
                    <!-- Now we load the ImageData which is $imgData where our flipped image is residing. -->
                    <img src="data:image/png;base64, <?php echo base64_encode($imgData); ?>" alt="" width="100%" height="800px">

                <?php
                }
                ?>
                <!--end of chess board table -->
            </div>
        </div>
        <!-- /chess board area -->

        <!-- Decription area -->
        <div class="col-12 col-sm-12 col-lg-6 p-4 pageText" style='border:2px solid black'>
            <div class="row p-4">
                <div class="col text-center decription ">
                    <h2>Decription</h2>
                    <p class="decription-text text-justify">Approach 1 states that we shall displayed image for the chess board. According to the user preference. This approach was taken care to show the image manipulation and processing. </p>
                    <p class="decription-text text-justify">In this approach we have only one images of the chess board and load and manipulate that image according to the color prefrence.</p>
                    <p class="decription-text text-justify">When user color selection is black then default image will be loaded and shown. However, for the white color preference, the image will be loaded and rotated to 180 degree to create a new prefered image for the user.</p>
                    <p class="decription-text text-justify">It will not be my prefrable way to make a online chess game because this scenario, future coding will be very complex and we need every block accessible for making it playable. The images are static and thus it will be blurred or shrink with the screen size or so. However, this shows that a single image can serve the purpose for different scenarios.</p>  

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
    <br>
    <div class="clr_btn">
        <a href="{{ url('/edit-colour') }}" class='btn btn-primary text-right'><?php echo  $ques; ?> </a>
    </div>
</div>
@endsection