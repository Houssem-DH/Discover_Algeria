<x-app-layout>


    <style>
        /*
    Image credits:
    uifaces.com (http://uifaces.com/authorized)
*/

#login { display: none; }
.login,
.logout { 
    position: absolute; 
    top: -3px;
    right: 0;
}
.page-header { position: relative; }
.reviews {
    color: #555;    
    font-weight: bold;
    margin: 10px auto 20px;
}
.notes {
    color: #999;
    font-size: 12px;
}
.media .media-object { max-width: 120px; }
.media-body { position: relative; }
.media-date { 
    position: absolute; 
    right: 25px;
    top: 25px;
}
.media-date li { padding: 0; }
.media-date li:first-child:before { content: ''; }
.media-date li:before { 
    content: '.'; 
    margin-left: -2px; 
    margin-right: 2px;
}
.media-comment { margin-bottom: 20px; }
.media-replied { margin: 0 0 20px 50px; }
.media-replied .media-heading { padding-left: 6px; }

.btn-circle {
    font-weight: bold;
    font-size: 12px;
    padding: 6px 15px;
    border-radius: 20px;
}
.btn-circle span { padding-right: 6px; }
.embed-responsive { margin-bottom: 20px; }
.tab-content {
    padding: 50px 15px;
    border: 1px solid #ddd;
    border-top: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}
.custom-input-file {
    overflow: hidden;
    position: relative;
    width: 120px;
    height: 120px;
    background: #eee url('https://s3.amazonaws.com/uifaces/faces/twitter/walterstephanie/128.jpg');    
    background-size: 120px;
    border-radius: 120px;
}
input[type="file"]{
    z-index: 999;
    line-height: 0;
    font-size: 0;
    position: absolute;
    opacity: 0;
    filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
    margin: 0;
    padding:0;
    left:0;
}
.uploadPhoto {
    position: absolute;
    top: 25%;
    left: 25%;
    display: none;
    width: 50%;
    height: 50%;
    color: #fff;    
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;    
    background-color: rgba(0,0,0,.3);
    border-radius: 50px;
    cursor: pointer;
}
.custom-input-file:hover .uploadPhoto { display: block; }
    </style>
    <br><br><br><br>


    <section class="py-5 product_data">

        <div class="container px-4 px-lg-5 my-5">

            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6 "><img class="card-img-top mb-5 mb-md-0 imga" src="storage/places/{{ $place->image }}"
                        alt="{{ $place->name }}" /></div>

                <div class="col-md-6">
                    <div class="small mb-1"></div>
                    <h1 class="display-5 fw-bolder">{{ $place->name }}</h1>
                    <hr>
                    <div class="fs-5 mb-5">

                        <p class="lead">{{ $place->description }}</p>
                        <span>{{ $place->pg_price }} $</span>
                    </div>

                    <br>
                    <div class="d-flex">

                        </button>





                    </div>
                </div>
            </div>
        </div>
    </section>





    <br><br>
    
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1" id="logout">
                <div class="page-header">
                    <h3 class="reviews">Leave your Review</h3>
                   
                </div>
                <div class="comment-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab">
                                <h4 class="reviews text-capitalize">Reviews</h4>
                            </a></li>
                        <li><a href="#add-comment" role="tab" data-toggle="tab">
                                <h4 class="reviews text-capitalize">Add review</h4>
                            </a></li>
                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="comments-logout">
                            <ul class="media-list">
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle"
                                            src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg"
                                            alt="profile">
                                    </a>
                                    <div class="media-body">
                                        <div class="well well-lg">
                                            <h4 class="media-heading text-uppercase reviews">Marco </h4>
                                            <ul class="media-date text-uppercase reviews list-inline">
                                                <li class="dd">22</li>
                                                <li class="mm">09</li>
                                                <li class="aaaa">2014</li>
                                            </ul>
                                            <p class="media-comment">
                                                Great snippet! Thanks for sharing.
                                            </p>
                                            <a class="btn btn-info btn-circle text-uppercase" href="#"
                                                id="reply"><span class="glyphicon glyphicon-share-alt"></span>
                                                Reply</a>
                                            <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse"
                                                href="#replyOne"><span class="glyphicon glyphicon-comment"></span> 2
                                                comments</a>
                                        </div>
                                    </div>
                                    
                                </li>
                                
                                
                            </ul>
                        </div>
                        <div class="tab-pane" id="add-comment">
                            <form action="#" method="post" class="form-horizontal" id="commentForm"
                                role="form">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Comment</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="uploadMedia" class="col-sm-2 control-label">Upload media</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">http://</div>
                                            <input type="text" class="form-control" name="uploadMedia"
                                                id="uploadMedia">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button class="btn btn-success btn-circle text-uppercase" type="submit"
                                            id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit
                                            comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1" id="login">
                <div class="page-header">
                    <h3 class="reviews">Leave your comment</h3>
                    <div class="logout">
                        <button class="btn btn-default btn-circle text-uppercase" type="button"
                            onclick="$('#login').hide(); $('#logout').show()">
                            <span class="glyphicon glyphicon-off"></span> Login
                        </button>
                    </div>
                </div>
                <div class="comment-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#comments-login" role="tab" data-toggle="tab">
                                <h4 class="reviews text-capitalize">Comments</h4>
                            </a></li>
                        <li><a href="#add-comment-disabled" role="tab" data-toggle="tab">
                                <h4 class="reviews text-capitalize">Add comment</h4>
                            </a></li>
                        <li><a href="#new-account" role="tab" data-toggle="tab">
                                <h4 class="reviews text-capitalize">Create an account</h4>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="comments-login">
                            <ul class="media-list">
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle"
                                            src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg"
                                            alt="profile">
                                    </a>
                                    <div class="media-body">
                                        <div class="well well-lg">
                                            <h4 class="media-heading text-uppercase reviews">Marco</h4>
                                            <ul class="media-date text-uppercase reviews list-inline">
                                                <li class="dd">22</li>
                                                <li class="mm">09</li>
                                                <li class="aaaa">2014</li>
                                            </ul>
                                            <p class="media-comment">
                                                Great snippet! Thanks for sharing.
                                            </p>
                                            <a class="btn btn-info btn-circle text-uppercase" href="#"
                                                id="reply"><span class="glyphicon glyphicon-share-alt"></span>
                                                Reply</a>
                                            <a class="btn btn-warning btn-circle text-uppercase"
                                                data-toggle="collapse" href="#replyThree"><span
                                                    class="glyphicon glyphicon-comment"></span> 2 comments</a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="replyThree">
                                        <ul class="media-list">
                                            <li class="media media-replied">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle"
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/ManikRathee/128.jpg"
                                                        alt="profile">
                                                </a>
                                                <div class="media-body">
                                                    <div class="well well-lg">
                                                        <h4 class="media-heading text-uppercase reviews"><span
                                                                class="glyphicon glyphicon-share-alt"></span> The
                                                            Hipster</h4>
                                                        <ul class="media-date text-uppercase reviews list-inline">
                                                            <li class="dd">22</li>
                                                            <li class="mm">09</li>
                                                            <li class="aaaa">2014</li>
                                                        </ul>
                                                        <p class="media-comment">
                                                            Nice job Maria.
                                                        </p>
                                                        <a class="btn btn-info btn-circle text-uppercase"
                                                            href="#" id="reply"><span
                                                                class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="media media-replied" id="replied">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle"
                                                        src="https://pbs.twimg.com/profile_images/442656111636668417/Q_9oP8iZ.jpeg"
                                                        alt="profile">
                                                </a>
                                                <div class="media-body">
                                                    <div class="well well-lg">
                                                        <h4 class="media-heading text-uppercase reviews"><span
                                                                class="glyphicon glyphicon-share-alt"></span> Mary</h4>
                                                        </h4>
                                                        <ul class="media-date text-uppercase reviews list-inline">
                                                            <li class="dd">22</li>
                                                            <li class="mm">09</li>
                                                            <li class="aaaa">2014</li>
                                                        </ul>
                                                        <p class="media-comment">
                                                            Thank you Guys!
                                                        </p>
                                                        <a class="btn btn-info btn-circle text-uppercase"
                                                            href="#" id="reply"><span
                                                                class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle"
                                            src="https://s3.amazonaws.com/uifaces/faces/twitter/kurafire/128.jpg"
                                            alt="profile">
                                    </a>
                                    <div class="media-body">
                                        <div class="well well-lg">
                                            <h4 class="media-heading text-uppercase reviews">Nico</h4>
                                            <ul class="media-date text-uppercase reviews list-inline">
                                                <li class="dd">22</li>
                                                <li class="mm">09</li>
                                                <li class="aaaa">2014</li>
                                            </ul>
                                            <p class="media-comment">
                                                I'm looking for that. Thanks!
                                            </p>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item"
                                                    src="//www.youtube.com/embed/80lNjkcp6gI" allowfullscreen></iframe>
                                            </div>
                                            <a class="btn btn-info btn-circle text-uppercase" href="#"
                                                id="reply"><span class="glyphicon glyphicon-share-alt"></span>
                                                Reply</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle"
                                            src="https://s3.amazonaws.com/uifaces/faces/twitter/lady_katherine/128.jpg"
                                            alt="profile">
                                    </a>
                                    <div class="media-body">
                                        <div class="well well-lg">
                                            <h4 class="media-heading text-uppercase reviews">Kriztine</h4>
                                            <ul class="media-date text-uppercase reviews list-inline">
                                                <li class="dd">22</li>
                                                <li class="mm">09</li>
                                                <li class="aaaa">2014</li>
                                            </ul>
                                            <p class="media-comment">
                                                Yehhhh... Thanks for sharing.
                                            </p>
                                            <a class="btn btn-info btn-circle text-uppercase" href="#"
                                                id="reply"><span class="glyphicon glyphicon-share-alt"></span>
                                                Reply</a>
                                            <a class="btn btn-warning btn-circle text-uppercase"
                                                data-toggle="collapse" href="#replyFour"><span
                                                    class="glyphicon glyphicon-comment"></span> 1 comment</a>
                                        </div>
                                    </div>
                                    <div class="collapse" id="replyFour">
                                        <ul class="media-list">
                                            <li class="media media-replied">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle"
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/jackiesaik/128.jpg"
                                                        alt="profile">
                                                </a>
                                                <div class="media-body">
                                                    <div class="well well-lg">
                                                        <h4 class="media-heading text-uppercase reviews"><span
                                                                class="glyphicon glyphicon-share-alt"></span> Lizz</h4>
                                                        <ul class="media-date text-uppercase reviews list-inline">
                                                            <li class="dd">22</li>
                                                            <li class="mm">09</li>
                                                            <li class="aaaa">2014</li>
                                                        </ul>
                                                        <p class="media-comment">
                                                            Classy!
                                                        </p>
                                                        <a class="btn btn-info btn-circle text-uppercase"
                                                            href="#" id="reply"><span
                                                                class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    
                        
                    </div>
                </div>
            </div>
        </div>
       
    </div>


    <br><br><br><br>
</x-app-layout>
