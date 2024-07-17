<script type="text/ecmascript">
var FULLSITEURL 	=	'<?php echo base_url(); ?>';
var CURRENTCLASS 	=	'<?php echo $this->router->fetch_class(); ?>';
var CURRENTMETHOD 	=	'<?php echo $this->router->fetch_method(); ?>';
</script>




<script src="{ASSET_URL}front/js/swiper.min.js"></script>


<script src="{ASSET_URL}front/js/bootstrap.min.js"></script> 
<script src="{ASSET_URL}front/js/manoj-plugin.js"></script> 

<script src="{ASSET_URL}front/js/jquery-1.11.3.min.js"></script> 
<script src="{ASSET_URL}front/js/jquery.validate.js"></script> 




<script>
        if (CURRENTMETHOD == 'index'){
$(document).on("pagecreate", "#pageone", function(){
$("body").on("swiperight", function(){alert("hi");
        $(".mobile-fade").addClass('active');
});
        $("body").on("swipeleft", function(){
$(".mobile-fade").removeClass('active');
});
        }); }
</script>
<script>
    $(window).scroll(function() {
    var scroll = $(window).scrollTop();
            if (scroll >= 10) {
    $(".main-heade").addClass("fixed");
            $(".navbar").addClass("darkHeader");
            $(".structure-band").addClass("structure-band-small");
            $(".topstrip").addClass("topstrip-hide");
    } else {
    $(".main-heade").removeClass("fixed");
            $(".navbar").removeClass("darkHeader");
            $(".structure-band").removeClass("structure-band-small");
            $(".topstrip").removeClass("topstrip-hide");
    }
    });</script>
<script>
            $(document).ready(function(){
    $(".navbar-toggle").click(function(){
    $("#navbar-collapse-4, .mobile-fade").addClass('active');
            $("#navbar-collapse-4").removeClass('collapse');
    });
            $(".mobile-fade").click(function(){
    $("#navbar-collapse-4, .mobile-fade").removeClass('active');
    });
            });</script>

<!--search screipt-->
<script>
            $(document).ready(function() {
    var submitIcon = $(".searchbox-icon");
            var inputBox = $(".searchbox-input");
            var searchBox = $(".searchbox");
            var isOpen = false;
            submitIcon.click(function() {
            if (isOpen == false) {
            searchBox.addClass("searchbox-open");
                    inputBox.focus();
                    isOpen = true;
            } else {
            searchBox.removeClass("searchbox-open");
                    inputBox.focusout();
                    isOpen = false;
            }
            });
            submitIcon.mouseup(function() {
            return false;
            });
            searchBox.mouseup(function() {
            return false;
            });
            $(document).mouseup(function() {
    if (isOpen == true) {
    $(".searchbox-icon").css("display", "block");
            submitIcon.click();
    }
    });
            });
            function buttonUp() {
            var inputVal = $(".searchbox-input").val();
                    inputVal = $.trim(inputVal).length;
                    if (inputVal !== 0) {
            $(".searchbox-icon").css("display", "none");
            } else {
            $(".searchbox-input").val("");
                    $(".searchbox-icon").css("display", "block");
            }
            }

</script>
<script>
    $(document).ready(function(){
    $(".openmobsearch").click(function(){
    $(".hideshowsearch").toggleClass('active');
            $(".change_icon").toggleClass('fa-search');
            $(".change_icon").toggleClass('fa-close');
    });
            });</script>

<script>
            var swiper = new Swiper('.clint_slide', {
            slidesPerView: 5,
                    spaceBetween: 50,
                    // init: false,
                    pagination: {
                    el: '.clint_slidepagination',
                            clickable: true,
                    },
                    breakpoints: {
                    1366: {
                    slidesPerView: 8,
                            spaceBetween:0,
                    },
                            1024: {
                            slidesPerView: 8,
                                    spaceBetween:0,
                            },
                            768: {
                            slidesPerView: 6,
                                    spaceBetween:0,
                            },
                            640: {
                            slidesPerView: 4,
                                    spaceBetween:0,
                            },
                            320: {
                            slidesPerView: 2,
                                    spaceBetween:0,
                            }
                    }
            });</script>
<script>
            var swiper = new Swiper('.banner-slider', {
            pagination: '.banner-slider-pagination',
                    // paginationClickable: true,

                    navigation: {
                    nextEl: '.banner-slider-next',
                            prevEl: '.banner-slider-prev',
                    },
                    spaceBetween:0
            });</script>
<script>
            var swiper = new Swiper('.custmer-slide', {
            spaceBetween: 30,
                    effect: 'coverflow',
                    centeredSlides: true,
                    < !--autoplay: {
                    // delay: 2500,
                    //speed: 2500,
                    //disableOnInteraction: false,
                    //  },-->
                    coverflowEffect: {
                    rotate: 60,
                            slideShadows: false,
                    },
                            navigation: {
                            nextEl: '.custmer-slide-button-next',
                                    prevEl: '.custmer-slide-button-prev',
                            },
                    });
</script>
<!--
<script>
$(document).ready(function(){
        $('#helpForm').validate({ 
                submitHandler: function(form) { 
                        $.ajax({
                                type: 'post',
                                url:FULLSITEURL+"welcome/helpcontact",
                                data: $("form").serialize(),  
                                success: function(result){ 
                                        var data	=	result.split('_____'); 
                                                $('#fname').val('')
                                                //$('#phone').val('')
                                                $('#email').val('')
                                                $('#subject').val('')
                                                $('#message').val('')
                                        if(data[0] == 'success') //alert(data);
                                                ShowAlertMessageModel('success',data[1]);
                                }
                        });
                        return false;
                 }
        });
});
</script> 

-->


