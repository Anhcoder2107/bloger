@extends('templates.default', [
'title'=>'My Article',
'background_default'=>''
])


@section('body')

<?php 
    $emailGetCookie = $_COOKIE["email"] ;
    
?>

@include('templates.navbar')

<div class="my-article">
    <div class="my-article__header">

    </div>
    <div class="my-article__dashboad">
        <table  class="table table-striped table-hover" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">@sortablelink('id')</th>
                    <th scope="col">@sortablelink('titleBlog') </th>
                    <th scope="col">@sortablelink('postBlog')</th>
                    <th scope="col">@sortablelink('releaseDateBlog')</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach($sort as $item)
                <tr>
                    <td class="table--id">{{$item->id}}</td>
                    <td class="table--title">{{$item->title}}</td>
                    <td class="table--content">{{$item->body}}</td>
                    <td class="table--date">{{$item->create_date}}</td>
                    <td class="table--image">{{$item->image}}</td>@csrf
                    <td class="table--edit"><a href="/blog/edit/{{$item->id}}" class="btn btn-sm table-btn table-edit-btn"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td class="table--trash">
                        <a href="/blog/delete/{{$item->id}}" class="table-trash-btn">
                            <form method="POST" action="/blog/delete/{{$item->id}}" onsubmit="return ConfirmDelete( this )">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-spinner table-btn table-trash-btn" type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        
    </div>
    
    <div class="my-article__dashboad--pagition">
        {{  $sort->links() }}
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(".table--title").each(function(){if ($(this).text().length > 30) {$(this).text($(this).text().substr(0, 30));$(this).append('...');}});
    $(".table--content").each(function(){if ($(this).text().length > 55) {$(this).text($(this).text().substr(0, 55));$(this).append('...');}});
    $(".table--image").each(function(){if ($(this).text().length > 20) {$(this).text($(this).text().substr(0, 20));$(this).append('...');}});

    // Sort

</script>

@endsection
