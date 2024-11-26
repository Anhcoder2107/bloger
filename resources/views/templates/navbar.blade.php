<?php 
    $email = $_COOKIE["email"] ;
    $name = $_COOKIE["name"];
?>


<nav class="app__navbar">
        <ul>
            <li>
                <a href="/">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{route('blog')}}">
                    <i class="fa-solid fa-blog"></i>
                    <span>Blog</span>
                </a>
            </li>
            <li>
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-circle-question"></i>
                    <span>Help</span>
                </a>
            </li>
        </ul>
        

    </nav>  

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel">We'd Love to Hear From You</h4>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" action="{{ route('feedback') }}" enctype="multipart/form-data" class="form-horizontal col-sm-12">
                @csrf
                    <div class="form-group"><label>E-Mail</label><input name="email" class="form-control email" placeholder="email@you.com (so that we can contact you)" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)" type="text" value="{{$email}}" readonly></div>
                    <div class="form-group"><label>Name</label><input name="name" class="form-control required" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text" value="{{$name}}" readonly></div>
                    <div class="form-group"><label>Phone</label><input name="numPhone" id="numPhone" class="form-control phone numPhone" required placeholder="999-999-9999" data-placement="top" data-trigger="manual" data-content="Must be a valid phone number (999-999-9999)" type="text"></div>
                    <div class="form-group"><label>Message</label><textarea name="message" id="message" class="form-control required message" placeholder="Your message here.." data-placement="top" data-trigger="manual" required></textarea></div>
                    <div class="form-group"><button type="submit" class="btn btn-success pull-right btn-submit btn-modal-submit " disabled>Send</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-bs-dismiss="modal" aria-hidden="true">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script>

    var checkNum = false;
    var checkMessage = false;
    var btnSubModal = document.getElementsByClassName(" btn-modal-submit")
    
    document.getElementById("numPhone").onchange = function(){
       checkNum = true
    }
    document.getElementById("message").onchange = function(){
        checkMessage = true
        if(checkMessage & checkNum){
            btnSubModal[0].removeAttribute("disabled")
        }
    }

    btnSubModal[0].onclick = function(){
        confirm("Phản Hồi Của Bạn Đã Được Ghi Lại.")
    }
</script>