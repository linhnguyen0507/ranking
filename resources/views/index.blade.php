<?php
function getPositionUser($arr, $point)
{
    // var_dump($arr);
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i]['point'] == $point) {
            return $i;
        }
    }
    return -1;
}

?>
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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <header class="header-logo text-center py-3 h3 ">
        USERS RANKING
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
                        <i class="fa-solid fa-circle-user mx-2" style="font-size: 20px"></i> Your current ranking: <span
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
                                        <h3>No.{{ $ranks[$i + 1]['point'] == $ranks[$i]['point'] ? 1 : 2 }} </h3>
                                    </div>
                                    <img class="img_cover" src="https://images.ctfassets.net/lh3zuq09vnm2/yBDals8aU8RWtb0xLnPkI/19b391bda8f43e16e64d40b55561e5cd/How_tracking_user_behavior_on_your_website_can_improve_customer_experience.png" alt="">
                                    <div class="top-rank_user">
                                        <h3 class="user_i"
                                            data-user='{{ $ranks[$i + 1]['user']['id'] }}.{{ $ranks[$i + 1]['point'] == $ranks[$i]['point'] ? 1 : 2 }}'>
                                            {{ $ranks[$i + 1]['user']['name'] }}</h3>
                                        <span class="point"><span
                                                class="color-text">{{ $ranks[$i + 1]['point'] }}</span>
                                            points</span>

                                    </div>
                                </div>
                            @endif
                            <div class="col-4 text-center d-flex flex-column align-items-center">
                                <div class="rank">
                                    <i class="fa-solid fa-crown bg-crown-top1"></i>
                                    <h3>No.1</h3>
                                </div>
                                <img class="avt-top1" class="img_cover" src="https://wac-cdn.atlassian.com/dam/jcr:ba03a215-2f45-40f5-8540-b2015223c918/Max-R_Headshot%20(1).jpg?cdnVersion=1335" alt="">
                                <div class="top-rank_user">
                                    <h3 class="user_i" data-user='{{ $ranks[$i]['user']['id'] }}.1'>
                                        {{ $ranks[$i]['user']['name'] }}</h3>
                                    <span class="point"><span class="color-text">{{ $ranks[$i]['point'] }}</span>
                                        points</span>

                                </div>
                            </div>
                            @if ($ranks[$i + 2])
                                <div class="col-4 text-center">
                                    <div class="rank">
                                        <i class="fa-solid fa-crown bg-crown-top3"></i>
                                        <h3>No.<?php
                                        $position = getPositionUser($ranks, $ranks[$i + 2]['point']);
                                        
                                        echo $position != -1 ? $position + 1 : '3';
                                        ?></h3>
                                    </div>
                                    <img class="img_cover" src="https://d3njjcbhbojbot.cloudfront.net/api/utilities/v1/imageproxy/https://images.ctfassets.net/wp1lcwdav1p1/HNuAe2M59cQATyNkXb4mR/f3503ac70f716f3bb3e7b0161b4e53bd/edited_iStock-693553358__1_.png?w=1500&h=680&q=60&fit=fill&f=faces&fm=jpg&fl=progressive&auto=format%2Ccompress&dpr=1&w=1000&h=" alt="">
                                    <div class="top-rank_user">
                                        <h3 class="user_i"
                                            data-user='{{ $ranks[$i + 2]['user']['id'] }}.{{ $position != -1 ? $position + 1 : $i }}'>
                                            {{ $ranks[$i + 2]['user']['name'] }}</h3>
                                        <span class="point"><span
                                                class="color-text">{{ $ranks[$i + 2]['point'] }}</span>
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
                    for ($i=3; $i < count($ranks); $i++) { 
                        # code...
                        ?>

                    <li class="mt-1 py-2"><a href="">
                            <div class="numerical px-3">
                                <?php
                                $position = getPositionUser($ranks, $ranks[$i]['point']);
                                
                                echo $position != -1 ? $position + 1 : $i;
                                ?>
                            </div>
                            <img class="img_cover" src="https://res.cloudinary.com/grand-canyon-university/image/fetch/w_750,h_564,c_fill,g_faces,q_auto/https://www.gcu.edu/sites/default/files/media/GettyImages-485337116.jpg" alt="">
                            <div class="card-body">
                                <h4 data-user='{{ $ranks[$i]['user']['id'] }}.{{ $position != -1 ? $position + 1 : $i }}'
                                    class="card-title user_i">
                                    {{ $ranks[$i]['user']['name'] }}
                                </h4>
                                <div class="point"><span class="color-text">{{ $ranks[$i]['point'] }}</span> points
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
                            src="https://www.kolabtree.com/blog/wp-content/uploads/2019/12/freelance-technical-writer.jpg"
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
        
    </div>
    <button type="button" class="btn btn-info btn-lg add" id="myBtn"><i class="fa-solid fa-plus"></i></button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Bài Viết</h4>
                    <button type="button" class="btn close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('create.post')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="title-post">
                            <h4>Tiêu đề</h4>
                            <input type="text" name="title" id="title-post">
                        </label>
                        <label for="body-post">
                            <h5>Nội dung</h5>
                            <textarea name="content" class="content" id="body-post" cols="60" rows="10"></textarea>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                    </div>  
                </form>
            </div>

        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
    integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            id: '{{auth()->user()->id}}'
        },
        dataType: "json",
        success: function(response) {
            $('#your_name').text(response.user_info.user.name)
            $('#your_point').text(response.user_info.point)
            $.each($('.user_i'), function(indexInArray, valueOfElement) {
                if ($(valueOfElement).attr('data-user').split('.')[0] == response.user_info.user
                    .id) {
                    let top = $(valueOfElement).attr('data-user').split('.')[1]
                    console.log($(valueOfElement).attr('data-user').split('.'));
                    $('#top').text(top);
                    $('#your_top').text(top);


                }
            });
        }
    })
    $(document).ready(function() {
        $("#myBtn").click(function() {
            $("#myModal").modal("toggle");
        });
        $('.close').click(function(){
            console.log(1);
            $("#myModal").modal("hide");

        })
    });
</script>

</html>
