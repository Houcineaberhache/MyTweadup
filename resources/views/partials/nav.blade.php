<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
body{

background-color: #f1f1f1;
}
.nav-pills .nav-link.active, .nav-pills .show > .nav-link{
background-color: #17A2B8;
}
.black-icon {
    color: black !important;
}
.dropdown-menu{
top: 60px;
right: 0px;
left: unset;
width: 460px;
box-shadow: 0px 5px 7px -1px #c1c1c1;
padding-bottom: 0px;
padding: 0px;
}
.dropdown-menu:before{
content: "";
position: absolute;
top: -20px;
right: 12px;
border:10px solid #343A40;
border-color: transparent transparent #343A40 transparent;
}
.head{
padding:5px 15px;
border-radius: 3px 3px 0px 0px;
}
.footer{
padding:5px 15px;
border-radius: 0px 0px 3px 3px;
}
.notification-box{
padding: 10px 0px;
}
.bg-gray{
background-color: #eee;
}
@media (max-width: 640px) {
.dropdown-menu{
top: 50px;
left: -16px;
width: 290px;
}
.nav{
display: block;
}
.nav .nav-item,.nav .nav-item a{
padding-left: 0px;
}
.message{
font-size: 13px;
}
}





    </style>
</head>
<body>
<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
           
            <li class="nav-item dropdown">
            <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell black-icon"></i>
            </a>

    <ul class="dropdown-menu">
        <li class="head text-light bg-dark">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <span>Notifications (3)</span>
                    <a href="" class="float-right text-light">Mark all as read</a>
                </div>
            </div>
        </li>
        <li class="notification-box">
            <div class="row">
              
            <div class="col-lg-8 col-sm-8 col-8 text-center">
                    <strong class="text-info">David John</strong>
                    <div class="text-center">
                        Lorem ipsum dolor sit amet, consectetur
                    </div>
                    <small class="text-warning">27.11.2015, 15:00</small>
                </div>
            </div>
        </li>
        <li class="notification-box bg-gray">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                    <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                </div>
                <div class="col-lg-8 col-sm-8 col-8">
                    <strong class="text-info">David John</strong>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur
                    </div>
                    <small class="text-warning">27.11.2015, 15:00</small>
                </div>
            </div>
        </li>
        <li class="notification-box">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-3 text-center">
                    <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                </div>
                <div class="col-lg-8 col-sm-8 col-8">
                    <strong class="text-info">David John</strong>
                    <div>
                        Lorem ipsum dolor sit amet, consectetur
                    </div>
                    <small class="text-warning">27.11.2015, 15:00</small>
                </div>
            </div>
        </li>
        <li class="footer bg-dark text-center">
            <a href="" class="text-light">View All</a>
        </li>
    </ul>
</li>










			
		



			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->

                        
          

         



                                   
		</nav>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

    allSideMenu.forEach(item => {
        const li = item.parentElement;

        item.addEventListener('click', function() {
            allSideMenu.forEach(i => {
                i.parentElement.classList.remove('active');
            })
            li.classList.add('active');
        })
    });

    // TOGGLE SIDEBAR
    const menuBar = document.querySelector('#content nav .bx.bx-menu');
    const sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function() {
        sidebar.classList.toggle('hide');
    })

    const searchButton = document.querySelector('#content nav form .form-input button');
    const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
    const searchForm = document.querySelector('#content nav form');

    searchButton.addEventListener('click', function(e) {
        if (window.innerWidth < 576) {
            e.preventDefault();
            searchForm.classList.toggle('show');
            if (searchForm.classList.contains('show')) {
                searchButtonIcon.classList.replace('bx-search', 'bx-x');
            } else {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
            }
        }
    })

    if (window.innerWidth < 768) {
        sidebar.classList.add('hide');
    } else if (window.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }

    window.addEventListener('resize', function() {
        if (this.innerWidth > 576) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }
    })

    const switchMode = document.getElementById('switch-mode');

    switchMode.addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('dark');
        } else {
            document.body.classList.remove('dark');
        }
    })
    
});
</script>
</body>
</html>