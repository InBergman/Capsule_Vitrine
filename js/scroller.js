
function scrollTo(name)
{
    $('html, body').animate({
        scrollTop: $("#slide-" + name).offset().top
    }, 350);
};

// $(document).ready(function() {
//     console.log();
//     const N_PX_BEFORE_SLIDE = 20;
//     var win = $(window);
//
//     win.scroll(function () {
//         var newsY       = $("#slide-news").offset().top;
//         var ideeY       = $("#slide-idee").offset().top;
//         var artistesY   = $("#slide-artistes").offset().top;
//         var lieuxY      = $("#slide-lieux").offset().top;
//         var contactY    = $("#slide-contact").offset().top;
//         var y           = win.scrollTop();
//         const nav       = {
//             beforeNews : undefined,
//             beforeIdee : "#navigation .nav-news",
//             beforeArtistes : "#navigation .nav-idee",
//             beforeLieux : "#navigation .nav-artistes",
//             beforeContact : "#navigation .nav-lieux",
//             last : "#navigation .nav-contact"
//         }
//
//         if (y < newsY - N_PX_BEFORE_SLIDE)
//         {
//             $(".scrollActive").toggleClass("scrollActive");
//             // $("#navigation .nav-news").toggleClass("scrollActive");
//         }
//         else if (y < ideeY - N_PX_BEFORE_SLIDE)
//         {
//             $(".scrollActive").toggleClass("scrollActive");
//             $(nav.beforeIdee).toggleClass("scrollActive");
//         }
//         else if (y < artistesY - N_PX_BEFORE_SLIDE)
//         {
//             $(".scrollActive").toggleClass("scrollActive");
//             $(nav.beforeArtistes).toggleClass("scrollActive");
//         }
//         else if (y < lieuxY - N_PX_BEFORE_SLIDE)
//         {
//             $(".scrollActive").toggleClass("scrollActive");
//             $(nav.beforeLieux).toggleClass("scrollActive");
//         }
//         else if(win.scrollTop() + win.height() >= $(document).height() - 20)
//         {
//             $(".scrollActive").toggleClass("scrollActive");
//             $(nav.last).toggleClass("scrollActive");
//         }
//         else if (y < contactY - N_PX_BEFORE_SLIDE)
//         {
//             $(".scrollActive").toggleClass("scrollActive");
//             $(nav.beforeContact).toggleClass("scrollActive");
//         }
//         else if (y > contactY - N_PX_BEFORE_SLIDE)
//         {
//             $(".scrollActive").toggleClass("scrollActive");
//             $(nav.last).toggleClass("scrollActive");
//         }
//     });
// });

function menuToggle() {
    $("#navigation").toggleClass("down");
    $("#main-content").toggleClass("down");
}
