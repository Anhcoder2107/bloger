@extends('templates.default', [
'title'=>'Edit Blog',
'background_default'=>''
])


@section('body')

<?php 
    $emailGetCookie = $_COOKIE["email"] ;
    
?>

@include('templates.navbar')

<?php $url = asset('images/' . $post[0]->image); ?>
<div class="post-create">
    <form method="POST" action="/blog/update/{{$post[0]->id}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <h1>Edit Post</h1>
        <div class="post-create__title">
            <input type="text" class="title__input" placeholder="Tiêu đề" name="title" required maxlength="255" value="{{$post[0]->title}}">
        </div>
        <div class="post-create__content">
            <div id="toolbar">
            </div>

            <!-- Create the editor container -->
            <div id="editor">
                {!! $post[0]->htmlbody !!}
            </div>
        </div>
        <input type="hidden" name="contentPost" class="contentPost">
        <input type="hidden" name="dataPost" class="dataPost">

        <div class="post-create__footer">
            <div class="post-create__photo post-edit__photo">
                <div>
                    <label class="" for="img">Ảnh:</label>
                    <img id="img" class="post-img-edit" src="{{$url}}" alt="">
                </div>

                <div>
                    <label for="photo">Tải Ảnh Mới:</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
            </div>

            <div class="post-create__submit">
                <input type="submit" value="Cập Nhật" class="submit__input">
            </div>
        </div>
    </form>
</div>




<script src="https://cdn.tiny.cloud/1/your-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>;
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<!-- Initialize Quill editor -->
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var toolbarOptions = [
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            [{
                'font': []
            }],
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block', 'image', 'video'],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }],
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }],
            [{
                'align': []
            }],
            ['clean'] // remove formatting button
        ];

        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow',
        });
        quill.on('editor-change', function(eventName, ...args) {
            var html = quill.root.innerHTML;
            var length = quill.getLength();
            var text = quill.getText(0, length);
            $('.dataPost').attr('value', html);
            $('.contentPost').attr('value', text);
            var text = quill.getText(0, length);

        });
        window.quill = quill

    });
</script>

@endsection