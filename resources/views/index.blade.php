<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/css/style.css') }}">
</head>

<body>
    <header class="header-logo text-center py-3 h3 text-light">
        RANKING
    </header>
    <section class="main pt-5">
        <div class="container bg-main">
            <div class="container bg-none">
                <div class="page py-3">
                    <a class="active" href="">POST</a>
                    <a href="">WANT TO GO</a>
                </div>
                <div class="rank-time my-3 text-center">
                    <a class="" href="">MONTHLY</a>
                    <a class="active" href="">YEARLY</a>

                </div>
                <div class="user-rank text-center positon-relative">
                    <div class="rank">

                        <i class="fa-solid fa-crown bg-crown-top1"></i>
                    </div>

                    <h2>USER RANKING</h2>
                    <div class="top-user"><span class="position-relative">Top 100 Users</span></div>
                    <div class="your-rank">
                        <i class="fa-solid fa-circle-user"></i> Your current ranking: <span
                            class="color-text fw-bold"><span id="top"></span>th</span>
                    </div>
                </div>

                <div class="top-rank mt-5">
                    <div class="row align-items-end pb-3">
                        @if (!empty($ranks))

                            <?php
            for ($i=0; $i < 1; $i++) { 
               ?>
                            @if ($ranks[$i + 1])
                                <div class="col-4  text-center">
                                    <div class="rank">
                                        <i class="fa-solid fa-crown "></i>
                                        <h3>No.2</h3>
                                    </div>
                                    <img src="<?php echo $ranks[$i + 1]->user->image; ?>" alt="">
                                    <div class="top-rank_user">
                                        <h3 class="user_i" data-user='{{ $ranks[$i + 2]->user->id }}'>
                                            {{ $ranks[$i + 1]->user->name }}</h3>
                                        <span class="point"><span class="color-text">{{ $ranks[$i + 1]->point }}</span>
                                            points</span>

                                    </div>
                                </div>
                            @endif
                            <div class="col-4 text-center d-flex flex-column align-items-center">
                                <div class="rank">
                                    <i class="fa-solid fa-crown bg-crown-top1"></i>
                                    <h3>No.1</h3>
                                </div>
                                <img class="avt-top1" src="<?php echo $ranks[$i]->user->image; ?>" alt="">
                                <div class="top-rank_user">
                                    <h3 class="user_i" data-user='{{ $ranks[$i + 2]->user->id }}'>
                                        {{ $ranks[$i]->user->name }}</h3>
                                    <span class="point"><span class="color-text">{{ $ranks[$i]->point }}</span>
                                        points</span>

                                </div>
                            </div>
                            @if ($ranks[$i + 2])
                                <div class="col-4 text-center">
                                    <div class="rank">
                                        <i class="fa-solid fa-crown bg-crown-top3"></i>
                                        <h3>No.3</h3>
                                    </div>
                                    <img src="<?php echo $ranks[$i + 2]->user->image; ?>" alt="">
                                    <div class="top-rank_user">
                                        <h3 class="user_i" data-user='{{ $ranks[$i + 2]->user->id }}'>
                                            {{ $ranks[$i + 2]->user->name }}</h3>
                                        <span class="point"><span class="color-text">{{ $ranks[$i + 2]->point }}</span>
                                            points</span>


                                    </div>
                                </div>
                            @endif
                            <?php
            }
            
            ?>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </section>
    <section class="main2 pt-4 mb-5" style="margin-bottom: 90px !important">
        <div class="container bg-main2">
            <div class="container">
                <ul>
                    <?php 
                    for ($i=4; $i < count($ranks); $i++) { 
                        # code...
                        ?>

                    <li class="mt-3 py-2"><a href="">
                            <div class="numerical px-3">
                                {{ $i }}
                            </div>
                            <img src="<?php echo $ranks[$i]->user->image; ?>" alt="">
                            <div class="card-body">
                                <h4 data-user='{{ $ranks[$i]->user->id }}' class="card-title user_i">
                                    {{ $ranks[$i]->user->name }}
                                </h4>
                                <div class="point"><span class="color-text">{{ $ranks[$i]->point }}</span> points
                                </div>
                            </div>
                            <div class="card-icon px-3">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </a>
                    </li>
                    <?php
}
                    ?>

                </ul>
            </div>
        </div>
    </section>
    <div class="card-main">

        <div class="container py-2">
            <div class="d-flex">
                <div class="card-user">
                    <div class="numerical px-3" id="your_top" style="color: #fff; font-weight: bold">
                        4
                    </div>
                    <div class="card-img-user">
                        <img id="your_img"
                            src="https://as2.ftcdn.net/v2/jpg/02/29/75/83/1000_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg"
                            alt="">
                    </div>
                    <div class="card-body px-3">
                        <h4 class="card-title" id="your_name">
                            User name
                        </h4>
                        <div class="point"><span style="color: #fff; font-weight: bold" id="your_point">10000</span>
                            points</div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $.ajax({
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "http://127.0.0.1:8000/api/get-user",
        data: {
            id: 8
        },
        dataType: "json",
        success: function(response) {
            $('#your_img').attr('src', response.user_info.user.image)
            $('#your_name').text(response.user_info.user.name)
            $('#your_point').text(response.user_info.point)
            $('#your_top').text(response.rank);
            $('#top').text(response.rank);

        }
    })
    console.log(top);
</script>

</html>
