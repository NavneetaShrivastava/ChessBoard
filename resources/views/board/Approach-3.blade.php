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
    <div class="row pl-2 pr-2">

        <!-- chess board area -->
        <div class="col-12 col-sm-12 col-lg-6">
            <div style='border:2px solid black;  '>
                <!-- chess board table -->
                <table width="100%" cellspacing="0px" cellpadding="0px" style='border:none;' class="welcome-background-clr">

                    <?php
                    $user_colour = $user->colour;
                    $alphas = range('A', 'H'); // alphabets array from A-H
                    $num = range('1', '8'); // Number array from 1-8

                    // table row for alphabets
                    echo "<tr>";
                    echo "<td class='show_alpha '></td>";

                    for ($i = 7; $i >= 0; $i--) {
                        /*
                        --------------------------------------------------------------
                        Display Alphabets in first row If WHITE
                        --------------------------------------------------------------
                        If user choose the color WHITE then we need to display alphabets
                        from H to A. Thus we run a negate loop.
                        */
                        if ($user_colour == 'White') {
                            echo "<td class='show_alpha rotate'>" . $alphas[7 - $i] . "</td>";

                            /*
                            --------------------------------------------------------------
                            Display Alphabets in first row if BLACK
                            --------------------------------------------------------------
                            If user choose the color Black then we need to display alphabets
                            from A to H. Thus normal traverse the loop.
                            */
                        } elseif ($user_colour == 'Black') {
                            echo "<td class='show_alpha rotate'>" . $alphas[$i] . "</td>";
                        }
                    }
                    echo "<td class='show_alpha show_number'></td>";
                    echo "</tr>";
                    // table row ends for alphabets
                    for ($row = 1; $row <= 8; $row++) {

                        echo "<tr>";
                        /*
                        --------------------------------------------------------------
                        Display Numbers first column
                        --------------------------------------------------------------
                        If user choose the color white then we need to display Numbers
                        from 8 to 1. 
                        */
                        if ($user_colour == 'White') {
                            echo "<td  class='show_number '  >" . $num[8 - $row] . "</td>";
                            /*
                            --------------------------------------------------------------
                            Display Numbers first column
                            --------------------------------------------------------------
                            If user choose the color Black then we need to display Numbers
                            from 1 to 8.
                            */
                        } elseif ($user_colour == 'Black') {
                            echo "<td  class='show_number '  >" . $num[$row - 1] . "</td>";
                        }

                        for ($col = 1; $col <= 8; $col++) {
                            $total = $row + $col;
                            /*
                            --------------------------------------------------------------
                            Create white Blocks of chess board 
                            --------------------------------------------------------------
                            Even number will give white block.
                            */

                            if ($total % 2 == 0) {
                                echo "<td  class='white_block block'></td>";
                                /*
                            --------------------------------------------------------------
                            Create black blocks of Chess board
                            --------------------------------------------------------------
                            Odd number will give Black block.
                            */
                            } else {
                                echo "<td  class='black_block block'></td>";
                            }
                        }
                        /*
                        --------------------------------------------------------------
                        Display Numbers in last column
                        --------------------------------------------------------------
                        If user choose the color white then we need to display Numbers
                        from 8 to 1.
                        */
                        if ($user_colour == 'White') {
                            echo "<td  class='show_number rotate' >" . $num[8 - $row] . "</td>";
                            /*
                            --------------------------------------------------------------
                            Display Numbers in last column
                            --------------------------------------------------------------
                            If user choose the color Black then we need to display Numbers
                            from 1 to 8.
                            */
                        } elseif ($user_colour == 'Black') {
                            echo "<td  class='show_number rotate'  >" . $num[$row - 1] . "</td>";
                        }
                        echo "</tr>";
                    }
                    // table row for alphabets
                    echo "<tr>";
                    echo "<td class='show_alpha '></td>";
                    for ($i = 7; $i >= 0; $i--) {
                        /*
                        --------------------------------------------------------------
                        Display Alphabets in last row
                        --------------------------------------------------------------
                        If user choose the color white then we need to display alphabets
                        from H to A.
                        */
                        if ($user_colour == 'White') {
                            echo "<td class='show_alpha '>" . $alphas[7 - $i] . "</td>";
                            /*
                            --------------------------------------------------------------
                            Display Alphabets in 1st row
                            --------------------------------------------------------------
                            If user choose the color Black then we need to display alphabets
                            from A to H.
                            */
                        } elseif ($user_colour == 'Black') {
                            echo "<td class='show_alpha '>" . $alphas[$i] . "</td>";
                        }
                    }
                    echo "<td class='show_alpha show_number'></td>";
                    echo "</tr>";
                    // table row ends for alphabets
                    ?>
                </table>
                <!--end of chess board table -->
            </div>
        </div>
        <!-- / chess board area -->

        <!-- Decription area -->
        <div class="col-12 col-sm-12 col-lg-6 p-4 pageText" style='border:2px solid black'>
            <div class="row p-4">
                <div class="col text-center decription ">
                    <h2>Description</h2>
                    <p class="decription-text text-justify">Approach 3 depicts that we have generated the chess board using the code. This will give us a better accessibility to the Chess board for later updates. </p>
                    <p class="decription-text text-justify">This approach generally help us to get our chess board more user friendly. It will be responsive to the screen. So user can play the chess at mobile or desktop as and when needed. The theming of the chess board could be easier in later scenarios. This approach will be little complex in comparison to other two approaches to start with however, it is great efforts for a maintainable and continuous delivery. </p>
                    <p class="decription-text text-justify">So, in this approach we used two if condition to load our Chess board according to the user preference. First the color chosen by the user, secondly to play around with the numbers and alphabet for the user to give a real life experience.</p>
                    <p class="decription-text text-justify">This is my prefrable way to make online chess game because as stated every block of the board is accessibile to the programmers. To make it playable we need to require to place the chessmen on the board and move it. Every chessmen has their own limitations and rules to be followed which in turns require more accessibility to the board. Since we created the board with the code. it is always been crystal clear to the user of any size of screen. However in images if the screen size is big. The image will be blurred or shrink on smaller screen. </p>
                </div>

            </div>

        </div>
        <!--end of Approach Description area -->
        <?php if ($user->colour == 'Black') {
            $ques = ' Want to change your colour to White ?';
        } else {
            $ques = ' Want to change your colour to Black ?';
        }
        ?>
    </div>
    <br/>
    <div class="clr_btn">
        <a href="{{ url('/edit-colour') }}" class='btn btn-primary text-center'><?php echo  $ques; ?> </a>
    </div>
</div>
@endsection