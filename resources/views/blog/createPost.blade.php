@extends('templates.default', [
'title'=>'Create Blog',
'background_default'=>''
])


@section('body')

@include('templates.navbar')


<div class="post-create">
    <form id="form" method="POST" action="createPost" enctype="multipart/form-data">
        @csrf
        <h1>Create Post</h1>
        <div class="post-create__title">
            <input type="text" class="title__input" placeholder="Tiêu đề" name="title" required maxlength="255">
        </div>

        <div class="post-create__content">
            <div id="toolbar">
            </div>

            <!-- Create the editor container -->
            <div id="editor">
                <p>Viết Nội Dung Ở Đây!</p>
            </div>
        </div>
        <input type="hidden" name="contentPost" class="contentPost">
        <input type="hidden" name="dataPost" class="dataPost">

        <div class="post-create__footer">
            <div class="post-create__photo">
                <label for="photo">Chọn ảnh:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <div class="post-create__submit">
                <input type="submit" value="Đăng" class="submit__input">
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
            var text =  quill.getText(0, length);
            $('.dataPost').attr('value', html);
            $('.contentPost').attr('value', text);
            var text =  quill.getText(0, length);
            
        });
        window.quill = quill

    });
   


</script>


<script>

</script>
@endsection