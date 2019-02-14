<div class="profile-header">

    <div class="profile-header-cover"></div>

    <div class="profile-header-content">

        <div class="profile-header-img">
            <img src="{!!url('public/admin_theme/dist/img/user2-160x160.jpg')!!}" class="user-image" alt="User Image">
        </div>

        <div class="profile-header-info">
            <h4 class="m-t-10 m-b-5">{{ Auth::user()->name }}</h4>
            <p class="m-b-10">Web Developer</p>
            <a href="#" class="btn btn-xs btn-info">Edit Profile</a>
        </div>

    </div>

    <ul class="profile-header-tab nav nav-tabs">
        <li class="nav-item"><a href="#profile-post" class="nav-link active" data-toggle="tab">POSTS</a></li>
        <li class="nav-item"><a href="#profile-about" class="nav-link" data-toggle="tab">ABOUT</a></li>
        <li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab">PHOTOS</a></li>
        <li class="nav-item"><a href="#profile-videos" class="nav-link" data-toggle="tab">VIDEOS</a></li>
        <li class="nav-item"><a href="#profile-friends" class="nav-link" data-toggle="tab">FRIENDS</a></li>
    </ul>

</div>

